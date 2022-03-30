@extends('admin.layout')

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Video Details</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('dashboard/videos') }}">videos</a></li>

                            <li class="breadcrumb-item active">Edit Video</li>
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
            <form method="POST" action="{{ url("dashboard/videos/update/$video->id") }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $video->title }}" placeholder="Enter ...">
                        </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col-sm-12">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Subject</label>
                            <textarea class="form-control" rows="3" name="subject"  placeholder="Enter ...">{{ $video->subject }}
                            </textarea>
                        </div>
                    </div>
                    <!-- input states -->

                </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <!-- select -->
                            <div class="form-group">
                                <label>Skill</label>
                                <select class="form-control" name="skill_id">
                                    @foreach ($skills as $skill)
                                        <option value="{{ $skill->id }}" @if ($skill->id == $video->skill_id) selected @endif>
                                            {{ $skill->name('ar') }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Image_cover</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="video_cover">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Codes_num</label>
                                <input type="number" class="form-control" name="codes_num" placeholder="Enter ...">
                            </div>
                        </div>

                    </div>

                        <!-- /.card-body -->
                        <div class="w-100 p-2 m-2">
                            <button type="submit" class="btn btn-success">Sumbit</button>
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                        </div>
            </form>
        </div>
    </div>
        @endsection
