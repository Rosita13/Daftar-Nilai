@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="page-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          <p> admin template</p>
        </div>
        <div>
          <ul class="breadcrumb">
            <li><i class="fa fa-home fa-lg"></i></li>
            <li><a href="#">Dashboard</a></li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="widget-small primary"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Users</h4>
              <p> <b>20</b></p>
            </div>
          </div>
          <div class="widget-small info"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
            <div class="info">
              <h4>Likes</h4>
              <p> <b>20</b></p>
            </div>
          </div>
          <div class="widget-small danger"><i class="icon fa fa-comments-o fa-3x"></i>
            <div class="info">
              <h4>Comments</h4>
              <p> <b>200</b></p>
            </div>
          </div>
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>Uploades</h4>
              <p> <b>20</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="card">
            <h3 class="card-title">Getting Started</h3>
            <p style="font-size: 16px;">Vali is a free dashboard theme built with Bootstrap, pug.js(templating) and sass. It's fully customizable and modular.
You don't need to add the code, you will not use. For more information about customizing theme take a look at the docs. Try
forget password link on <a href="page-login.html">login page</a> for a surprise. <br><br> Pull requests are always welcome
on GitHub</p>
<p class="mt-40 mb-20"><a class="btn btn-primary icon-btn mr-10" href="http://pratikborsadiya.in/blog/vali-admin" target="_blank"><i class="fa fa-file"></i>Docs</a>
  <a
    class="btn btn-info icon-btn mr-10" href="https://github.com/pratikborsadiya/vali-admin" target="_blank"><i class="fa fa-github"></i>GitHub</a><a class="btn btn-success icon-btn" href="https://github.com/pratikborsadiya/vali-admin/archive/master.zip"
      target="_blank"><i class="fa fa-download"></i>Download</a></p>
</div>
</div>
<div class="col-md-4">
  <div class="card">
    <h3 class="card-title">Chat</h3>
    <div class="messanger">
      <div class="messages">
        <div class="message"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/tonypeterson/48.jpg">
          <p class="info">Hello there!<br>Good Morning</p>
        </div>
        <div class="message me"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg">
          <p class="info">Hi<br>Good Morning</p>
        </div>
        <div class="message"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/tonypeterson/48.jpg">
          <p class="info">How are you?</p>
        </div>
        <div class="message me"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg">
          <p class="info">I'm Fine.</p>
        </div>
      </div>
      <div class="sender">
        <input type="text" placeholder="Send Message">
        <button class="btn btn-primary" type="button"><i class="fa fa-lg fa-fw fa-paper-plane"></i></button>
      </div>
    </div>
  </div>
</div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <h3 class="card-title">Vector Map</h3>
      <div class="card-body">
        <div id="demo-map" style="height: 400px;"></div>
</div>
</div>
</div>
<div class="col-md-6">
  <div class="card">
    <h3 class="card-title">Chart</h3>
    <div class="embed-responsive embed-responsive-16by9">
      <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
    </div>
  </div>
</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src={{asset('js/plugins/chart.js')}}></script>
<script type="text/javascript" src={{asset('js/plugins/jquery.vmap.min.js')}}></script>
<script type="text/javascript" src={{asset('js/plugins/jquery.vmap.world.js')}}></script>
<script type="text/javascript" src={{asset('js/plugins/jquery.vmap.sampledata.js')}}></script>
<script type="text/javascript">
      $(document).ready(function () {
        var data = {
          labels: ["January", "February", "March", "April", "May"],
          datasets: [
            {
              label: "My First dataset",
              fillColor: "rgba(220,220,220,0.2)",
              strokeColor: "rgba(220,220,220,1)",
              pointColor: "rgba(220,220,220,1)",
              pointStrokeColor: "#fff",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: [65, 59, 80, 81, 56]
            },
            {
              label: "My Second dataset",
              fillColor: "rgba(151,187,205,0.2)",
              strokeColor: "rgba(151,187,205,1)",
              pointColor: "rgba(151,187,205,1)",
              pointStrokeColor: "#fff",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(151,187,205,1)",
              data: [28, 48, 40, 19, 86]
            }
          ]
        };
        var ctxl = $("#lineChartDemo").get(0).getContext("2d");
        var lineChart = new Chart(ctxl).Line(data);

        var map = $('#demo-map');
        map.vectorMap({
          map: 'world_en',
          backgroundColor: '#fff',
          color: '#333',
          hoverOpacity: 0.7,
          selectedColor: '#666666',
          enableZoom: true,
          showTooltip: true,
          scaleColors: ['#C8EEFF', '#006491'],
          values: sample_data,
          normalizeFunction: 'polynomial'
        });
      });
    </script>
    @endsection