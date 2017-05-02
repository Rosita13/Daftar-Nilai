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
            href="#"><i class="fa fa-lg fa-refresh"></i></a>
          <a class="btn btn-primary btn-flat" href="javascript:window.print();"><i class="fa fa-print"></i></a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
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
                  <td>{{ $value->name }}</td>
                  <td>{{ $value->class }}</td>
                  <td>{{ $value->mapel }}</td>
                  <td>{{ $value->type }}</td>
                  <td>{{ $value->nilai }}</td>
                  <td>{{ $value->status }}</td>
                  <td>{{ $value->semester }}</td>
                  <td>
                   <a class="btn btn-info btn-flat"  href={{route('page.edit-guru',['id' => $value->id])}}><i class="fa fa-lg fa-edit"></i></a>
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