@extends('layouts.app')
@section('title', 'List Siswa Page Title')
@section('content')
    <div class="page-title">
        <div>
          <h1>Data Siswa</h1>
          <ul class="breadcrumb side">
            <li><i class="fa fa-home fa-lg"></i></li>
            <li class="active"><a href="#">Data Siswa</a></li>
          </ul>
        </div>
        <div><a class="btn btn-primary btn-flat" href="create-siswa.html"><i class="fa fa-lg fa-plus"></i></a><a class="btn btn-info btn-flat"
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
                    <th>User Id</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>61</td>
                    <td>Lailatul</td>
                    <td>XI TKJ 2</td>
                    <td>Lailatul@gmail.com</td>
                    <td>087654323456</td>
                    <td>
                      <a class="btn btn-info btn-flat" href="edit-siswa.html"><i class="fa fa-lg fa-edit"></i></a>
                      <a class="btn btn-warning btn-flat" href="#"><i class="fa fa-lg fa-trash"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                  <td>62</td>
                    <td>Rosita</td>
                    <td>XI RPL 2</td>
                    <td>Rosita@gmail.com</td>
                    <td>087054323456</td>
                    <td>
                      <a class="btn btn-info btn-flat" href="edit-siswa.html"><i class="fa fa-lg fa-edit"></i></a>
                      <a class="btn btn-warning btn-flat" href="#"><i class="fa fa-lg fa-trash"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                   <td>63</td>
                    <td>Lfira</td>
                    <td>XI TEI 2</td>
                    <td>Alfira@gmail.com</td>
                    <td>087684323456</td>
                    <td>
                      <a class="btn btn-info btn-flat" href="edit-siswa.html"><i class="fa fa-lg fa-edit"></i></a>
                      <a class="btn btn-warning btn-flat" href="#"><i class="fa fa-lg fa-trash"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <td>4</td>
                   <td>64</td>
                    <td>Syahrul</td>
                    <td>XI TSM 2</td>
                    <td>Syahrul@gmail.com</td>
                    <td>087650323456</td>
                    <td>
                      <a class="btn btn-info btn-flat" href="edit-siswa.html"><i class="fa fa-lg fa-edit"></i></a>
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
@endsection