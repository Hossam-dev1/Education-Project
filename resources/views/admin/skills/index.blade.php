@extends('admin.layout')

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Subjects</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Subjects</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @include('admin.inc.message')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Subjects </h3>

                                <div class="card-tools">

                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#add-modal">Add New</button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            {{-- <th>Name(en)</th> --}}
                                            <th>Name</th>
                                            <th>level</th>
                                            <th>Image</th>
                                            <th>Active</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($skills as $skill)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                {{-- <td>{{ $skill->name('en') }}</td> --}}
                                                <td>{{ $skill->name('ar') }}</td>
                                                <td>{{ $skill->level->name('ar') }}</td>
                                                <td>
                                                    <img src="{{ asset("uploads/$skill->img") }}" height="50px" alt="">
                                                </td>

                                                <td>
                                                    @if ($skill->active)
                                                        <span class="badge bg-success">Yes</span>
                                                    @else
                                                        <span class="badge bg-danger">No</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" class=" btn btn-sm btn-info edit-btn"
                                                        data-id="{{ $skill->id }}"
                                                        {{-- data-name-en="{{ $skill->name('en') }}" --}}
                                                        data-name-ar="{{ $skill->name('ar') }}"
                                                        data-img="{{ $skill->img }}" data-level-id="{{ $skill->level_id }}"
                                                        data-toggle="modal" data-target="#edit-modal">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <a href="{{ url("dashboard/skills/delete/$skill->id") }}"
                                                        class=" btn btn-sm btn-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                    <a href="{{ url("dashboard/skills/toggle/$skill->id") }}"
                                                        class=" btn btn-sm btn-primary">
                                                        <i class="fas fa-toggle-on"></i>
                                                    </a>


                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center my-3">
                                    {{-- {{ $skills->links() }} --}}
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    {{-- addddddd Modellllll --}}

    <div class="modal fade" id="add-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    @include('admin.inc.erorr')
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="add-form" method="POST" action="{{ url('dashboard/skills/store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name_ar" class="form-control">
                                </div>
                            </div>

                            
                            <div class="col-6 pt-5 pb-5">
                                <div class="form-group">
                                    {{-- <label>Image</label> --}}
                                    <div class="input-group">
                                        <div class="custom-file">
                                            {{-- <img  width="350px" height="150px" src="{{asset("uploads/skills/")}}" alt=""> --}}
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Levels</label>
                                    <select class="custom-select form-control" name="level_id">

                                        @foreach ($levels as $level)
                                            <option value="{{ $level->id }}"> {{ $level->name('ar') }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input id="imgPath" type="file" class="custom-file-input"  name="img">
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



    {{-- editttttt Modall --}}
    <div class="modal fade" id="edit-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    @include('admin.inc.erorr')
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="edit-form" method="POST" action="{{ url('dashboard/skills/update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="edit-form-id">
                        <div class="row">

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name_ar" class="form-control" id="edit-form-name-ar">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Levels</label>
                                    <select class="custom-select form-control" id="edit-form-level-id" name="level_id">
                                        @foreach ($levels as $level)
                                            <option value="{{ $level->id }}"> {{ $level->name('ar') }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input id="imgPath" type="file" class="custom-file-input"  name="img">
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
                    <button type="submit" form="edit-form" class="btn btn-primary">Submit</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    



@endsection

@section('scripts')
    <script>
        $('.edit-btn').click(function() {
            let id = $(this).attr('data-id');
            // let nameEn = $(this).attr('data-name-en');
            let nameAr = $(this).attr('data-name-ar');
            let img = $(this).attr('data-img');
            let levelId = $(this).attr('data-level-id');
            // console.log(img);
            $('#edit-form-id').val(id);
            
            $('#edit-form-name-ar').val(nameAr);
            $('#edit-form-level-id').val(levelId);
        });
        
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
