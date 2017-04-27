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
        <div><a class="btn btn-primary btn-flat" href="create-mapel.html"><i class="fa fa-lg fa-plus"></i></a><a class="btn btn-info btn-flat"
            href="#"><i class="fa fa-lg fa-refresh"></i></a><a class="btn btn-primary btn-flat" href="javascript:window.print();"><i class="fa fa-print"></i></a></div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Guru id</th>
                    <th>Mata Pelajaran</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>61</td>
                    <td>IPS</td>
                    <td>
                      <a class="btn btn-info btn-flat" href="edit-mapel.html"><i class="fa fa-lg fa-edit"></i></a>
                      <a class="btn btn-warning btn-flat" href="#"><i class="fa fa-lg fa-trash"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                  <td>62</td>
                    <td>IPA</td>
                    <td>
                      <a class="btn btn-info btn-flat" href="edit-mapel.html"><i class="fa fa-lg fa-edit"></i></a>
                      <a class="btn btn-warning btn-flat" href="#"><i class="fa fa-lg fa-trash"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                   <td>63</td>
                    <td>PKN</td>
                    <td>
                      <a class="btn btn-info btn-flat" href="edit-mapel.html"><i class="fa fa-lg fa-edit"></i></a>
                      <a class="btn btn-warning btn-flat" href="#"><i class="fa fa-lg fa-trash"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>64</td>
                    <td>B.Ind</td>
                    <td>
                      <a class="btn btn-info btn-flat" href="edit-mapel.html"><i class="fa fa-lg fa-edit"></i></a>
                      <a class="btn btn-warning btn-flat" href="#"><i class="fa fa-lg fa-trash"></i></a>
                    </td>
                  </tr>
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