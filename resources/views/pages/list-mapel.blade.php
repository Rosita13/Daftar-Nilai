@extends('layouts.app')
@section('title', 'List Mapel')
@section('content')
    <div class="page-title">
        <div>
          <h1>Data Mata Pelajaran</h1>
          <ul class="breadcrumb side">
            <li><i class="fa fa-home fa-lg"></i></li>
            <li class="active"><a href="#">Data Mata Pelajaran</a></li>
          </ul>
        </div>
        <div><a class="btn btn-primary btn-flat" href={{route('page.create-mapel')}}><i class="fa fa-lg fa-plus"></i></a><a class="btn btn-info btn-flat"
           href={{route('page.list-mapel')}}><i class="fa fa-lg fa-refresh"></i></a><a class="btn btn-primary btn-flat" href="javascript:window.print();"><i class="fa fa-print"></i></a></div>
      </div>
      <div class="col-md-4 pull-right">
        <form method="GET" action="{{route('page.list-mapel')}}"> 
          <div class="form-group">
              <input type="text" class="form-control" name="search" placeholder="Pencarian..." value="">
          </div>
        </form>
        </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Mata Pelajaran</th>
                    <th>Guru</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach ($subjects as $subject)
                  <tr>
                  <td>{{ $subject->name }}</td>
                  <td>{{ $subject->teacher == null ? "null" : $subject->teacher->name  }}</td>
                  <td>
                  <a class="btn btn-info btn-flat"href={{route('page.edit-mapel',['id' => $subject->id])}}><i class="fa fa-lg fa-edit"></i></a>
                   <a class="btn btn-warning btn-flat"onClick="deleteData('{{$subject->id}}')"><i class="fa fa-lg fa-trash"></i></a>
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
      {{$subjects->links()}}
    </div>
@endsection
@section('scripts')
  <script>
  function deleteData(subjectId){
    console.log(subjectId);
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
          url: "/api/subjects/" + subjectId,
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