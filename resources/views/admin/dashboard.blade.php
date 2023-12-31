@extends('layouts.app')

@section('title', 'Welcome')


@section('content')
    @if(session()->has('user_activation_success'))
        <x-alert.alert type="primary" :message="session()->get('user_activation_success')"/>
    @endif
    @if(session()->has('user_deactivation_success'))
        <x-alert.alert type="danger" :message="session()->get('user_deactivation_success')"/>
    @endif
    <div class="text-center mb-5">
        <h5 class="text-highlight">Users</h5>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                   <td>{{$user->name}}</td>
                   <td>{{$user->email}}</td>
                   <td>
                        @if($user->isActivated())
                           <form method="POST" action="{{route('users.deactivate')}}">
                               @csrf
                               <input type="hidden" value="{{$user->id}}" name="user_id">
                               <button type="submit" class="btn btn-sm btn-danger">Deactivate</button>
                           </form>
                        @else
                           <form method="POST" action="{{route('users.activate')}}">
                               @csrf
                               <input type="hidden" value="{{$user->id}}" name="user_id">
                               <button type="submit" class="btn btn-sm btn-primary">Activate</button>
                           </form>
                        @endif
                   </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-5 ml-2">
        {{ $users->links() }}
    </div>
@endsection
