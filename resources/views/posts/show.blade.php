
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="d-flex align-items-center">
                                <h1>{{ $post->title }}</h1>
                                <div class="ml-auto">
                                    <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">Back to all Posts</a>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="media">
                            <div class="post-thumb">

                                <a href="{{route('posts.show',$post->id)}}"><img src="{{$post->getImage()}}" alt="" style="width: 300px;"></a>

                            </div>

                            <div class="media-body">
                                {!! $post->body !!}
                                <div class="row">
                                    <div class="col-4"></div>
                                    <div class="col-4"></div>
                                    <div class="col-4">
                                        @include ('shared._author', [
                                            'model' => $post,
                                            'label' => 'asked'
                                        ])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
