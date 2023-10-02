
@extends('layouts.app')

@section('title', 'Welcome')


@section('content')
    @if(session()->has('add_deletion_success'))
        <div class="alert alert-danger" role="alert">
            {{ session()->get('add_deletion_success')}}
        </div>
    @endif

    @if(count($adds))
        <div>
            <div class="d-flex flex-wrap justify-content-between">
                @foreach($adds as $add)
                    <div class="p-2">
                        <x-add.card :add="$add"/>
                    </div>
                @endforeach
            </div>

            <div class="mt-5 ml-2">
                {{ $adds->links() }}
            </div>
        </div>
    @else
        <div class="text-center ">
            <h5 class="text-highlight">No Adds For Today...</h5>
        </div>
    @endif
@endsection
