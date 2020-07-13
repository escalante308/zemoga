<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\User;
use App\Portfolio;
use App\Http\Requests\UserStoreRequest;

class UsersController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        return ['success' => true, 'users' => User::get(), 'total' => User::count()];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ['success' => null != User::find($id), 'user' => User::find($id)];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $validated = $request->validated();
             
        $portfolio = new Portfolio;
        $portfolio->fill($request->toArray());
        $portfolio->save();

        return ['success' => true, 'portfolio' => $portfolio];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserStoreRequest $request, $id)
    {
        $validated = $request->validated();
             
        $user = User::find($id);
        $user->fill($request->toArray());
        $user->save();

        return ['success' => true, 'portfolio' => $user];
    }

    
}
