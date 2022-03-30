@extends('admin.layout')

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit this Exam</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('dashboard/exams') }}">Exams</a></li>

                            <li class="breadcrumb-item active"> Edit Exam</li>
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
            <form method="POST" action="{{ url("dashboard/exams/update/$exam->id") }}" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name_ar" value="{{ $exam->name('ar') }}"
                                placeholder="Enter ...">
                        </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col-sm-12">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Describtion</label>
                            <textarea class="form-control" rows="3" name="desc_ar"
                                placeholder="Enter ...">{{ $exam->desc('ar') }}</textarea>
                        </div>
                    </div>
                </div>
                    <!-- input states -->



                    <div class="row">
                        <div class="col-sm-6">
                            <!-- select -->
                            <div class="form-group">
                                <label>Skill</label>
                                <select class="form-control" name="skill_id">
                                    @foreach ($skills as $skill)
                                        <option value="{{ $skill->id }}" @if ($exam->skill_id == $skill->id) selected  @endif>
                                            {{ $skill->name('ar') }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Image</label>

                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="img">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>


                                <div class="col-sm-4">
                                    <label>Duration(mins.)</label>
                                    <input type="number" class="form-control" value="{{ $exam->duration_h }}"
                                        name="duration_h">
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Codes_num</label>
                                        <input type="number" class="form-control" name="codes_num" placeholder="Enter ...">
                                    </div>
                                </div>
                    </div>
                        <!-- /.card-body -->
                        <div class="buttons py-4 ">
                            <div class="w-100">
                                <button type="submit" class="btn btn-success mr-2">Sumbit</button>
                                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>

            
    


        @endsection
