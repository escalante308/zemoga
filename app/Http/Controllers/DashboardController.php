<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard', ['user' => User::first()]);
    }

    public function store(Request $request) 
    {
        $user = auth()->user();
        $user->portfolio->fill($request->toArray())->save();

        return view('dashboard', ['user' => User::first()])->with(['success' => true, 'message' => 'The portfolio has been updated.']);
    }

    public function updateUser(Request $request, int $id)
    {
        $user = User::find($id);

        if ($user) {
            $user->fill($request->toArray());
            $user->save();

            return view('dashboard', ['user' => User::first()])->with(['success' => true, 'message' => 'The user has been updated.']);
        }
    }
}
