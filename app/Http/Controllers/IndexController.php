<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Twitter;

class IndexController extends Controller
{
    public function index () 
    {
        $tweets = Twitter::getUserTimeline(['screen_name' => User::first()->portfolio->twitter_user, 'count' => 5, 'format' => 'object']);

        return view('index', ['user' => User::first(), 'tweets' => $tweets]);
    }
}
