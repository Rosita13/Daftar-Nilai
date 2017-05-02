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
                    <th>Id</th>
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
                  <tr>
                    <td>1</td>
                    <td>Lailatul</td>
                    <td>XI TKJ 2</td>
                    <td>IPA</td>
                    <td>UTS Ganjil</td>
                    <td>67</td>
                    <td>Remidi</td>
                    <th>1</th>
                    <td>
                      <a class="btn btn-info btn-flat" href={{route('page.edit-nilai')}}><i class="fa fa-lg fa-edit"></i></a>
                      <a class="btn btn-warning btn-flat" href="#"><i class="fa fa-lg fa-trash"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Rosita</td>
                    <td>XI RPL 2</td>
                    <td>IPA</td>
                    <td>UTS Ganjil</td>
                    <td>75</td>
                    <td>Lolos</td>
                    <th>1</th>
                    <td>
                      <a class="btn btn-info btn-flat" href={{route('page.edit-nilai')}}><i class="fa fa-lg fa-edit"></i></a>
                      <a class="btn btn-warning btn-flat" href="#"><i class="fa fa-lg fa-trash"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Alfira</td>
                    <td>XI TEI 2</td>
                    <td>IPA</td>
                    <td>UTS Ganjil</td>
                    <td>77</td>
                    <td>Lolos</td>
                    <th>1</th>
                    <td>
                      <a class="btn btn-info btn-flat" href={{route('page.edit-nilai')}}><i class="fa fa-lg fa-edit"></i></a>
                      <a class="btn btn-warning btn-flat" href="#"><i class="fa fa-lg fa-trash"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Syahrul</td>
                    <td>XI TSM 2</td>
                    <td>IPA</td>
                    <td>UTS Ganjil</td>
                    <td>68</td>
                    <td>Remidi</td>
                    <th>1</th>
                    <td>
                      <a class="btn btn-info btn-flat" href={{route('page.edit-nilai')}}><i class="fa fa-lg fa-edit"></i></a>
                      <a class="btn btn-warning btn-flat" href="#"><i class="fa fa-lg fa-trash"></i></a>
                    </td>
                  </tr>
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