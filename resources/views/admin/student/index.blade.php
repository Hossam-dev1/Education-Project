@extends('admin.layout')

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Students</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active">Students</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="card-body table-responsive p-0">
            @include('admin.inc.erorr')
            @include('admin.inc.message')
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Level</th>
                        <th>Center_Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->phone }}</td>
                            <td>{{ $student->level }}</td>
                            <td>{{ $student->area }}</td>
                            <td>
                                <a href="{{ url("/dashboard/students/score/$student->id") }}"
                                    class=" btn btn-sm btn-primary">
                                    <i class="fas fa-percent"></i>
                                </a>
                                <button type="button" class=" btn btn-sm btn-info edit-btn"
                                data-id="{{ $student->id }}"
                                data-toggle="modal" data-target="#edit-modal">
                                <i class="fas fa-edit"></i>
                            </button>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center my-3">
                {{-- {{ $students->links('web.inc.pagintor') }} --}}
            </div>

        </div>

        <div class="modal fade" id="edit-modal" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Password</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
    
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="edit-form" method="POST" action="{{ url("dashboard/students/update") }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="edit-form-id">
                            <div class="row">
    
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" required  minlength="8" class="form-control" name="password" placeholder="Enter ...">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" required minlength="8" class="form-control" name="password_confirmation" placeholder="Enter ...">
                                    </div>
                                </div>
    
                            </div>
                        </form>
    
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" form="edit-form" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    @endsection

    @section('scripts')
    <script>
        $('.edit-btn').click(function() {
            let id = $(this).attr('data-id');
            $('#edit-form-id').val(id);
        });
        
    </script>
@endsection