<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href={{asset('css/main.css')}}>
    <title>Sistem Informasi Nilai Siswa</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Daftar-Nilai</h1>
      </div>
      <div class="login-box">
      <div class="col-md-12 text-center">
       <br>
      </br>
        <form class="register-form" id="formRegister">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>REGISTER</h3>
          <div class="form-group">
            <input class="form-control"name="name"type="text" placeholder="Nama" value="" required="true" >
          </div>
            <div class="form-group">
            <input name="email" class="form-control" type="text" placeholder="Email"value="" required="true">
          </div>

           <div class="form-group">
            <input class="form-control"name="phone"type="text" placeholder="Telephone" value="" required="true">
          </div>

           <div class="form-group">
            <input class="form-control"name="password"type="password" placeholder="Password" value="" required="true">
          </div>

          <div class="form-group btn-container">
             <button class="btn btn-primary btn-block" id="btnSimpan">Simpan <i class="fa fa-sign-in fa-lg"></i></button>
          </div>

          <div class="form-group mt-20">
            <div>
            <p class="semibold-text mb-0"><a id="register" href={{route('page.login')}}><i class="ace-icon fa fa-arrow-left"> Back to Login</i></a></p>
          </div>
          </div>
        </form>
      </div>
      </div>
      </div>
    </section>
    <br></br>
  </body>
  <script src={{asset('js/jquery-2.1.4.min.js')}}></script>
  <script src={{asset('js/essential-plugins.js')}}></script>
  <script src={{asset('js/bootstrap.min.js')}}></script>
  <script src={{asset('js/plugins/pace.min.js')}}></script>
  <script src={{asset('js/main.js')}}></script>
  <script type="text/javascript" src={{asset('js/plugins/bootstrap-notify.min.js')}}></script>

  <script>
    $(document).ready(function(){
      
    });
    // ini adalah proses submit data menggunakan Ajax
    $("#btnSimpan").click(function(event) {
      // kasih ini dong biar gag hard reload
      event.preventDefault();
      $.ajax({
        url: '{{route("register.store")}}', // url post data
        dataType: 'JSON',
        type: 'POST',
        contentType: 'application/x-www-form-urlencoded',
        data: $("#formRegister").serialize(), // data tadi diserialize berdasarkan name
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
            $('#formRegister').find("input[type=text], textarea").val("");
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
            message: "Data User berhasil disimpan."
        }, {
                type: 'success',
                timer: 4000
            });
	  }
  </script>
</html>