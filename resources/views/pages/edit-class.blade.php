@extends('layouts.app')
@section('title', 'Edit Class')
@section('content')
   <div class="page-title">
        <div>
          <h1><i class="fa fa-edit"></i> Edit Kelas</h1>
          <p>Input Sebagai Profile Kelas</p>
        </div>
        <div>
          <ul class="breadcrumb">
            <li><i class="fa fa-home fa-lg"></i></li>
            <li>Kelas</li>
            <li><a href="#">Edit Kelas</a></li>
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
                      <legend>Data Kelas</legend>
                      <div class="form-group">
                        <label class="col-lg-2 control-label" for="inputNama">Guru</label>
                        <div class="col-lg-10">
                          <input class="form-control"  type="text" placeholder="Nama Guru" readonly>
                          <input class="form-control"  type="hidden" placeholder="guru_id">
                        </div>
                      </div>
                          <div class="form-group">
                        <label class="col-lg-2 control-label" for="inputNama">Kelas</label>
                        <div class="col-lg-10">
                          <input class="form-control"  type="text" placeholder="Kelas">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                          <a class="btn btn-primary submit" href="#signup">Edit</a>
                          <a class="btn btn-default submit" href={{route('page.List-class')}}>Kembali</a>
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
        $('#nav-list-siswa').removeClass('active');
        $('#nav-list-guru').removeClass('active');
        $('#nav-list-mapel').removeClass('active');
        $('#nav-list-nilai').removeClass('active');
        $('#nav-list-user').removeClass('active');
        $('#nav-dashboard').removeClass('active');
        $('#nav-list-class').addClass('active');
  });
  </script>
@endsection