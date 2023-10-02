
@extends('layouts.app')

@section('title', 'Welcome')


@section('content')
    <div class="text-center">
        @if(session()->has('comment_success'))
            <p class="text-primary">{{ session()->get('comment_success')}}</p>
        @endif
        @if($errors->has('content'))
            <div class="text-danger">{{ $errors->first('content') }}</div>
        @endif
    </div>

    <div class="mb-3" style="width: 300px; height: 200px;">
        <img src="{{asset('storage/'.$add->image_url)}}" class="img-thumbnail rounded" alt="Responsive image">
    </div>

    <div class="d-flex justify-content-between">
        <div class="d-flex flex-column justify-content-between">
            <div class="d-flex flex-column">
                <label><strong>Title:</strong> &nbsp;</label> <p>{{$add->title}}</p>
            </div>
            <div class="d-flex flex-column">
                <label><strong>description:</strong> &nbsp;</label>
                <p style="word-wrap: break-word;">{{$add->description}}</p>
            </div>
            @if($add->user_id !== \Illuminate\Support\Facades\Auth::id())
                <div class="d-flex flex-column">
                    <label><strong>owner:</strong> &nbsp;</label> <p>{{$add->user->name}}</p>
                </div>
            @endif
            <div class="d-flex flex-column">
                <label><strong>price:</strong> &nbsp;</label> <p>{{$add->price}}$</p>
            </div>
        </div>
        <div>
            @if($add->user_id !== \Illuminate\Support\Facades\Auth::id())
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#storeCommentModal">comment</button>
            @endif
            @if($add->user_id === \Illuminate\Support\Facades\Auth::id())
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#updateAddModal">update</button>
            @endif
        </div>
    </div>

    <hr>
    <div class="text-center"><strong>comments</strong></div>

    <div class="d-flex mt-5 flex-wrap justify-content-between">
    @foreach($add->comments()->paginate(3) as $comment)
        <div class="p-2">
            <div class="card" style="width: 18rem;">
                <div class="d-flex justify-content-between card-header bg-transparent border-success">
                    <small class="text-muted">
                        <p class="card-text">by:
                            {{$comment->user->id === \Illuminate\Support\Facades\Auth::id() ? "me" : $comment->user->name}}
                        </p>
                    </small>
                </div>
                <div class="card-body">
                    <p class="card-title">{{$comment->content}}</p>
                </div>
            </div>
        </div>

    @endforeach
    </div>

    <div class="mt-5 ml-2">
        {{$add->comments()->paginate(3)->links()}}
    </div>
@endsection


<div class="modal fade" id="storeCommentModal" tabindex="-1" role="dialog" aria-labelledby="storeCommentModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Comment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex flex-column justify-content-between">
                <form method="POST" action="/comments">
                    @csrf
                    <input type="hidden" name="add_id" value="{{$add->id}}">
                    <textarea name ="content" class="form-control"></textarea>
                    <br>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateAddModal" tabindex="-1" role="dialog" aria-labelledby="updateAddModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateAddModal">update Add</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex flex-column justify-content-between">
                <form method="POST" action="{{route("adds.update")}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="add_id" value="{{$add->id}}">
                    <div class="form-outline mb-4">
                        <div class="mb-3" style="width: 200px; height: 100px;">
                            <img src="{{asset('storage/'.$add->image_url)}}" class="img-thumbnail rounded" alt="Responsive image">
                        </div>
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="title">title</label>
                        <input value= "{{$add->title}}" type="title" id="title" name="title" class="form-control" required/>
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="description">description</label>
                        <textarea type="description" id="description" name="description" class="form-control" required>
                            {{$add->description}}
                        </textarea>
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="price">price</label>
                        <input value= "{{$add->price}}" type="price" id="price" name="price" class="form-control" required/>
                    </div>

                    <div class="form-outline mb-4">
                        @if($errors->has('image'))
                            <div class="text-danger">{{ $errors->first('image') }}</div>
                        @endif
                        <label class="form-label" for="image">Image</label>
                        <input type="file" id="image" name="image" class="form-control"/>
                    </div>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
