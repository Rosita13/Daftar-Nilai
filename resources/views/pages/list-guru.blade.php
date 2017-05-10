@extends('layouts.app')
@section('title', 'List Guru')
@section('content')
    <div class="page-title">
        <div>
          <h1>Data Guru</h1>
          <ul class="breadcrumb side">
            <li><i class="fa fa-home fa-lg"></i></li>
            <li class="active"><a href="#">Data Guru</a></li>
          </ul>
        </div>
        <div><a class="btn btn-primary btn-flat" href={{route('page.create-guru')}}><i class="fa fa-lg fa-plus"></i></a><a class="btn btn-info btn-flat"
           href={{route('page.list-guru')}}><i class="fa fa-lg fa-refresh"></i></a><a class="btn btn-primary btn-flat" href="javascript:window.print();"><i class="fa fa-print"></i></a></div>
      </div>
       <div class="content">
      <div class="row">
      <div class="col-md-4 pull-right">
        <form method="GET" action="{{route('page.list-guru')}}"> 
          <div class="form-group">
              <input type="text" class="form-control" name="search" placeholder="Pencarian..." value="">
          </div>
        </form>
        </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive table-full-width">
              <table class="table table-hover table-striped">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                   @foreach ($teachers as $teacher)
                  <tr>
                  <td>{{ $teacher->name }}</td>
                  <td>{{ $teacher->nip }}</td>
                  <td>
                   <a class="btn btn-info btn-flat"href={{route('page.edit-guru',['id' => $teacher->id])}}><i class="fa fa-lg fa-edit"></i></a>
                   <a class="btn btn-warning btn-flat"onClick="deleteData('{{$teacher->id}}')"><i class="fa fa-lg fa-trash"></i></a>
                  </td>
                  </tr>
                  @endforeach
                    
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
       <div class="col-md-12 text-center">
      <!--pagination-->
      {{$teachers->links()}}
    </div>
@endsection
@section('scripts')
<script>
  function deleteData(teacherId){
    console.log(teacherId);
    	swal({
      		title: "Are you sure?",
      		text: "You will not be able to recover this imaginary file!",
      		type: "warning",
      		showCancelButton: true,
      		confirmButtonText: "Yes, delete it!",
      		cancelButtonText: "No, cancel plx!",
      		closeOnConfirm: false,
      		closeOnCancel: false
    },
    function(isConfirm){
      if (isConfirm) {
        // delete data using ajax
        $.ajax({
          url: "/api/teachers/" + teacherId,
          type: 'DELETE',
          success: function( data, textStatus, jQxhr ){
            console.log(data);
            swal("Deleted!", "Your imaginary file has been deleted.", "success");
          },
          error: function( data, textStatus, jQxhr ){
            swal("Internal Server Error", "Whooops something went wrong!", "error");
          }
        });
        // reload page
        location.reload();
      } else {
        swal("Cancelled", "Your imaginary file is safe :)", "error");
      }
    });
  };
</script> 
@endsection