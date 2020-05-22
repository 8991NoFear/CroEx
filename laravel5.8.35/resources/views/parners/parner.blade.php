@extends('layouts.app')

@section('logout')
    <a href="{{ route('parner.logout') }}">log out</a>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Parner Dashboard</div>

                <div class="card-body">
                    {{-- @author: ledinhbinh --}}
                    @component('components.who')

                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
