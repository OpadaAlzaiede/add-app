@extends('layouts.app')

@section('title', 'Welcome')



@section('content')

    <div class="mx-auto">
        <form method="POST" action="/register">
            @csrf

            <div class="form-outline mb-4">
                @if($errors->has('name'))
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                @endif
                <label class="form-label" for="name">Name</label>
                <input value= "{{old('name')}}" type="name" id="name" name="name" class="form-control" required/>
            </div>

            <div class="form-outline mb-4">
                @if($errors->has('name'))
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                @endif
                <label class="form-label" for="email">Email address</label>
                <input value= "{{old('email')}}" type="email" id="email" name="email" class="form-control" required/>
            </div>

            <div class="form-outline mb-4">
                @if($errors->has('password'))
                    <div class="text-danger">{{ $errors->first('password') }}</div>
                @endif
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required/>
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="password_confirmation">Password Confirmation</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required/>
            </div>

            <button type="submit" class="btn btn-primary btn-block mb-4">Register</button>
        </form>
    </div>
@endsection
