<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
     * Show a User Dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/');
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::guard()->user();
        return view('users.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $user = Auth::guard()->user();

        // validate data
        $data = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'confirmed'],
            'image' => '',
            'review' => '',
        ]);

        $user->password = Hash::make($data['password']);

        if ($request->name !== $user->name) {
            $data = $request->validate([
                'name' => ['unique:users'],
                'email' => '',
                'password' => '',
                'image' => '',
                'review' => '',
            ]);
            $user->name = $data['name'];
        }

        if ($request->email !== $user->email) {
            $data = $request->validate([
                'name' => '',
                'email' => ['unique:users'],
                'password' => [''],
                'image' => '',
                'review' => '',
            ]);
            $user->email = $data['email'];
        }

        if (isset($request->image)) {
            $user->avatar = $request->image->store('users', 'public');
        }

        if (isset($request->review)) {
            $user->review = $data['review'];
        }

        $user->save();

        return redirect()->route('logout');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

}
