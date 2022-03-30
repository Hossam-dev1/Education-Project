@extends('admin.layout')

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{ $exam->name('ar') }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('dashboard/exams') }}">Exams</a></li>
                            <li class="breadcrumb-item active">{{ $exam->name('ar') }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="card-body">
            @include('admin.inc.erorr')
            <form action="{{ url("dashboard/exams/update-questions/$exam->id/$ques->id") }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Tittle</label>
                            <input type="text" class="form-control" name="title" value="{{ $ques->questionTitle('ar') }}"
                                placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <!-- text input -->
                        <div class="form-group">
                            <label>right_ans</label>
                            <input type="text" class="form-control" name="right_ans" value="{{ $ques->right_ans }}"
                                placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Image</label>
                            <div class="custom-file">
                                <input  id="imgPath" type="file" class="custom-file-input" name="img">
                                <label id="imgLabel" class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>option_1</label>
                            <input type="text" class="form-control" name="option_1" value="{{ $ques->questionOption1('ar') }}"
                                placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>option_2</label>
                            <input type="text" class="form-control" name="option_2" value="{{ $ques->questionOption2('ar') }}"
                                placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>option_3</label>
                            <input type="text" class="form-control" name="option_3" value="{{ $ques->questionOption3('ar') }}"
                                placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>option_4</label>
                            <input type="text" class="form-control" name="option_4" value="{{ $ques->questionOption4('ar') }}"
                                placeholder="Enter ...">
                        </div>
                    </div>
                    

                    <div>
                        <button type="submit" class="btn btn-success">Sumbit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endsection
