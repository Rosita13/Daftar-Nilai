@extends('layouts.dashboard')
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
            </div>
          </div>
          <div class="widget-small info"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
            <div class="info">
              <h4>Likes</h4>
            </div>
          </div>
          <div class="widget-small danger"><i class="icon fa fa-comments-o fa-3x"></i>
            <div class="info">
              <h4>Comments</h4>
            </div>
          </div>
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>Uploades</h4>
            </div>
          </div>
        </div>
       
<div class="col-md-9">
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