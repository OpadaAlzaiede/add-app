<div>
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{asset('storage/'.$add->image_url)}}" alt="Card image cap">
        <div class="d-flex justify-content-between card-header bg-transparent border-success">
            @if($add->user_id !== \Illuminate\Support\Facades\Auth::id())
                <small class="text-muted">
                    <p class="card-text">by: {{$add->user->name}}</p>
                </small>
            @endif
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
                    @if(auth()->user()->hasRole(\App\Models\Role::getAdminRole()))
                        <form method="POST" action="{{route('adds.delete')}}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="add_id" value="{{$add->id}}">
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    @endif
                    @if($add->user_id === \Illuminate\Support\Facades\Auth::id())
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
                    <a href="/adds/{{$add->id}}" class="link-primary text-primary">view more</a>
                </div>
            </footer>
        </div>
    </div>
</div>
