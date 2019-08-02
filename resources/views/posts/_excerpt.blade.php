<div class="media post">

 {{--   <div class="d-flex flex-column counters">
        <div class="vote">
            <strong>{{$question->votes_count}}</strong> {{ Str::plural('vote',$question->votes_count) }}
        </div>
        <div class="status {{$question->status}}">
            <strong>{{$question->answers_count}}</strong> {{ Str::plural('answers',$question->answers_count) }}
        </div>
        <div class="view">
            {{$question->views." ".Str::plural('view',$question->views)}}
        </div>
    </div>--}}
    <div class="media-body">

        <div class="d-flex align-items-center">
            <h3 class="mt-0">
                <a href="{{$post->url}}">
                    {{$post->title}}
                </a>


            </h3>
            <div class="ml-auto">
                  @can('update',$post)
                    <a href="{{route('posts.edit',$post->id)}}" class="btn btn-sm btn-outline-info">Edit</a>
                @endcan


                @can('delete',$post)
                    <form method="post" class="form-delete" action="{{route('posts.destroy',$post->id)}}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>
                @endcan

            </div>
        </div>

        <p class="lead">
            Asked by
            <a href="{{$post->user->url}}">{{$post->user->name}}</a>
            <small class="text-muted">{{$post->created_date}}</small>
        </p>
        {{--<div class="excerpt">{{ $question->excerpt(250)}}</div>--}}
        {{--@if($question->hasCategory())
            <a class="btn btn-info" href="{{route('category.show',$question->category->slug)}}">{{$question->getCategoryTitle()}}</a>

        @endif--}}
    </div>


</div>
