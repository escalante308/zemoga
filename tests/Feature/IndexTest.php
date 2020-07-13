<?php

namespace Tests\Feature;

use App\Portfolio;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Str;
use App\User;

class IndexTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserCanSeeIndexPage()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee(env("APP_NAME"));
        $response->assertViewIs('index');
    }

    public function testUserCanSee404Page()
    {
        $response = $this->get('/'.Str::random(10));
        $response->assertStatus(404);
        $response->assertSee("404");
    }

    public function testLoginPageLoads()
    {
        $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertSee("Login");
        $response->assertViewIs('auth.login');
    }

    public function testLoggedUserCanSeeLogin()
    {
        $user = factory(User::class)->make(); 
        $response = $this->actingAs($user)->get('/login');
        $response->assertRedirect('/dashboard');
    }

    public function testLoginFailsWithWrongPassword()
    {
        $this->withoutMiddleware();

        $user = factory(User::class)->create([
            'password' => bcrypt('password'),
        ]);
        
        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'passw0rd',
        ]);
        
        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
    }

}
