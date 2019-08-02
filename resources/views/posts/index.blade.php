@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            @if(Auth::check())


                                <h2> All questions</h2>
                                @foreach(auth()->user()->unreadNotifications as $notification)
                                    <p>We have notification for you!!!! from {{$notification->data['name']}}</p>
                                    <a href="{{$notification->data['url']}}" class="dropdown-item"
                                       style="background-color: yellow;width: 100px">
                                        {{$notification->data['post_name']}}
                                    </a>
                                    @php
                                        $notification->markAsRead();
                                    @endphp
                                @endforeach
                                <div class="ml-auto">
                                    <a href="{{route('posts.create')}}" class="btn btn-outline-secondary">Ask posts</a>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="card-body">
                        @include('layouts._messages')
                        @forelse($posts as $post)
                            {{--   <excerpt :question="{{$question}}"></excerpt>--}}
                          @include('posts._excerpt')

                        @empty
                            <div class="alert alert-warning">
                                <strong>Sorry</strong> There are no questions
                            </div>
                        @endforelse
                        <div class="mx-auto">
                            {{$posts->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

