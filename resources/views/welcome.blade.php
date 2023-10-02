@extends('layouts.app')

@section('title', 'Welcome')


@section('content')

    @if(session()->has('register_success'))
        <div class="alert alert-primary" role="alert">
            {{ session()->get('register_success')}}
        </div>
    @endif
    <br>
    <div class="text-center">
        Add App
    </div>
@endsection
