<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectExceptionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_cannot_see_the_exception_log()
    {
        $this->get(route('exceptionLog'))
        	->assertStatus(302)
        	->assertRedirect('/login');
    }

    /** @test */
    public function a_projectException_belongs_to_a_project()
    {        
        $project = factory('App\Project')->create();

        $exception = factory('App\ProjectException')->create([
            'project_id' => $project->id
        ]);

        $this->assertTrue($project->exceptions->contains($exception));
    }

    /** @test */
    public function authenticated_applications_can_create_an_exception()
    {
        $this->get(route('createProject'))
        	->assertStatus(200);
    }
}
