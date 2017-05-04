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
       <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="alert alert-dismissible hide" id="errMsg" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <span id="errData"></span>
              </div>
            </div>
          </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="row">
              <div class="col-lg-6">
                <div class="well bs-component">
                  <form class="form-horizontal" id="formValue">
                      <legend>Data Siswa</legend>
                      <div class="form-group">
                        <label class="col-lg-2 control-label" for="inputNama">Siswa</label>
                        <div class="col-lg-10">
                          <select name="siswa_id"class="form-control" id="demoSelect">
                          @foreach($students as $student)
                          <option value="{{$student->id}}">{{$student->name}}</option>
                          @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label" for="inputTugas1">Kelas</label>
                        <div class="col-lg-10">
                          <select name="siswa_id"class="form-control" id="idclass">
                          @foreach($classes as $class)
                          <option value="{{$class->id}}">{{$class->class}}</option>
                          @endforeach
                          </select>
                        </div>
                      </div>
                      <legend>Input Nilai</legend>
                      <div class="form-group">
                        <label class="col-lg-2 control-label" for="inputTugas1">Nilai</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="nilai"type="text" placeholder="Inputkan Nilainya"value="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label" for="select">Status</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="status"id="idstatus"value="">
                              <option>Remidi</option>
                              <option>Lulus</option>
                            </select><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label" for="select">Semester</label>
                        <div class="col-lg-10">
                          <select class="form-control"name="semester" id="select"value="">
                              <option>1</option>
                              <option>2</option>
                            </select><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label" for="select">Type</label>
                        <div class="col-lg-10">
                          <select class="form-control"name="type" id="select"value="">
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
                          <select name="mapel"class="form-control" id="idmapel">
                          @foreach($subjects as $subject)
                          <option value="{{$subject->id}}">{{$subject->name}}</option>
                          @endforeach
                          </select>
                        </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-10 col-lg-offset-2">
                         <button class="btn btn-default submit" id="btnSimpan">Simpan</button>
                         <button class="btn btn-primary submit" id="btnSimpanKembali">Simpan & Kembali</button>
                         <a class="btn btn-default submit" href={{route('page.list-nilai')}}>Kembali</a>
                          </div>
                        </div>
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
<script>
    $(document).ready(function(){
      
    });
    // ini adalah proses submit data menggunakan Ajax
    $("#btnSimpan").click(function(event) {
      // kasih ini dong biar gag hard reload
      event.preventDefault();
      $.ajax({
        url: '{{route("values.store")}}', // url post data
        dataType: 'JSON',
        type: 'POST',
        contentType: 'application/x-www-form-urlencoded',
        data: $("#formValue").serialize(), // data tadi diserialize berdasarkan name
        success: function( data, textStatus, jQxhr ){
            console.log('status =>', textStatus);
            console.log('data =>', data);
            // clear validation error messsages
            $('#errMsg').addClass('hide');
            $('#errData').html('');
            // scroll up
            // $('html, body').animate({
            //     scrollTop: $("#nav-top").offset().top
            // }, 2000);
            // tampilkan pesan sukses
            showNotifSuccess();
            // clear data inputan
            $('#formValue').find("input[type=text], textarea").val("");
            // kembali kelist book
        },
        error: function( data, textStatus, errorThrown ){
          var messages = jQuery.parseJSON(data.responseText);
          console.log( errorThrown );
          // $('html, body').animate({
          //     scrollTop: $("#nav-top").offset().top
          // }, 2000);
          // scroll up 
          // tampilkan pesan error
          $('#errData').html('');
          $('#errMsg').addClass('alert-warning');
          $('#errMsg').removeClass('hide');
          $.each(messages, function(i, val) {
            $('#errData').append('<p>'+ i +' : ' + val +'</p>')
            console.log(i,val);
          });          
          // jangan clear data
        }
      });
    });
    
    function showNotifSuccess(){
    	$.notify({
            icon: 'pe-7s-checklist',
            message: "Data Nilai berhasil disimpan."
        }, {
                type: 'success',
                timer: 4000
            });
	  }
      $('#demoSelect').select2();
      $('#idclass').select2();
      $('#idmapel').select2();
      $('#idstatus').select2();
  </script>
@endsection