<?php
session_start();
?>
<?php
include_once("cabecera.php");
?>
<?php
echo '<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Información del Proyecto</h1>
	</div>

	<div class="row">

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary border-bottom-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
								Numero de identificacion</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">' . $_SESSION['pro']['id'] . '</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-secondary border-bottom-secondary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
								Nombre</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">' . $_SESSION['pro']['nombre'] . '</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success border-bottom-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
								Fecha inicio</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">' . $_SESSION['pro']['fechaIni'] . '</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning border-bottom-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
								Fecha fin</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">' . $_SESSION['pro']['fechaFin'] . '</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Annual) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-danger border-bottom-danger shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
								Dias transcurridos</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">' . $_SESSION['pro']['diasTranscurridos'] . '</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Tasks Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-info border-bottom-info shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Porcentaje
							</div>
							<div class="row no-gutters align-items-center">
								<div class="col-auto">
									<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">' . $_SESSION['pro']['porcentaje'] . '%</div>
								</div>
								<div class="col">
									<div class="progress progress-sm mr-2">
										<div class="progress-bar bg-info" role="progressbar"
											style="width: ' . $_SESSION['pro']['porcentaje'] . '" aria-valuenow="50" aria-valuemin="0"
											aria-valuemax="100"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Pending Requests Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-dark border-bottom-dark shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
								Prioridad (1-5)</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">' . $_SESSION['pro']['prioridad'] . '</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>';

?>
<!-- Donut grafica en ver proyectos -->
<div class="col-xl-4 col-lg-5">
	<div class="card shadow mb-4">
		<!-- Card Header - Dropdown -->
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Grafico del proyecto</h6>
		</div>
		<!-- Card Body -->
		<div class="card-body">
			<div class="chart-pie pt-4">
				<canvas id="myPieChart"></canvas>
			</div>

		</div>
	</div>
</div>
<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<script>//javascript del grafico donut

	// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

let numPor =<?php echo $_SESSION['pro']['porcentaje'];?>;

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Incompleto","Completo"],
    datasets: [{
      data: [100-numPor, numPor],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
</script>




<?php
include_once("pie.php");
?>