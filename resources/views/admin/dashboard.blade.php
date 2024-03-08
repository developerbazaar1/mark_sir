@extends('admin.layouts.header')
@section('styles')
    
@endsection
@section('content')

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-speedometer"></i> Dashboard</h1>
         
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
          <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa-light fa-users fs-1"></i>
            <div class="info">
              <h4>Total Users</h4>
              <p><b>7800</b></p>
            </div>
          </div>
        </div>
       
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon  fa-light fa-face-smile-beam fs-1"></i>
            <div class="info">
              <h4>Active User</h4>
              <p><b>10</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class= "icon fa-light fa-face-dizzy"></i>
            <div class="info">
              <h4>Inactive</h4>
              <p><b>500</b></p>
            </div>
          </div>
        </div>
         <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa-light fa-link fs-1"></i>
            <div class="info">
              <h4>Total Url link</h4>
              <p><b>1205</b></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Monthly Users</h3>
            <div class="ratio ratio-16x9">
              <canvas id="salesChart"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-6 overflow-hidden">
          <div class="tile">
            <h3 class="tile-title">Traffic Report</h3>
            <div class="ratio ratio-16x9 d-flex justify-content-center">
              <center> <canvas id="supportRequestChart"></canvas></center>
            </div>
          </div>
        </div>
      </div>
    </main>
   

 
@endsection
@section('scripts')     

<script type="text/javascript" src="{{ URL::asset('admin-assets/js/plugins/chart.js') }}"></script>
<script type="text/javascript">
  const salesData = {
    type: "line",
    data: {
      labels: [
        "Jan",
        "Feb",
        "March",
        "April",
        "May",
        "June",
      ],
      datasets: [{
        label: 'Monthly Sales',
        data: [65, 59, 80, 81, 56, 55, 40],
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
      }]
    }
  }
  
  const supportRequests = {
    type: "doughnut",
    data: {
      labels: [
        'Instagram',
        'Amazon',
        'Blogs'
      ],
      datasets: [{
        label: 'Support Requests',
        data: [300, 50, 100],
        backgroundColor: [
          '#EFCC00',
          '#5AD3D1',
          '#FF5A5E'
        ],
        hoverOffset: 4
      }]
    }
  };
  
  const salesChartCtx = document.getElementById('salesChart');
  new Chart(salesChartCtx, salesData);
  
  const supportChartCtx = document.getElementById('supportRequestChart');
  new Chart(supportChartCtx, supportRequests);
</script>
@endsection
    