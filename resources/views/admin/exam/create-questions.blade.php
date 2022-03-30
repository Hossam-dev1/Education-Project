@extends('admin.layout')
@section('styles')
<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-6">
                        <h1 class="m-0 text-dark">Add New Exam #2</h1>
                    </div><!-- /.col -->
                    <div class="col-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('dashboard/exams') }}">Exams</a></li>

                            <li class="breadcrumb-item active">Add New Exam (Step2)</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 pb-3">   

            @include('admin.inc.erorr')
            <form action="{{url("dashboard/exams/store-questions/{$exam_id}")}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="card-body ">
                @for ($i = 1; $i <= $questions_num; $i++)
                    <h4 class="text-gray font-weight-bold py-2">Q {{$i}} ?</h4>
                    <div class="row">
                        <div class="col-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Tittle</label>
                                <input required type="text" class="form-control" name="titles[]" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-2">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Right Answer</label>
                                <input required type="number" max="4" class="form-control" name="right_ans[]" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-4">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Image</label>
                                <div class="custom-file">
                                    <input  id="imgPath" type="file" class="custom-file-input" name="imgs[]">
                                    <label id="imgLabel" class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>option1</label>
                                <input required type="text" class="form-control" name="option_1s[]" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>option2</label>
                                <input required type="text" class="form-control" name="option_2s[]" placeholder="Enter ...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>option3</label>
                                <input required type="text" class="form-control" name="option_3s[]" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>option4</label>
                                <input required type="text" class="form-control" name="option_4s[]" placeholder="Enter ...">
                            </div>
                        </div>
                        <hr>
                    </div>
                @endfor

                <div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
        </div>
    </div>
                </div>
            </div>
        </div>

        </form>
    </div>
    
    
 @endsection


@section('scripts')
<script>

        
        $('#imgPath').change(function(){
            // let imgFile = $(this).val();
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

