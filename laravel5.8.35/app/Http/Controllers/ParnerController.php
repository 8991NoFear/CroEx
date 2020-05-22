<?php

namespace App\Http\Controllers;

use App\Parner;
use Illuminate\Http\Request;

class ParnerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        // @author: ledinhbinh
        $this->middleware('auth:parner');
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('parners.parner');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parner  $parner
     * @return \Illuminate\Http\Response
     */
    public function show(Parner $parner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parner  $parner
     * @return \Illuminate\Http\Response
     */
    public function edit(Parner $parner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parner  $parner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parner $parner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parner  $parner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parner $parner)
    {
        //
    }
}
