@extends('layouts.app')
@section('title', 'Create Class')
@section('content')
  <div class="page-title">
        <div>
          <h1><i class="fa fa-edit"></i> Create Kelas</h1>
          <p>Input Sebagai Profile Kelas</p>
        </div>
        <div>
          <ul class="breadcrumb">
            <li><i class="fa fa-home fa-lg"></i></li>
            <li>Kelas</li>
            <li><a href="#">Create Kelas</a></li>
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
                  <form class="form-horizontal" id="formClass">
                      <legend>Data Kelas</legend>
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
                        <label class="col-lg-2 control-label" for="inputNama">Kelas</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="class" type="text" placeholder="Kelas" value="">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                        <button class="btn btn-default submit" id="btnSimpan">Simpan</button>
                      <button class="btn btn-primary submit" id="btnSimpanKembali">Simpan & Kembali</button>
                      <a class="btn btn-default submit" href={{route('page.list-class')}}>Kembali</a>
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
        url: '{{route("classes.store")}}', // url post data
        dataType: 'JSON',
        type: 'POST',
        contentType: 'application/x-www-form-urlencoded',
        data: $("#formClass").serialize(), // data tadi diserialize berdasarkan name
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
            $('#formClass').find("input[type=text], textarea").val("");
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
            message: "Data Kelas berhasil disimpan."
        }, {
                type: 'success',
                timer: 4000
            });
	  }

     $('#demoSelect').select2();
  </script>
@endsection