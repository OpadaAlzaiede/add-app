@extends('layouts.app')

@section('title', 'Welcome')



@section('content')
    <div>
        <a href="{{route('dashboard')}}" class="link-primary text-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
            </svg>
        </a>
    </div>
    <div class="mx-auto mt-5">
        <form method="POST" action="{{route('adds.store')}}" enctype="multipart/form-data">
            @csrf

            <div class="form-outline mb-4">
                @if($errors->has('title'))
                    <x-alert.alert type="danger" :message="$errors->first('title')"/>
                @endif

                <label class="form-label" for="title">Title</label>
                <input value= "{{old('title')}}" type="title" id="title" name="title" class="form-control" required/>
            </div>

            <div class="form-outline mb-4">
                @if($errors->has('description'))
                    <x-alert.alert type="danger" :message="$errors->first('description')"/>
                @endif
                <label class="form-label" for="email">Description</label>
                    <textarea type="description" id="description" name="description" class="form-control" required>
                        {{old('description')}}
                    </textarea>
            </div>

            <div class="form-outline mb-4">
                @if($errors->has('price'))
                    <x-alert.alert type="danger" :message="$errors->first('price')"/>
                @endif
                <label class="form-label" for="price">Price</label>
                <input value="{{old('price')}}" type="number" id="price" name="price" class="form-control" required/>
            </div>

            <div class="form-outline mb-4">
                @if($errors->has('image'))
                    <x-alert.alert type="danger" :message="$errors->first('image')"/>
                @endif
                <label class="form-label" for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control" required/>
            </div>

            <button type="submit" class="btn btn-primary btn-block mb-4">create</button>
        </form>
    </div>
@endsection
