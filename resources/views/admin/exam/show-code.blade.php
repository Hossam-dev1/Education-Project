@extends('admin.layout')

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Show_Exam_Codes</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Exam</li>
                        </ol>
                            <div class="w-100 p-2 m-2">
                                <button onclick="window.print()" type="submit" class="btn btn-success">Print</button>
                                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                            </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="container">
            {{-- <form action="{{url("dashboard/videos/store-code/{$video_id}")}}" method="post"> --}}
                {{-- @csrf  --}}
            <div class="row">
                <div class="col-md-6">
                    <ul>
                        @foreach ($codes as $index=> $code)
                            <li class="py-3">{{$index+1}} - {{$code->code}}</li>
                        @endforeach
                    </ul>
                </div>

            </div>
            {{-- </form> --}}

        </div>

    </div>
@endsection

@section('scripts')
    <script>
window.onbeforeunload = function(e) {
            return "you can not refresh the page";
        }
    </script>
@endsection