@extends('layouts.app')
@section('title', 'Edit Guru')
@section('content')
     <div class="page-title">
        <div>
          <h1><i class="fa fa-edit"></i> Edit Guru</h1>
          <p>Input Sebagai Identitas Guru</p>
        </div>
        <div>
          <ul class="breadcrumb">
            <li><i class="fa fa-home fa-lg"></i></li>
            <li>Guru</li>
            <li><a href="#">Edit Guru</a></li>
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
                      <legend>Data Guru</legend>
                      <div class="form-group">
                        <label class="col-lg-2 control-label" for="inputNama">Nama</label>
                        <div class="col-lg-10">
                          <input class="form-control" type="text" placeholder="Nama">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-lg-2 control-label" for="inputNama">Nip</label>
                        <div class="col-lg-10">
                          <input class="form-control" type="text" placeholder="Nama">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                         <a class="btn btn-primary submit" href="#signup">Edit</a>
                          <a class="btn btn-default submit" href={{route('page.list-guru')}}>Kembali</a>
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
</script>
@endsection