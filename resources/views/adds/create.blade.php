@extends('layouts.app')

@section('title', 'Welcome')



@section('content')
    <div class="mx-auto">
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
                <input type="price" id="price" name="price" class="form-control" required/>
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
