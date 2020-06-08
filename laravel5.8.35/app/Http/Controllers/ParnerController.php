<?php

namespace App\Http\Controllers;

use App\Parner;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

/**
 *
 */
class ParnerController extends Controller
{

    function __construct()
    {
        // @author: ledinhbinh
        // $this->middleware('guest');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate form data
        $this->validate($request, [
            'name'  => ['required', 'string', 'unique:parners'],
            'image' => ['required', 'image'],
            'email' =>  ['required', 'email', 'unique:parners'],
            'ratio' =>  ['required', 'numeric'],
        ]);

        // create a record
        Parner::create([
            'name'      => $request->name,
            'avatar'    => $request->image->store('parners', 'public'),
            'email'     => $request->email,
            'ratio'     => $request->ratio,
        ]);

        // create a user table for parner
        $this->createUserTableForParner($request->name);

        return redirect()->route('home');
    }

    public function createUserTableForParner($tableName)
    {
        Schema::dropIfExists($tableName);
        Schema::create($tableName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email', 191)->unique();
            $table->unsignedInteger('point')->default(0);
        });
    }

}
