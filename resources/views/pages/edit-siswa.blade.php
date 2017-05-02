@extends('layouts.app')
@section('title', 'Edit Siswa')
@section('content')
       <div class="page-title">
        <div>
          <h1><i class="fa fa-edit"></i> Edit Siswa</h1>
          <p>Input Sebagai Identitas Siswa</p>
        </div>
        <div>
          <ul class="breadcrumb">
            <li><i class="fa fa-home fa-lg"></i></li>
            <li>Siswa</li>
            <li><a href="#">Edit Siswa</a></li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="row">
              <div class="col-lg-6">
                <div class="well bs-component">
                  <form class="form-horizontal">
                    <fieldset>
                      <legend>Data Siswa</legend>
                      <div class="form-group">
                        <label class="col-lg-2 control-label" for="inputNama">User</label>
                        <div class="col-lg-10">
                          <input class="form-control" type="text" placeholder="Id user" readonly>
                          <input class="form-control" type="hidden" placeholder="users_id" name="user">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label" for="inputNama">Nama</label>
                        <div class="col-lg-10">
                          <input class="form-control" type="text" placeholder="Nama">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label" for="inputEmail">Email</label>
                        <div class="col-lg-10">
                          <input class="form-control" type="text" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label" for="inputTelephone">Telephone</label>
                        <div class="col-lg-10">
                          <input class="form-control" type="text" placeholder="Telephone">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label" for="inputJurusan">Kelas</label>
                        <div class="col-lg-10">
                          <input class="form-control" type="text" placeholder=" XI RPL 2">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                          <a class="btn btn-primary submit" href="#signup">Edit</a>
                          <a class="btn btn-default submit" href={{route('page.list-siswa')}}>Kembali</a>
                        </div>
                      </div>
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
@section('scripts')
<script>
  $(document).ready(function(){
    // aktifkan class nav user
           $('#nav-list-class').removeClass('active');
           $('#nav-list-mapel').removeClass('active');
           $('#nav-list-nilai').removeClass('active');
           $('#nav-list-siswa').removeClass('active');
           $('#nav-list-user').removeClass('active');
           $('#nav-dashboard').removeClass('active');
           $('#nav-list-guru').addClass('active');
  });
@endsection