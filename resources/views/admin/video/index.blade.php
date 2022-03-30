@extends('admin.layout')

@section('main')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">videos</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">videos</li>
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
                                <h3 class="card-title">All videos </h3>

                                <div class="card-tools">

                                    <a href="{{ url('dashboard/videos/create') }}" class="btn btn-sm btn-primary">Add New</a>
                                    
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead class="text-center">
                                        <tr>
                                            <th>ID</th>
                                            <th>اسم الفديو</th>
                                            <th>السنة الدراسية</th>
                                            <th>المادة</th>
                                            <th>Image</th>
                                            <th>Active</th>
                                            <th>Paid</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($videos as $video)
                                        
                                            <tr>
                                                <td>{{ $video->id  }}</td>
                                                <td>{{ $video->title }}</td>
                                                <td>{{ $video->skill->level->name('ar') }}</td>
                                                <td>{{ $video->skill->name('ar') }}</td>
                                                <td>
                                                    <img src="{{ asset("uploads/$video->video_cover") }}" height="80px" alt="">
                                                </td>   

                                                <td>
                                                    @if ($video->active)
                                                        <span class="badge bg-success">Yes</span>
                                                    @else
                                                        <span class="badge bg-danger">No</span>
                                                    @endif
                                                </td>

                                                
                                                <td>
                                                    {{-- {{$video->paid}} --}}
                                                @if ($video->paid == '1')
                                                    <span class="badge bg-success p-1">Paid</span>
                                                @else
                                                    <span class="badge bg-danger p-1">Free</span>
                                                @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url("dashboard/videos/show/$video->id") }}"
                                                        class=" btn btn-sm btn-primary ">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ url("dashboard/videos/edit/$video->id") }}"
                                                        class=" btn btn-sm btn-info ">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a onclick="return confirm('Are you sure?');" href="{{ url("dashboard/videos/delete/$video->id") }}"
                                                        class=" btn btn-sm btn-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                    <a href="{{ url("dashboard/videos/toggle/$video->id") }}"
                                                        class=" btn btn-sm btn-primary">
                                                        <i class="fas fa-toggle-on"></i>
                                                    </a>
                                                    <a onclick="return confirm('Are you sure?');" href="{{ url("dashboard/videos/toggle-paid/$video->id") }}"
                                                        class=" btn btn-sm btn-dark">
                                                        <i class="fas fa-dollar-sign"></i>
                                                    </a>
                                                    @if ($video->paid == '1')
                                                    <a href="{{ url("dashboard/videos/code/$video->id") }}"
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
                                    {{-- {{$videos->links('web.inc.pagintor')}}  --}}
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

    {{-- <div class="modal fade" id="add-modal" style="display: none;" aria-hidden="true">
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
                <form id="add-form" method="POST" action="{{ url('dashboard/videos/store') }}" enctype="multipart/form-data">
                     @csrf
                     <div class="row">
                         <div class="col-6">
                            <div class="form-group">
                                <label >Name(en)</label>
                                <input type="text" name="name_en" class="form-control" >
                              </div>
                         </div>

                     <div class="col-6">
                        <div class="form-group">
                            <label >Name(ar)</label>
                            <input type="text" name="name_ar" class="form-control">
                          </div>
                     </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label >Categories</label>
                                <select class="custom-select form-control" name="cat_id">
                                    @foreach ($cats as $cat)
                                    <option value="{{$cat->id}}"> {{ $cat->name('en') }}</option>
                                    @endforeach


                                </select>
                              </div>
                        </div>

                      <div class="col-6">
                        <div class="form-group">
                            <label>Image</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" name="img">
                                <label class="custom-file-label" >Choose file</label>
                              </div>

                            </div>
                          </div>
                      </div>
                   </div>

                </form>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" form="add-form"   class="btn btn-primary">Submit</button>
        </div>
      </div>
      <!-- /.modal-content -->
       </div>
     <!-- /.modal-dialog -->
  </div> --}}




    {{-- <div class="modal fade" id="edit-modal" style="display: none;" aria-hidden="true">
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
               <form id="edit-form" method="POST" action="{{ url('dashboard/videos/update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="edit-form-id">
                    <div class="row">
                        <div class="col-6">
                           <div class="form-group">
                               <label >Name(en)</label>
                               <input type="text" name="name_en" class="form-control" id="edit-form-name-en" >
                             </div>
                        </div>

                    <div class="col-6">
                       <div class="form-group">
                           <label >Name(ar)</label>
                           <input type="text" name="name_ar" class="form-control" id="edit-form-name-ar">
                         </div>
                    </div>
                   </div>

                   <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label >Categories</label>
                            <select class="custom-select form-control" id="edit-form-cat-id" name="cat_id">
                                @foreach ($cats as $cat)
                                <option value="{{$cat->id}}"> {{ $cat->name('en') }}</option>
                                @endforeach


                            </select>
                          </div>
                    </div>

                  <div class="col-6">
                    <div class="form-group">
                        <label>Image</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="img">
                            <label class="custom-file-label" >Choose file</label>
                          </div>

                        </div>
                      </div>
                  </div>
               </div>



               </form>

       </div>
       <div class="modal-footer justify-content-between">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="submit" form="edit-form"   class="btn btn-primary">Submit</button>
       </div>
     </div>
     <!-- /.modal-content -->
      </div>
    <!-- /.modal-dialog -->
 </div> --}}



@endsection

@section('scripts')
    <script>


    </script>
@endsection
