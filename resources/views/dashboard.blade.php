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
        <a href="/adds/create" class="link-primary text-primary">create</a>
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
