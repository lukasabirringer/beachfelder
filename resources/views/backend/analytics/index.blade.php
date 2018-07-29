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
      <div class="column column--12 -spacing-a">
        <div class="chart">
          <canvas id="areaChart" style="height:250px"></canvas>
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
    var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var areaChart = new Chart(areaChartCanvas);

    var areaChartData = {
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

      new Chart(areaChartCanvas , {
          type: "bar",
          data: areaChartData
      });
    });
  </script>
@endpush