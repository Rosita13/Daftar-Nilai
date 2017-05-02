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
            href="#"><i class="fa fa-lg fa-refresh"></i></a><a class="btn btn-primary btn-flat" href="javascript:window.print();"><i class="fa fa-print"></i></a></div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>User Id</th>
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
                  <td>{{ $student->users_id }}</td>
                  <td>{{ $student->name }}</td>
                  <td>{{ $student->class }}</td>
                  <td>{{ $student->email }}</td>
                  <td>{{ $student->phone }}</td>
                  <td>
                   <a class="btn btn-info btn-flat"  href={{route('page.edit-siswa',['id' => $student->id])}}><i class="fa fa-lg fa-edit"></i></a>
                   <a class="btn btn-warning btn-flat" href="#"><i class="fa fa-lg fa-trash"></i></a>
                  </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
@endsection
@section('scripts')
 <script src={{asset('js/jquery-2.1.4.min.js')}}></script>
  <script src={{asset('js/essential-plugins.js')}}></script>
  <script src={{asset('js/bootstrap.min.js')}}></script>
  <script src={{asset('js/plugins/pace.min.js')}}></script>
  <script src={{asset('js/main.js')}}></script>
  <script type="text/javascript" src={{asset('js/plugins/jquery.dataTables.min.js')}}></script>
  <script type="text/javascript" src={{asset('js/plugins/dataTables.bootstrap.min.js')}}></script>
  <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endsection