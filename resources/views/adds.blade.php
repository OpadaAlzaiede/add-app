
@extends('layouts.app')

@section('title', 'Welcome')


@section('content')
    @if(session()->has('add_deletion_success'))
        <p class="text-info">{{ session()->get('add_deletion_success')}}</p>
    @endif

    <div class="d-flex flex-wrap p-2 justify-content-between">
    @foreach($adds as $add)
       <div class="p-2">
           <div class="card" style="width: 18rem;">
               <img class="card-img-top" src="..." alt="Card image cap">
               <div class="d-flex justify-content-between card-header bg-transparent border-success">
                   <small class="text-muted">
                       <p class="card-text">by: {{$add->user->name}}</p>
                   </small>
                   @if(auth()->user()->hasRole(\App\Models\Role::getAdminRole()))
                       <small class="text-muted">
                           <p class="card-text">{{$add->isPublished() ? 'published' : 'not published'}}</p>
                       </small>
                   @endif
               </div>
               <div class="card-body">
                   <h5 class="card-title">{{$add->title}}</h5>
                   <p class="card-text">{{$add->description}}</p>
                   <footer class="">
                       <small class="text-muted">
                           <p class="card-text">price: {{$add->price}}$</p>
                       </small>
                   </footer> <br>
                   <small>
                       <p>comments:{{$add->comments_count}}</p>
                   </small>
                   <div class="d-flex flex-wrap p-2 justify-content-between">
                       @if(auth()->user()->hasRole(\App\Models\Role::getAdminRole()))
                           <form method="POST" action="{{route('adds.delete')}}">
                               @csrf
                               @method('DELETE')
                               <input type="hidden" name="add_id" value="{{$add->id}}">
                               <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                           </form>
                       @endif
                       <a href="#" class="link-primary">view more</a>
                    </div>
               </div>
           </div>
       </div>
    @endforeach
    </div>

@endsection
