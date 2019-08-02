@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h2> Edit Question</h2>
                            <div class="ml-auto">
                                <a href="{{route('posts.index')}}" class="btn btn-outline-secondary">Back to all posts</a>
                            </div>

                        </div>
                    </div>

                    <div class="card-body">
                        {{Form::open([
                       'route'=>['posts.update',
                        $post->id],'files'=>'true',
                        'method'=>'put'
                         ])}}

                        @include('posts._form',['buttonText'=>'Update Post'])

                        {{Form::close()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
