@extends('layouts.backend')

@section('content')

	<div class="content__main">
    <div class="row">
		    <div class="column column--12">
		        <h2 class="title-page__title">Google Analytics</h2>
		    </div>
		</div>

		<div class="row -spacing-a">
	    <div class="column column--12">
	    	<hr class="divider" />	
	    </div>
    </div>
    
    <div class="row">
      <div class="column column--12 column--m-6 -spacing-a">
        <div class="chart">
          <canvas id="barChart" style="height:250px"></canvas>
        </div>
      </div>
      <div class="column column--12 column--m-6 -spacing-a">
        <div class="chart">
          <canvas id="pieChart" style="height:250px"></canvas>
          <div class="chart-legends"></div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
  <script>
    $(function () {
      // Get context with jQuery - using jQuery's .get() method.
      var barChartCanvas = $("#barChart").get(0).getContext("2d");
      
      // This will get the first returned node in the jQuery collection.
      var barChart = new Chart(barChartCanvas);
      var barChartData = {
        labels: {!! json_encode($dates->map(function($date) { return $date->format('d/m'); })) !!},
        datasets: [
          {
            label: "Seitenansichten",
            borderColor: "rgba(8, 124, 124, 1)",
            backgroundColor: "rgba(8, 124, 124, .7)",
            data: {!! json_encode($pageViews) !!}
          },
          {
            label: "Besucher",
            borderColor: "rgba(69, 123, 140, 1)",
            backgroundColor: "rgba(69, 123, 140, .7)",
            data: {!! json_encode($visitors) !!}
          }
        ]
      };

      // var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
      // var pieChart = new Chart(pieChartCanvas);
      // var PieData = {
      //   labels: {!! json_encode($dates->map(function($date) { return $date->format('d/m'); })) !!},
      //   datasets: [
      //     {
      //       label: "Browser",
      //       borderColor: "rgba(8, 124, 124, 1)",
      //       backgroundColor: "rgba(8, 124, 124, .7)",
      //       data: {!! json_encode($browserjson) !!}
      //     }
      //   ]
      // };

      new Chart(barChartCanvas, {
          type: "bar",
          data: barChartData
      });

      // new Chart(pieChartCanvas, {
      //   type : "pie",
      //   data: PieData

      // });
    });
  </script>
@endpush