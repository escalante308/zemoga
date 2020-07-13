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

}
