@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h2> Add Post</h2>
                            <div class="ml-auto">
                                <a href="{{route('posts.index')}}" class="btn btn-outline-secondary">Back to all posts</a>
                            </div>

                        </div>
                    </div>

                    <div class="card-body">

                        {{Form::open([
                               'route'=>'posts.store','files'=>'true'
                                 ])}}

                        @include('posts._form',['buttonText'=>'Add Post'])


                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
