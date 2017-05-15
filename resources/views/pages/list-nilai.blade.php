@extends('layouts.app')
@section('title', 'List Nilai')
@section('content')
      <div class="page-title">
        <div>
          <h1>Data Nilai</h1>
          <ul class="breadcrumb side">
            <li><i class="fa fa-home fa-lg"></i></li>
            <li class="active"><a href="#">Data Nilai</a></li>
          </ul>
        </div>
        <div><a class="btn btn-primary btn-flat" href={{route('page.create-nilai')}}><i class="fa fa-lg fa-plus"></i></a><a class="btn btn-info btn-flat"
           href={{route('page.list-nilai')}}><i class="fa fa-lg fa-refresh"></i></a><a class="btn btn-primary btn-flat" href="javascript:window.print();"><i class="fa fa-print"></i></a>
        </div>
      </div>
      <div class="content">
      <div class="row">
      <div class="col-md-4 pull-right">
        <form method="GET" action="{{route('page.list-nilai')}}"> 
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
              <table class="table table-hover table-striped" >
                <thead>
                  <tr>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Mapel</th>
                    <th>Type</th>
                    <th>Nilai</th>
                    <th>Status</th>
                    <th>Semester</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach ($values as $value)
                  <tr>
                  <td>{{ $value->student == null ? "null" :$value->student->nis  }}</td>
                  <td>{{ $value->student == null ? "null" :$value->student->name  }}</td>
                  <td>{{ $value->kelas == null ? "null" :$value->kelas->class }}</td>
                  <td>{{ $value->subject == null ? "null" :$value->subject->name }}</td>
                  <td>{{ $value->type }}</td>
                  <td>{{ $value->nilai }}</td>
                  <td>{{ $value->status }}</td>
                  <td>{{ $value->semester }}</td>
                  <td>
                    <a class="btn btn-info btn-flat"href={{route('page.edit-nilai',['id' => $value->id])}}><i class="fa fa-lg fa-edit"></i></a>
                   <a class="btn btn-warning btn-flat"onClick="deleteData('{{$value->id}}')"><i class="fa fa-lg fa-trash"></i></a>
                  </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
     <div class="col-md-12 text-center">
      <!--pagination-->
      {{$values->links()}}
    </div>
@endsection
@section('scripts')
<script>
  function deleteData(valueId){
    console.log(valueId);
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
          url: "/api/values/" + valueId,
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