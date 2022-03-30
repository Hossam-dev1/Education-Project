@extends('admin.layout')

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Admin Profile</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('dashboard/admins') }}">Admins</a></li>

                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->

        <!-- /.card-header -->
        <div class="card-body">
            @include('admin.inc.erorr')
            @include('admin.inc.message')
            <form method="POST" action="{{ url("dashboard/admins/store/$user->id") }}">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" value="{{ $user->email }}" name="email" placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="number" class="form-control" value="{{ $user->phone }}" name="phone" placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-6">
                        <!-- select -->
                        <div class="form-group">
                            <label>Confirmation Code</label>
                            <input type="text" class="form-control" value="{{ $user->code }}" name="code" placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Enter ...">
                        </div>
                    </div>
                </div>

                    <!-- /.card-body -->
                    <div class="w-100">
                        <button type="submit" class="btn btn-success">Sumbit</button>
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                    </div>
            </form>
        </div>
    </div>
    @endsection


