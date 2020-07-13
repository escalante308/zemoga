<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Portfolio;

class ApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetUsers()
    {
        $this->json('GET', 'api/users', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson(['success' => true]);
    }

    public function testGetPortfolios()
    {
        $this->json('GET', 'api/portfolios', ['Accept' => 'application/json'])
            ->assertStatus(200);
    }

    public function testGetPortfolio()
    {
        $portfolio = factory(Portfolio::class)->create();

        $this->json('GET', 'api/portfolios/'.$portfolio->idportfolio, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson(['success' => true]);
    }

    public function testGetPortfolioFails()
    {
        $this->json('GET', 'api/portfolios/9999', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson(['success' => false]);
    }

    public function testDeletePortfolio()
    {
        $portfolio = factory(Portfolio::class)->create();

        $this->json('DELETE', 'api/portfolios/'.$portfolio->idportfolio, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson(['success' => true]);
    }

    public function testDeletePortfolioFails()
    {
        $this->json('DELETE', 'api/portfolios/9999', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson(['success' => false]);
    }
}
