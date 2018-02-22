<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
	use RefreshDatabase;

    /** @test */
    public function guests_may_not_visit_projects()
    {
        $this->get(route('projects'))
        	->assertRedirect('/login');
    }

    /** @test */
    public function authenticated_users_can_view_all_projects()
    {
    	$this->actingAs(factory('App\User')->create());

        $this->get(route('projects'))
        	->assertStatus(200)
        	->assertSee('Projects');
    }

    /** @test */
    public function authenticated_users_can_view_a_projects()
    {
    	$this->actingAs(factory('App\User')->create());
    	
    	$project = factory('App\Project')->create();

        $this->get(route('showProject', $project->id))
        	->assertStatus(200)
        	->assertSee($project->name);
    }

    /** @test */
    public function authenticated_users_can_create_a_project()
    {
    	$user = factory('App\User')->create();

    	$this->actingAs($user);
    	
    	$project = factory('App\Project')->make(['user_id' => $user->id]);

        $this->post(route('createProject'), $project->toArray())
        	->assertStatus(302);

        $this->get(route('projects'))
        	->assertSee($project->name);

        $this->assertDatabaseHas('projects', [
        	'name' => $project->name
        ]);
    }

    /** @test */
    public function authenticated_users_can_update_a_project()
    {
    	$user = factory('App\User')->create();

    	$this->actingAs($user);
    	
    	$project = factory('App\Project')->create(['user_id' => $user->id]);

    	$project->name = 'Ferdie';

        $this->patch(route('updateProject', $project->id), $project->toArray())
        	->assertStatus(302);

        $this->get(route('showProject', $project))
        	->assertSee($project->name);

        $this->assertDatabaseHas('projects', [
        	'name' => $project->name
        ]);
    }

    /** @test */
    public function authenticated_users_can_delete_a_project()
    {
    	$user = factory('App\User')->create();

    	$this->actingAs($user);
    	
    	$project = factory('App\Project')->create(['user_id' => $user->id]);

        $this->delete(route('deleteProject', $project))
        	->assertStatus(302);

        $this->get(route('showProject', $project))
        	->assertStatus(404);

        $this->get(route('projects'))
        	->assertStatus(200)
        	->assertDontSee($project->name);
    }
}
