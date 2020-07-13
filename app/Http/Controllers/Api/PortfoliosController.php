<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Portfolio;
use App\Http\Requests\PortfolioStoreRequest;
use Illuminate\Database\QueryException;

class PortfoliosController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ['success' => true, 'portfolios' => Portfolio::get(), 'count' => Portfolio::count()];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PortfolioStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortfolioStoreRequest $request)
    {
        $validated = $request->validated();
             
        $portfolio = new Portfolio;
        $portfolio->fill($request->toArray());
        $portfolio->save();

        return ['success' => true, 'portfolio' => $portfolio];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ['success' => null != Portfolio::find($id), 'portfolio' => Portfolio::where('idportfolio', $id)->first()];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PortfolioStoreRequest $request, $id)
    {
        $validated = $request->validated();
             
        $portfolio = Portfolio::find($id);
        $portfolio->fill($request->toArray());
        $portfolio->save();

        return ['success' => true, 'portfolio' => $portfolio];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::find($id);
        
        if ($portfolio) {
            $portfolio->delete();
            return ['success' => true];
        } 
        
        return ['success' => false, 'errors' => ['QueryException error']];
    }
}
