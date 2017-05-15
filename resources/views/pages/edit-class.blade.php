@extends('layouts.dashboard')
@section('title', 'Edit Class')
@section('content')
   <div class="page-title">
        <div>
          <h1><i class="fa fa-edit"></i> Edit Kelas</h1>
          <p>Edit Kelas</p>
        </div>
        <div>
          <ul class="breadcrumb">
            <li><i class="fa fa-home fa-lg"></i></li>
            <li>Kelas</li>
            <li><a href="#">Edit Kelas</a></li>
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
                   <input type="hidden" class="form-control" value="{{$kelas->id}}">
                      <legend>Data Kelas</legend>
                     <div class="form-group">
                        <label class="col-lg-2 control-label" for="inputNama">Wali Kelas</label>
                        <div class="col-lg-10">
                         <select name="guru_id" class="form-control" id="demoSelect">
                          @foreach($teachers as $teacher)
                          <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                          @endforeach
                         </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label" for="select">Kelas</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="class" id="idclass"value="{{$kelas->class}}">
                              <option>X RPL 1</option>
                              <option>X RPL 2</option>
                              <option>X RPL 3</option>
                              <option>XI RPL 1</option>
                              <option>XI RPL 2</option>
                              <option>XI RPL 3</option>
                              <option>XII RPL 1</option>
                              <option>XII RPL 2</option>
                              <option>XII RPL 3</option>
                              <option>X TKJ 1</option>
                              <option>X TKJ 2</option>
                              <option>X TKJ 3</option>
                              <option>XI TKJ 1</option>
                              <option>XI TKJ 2</option>
                              <option>XI TKJ 3</option>
                              <option>XII TKJ 2</option>
                              <option>XII TKJ 2</option>
                              <option>XII TKJ 3</option>
                              <option>X TEI 1</option>
                              <option>X TEI 2</option>
                              <option>X TEI 3</option>
                              <option>XI TEI 1</option>
                              <option>XI TEI 2</option>
                              <option>XI TEI 3</option>
                              <option>XII TEI 1</option>
                              <option>XII TEI 2</option>
                              <option>XII TEI 3</option>
                              <option>X TKR 1</option>
                              <option>X TKR 2</option>
                              <option>X TKR 3</option>
                              <option>XI TKR 1</option>
                              <option>XI TKR 2</option>
                              <option>XI TKR 3</option>
                              <option>XII TKR 1</option>
                              <option>XII TKR 2</option>
                              <option>XII TKR 3</option>
                              <option>X TSM 1</option>
                              <option>X TSM 2</option>
                              <option>X TSM 3</option>
                              <option>XI TSM 1</option>
                              <option>XI TSM 2</option>
                              <option>XI TSM 3</option>
                              <option>XII TSM 1</option>
                              <option>XII TSM 2</option>
                              <option>XII TSM 3</option>
                            </select><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                          <button class="btn btn-primary submit" id="btnUpdate">Update</button>
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
  <script>
  $(document).ready(function(){
       
     });
 
     // ini adalah proses submit data menggunakan Ajax
     $("#btnUpdate").click(function(event) {
       // kasih ini dong biar gag hard reload
       event.preventDefault();
       $.ajax({
         url: '{{route("classes.update",['id' => $kelas->id])}}', // url edit data
         dataType: 'JSON',
         type: 'PUT',
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
             // kembali kelist book
             window.location.href = '{{route("page.list-class")}}'
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
             message: "Edit Data Kelas berhasil disimpan."
         }, {
                 type: 'success',
                 timer: 4000
             });
 	  }
          $('#demoSelect').select2();
           $('#idclass').select2();
 </script>
@endsection