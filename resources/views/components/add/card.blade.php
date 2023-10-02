<div>
    <div class="card" style="width: 18rem;">
        <div style="width: 100%; height: 150px; overflow: hidden">
            <img class="card-img-top" src="{{asset('storage/'.$add->image_url)}}" alt="Card image cap">
        </div>
        <div class="d-flex justify-content-between card-header bg-transparent border-success">
            @if(!isAddOwner($add))
                <small class="text-muted">
                    <p class="card-text">by: {{$add->user->name}}</p>
                </small>
            @endif
            @if(isAdmin())
                <small class="text-muted">
                    <p class="card-text text-{{$add->isPublished() ? "success" : "danger"}}">{{$add->isPublished() ? 'published' : 'not published'}}</p>
                </small>
            @endif
        </div>
        <div class="card-body">
            <small class="text-muted">
                <p class="card-text">title: {{$add->title}}</p>
            </small>
            <br>
            <small class="text-muted">
                <p class="card-text">price: {{$add->price}}$</p>
            </small>
            <br>
            <small>
                <p>comments:{{$add->comments_count}}</p>
            </small>
            <footer>
                <div class="d-flex flex-wrap justify-content-between">
                    @if(isAdmin())
                        <form method="POST" action="{{route('adds.delete')}}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="add_id" value="{{$add->id}}">
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    @endif
                    @if(isAddOwner($add))
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
                    @endif
                    <div>
                        <a href="{{isAdmin() ? route('admin.adds.view', $add->id): route('adds.view', $add->id) }}" class="link-primary text-primary">view more</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>
