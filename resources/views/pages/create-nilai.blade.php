@extends('layouts.app')
@section('title', 'Create Nilai')
@section('content')
 <div class="page-title">
        <div>
          <h1><i class="fa fa-edit"></i> Create Nilai</h1>
          <p>Input Sebagai Nilai Siswa </p>
        </div>
        <div>
          <ul class="breadcrumb">
            <li><i class="fa fa-home fa-lg"></i></li>
            <li>Nilai</li>
            <li><a href="#">Create Nilai</a></li>
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
                        <label class="col-lg-2 control-label" for="inputNama">Siswa</label>
                        <div class="col-lg-10">
                          <input class="form-control" type="text" placeholder="Nama Siswa" readonly>
                          <input class="form-control" type="hidden" placeholder="siswa_id" name="Siswa">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label" for="inputTugas1">Kelas</label>
                        <div class="col-lg-10">
                          <input class="form-control" type="text" placeholder="Kelas">
                        </div>
                      </div>
                      <legend>Input Nilai</legend>
                      <div class="form-group">
                        <label class="col-lg-2 control-label" for="inputTugas1">Nilai</label>
                        <div class="col-lg-10">
                          <input class="form-control" type="text" placeholder="Inputkan Nilainya">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label" for="select">Status</label>
                        <div class="col-lg-10">
                          <select class="form-control" id="select">
                              <option>Remidi</option>
                              <option>Lulus</option>
                            </select><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label" for="select">Semester</label>
                        <div class="col-lg-10">
                          <select class="form-control" id="select">
                              <option>1</option>
                              <option>2</option>
                            </select><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label" for="select">Type</label>
                        <div class="col-lg-10">
                          <select class="form-control" id="select">
                              <option>Tugas 1</option>
                              <option>Tugas 2</option>
                              <option>UTS</option>
                              <option>UTS</option>
                              <option>UAS</option>
                              <option>UAS</option>
                            </select><br>
                        </div>
                      </div>
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

                        <div class="form-group">
                          <div class="col-lg-10 col-lg-offset-2">
                         <a class="btn btn-default submit" href="#signup">Simpan</a>
                          <a class="btn btn-primary submit" href="#signup">Simpan & Kembali</a>
                          <a class="btn btn-default submit" href={{route('page.list-nilai')}}>Kembali</a>
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
      </div>
@endsection
@section('scripts')
@endsection