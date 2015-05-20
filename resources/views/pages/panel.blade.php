@extends('app')

@section('content')
<!--Start Breadcrumb-->
<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.html">Home</a></li>
			<li><a href="#">Dashboard</a></li>
		</ol>
	</div>
</div>
<!--End Breadcrumb-->
<!--Start Dashboard 1-->
<div id="dashboard-header" class="row">
	<div class="col-xs-10 col-sm-10">
		<h3>{{-- Auth::user()->roles->first()->name --}} / {{-- Auth::user()->name --}} {{-- Auth:: user()->lastname --}}</h3>
	</div>


</div>
<!--End Dashboard 1-->

		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-bar-chart-o"></i>
					<span>Column Chart</span>
				</div>
		
				<div class="no-move"></div>
			</div>
			<div class="box-content">
				<div id="chart_div"></div>
			</div>

			


		</div>


<div style="height: 40px;"></div>



<!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

google.load('visualization', '1', {packages: ['corechart', 'bar']});
google.setOnLoadCallback(drawAxisTickColors);

function drawAxisTickColors() {
      var data = google.visualization.arrayToDataTable([
          ['Mes', 'Ventas totales\n PEN 1580', 'Gastos totales \n PEN 250'],
          ['Ene \n 2015', 1000, 400],
          ['Feb \n 2015', 1170, 460],
          ['Mar\n2015', 660, 1120],
          ['Abr \n 2015', 1030, 540],
          ['May \n 2015', 1030, 540],
          ['Jun \n 2015', 1030, 540],
          ['Jul \n 2015', 1030, 540],
          ['Ago \n 2015', 1030, 540],
          ['Set \n 2015', 800, 540],
          ['Otc \n 2015', 900, 540],
          ['Nov \n 2015', 1030, 540],
          ['Dic \n 2015', 1030, 540],
        ]);

      var options = {
        title: 'Balances de ventas vs Compras',
        focusTarget: 'category',
        legend: {
        	textStyle: {
        		fontSize:15,
        		color:'grey'
        	}
        },
        
        'height':500,
        hAxis: {
          title: 'Time of Day',
          format: '',
          viewWindow: {
            min: [20, 0, 0],
            max: [100, 0, 0]
          },
          textStyle: {
            fontSize: 14,
            color: '#053061',
            bold: true,
            italic: false
          },
          titleTextStyle: {
            fontSize: 18,
            color: '#053061',
            bold: true,
            italic: false
          }
        },
        vAxis: {
          title: 'Rating (scale of 1-10)',
          textStyle: {
            fontSize: 18,
            color: '#67001f',
            bold: false,
            italic: false
          },
          titleTextStyle: {
            fontSize: 18,
            color: '#67001f',
            bold: true,
            italic: false
          }
        }
      };

      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
    </script>

@endsection