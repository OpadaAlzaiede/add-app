@extends('layouts.app')

@section('title', 'Welcome')


@section('content')

    @if(session()->has('register_success'))
        <div class="alert alert-primary" role="alert">
            {{ session()->get('register_success')}}
        </div>
    @endif
    @if(session()->has('account_activation'))
        <div class="alert alert-danger" role="alert">
            {{ session()->get('account_activation')}}
        </div>
    @endif
        <div class="text-center" style=" width: 300px; height: 100px;position: absolute; top: 40%; left: 40%">
            <h1 class="text-primary">App-Add</h1>
        </div>
@endsection
