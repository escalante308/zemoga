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

        $first = Portfolio::create([
            'title'             => 'Backend Developer in Jobsity',
            'description'       => 'Pedro has worked on some projects involving Laravel and Frontend Frameworks as React. During his time on Jobsity, 
                                    he has learned about Laravel Dusk tests, Github CI and collaborative services',
            'image_url'         => 'https://facerealityacneclinic.com/wp-content/uploads/2018/12/placeholder-profile-male-500x500.png',
            'twitter_user_name' => 'pedreska'
        ]);

        Portfolio::create([
            'title'             => 'Backend Developer in Citriom LLC',
            'description'       => 'The main tasks on this company were related with Real Estate software and Lead Communications, using Email, SMS and
                                    calls. Pedro worked with 3rd Party Services as Twilio, Sendgrid and Slybroadcasts, among others',
            'image_url'         => 'https://facerealityacneclinic.com/wp-content/uploads/2018/12/placeholder-profile-male-500x500.png',
            'twitter_user_name' => 'pedreska'
        ]);

        Portfolio::create([
            'title'             => 'Wordpress Developer in Conexion Click C.A.',
            'description'       => 'Pedro created websites using Wordpress as main base for those developments. He worked with plugins like NinjaForms, 
                                    GoogleMaps, and deployments on Cpanel',
            'image_url'         => 'https://facerealityacneclinic.com/wp-content/uploads/2018/12/placeholder-profile-male-500x500.png',
            'twitter_user_name' => 'pedreska'
        ]);

        User::deleteAll();

        User::create([
            'email'       => "pedro@laravel.com",
            'first_name'  => "Pedro Xavier",
            'last_name'   => "Escalante",
            'password'    => bcrypt('password'),
            'idportfolio' => $first->idportfolio
        ]);

    }
}
