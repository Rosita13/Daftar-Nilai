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
                  <form class="form-horizontal"id="formStudent">
                   <input type="hidden" class="form-control" value="{{$student->id}}">
                      <legend>Data Siswa</legend>
                      <div class="form-group">
                        <label class="col-lg-2 control-label" for="inputNama">Nama</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="name" type="text" placeholder="Nama"value="{{$student->name}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label" for="inputEmail">Email</label>
                        <div class="col-lg-10">
                          <input class="form-control"name="email" type="text" placeholder="Email"value="{{$student->email}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label" for="inputTelephone">Telephone</label>
                        <div class="col-lg-10">
                          <input class="form-control"name="phone" type="text" placeholder="Telephone"value="{{$student->phone}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label" for="inputJurusan">Kelas</label>
                        <div class="col-lg-10">
                          <input class="form-control"name="class" type="text" placeholder=" XI RPL 2"value="{{$student->class}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                           <button class="btn btn-primary submit" id="btnUpdate">Update</button>
                        <a class="btn btn-default submit" href={{route('page.list-siswa')}}>Kembali</a>
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
    // aktifkan class nav user
           $('#nav-list-class').removeClass('active');
           $('#nav-list-mapel').removeClass('active');
           $('#nav-list-nilai').removeClass('active');
           $('#nav-list-user').removeClass('active');
           $('#nav-dashboard').removeClass('active');
           $('#nav-list-guru').removeClass('active');
           $('#nav-list-siswa').addClass('active');
  });
  </script>
  <script>
  $(document).ready(function(){
       
     });
 
     // ini adalah proses submit data menggunakan Ajax
     $("#btnUpdate").click(function(event) {
       // kasih ini dong biar gag hard reload
       event.preventDefault();
       $.ajax({
         url: '{{route("students.update",['id' => $student->id])}}', // url edit data
         dataType: 'JSON',
         type: 'PUT',
         contentType: 'application/x-www-form-urlencoded',
         data: $("#formStudent").serialize(), // data tadi diserialize berdasarkan name
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
             // kembali kelist book
             window.location.href = '{{route("page.list-siswa")}}'
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
             message: "Edit Data Siswa berhasil disimpan."
         }, {
                 type: 'success',
                 timer: 4000
             });
 	  }
 </script>
@endsection