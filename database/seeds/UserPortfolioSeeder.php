<?php

use Illuminate\Database\Seeder;
use App\Portfolio;
use App\User;

class UserPortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        Portfolio::deleteAll();

        $portfolio = Portfolio::create([
            'title'             => 'Laravel Artisan',
            'description'       => "Taylor Otwell created Laravel as an attempt to provide a more advanced alternative to the CodeIgniter framework, which did not provide certain features such as built-in support for user authentication and authorization.",
            'image_url'         => 'https://facerealityacneclinic.com/wp-content/uploads/2018/12/placeholder-profile-male-500x500.png',
            'twitter_user_name' => 'taylorotwell'
        ]);

        User::deleteAll();

        $user = User::create([
            'email'       => "totwell@laravel.com",
            'first_name'  => "Taylor",
            'last_name'   => "Otwell",
            'password'    => bcrypt('password'),
            'idportfolio' => $portfolio->idportfolio
        ]);

    }
}
