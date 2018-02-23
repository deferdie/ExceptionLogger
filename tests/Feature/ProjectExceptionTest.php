<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectExceptionTest extends TestCase
{
    /** @test */
    public function guests_cannot_see_the_exception_log()
    {
        $this->get(route('exceptionLog'))
        	->assertStatus(302)
        	->assertRedirect('/login');
    }

    public function a_projectException_belongs_to_a_project()
    {
    	$exception = factory('App\ProjectException')->create();
    	
    }

    /** @test */
    public function authenticated_applications_can_create_an_exception()
    {
        $this->get(route('exceptionLog'))
        	->assertStatus(302)
        	->assertRedirect('/login');
    }
}
