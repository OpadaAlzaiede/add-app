@extends('layouts.app')

@section('title', 'Welcome')


@section('content')

    @if(session()->has('register_success'))
        <p class="text-info">{{ session()->get('register_success')}}</p>
    @endif

    <div class="text-center">
        Add App
    </div>
@endsection
