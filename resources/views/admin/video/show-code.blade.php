@extends('admin.layout')

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">


            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Videos_Codes</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <button onclick="window.print()" type="submit" class="btn btn-success float-right mr-2">Print</button>
                            <a href="{{url("dashboard/videos/new-code")}}"></a>
                        </ol>

                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="container">

            <div class="row">
                <div class="col-md-6">
                    <ul>
                        @foreach ($codes as $index=> $code)
                            <li class="py-3">{{$index+1}} - {{$code->code}}</li>
                        @endforeach
                    </ul>
                </div>

            </div>

        </div>
        {{-- Modelllllll --}}


    </div>
@endsection

@section('scripts')
    {{-- <script>
window.onbeforeunload = function(e) {
            return "you can not refresh the page";
        }
    </script> --}}
@endsection