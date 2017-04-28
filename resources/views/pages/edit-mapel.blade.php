@extends('layouts.app')
@section('title', 'Edit Mapel')
@section('content')
       <div class="page-title">
        <div>
          <h1><i class="fa fa-edit"></i> Edit Mata Pelajaran</h1>
          <p>Input untuk Mata Pelajaran</p>
        </div>
        <div>
          <ul class="breadcrumb">
            <li><i class="fa fa-home fa-lg"></i></li>
            <li>Mata Pelajaran</li>
            <li><a href="#">Edit Mata Pelajaran</a></li>
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
                      <legend>Data Mata Pelajaran</legend>
                      <div class="form-group">
                        <label class="col-lg-2 control-label" for="select">Mapel</label>
                        <div class="col-lg-10">
                          <select class="form-control" id="select">
                              <option>MTK</option>
                              <option>KWU</option>
                              <option>IPA</option>
                              <option>IPS</option>
                              <option>B.Indonesia</option>
                              <option>B.Inggris</option>
                              <option>B.Jawa</option>
                              <option>Agama</option>
                              <option>PKN</option>
                              <option>KIMIA</option>
                              <option>Fisika</option>
                              <option>OR</option>
                              <option>SBK</option>
                              <option>WEB</option>
                              <option>VB</option>
                              <option>BASDA</option>
                              <option>KKPI</option>
                              <option>SQL</option>
                            </select><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label" for="inputNama">Guru</label>
                        <div class="col-lg-10">
                          <input class="form-control"
                           type="text" placeholder="Guru" readonly>
                          <input class="form-control" type="hidden" placeholder="guru_id">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                           <a class="btn btn-primary submit" href="#signup">Edit</a>
                          <a class="btn btn-default submit" href={{route('page.list-mapel')}}>Kembali</a>
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
@endsection