@extends('admin.layout')

@section('main')
    <!-- Contart Wrapper. Contains page contart -->
    <div class="contart-wrapper" >
        <!-- Contart Header (Page header) -->
        <div class="contart-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 text-center">
                        <h3 class="text-dark p-2">{{$video->title}}</h3>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('dashboard/videos') }}">videos</a></li>
                            <li class="breadcrumb-item active">{{ $video->title }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.contart-header -->

        <!-- Main contart -->
        <div class="contart">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9 offset-md-3 pb-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">video details</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-4">
                                <table class="table table">

                                    <tbody>
                                        <tr>
                                            <th>Name</th>
                                            <td>
                                                {{ $video->title }}
                                            </td>
                                        </tr>
                                        <tr>
                                            
                                        <tr>
                                            <th>Description</th>
                                            <td>
                                                {{ $video->subject }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Skill</th>
                                            <td>
                                                {{ $video->skill->name('ar') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Image_cover</th>
                                            <td>
                                                <img src="{{ asset("uploads/$video->video_cover") }}" height="100px" alt="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Paid</th>
                                            <td>
                                                @if ($video->paid)
                                                    <span class="badge bg-success p-2">Paid</span>
                                                @else
                                                    <span class="badge bg-danger p-2">Free</span>
                                                @endif
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Active</th>
                                            <td>
                                                @if ($video->active)
                                                    <span class="badge bg-success p-2">Yes</span>
                                                @else
                                                    <span class="badge bg-danger"> No</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        {{-- <a class="btn btn-sm btn-success" href="{{ url("dashboard/videos/show/$video->id/questions") }}">show
                            Question</a> --}}
                        <a class="btn btn-sm btn-primary" href="{{ url()->previous() }}">Back</a>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.contart -->
    </div>
    <!-- /.contart-wrapper -->


@endsection
