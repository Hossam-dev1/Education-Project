@extends('admin.layout')

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">المواعيد</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>

                            <li class="breadcrumb-item active">Message</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="card">
            <div class="card-header">
                <div class="card-body table-responsive p-0">
                    <div class="card-header">
                        <h3 class="card-title">كل المواعيد </h3>
                        <div class="card-tools">
                            <a href="{{ url('dashboard/teacher/create') }}" class="btn btn-sm btn-primary">Add New</a>
                        </div>
                    </div>
                    <div class="card-tools">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>الصف الدراسي</th>
                                <th>المادة</th>
                                <th>السنتر</th>
                                <th>التاريخ</th>

                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointment as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->level}}</td>
                                    <td>{{$item->subject}}</td>
                                    <td>{{$item->center}}</td>
                                    <td>{{$item->updated_at}}</td>
                                    <td>
                                        <a href="{{ url("dashboard/teacher/edit/$item->id") }}"
                                            class=" btn btn-sm btn-info ">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ url("dashboard/teacher/delete/$item->id") }}"
                                            class=" btn btn-sm btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center my-3">
                        {{-- {{ $messages->links() }} --}}
                    </div>

                </div>
            </div>
        </div>
        </div>
    </div>


    @endsection
