@extends('layouts.app')
@section('title', 'List Siswa')
@section('content')
    <div class="page-title">
        <div>
          <h1>Data Siswa</h1>
          <ul class="breadcrumb side">
            <li><i class="fa fa-home fa-lg"></i></li>
            <li class="active"><a href="#">Data Siswa</a></li>
          </ul>
        </div>
        <div><a class="btn btn-primary btn-flat" href={{route('page.create-siswa')}}><i class="fa fa-lg fa-plus"></i></a><a class="btn btn-info btn-flat"
           href={{route('page.list-siswa')}}><i class="fa fa-lg fa-refresh"></i></a><a class="btn btn-primary btn-flat" href="javascript:window.print();"><i class="fa fa-print"></i></a></div>
      </div>
       <div class="content">
      <div class="row">
      <div class="col-md-4 pull-right">
        <form method="GET" action="{{route('page.list-siswa')}}"> 
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
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($students as $student)
                  <tr>
                  <td>{{ $student->nis }}</td>
                  <td>{{ $student->name }}</td>
                  <td>{{ $student->class }}</td>
                  <td>{{ $student->email }}</td>
                  <td>{{ $student->phone }}</td>
                  <td>
                   <a class="btn btn-info btn-flat"href={{route('page.edit-siswa',['id' => $student->id])}}><i class="fa fa-lg fa-edit"></i></a>
                   <a class="btn btn-warning btn-flat"onClick="deleteData('{{$student->id}}')"><i class="fa fa-lg fa-trash"></i></a>
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
      {{$students->links()}}
    </div>
@endsection
@section('scripts')
  <script>
  function deleteData(studentId){
    console.log(studentId);
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
          url: "/api/students/" + studentId,
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