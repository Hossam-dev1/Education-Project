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
                            <li class="breadcrumb-item active"> Add New</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row --> 
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @include('admin.inc.erorr')
            <form method="POST" action="{{ url('dashboard/teacher/store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <!-- select -->
                        <div class="form-group">
                            <label>الصف الدراسي</label>
                            <select class="form-control" name="level" required focus>
                                <option value="" disabled selected>اختر الصف</option>        
                                <option value="first">الصف الاول</option>
                                <option value="second">الصف الثاني</option>
                                <option value="third">الصف الثالث </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- select -->
                        <div class="form-group">
                            <label for="center">اسم السنتر</label>
                            <select class="form-control" name="center" required focus>
                                <option value="" disabled selected>اختر السنتر</option>        
                                <option>مكتب سمور </option>
                                <option>سنتر الرحمة</option>
                                <option>سنتر الرواد </option>
                                <option>سنتر الصرح </option>
                                <option>سنتر التبين </option>
                                <option>سنتر الاخصاص </option>
                                <option>VIC 1</option>
                                <option>VIC 2</option>
                            </select>
                        </div>
                    </div>


                            <div class="col-sm-4">
                                <label>المادة</label>
                                <select class="form-control" name="subject" required focus>
                                    <option>الأحياء</option>
                                    <option>الجولوجيا</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label>اليوم</label>
                                <input type="text" class="form-control" value="" name="day">
                            </div>
                            <div class="col-sm-4">
                                <label>الساعة</label>
                                <input type="text" class="form-control" value="" name="time">
                            </div>
                </div>
                    <!-- input states -->



                    <div class="row">

                        <div class="card-body">
                            <div class="row">

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


