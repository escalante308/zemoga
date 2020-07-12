<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\User;
use Twitter;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index () 
    {
        $tweets = Twitter::getUserTimeline(['screen_name' => User::first()->portfolio->twitter_user, 'count' => 5, 'format' => 'object']);

        return view('index', ['user' => User::first(), 'tweets' => $tweets]);
    }
}
