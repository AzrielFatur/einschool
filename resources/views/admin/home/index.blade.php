@extends('layouts.EinApp')

@section('content')
        <div class="row panel">

          <div class="col-sm-4">
            <div class="card sub-panel">
              <div class="card-body">
                <img src="storage/vendor/image/Students.png" class="float-left">
                <div class="detail-panel">
                  {{$student}}<p class="type">Total Student</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="card sub-panel">
              <div class="card-body">
                <img src="storage/vendor/image/Class.png" class="float-left">
                <div class="detail-panel">
                    {{$grade}}<p class="type">Total Class</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="card sub-panel">
              <div class="card-body">
                <img src="storage/vendor/image/Teach.png" class="float-left">
                <div class="detail-panel">
                    {{$teacher}}<p class="type">Total Teachers</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- <div class="row">
          <div class="col-sm-8">
          <div class="card">
            <div id="linechart" width="100%;"></div>
          </div>
          </div>
        </div> -->

    @section('script')
    <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        var jsonResult = <?= $jsonResult; ?>;
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable(jsonResult);

        var options = {
          title: 'Students Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('linechart'));

        chart.draw(data, options);
      }
    </script> -->
    <!-- <script type="text/javascript">
          var jsonResult = <?= $jsonResult; ?>;
          console.log(jsonResult);
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
              var data = google.visualization.arrayToDataTable(jsonResult);


              var options = {
                title: 'Company Performance',
                curveType: 'function',
                legend: { position: 'bottom' }
              };

              var chart = new google.visualization.LineChart(document.getElementById('linechart'));

              chart.draw(data, options);
            }

    </script> -->
    @endsection
@endsection