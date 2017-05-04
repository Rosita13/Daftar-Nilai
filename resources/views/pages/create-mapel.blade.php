@extends('layouts.app')
@section('title', 'Create Mapel')
@section('content')
 <div class="page-title">
        <div>
          <h1><i class="fa fa-edit"></i> Create Mata Pelajaran</h1>
          <p>Input untuk Mata Pelajaran</p>
        </div>
        <div>
          <ul class="breadcrumb">
            <li><i class="fa fa-home fa-lg"></i></li>
            <li>Mata Pelajaran</li>
            <li><a href="#">Create Mata Pelajaran</a></li>
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
                   <form class="form-horizontal" id="formSubject">
                      <legend>Data Mata Pelajaran</legend>
                       <div class="form-group">
                        <label class="col-lg-2 control-label" for="select">Mapel</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="name"id="select" value="">
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
                         <select name="guru_id" class="form-control" id="demoSelect">
                          @foreach($teachers as $teacher)
                          <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                          @endforeach
                         </select>
                        </div>
                      </div>
                      <div class="form-group">
                       <div class="col-lg-10 col-lg-offset-2">
                          <button class="btn btn-default submit" id="btnSimpan">Simpan</button>
                      <button class="btn btn-primary submit" id="btnSimpanKembali">Simpan & Kembali</button>
                      <a class="btn btn-default submit" href={{route('page.list-mapel')}}>Kembali</a>
                        </div>
                      </div>
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
      
    });
    // ini adalah proses submit data menggunakan Ajax
    $("#btnSimpan").click(function(event) {
      // kasih ini dong biar gag hard reload
      event.preventDefault();
      $.ajax({
        url: '{{route("subjects.store")}}', // url post data
        dataType: 'JSON',
        type: 'POST',
        contentType: 'application/x-www-form-urlencoded',
        data: $("#formSubject").serialize(), // data tadi diserialize berdasarkan name
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
            $('#formSubject').find("input[type=text], textarea").val("");
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
            message: "Data Mata Pelajaran berhasil disimpan."
        }, {
                type: 'success',
                timer: 4000
            });
	  }
    $('#demoSelect').select2();
  </script>
@endsection