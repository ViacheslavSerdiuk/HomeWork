

@extends('layouts.app')

@section('content')
    <!--main content start-->
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <div ><!--leave comment-->
                        <div class="box-header">

                            @include('layouts._messages')
                        </div>


                        <h3 class="text-uppercase">My profile</h3>

                        {{--<img src="{{$user->getImage()}}" alt="" width="200" class="img-responsive">--}}
                        <form class="form-horizontal contact-form" role="form" method="post" action="/profile" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group mt-5">
                                <div class="col-md-12">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Name" value="{{$user->name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                           placeholder="Email" value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="passowrd">Passowrd</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                           placeholder="password">
                                </div>
                            </div>

                      {{--      <div class="form-group">
                                <div class="col-md-12">
                                    <input type="file" id="image" name="avatar">
                                </div>
                            </div>--}}
                            <button type="submit" class="btn btn-outline-secondary custom-update">Update</button>

                        </form>
                    </div><!--end leave comment-->
                </div>

            </div>
        </div>
    </div>
    <!-- end main content-->



@endsection
