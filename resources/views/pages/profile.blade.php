@extends('layouts.app')

@section('content')
    <!--main content start-->
    <div class="main-content">
        <div class="container container-profile">
            <div class="row">
                <div class="col-md-8">

                    <div class="profile mt-5"><!--leave comment-->
                        {{--<img src="{{$user->getImage()}}" alt="" class="profile-image">--}}


                        <div class="ml-5">
                            <h2>{{$user->name}}</h2>

                        </div>
                        <div class="ml-5">
                            <h4>Birthday : {{ $user->birthday->format('m/d/Y')}}</h4>

                        </div>

                    </div><!--end leave comment-->

                </div>

                <div class="col-md-4">
                    <div class="mt-5">
                        <div class="font-weight-bold">{{$user->count_posts}}</div>  Posts
                    </div>



                </div>

            </div>
            <div class="row">
                <div class="col-md-12 mt-5">
                    <p>Most Popular Posts posted by User</p>

                    <div class="bg-white">
                        @foreach($posts as $post)
                            <div class="d-flex profile-last-q">
                               {{-- <p>View : {{$question->views}} &nbsp;</p>--}}
                                <a href="{{$post->url}}">
                                    <p class="">{{$post->title}}</p></a>
                                <p>{{$post->created_at}}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

            <a title="Click to mark as favorite question (Click again to undo)" class="favorite mt-2 {{Auth::guest()?'off':($user->is_followed ? 'favorited' : '' )}}"
               onclick="event.preventDefault(); document.getElementById('favorite-question-{{$user->id}}').submit();"
            >

                <i class="">Follow</i>

            </a>

            <form id="favorite-question-{{$user->id}}" action="/users/{{$user->id}}/follows" method="POST" style="display: none">
                @csrf

                @if($user->is_followed)
                    @method('DELETE')
                @endif
            </form>

        </div>
    </div>
    <!-- end main content-->



@endsection

