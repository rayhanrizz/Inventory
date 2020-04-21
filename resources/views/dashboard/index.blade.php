@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>

  <div class="section-body">
  	<div class="row">
  	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-fire"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Fakultas</h4>
                  </div>
                  <div class="card-body">
                    {{$count}}
                  </div>
                </div>
              </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Jurusan</h4>
                  </div>
                  <div class="card-body">
                    {{$jur}}
                  </div>
                </div>
              </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                  <i class="far fa-square"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Ruangan</h4>
                  </div>
                  <div class="card-body">
                    {{$ruang}}
                  </div>
                </div>
              </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-gift"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Barang</h4>
                  </div>
                  <div class="card-body">
                    {{$brg}}
                  </div>
                </div>
              </div>
        </div>
    </div>
        <div class="col-md-10">
      <div style="font-size: 25px;">
        <script type='text/javascript'>
          <!--
          var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
          var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
          var date = new Date();
          var day = date.getDate();
          var month = date.getMonth();
          var thisDay = date.getDay(),
              thisDay = myDays[thisDay];
          var yy = date.getYear();
          var year = (yy < 1000) ? yy + 1900 : yy;
          document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
          //-->
        </script>
        <div id="clock"></div>
        <script type="text/javascript">
        <!--
        function showTime() {
            var a_p = "";
            var today = new Date();
            var curr_hour = today.getHours();
            var curr_minute = today.getMinutes();
            var curr_second = today.getSeconds();
            if (curr_hour < 12) {
                a_p = "AM";
            } else {
                a_p = "PM";
            }
            if (curr_hour == 0) {
                curr_hour = 12;
            }
            if (curr_hour > 12) {
                curr_hour = curr_hour - 12;
            }
            curr_hour = checkTime(curr_hour);
            curr_minute = checkTime(curr_minute);
            curr_second = checkTime(curr_second);
         document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
            }
     
        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }
        setInterval(showTime, 500);
        //-->
        </script>
      </div>
</div>
  </div>

</section>
@endsection()