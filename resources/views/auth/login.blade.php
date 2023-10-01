@extends('layouts.app')

@section('title', 'Welcome')



@section('content')

    @if(session()->has('login_fail'))
        <p class="text-danger">{{ session()->get('login_fail')}}</p>
    @endif

  <div class="mx-auto">
      <form method="POST" action="/login">
          @csrf

          <div class="form-outline mb-4">
              <label class="form-label" for="email">Email address</label>
              <input value= "{{old('email')}}" type="email" id="email" name="email" class="form-control" required/>
          </div>

          <div class="form-outline mb-4">
              <label class="form-label" for="password">Password</label>
              <input value="{{old('password')}}" type="password" id="password" name="password" class="form-control" required/>
          </div>

          <button type="submit" class="btn btn-primary btn-block mb-4">Log in</button>
      </form>
  </div>
@endsection
