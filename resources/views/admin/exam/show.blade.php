@extends('admin.layout')

@section('main')
    <!-- Contart Wrapper. Contains page contart -->
    <div class="contart-wrapper" >
        <!-- Contart Header (Page header) -->
        <div class="contart-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 text-center ">
                        <h3 class="text-dark p-3 "> {{$exam->name('ar')}}</h3>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('dashboard/exams') }}">Exams</a></li>
                            <li class="breadcrumb-item active ">{{ $exam->name('ar') }}</li>
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
                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                                data-target="#add-modal">Add Exam Model</button>                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-4">
                                <table class="table table">

                                    <tbody>
                                        <tr>
                                            <th>Name</th>
                                            <td>
                                                {{ $exam->name('ar') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            
                                        <tr>
                                            <th>Description</th>
                                            <td>
                                                {{ $exam->desc('ar') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Subject</th>
                                            <td>
                                                {{ $exam->skill->name('ar') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Image</th>
                                            <td>
                                                <img src="{{ asset("uploads/$exam->img") }}" height="100px" alt="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Question Num.</th>
                                            <td>
                                                {{ $exam->questions_num }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Duration(mins.)</th>
                                            <td>    
                                                {{ $exam->duration_h }} m
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Students <i class="fas fa-user-graduate pl-2"></i></th>
                                            <td>    
                                                {{ $exam->users()->count() }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Active</th>
                                            <td>
                                                @if ($exam->active)
                                                    <span class="badge bg-success p-2">Yes</span>
                                                @else
                                                    <span class="badge bg-danger"> No</span>
                                                @endif
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Model_Answer</th>
                                            <td>
                                                @if ($exam->answer_model)
                                                    <span class="badge bg-success p-2 mr-3">Yes</span>
                                                    
                                                    <a href="{{ url("dashboard/exams/delete-model/$exam->id") }}"
                                                        class=" btn btn-sm btn-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
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

                            <a class="btn btn-sm btn-primary p-2 " href="{{ url("dashboard/exams/show/$exam->id/students") }}">show
                                Students</a>
                        <a class="btn btn-sm btn-secondary p-2  ml-2" href="{{ url()->previous() }}">Back</a>

                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="modal fade" id="add-modal" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Model Answer</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
    
                        @include('admin.inc.erorr')
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="add-form" method="POST" action="{{ url("dashboard/exams/model/$exam->id") }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
    
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>File</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input required id="answer_model" type="file" class="custom-file-input"  name="answer_model">
                                                <label id="imgLabel" class="custom-file-label">Choose file </label>
                                            </div>
    
                                        </div>
                                    </div>
                                </div>
                            
                                </div>

                        </form>
    
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" form="add-form" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.contart -->
    </div>
    <!-- /.contart-wrapper -->


@endsection

@section('js')
    <script>
            $('#answer_model').change(function(){
            if($(this).get(0).files.length === 0)
            {
                $('#imgLabel').text("Choose Image");
            }
            else
            {
                $('#imgLabel').text("image Selected");
            }
        })
    </script>
@endsection