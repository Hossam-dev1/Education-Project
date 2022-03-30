@extends('admin.layout')

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Add New Appointment</h1>
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
            <form method="POST" action="{{ url("dashboard/teacher/update/$item->id") }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <!-- select -->
                        <div class="form-group">
                            <label>الصف الدراسي</label>
                            <select class="form-control" name="level">
                                <option value="first" @if ($item->level == 'first') selected @endif>الصف الاول</option>
                                <option value="second" @if ($item->level == 'second') selected @endif>الصف الثاني</option>
                                <option value="third" @if ($item->level == 'third') selected @endif>الصف الثالث</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- select -->
                        <div class="form-group">
                            <label>اسم السنتر</label>
                                <select class="form-control" name="center" required focus>
                                    <option @if ($item->center == 'مكتب سمور') selected @endif>مكتب سمور </option>
                                    <option @if ($item->center == 'سنتر الرحمة') selected @endif>سنتر الرحمة</option>
                                    <option @if ($item->center == 'سنتر الرواد') selected @endif>سنتر الرواد </option>
                                    <option @if ($item->center == 'سنتر الصرح') selected @endif>سنتر الصرح </option>
                                    <option @if ($item->center == 'سنتر التبين') selected @endif>سنتر التبين </option>
                                    <option @if ($item->center == 'سنتر الاخصاص') selected @endif>سنتر الاخصاص </option>
                                    <option @if ($item->center == 'VIC 1') selected @endif>VIC 1</option>
                                    <option @if ($item->center == 'VIC 2') selected @endif>VIC 2</option>
                                </select>
                            </select>
                        </div>
                    </div>

                </div>
                    <!-- input states -->
                    <div class="row">

                        <div class="col-sm-4">
                            <label>المادة</label>
                            <select class="form-control" name="subject" required focus>
                                <option  @if ($item->subject == 'الأحياء') selected @endif>الأحياء</option>
                                <option  @if ($item->subject == 'الجولوجيا') selected @endif>الجولوجيا</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>اليوم</label>
                            <input type="text" class="form-control" value="{{$item->day}}" name="day">
                        </div>
                        <div class="col-sm-4">
                            <label>الساعة</label>
                            <input type="text" class="form-control" value="{{$item->time}}" name="time">
                        </div>

                            </div>

                            <div class="w-100 p-2 m-2">
                                <button type="submit" class="btn btn-success">Sumbit</button>
                                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                            </div>
                        </div>
                        <!-- /.card-body -->

            </form>
        </div>

@endsection


