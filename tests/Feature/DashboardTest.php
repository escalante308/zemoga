<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;

class DashboardTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLoggedUserCanSeeDashboard()
    {
        $user = factory(User::class)->make(); 
        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertSee('Dashboard Panel');
    }

    public function testUpdateUser()
    {
        $user = factory(User::class)->make(); 

        $fields = ['first_name' => 'Tester',
                   'last_name'  => 'Application',
                   'email'      => 'test@app.com'];

        $response = $this->actingAs($user)->post('users/'.$user->id, $fields);
        $response->assertSee('updated');
    }
}
