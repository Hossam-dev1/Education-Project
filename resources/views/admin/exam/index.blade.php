@extends('admin.layout')

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">All Exams</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Exams</li>
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
                                <div class="card-tools">

                                    <a href="{{ url('dashboard/exams/create') }}" class="btn btn-sm btn-primary">Add New</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead class="text-center">
                                        <tr>
                                            <th>ID</th>
                                            <th>اسم الامتحان</th>
                                            <th>السنة الدراسية</th>
                                            <th>المادة</th>
                                            <th>Question num.</th>
                                            <th>Image</th>
                                            <th>Active</th>
                                            <th>Paid</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($exams as $exam)
                                        
                                            <tr>
                                                <td>{{ $exam->id  }}</td>
                                                <td>{{ $exam->name('ar') }}</td>
                                                <td>{{ $exam->skill->level->name('ar') }}</td>
                                                <td>{{ $exam->skill->name('ar') }}</td>
                                                <td>{{ $exam->questions_num }}</td>
                                                <td>
                                                    <img src="{{ asset("uploads/$exam->img") }}" height="70px" alt="">
                                                </td>   

                                                <td>
                                                    @if ($exam->active)
                                                        <span class="badge bg-success">Yes</span>
                                                    @else
                                                        <span class="badge bg-danger">No</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    {{-- {{$video->paid}} --}}
                                                @if ($exam->paid == '1')
                                                    <span class="badge bg-success p-1">Paid</span>
                                                @else
                                                    <span class="badge bg-danger p-1">Free</span>
                                                @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url("dashboard/exams/show/$exam->id") }}"
                                                        class=" btn btn-sm btn-primary ">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ url("dashboard/exams/show/$exam->id/questions") }}"
                                                        class=" btn btn-sm btn-success">
                                                        <i class="fas fa-question"></i>
                                                    </a>
                                                    <a href="{{ url("dashboard/exams/edit/$exam->id") }}"
                                                        class=" btn btn-sm btn-info ">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a onclick="return confirm('Are you sure?');" href="{{ url("dashboard/exams/delete/$exam->id") }}"
                                                        class=" btn btn-sm btn-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                    <a href="{{ url("dashboard/exams/toggle/$exam->id") }}"
                                                        class=" btn btn-sm btn-primary">
                                                        <i class="fas fa-toggle-on"></i>
                                                    </a>
                                                    <a onclick="return confirm('Are you sure?');" href="{{ url("dashboard/exams/toggle-paid/$exam->id") }}"
                                                        class=" btn btn-sm btn-dark">
                                                        <i class="fas fa-dollar-sign"></i>
                                                    </a>
                                                    @if ($exam->paid == '1')
                                                    <a href="{{ url("dashboard/exams/code/$exam->id") }}"
                                                        class=" btn btn-sm btn-default">
                                                        <i class="fas fa-code"></i>
                                                    </a>
                                                    @endif



                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center my-3">
                                    {{-- {{$exams->links('web.inc.pagintor')}}  --}}
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




@endsection

@section('scripts')
    <script>


    </script>
@endsection
