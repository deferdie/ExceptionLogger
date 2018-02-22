<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApplicationTest extends TestCase
{
	use RefreshDatabase;

    /** @test */
    public function guests_cannot_access_the_applications_page()
    {
        $this->get(route('applications'))
        	->assertRedirect('/login');
    }

    /** @test */
    public function auth_users_can_access_the_applications_page()
    {
    	$this->actingAs(factory('App\User')->create());

        $this->get(route('applications'))
        	->assertStatus(200);
    }
}
