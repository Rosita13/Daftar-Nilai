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
            href="#"><i class="fa fa-lg fa-refresh"></i></a><a class="btn btn-primary btn-flat" href="javascript:window.print();"><i class="fa fa-print"></i></a></div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                   @foreach ($teachers as $teacher)
                  <tr>
                  <td>{{ $teacher->name }}</td>
                  <td>
                   <a class="btn btn-info btn-flat"  href={{route('page.edit-guru',['id' => $teacher->id])}}><i class="fa fa-lg fa-edit"></i></a>
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