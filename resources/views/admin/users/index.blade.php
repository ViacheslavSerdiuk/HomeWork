@extends('admin.layout')



@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Users maintain</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {{--<div class="form-group">
                        <a href="{{route('users.create')}}" class="btn btn-success">Add new user</a>
                    </div>--}}
                    @include('layouts._messages')
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Имя</th>
                            <th>E-mail</th>
                            <th>Count post</th>
                            <th>Register date</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $user)

                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->count_posts}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>



                                    <a href="{{route('users.edit',$user->id)}}"><i class="fas fa-edit"></i></a>

                                    {{Form::open(['route'=>['users.destroy',$user->id],'method'=>'delete'])}}

                                    <button onclick="return confirm('Are you sure???');" type="submit" class="delete">
                                        <a class="">Remove</a>
                                    </button>
                                    {{Form::close()}}
                                </td>
                            </tr>

                        @endforeach
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection
