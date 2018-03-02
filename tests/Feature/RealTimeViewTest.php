<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RealTimeViewTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function un_authenticated_users_cannot_see_realtime_exceptions()
    {
        $this->get(route('realtime'))
            ->assertStatus(302)
            ->assertREdirect('/login');
    }
    
    /** @test */
    public function authenticated_users_can_see_realtime_exceptions()
    {
        $this->actingAs(factory('App\User')->create());

        $this->get(route('realtime'))
            ->assertStatus(200);
    }
}
