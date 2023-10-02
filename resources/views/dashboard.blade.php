@extends('layouts.app')

@section('title', 'Welcome')


@section('content')
    @if(session()->has('add_added_success'))
        <div class="alert alert-primary" role="alert">
            {{ session()->get('add_added_success')}}
        </div>
    @endif

    <div class="text-center">
        <h5 class="text-highlight">My Adds</h5>
    </div>
    <div class="ml-3">
        <a href="/adds/create" class="link-primary text-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
        </a>
    </div>
    <div class="d-flex mt-5 flex-wrap justify-content-between">
        @foreach($adds as $add)
            <div class="p-2">
                <x-add.card :add="$add"/>
            </div>
        @endforeach
    </div>

   <div class="mt-5 ml-2">
       {{ $adds->links() }}
   </div>
@endsection
