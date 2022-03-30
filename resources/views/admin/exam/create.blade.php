@extends('admin.layout')

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Add New Exam</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('dashboard/exams') }}">Exams</a></li>

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
            @include('admin.inc.erorr')
            <form method="POST" action="{{ url('dashboard/exams/store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Name</label>
                            <input required type="text" class="form-control" name="name_ar" placeholder="Enter ...">
                        </div>
                    </div>


                    <div class="col-sm-12">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Describtion(ar)</label>
                            <textarea required class="form-control" rows="3" name="desc_ar" placeholder="Enter ..."></textarea>
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
                                        <option value="{{ $skill->id }}">{{ $skill->name('ar') }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Image</label>
                                <div class="custom-file">
                                    <input required type="file" class="custom-file-input" id="customFile" name="img">
                                    <label id="imgLabel" class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>Question Number.</label>
                                    <input required type="number" class="form-control" name="questions_num">
                                </div>
                                <div class="col-sm-3">
                                    <label>Duration(mins.)</label>
                                    <input required type="number" class="form-control" name="duration_h">
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Paid</label>
                                        <select class="form-control" name="paid">
                                            <option value="1">paid</option>
                                            <option value="0">Free</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label>Codes Number</label>
                                    <input required type="number" class="form-control" name="codes_num">
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="w-100 p-2 m-2">
                            <button type="submit" class="btn btn-success">Sumbit</button>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                        </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>

        
        $('#customFile').change(function(){
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
