@extends('admin.layout')

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Levels</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">levels</li>
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
                                <h3 class="card-title">All_Levels </h3>

                                <div class="card-tools">

                                    <button type="button" class="btn btn-sm btn-primary " data-toggle="modal"
                                        data-target="#add-modal">Add New</button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Active</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($levels as $level)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $level->name('ar') }}</td>
                                                <td>
                                                    @if ($level->active)
                                                        <span class="badge bg-success">Yes</span>
                                                    @else
                                                        <span class="badge bg-danger">No</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" class=" btn btn-sm btn-info edit-btn"
                                                        data-id="{{ $level->id }}"
                                                        data-name-ar="{{ $level->name('ar') }}" data-toggle="modal"
                                                        data-target="#edit-modal">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <a href="{{ url("dashboard/levels/delete/$level->id") }}"
                                                        class=" btn btn-sm btn-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                    <a href="{{ url("dashboard/levels/toggle/$level->id") }}"
                                                        class=" btn btn-sm btn-secondary" >
                                                        <i class="fas fa-toggle-on"></i>
                                                    </a>


                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center my-3">
                                    {{-- {{ $cats->links() }} --}}
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
                    <form id="add-form" method="POST" action="{{ url('dashboard/levels/store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input id="name" type="text" name="name_ar" class="form-control">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>code</label>
                                    <input id="code" type="text" name="code" class="form-control">
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


    {{-- editttttt Modelll --}}

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
                    <form id="edit-form" method="POST" action="{{ url('dashboard/levels/update') }}">
                        @csrf
                        <input type="hidden" name="id" id="edit-form-id">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Level Name</label>
                                    <input type="text" name="name_ar" class="form-control" id="edit-form-name-ar">
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

        // $('#name').keyup(function() {
        //     let name = $('#name').val(); // first Input
        //     let array = {!! json_encode($levels) !!};

        // for (let i = 0; i < array.length; i++) 
        // {
        //     if (name == array[i].id) 
        //     {
        //         $('#code').val(array[i].id); // Second Input 
        //         // console.log(array[i].id);
        //         return ;
        //     }
        //     else
        //     {
        //         // console.log('error');
        //         $('#code').val(''); // Second Input 
        //     }
        // }
        // });




        $('.edit-btn').click(function() {
            let id = $(this).attr('data-id');
            let nameEn = $(this).attr('data-name-en');
            let nameAr = $(this).attr('data-name-ar');
            $('#edit-form-id').val(id);
            // $('#edit-form-name-en').val(nameEn);
            $('#edit-form-name-ar').val(nameAr);

        });
    </script>
@endsection
