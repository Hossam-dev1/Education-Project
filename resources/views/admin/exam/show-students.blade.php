@extends('admin.layout')

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Exam Details</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard/students') }}">Home</a></li>

                            <li class="breadcrumb-item active">ShowScores </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Center_Name</th>
                        <th>Level</th>
                        <th>score</th>
                        <th>Time(mins)</th>
                        <th>Date</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($exams as $exam)
                        <tr>
                            <td>{{ $exam->id }}</td>
                            <td>{{ $exam->name }}</td>
                            <td>{{ $exam->phone }}</td>
                            <td>{{ $exam->area }}</td>
                            <td>{{ $exam->level }}</td>
                            <td>{{ $exam->pivot->score }} </td>
                            <td>{{ $exam->pivot->time_hours }} m</td>
                            <td><span>{{Carbon\Carbon::parse($exam->pivot->updated_at)->format('d M, Y')}}</span></td>
                            <td>{{ $exam->pivot->status }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            

        </div>
        </div>
    @endsection
