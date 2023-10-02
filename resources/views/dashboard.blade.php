@extends('layouts.app')

@section('title', 'Welcome')


@section('content')
    @if(session()->has('add_added_success'))
        <p class="text-primary">{{ session()->get('add_added_success')}}</p>
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
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset('storage/'.$add->image_url)}}" alt="Card image cap">
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
                            <small class="text-muted">
                                <p class="card-text">price: {{$add->price}}$</p>
                            </small>
                        <br>
                        <small>
                            <p>comments:{{$add->comments_count}}</p>
                        </small>
                        <footer>
                            <div class="d-flex flex-wrap p-2 justify-content-between">
                                @if($add->isPublished())
                                    <form method="POST" action="{{route('adds.unpublish')}}">
                                        @csrf
                                        <input type="hidden" value="{{$add->id}}" name="add_id">
                                        <button class="btn btn-danger" type="submit" >unpublish</button>
                                    </form>
                                @else
                                    <form method="POST" action="{{route('adds.publish')}}">
                                        @csrf
                                        <input type="hidden" value="{{$add->id}}" name="add_id">
                                        <button class="btn btn-primary" type="submit" >publish</button>
                                    </form>
                                @endif
                                <a href="/adds/{{$add->id}}" class="link-primary text-primary">view more</a>
                            </div>
                        </footer>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

   <div class="mt-5 ml-2">
       {{ $adds->links() }}
   </div>
@endsection
