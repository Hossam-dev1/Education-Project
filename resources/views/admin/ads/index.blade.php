@extends('admin.layout')

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Advertisements</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Ads</li>
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
                                <h3 class="card-title">All advertisements </h3>
                                <div class="card-tools">
                                    {{-- <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#add-modal">Add New</button> --}}
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th class="w-50">Description</th>
                                            <th>At</th>
                                            <th>Image</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ads as $ad)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                {{-- <td>{{ $ad->name('en') }}</td> --}}
                                                <td>{{ $ad->title }}</td>
                                                <td>{{ $ad->desc }}</td>
                                                <td><span>{{Carbon\Carbon::parse($ad->created_at)->format('d M, Y')}}</span></td>

                                                <td>
                                                    <img src="{{ asset("uploads/$ad->img") }}" height="60px" alt="">
                                                </td>

                                                <td>
                                                    <button type="button" class=" btn btn-sm btn-info edit-btn"
                                                        data-id="{{ $ad->id }}"
                                                        {{-- data-name-en="{{ $ad->name('en') }}" --}}
                                                        data-title="{{ $ad->title}}"
                                                        data-desc="{{ $ad->desc}}"
                                                        data-img="{{ $ad->img }}" 
                                                        data-toggle="modal" data-target="#edit-modal">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    {{-- <a href="{{ url("dashboard/ads/delete/$ad->id") }}"
                                                        class=" btn btn-sm btn-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a> --}}
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center my-3">
                                    {{-- {{ $ads->links() }} --}}
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
                    <form id="add-form" method="POST" action="{{ url('dashboard/ads/store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="img">
                                            <label class="custom-file-label" for="customFile">Choose Image</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea type="text"  name="desc" class="form-control"> </textarea>
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
 
            </div>
            <!-- /.modal-content -->
    </div>
        <!-- /.modal-dialog -->



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
                    <form id="edit-form" method="POST" action="{{ url('dashboard/ads/edit') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="edit-form-id">

                        <div class="row">

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input id="edit-form-title" type="text" name="title" class="form-control">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input id="edit-form-img" type="file" class="custom-file-input" id="customFile" name="img">
                                            <label class="custom-file-label" for="customFile">Choose Image</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea id="edit-form-desc" type="text"  name="desc" class="form-control"> </textarea>
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

            </div>
            <!-- /.modal-content -->
    </div>
        <!-- /.modal-dialog -->





@endsection

@section('scripts')
    <script>
        $('.edit-btn').click(function() {
            let id = $(this).attr('data-id');
            let name = $(this).attr('data-title');
            // let img = $(this).attr('data-img');
            let desc = $(this).attr('data-desc');
            // console.log(img);
            $('#edit-form-id').val(id);
            // $('#curImg').attr("src",`http://localhost:8000/uploads/${img}`); //reEdittttt after get domain !!
            $('#edit-form-title').val(name);
            $('#edit-form-desc').val(desc);

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
