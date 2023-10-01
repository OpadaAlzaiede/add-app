
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

    <div class="d-flex justify-content-between">
        <div class="d-flex flex-column justify-content-between">
            <div class="d-flex flex-row">
                <label><strong>Title:</strong> &nbsp;</label> <p>{{$add->title}}</p>
            </div>
            <div class="d-flex flex-row">
                <label><strong>description:</strong> &nbsp;</label> <p>{{$add->description}}</p>
            </div>
            <div class="d-flex flex-row">
                <label><strong>owner:</strong> &nbsp;</label> <p>{{$add->user->name}}</p>
            </div>
            <div class="d-flex flex-row">
                <label><strong>price:</strong> &nbsp;</label> <p>{{$add->price}}$</p>
            </div>
        </div>
        <div>
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#storeCommentModal">Add comment</button>
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
                        <p class="card-text">by: {{$comment->user->name}}</p>
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
