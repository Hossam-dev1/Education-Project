@extends('admin.layout')
{{-- @section('styles')
<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection --}}
@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Add New video</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('dashboard/videos') }}">videos</a></li>

                            <li class="breadcrumb-item active"> Add New</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row --> 
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->

        <!-- /.card-header -->

        <div class="card-body">
            <div class="form-group">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-gradient-gray" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: %">
                    </div>
                </div>
            </div>
            @include('admin.inc.erorr')
            <form id="fileUploadForm" method="POST" action="{{ url('dashboard/videos/store') }}" enctype="multipart/form-data">
                {{-- @csrf --}}
                {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Title</label>
                            <input required type="text" class="form-control" name="title" placeholder="Enter ...">
                        </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col-sm-12">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Subject</label>
                            <textarea required class="form-control" rows="3" name="subject" placeholder="Enter ..."></textarea>
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
                                        <option value="{{ $skill->id }}">{{ $skill->name('ar') }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Paid</label>
                                <select class="form-control" name="paid">
                                    <option value="0">Free</option>
                                    <option value="1">paid</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Codes_num</label>
                                <input required type="number" class="form-control" name="codes_num" placeholder="Enter ...">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Video</label>
                                <div class="custom-file">
                                    <input required type="file" class="custom-file-input" id="customFile" name="video">
                                    <label id="imgLabel" class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Image_cover</label>
                                <div class="custom-file">
                                    <input required  type="file" class="custom-file-input" id="imgFile" name="video_cover">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
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

        
@section('scripts')
<script>
        $(function () {
            $(document).ready(function () {
                $('#fileUploadForm').ajaxForm({
                    // data: {
                    //     "_token": "{{ csrf_token() }}"
                    //     },
                    beforeSend: function () {
                        var percentage = '0';
                    },
                    uploadProgress: function (event, position, total, percentComplete) {
                        var percentage = percentComplete;
                        $('.progress .progress-bar').css("width", percentage+'%', function() {
                          return $(this).attr("aria-valuenow", percentage) + "%";
                        }).text(percentage + '%')
                    },
                    success  : function (data) {
                        // console.log(data);
                        return alert("Video has uploaded");
                    },
                    error: function(jqXhr, json, errorThrown)
                    {

                        console.log(errorThrown);
                        console.log(json);
                        console.log(jqXhr);
                        return alert(errorThrown);
                        
                    }
                    // contentType: false,
                    // processData: false,
                });
            });
        });

        // $('.progress .progress-bar').attr('aria-valuenow', percentage).css('width', percentage + '%').text(percentage + '%');

        

        
        $('#customFile').change(function(){
            // let imgFile = $(this).val();
            if($(this).get(0).files.length === 0)
            {
                $('#imgLabel').text("Choose Image");
            }
            else
            {
                $('#imgLabel').text("Video Selected");
            }
        })

</script>
@endsection
