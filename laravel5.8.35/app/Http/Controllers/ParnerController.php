<?php

namespace App\Http\Controllers;

use App\Parner;
use Illuminate\Http\Request;
use Auth;

/**
 *
 */
class ParnerController extends Controller
{

    function __construct()
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
        return redirect()->route('home');
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
    public function edit()
    {
        $parner = Auth::guard()->user();
        return view('parners.edit', [
            'parner' => $parner,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parner  $parner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $parner = Auth::guard('parner')->user();

        // validate data
        $data = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'confirmed'],
            'image' => '',
        ]);

        $parner->password = Hash::make($data['password']);

        if ($request->name !== $parner->name) {
            $data = $request->validate([
                'name' => ['unique:parners'],
                'email' => '',
                'password' => '',
                'image' => '',
            ]);
            $parner->name = $data['name'];
        }

        if ($request->email !== $parner->email) {
            $data = $request->validate([
                'name' => '',
                'email' => ['unique:parners'],
                'password' => [''],
                'image' => '',
            ]);
            $parner->email = $data['email'];
        }

        if (isset($request->image)) {
            $parner->avatar = $request->image->store('parners', 'public');
        }

        $parner->save();

        return redirect()->route('logout');
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
