<?php 
require_once "../controller/conexion.php";
session_start();
$username = $_SESSION['nombre'];
$dninumber = $_SESSION["documento"];
$statusname = $_SESSION["status"];
$date = $_SESSION["date_record"];
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,700&display=swap" rel="stylesheet">

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Dashboard - Cenda</title>
    <style>
        th i {
  display: inline-block;
  margin-left: 5px;
  vertical-align: middle;
  line-height: 1;
}
.table th {
  position: relative;
}

.table th i {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  right: 5px;
}
    </style>
</head>

<body>
    <div class="d-flex" id="content-wrapper">

        <!-- Sidebar -->
        <div id="sidebar-container" class="bg-primary">
            <div class="logo">
                <a href="index.php">
                    <img src="assets/img/cenda-footer.png" alt="logo_company">
                </a>
            </div>
            <div class="menu">
                <a href="index.php" class="d-block text-light p-3 border-0"><i class="icon ion-md-apps lead mr-2"></i>
                    Inicio</a>

                <a href="record.php" class="d-block text-light p-3 border-0"><i
                        class="icon ion-md-people lead mr-2"></i>
                    Registro</a>

                <a href="search.php" class="d-block text-light p-3 border-0"><i class="icon ion-md-stats lead mr-2"></i>
                    Consultar</a>
            </div>
        </div>
        <!-- Fin sidebar -->

        <div class="w-100">

            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container">

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $username; ?>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="exit.php">Cerrar sesión</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Fin Navbar -->

            <!-- Page Content -->
            <div id="content" class="bg-grey w-100">
                <div class="container-fluid">
                    <div class="row mt-3">
                        <div class="col-8">
                            <div class="card h-100">
                                <div class="card-body">
                                    <p class="info_card">
                                        Durante quince (15) años, CENDA, su Diagnósticentro Automotor, viene trabajando
                                        de la mano de DIOS, con templanza, y bajo PRINCIPIOS CORPORATIVOS EMPRESARIALES;
                                        nuestra experiencia crediticia en el sector de la REVISIÓN TÉCNICO MECÁNICA,
                                        corresponde a una revisión exhaustiva, certificando una movilidad responsable.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <p id="numbderdni"> <span class="font-weight-bold">Usuario desde:</span> <?php echo date('d/m/Y', strtotime($date)); ?></p>
                                    <p id="numbderdni" style="margin-top:-18px !important;">
                                       <span class="font-weight-bold"> Cedula:</span>
                                        <?php  echo $dninumber ?>
                                    </p>
                                    <?php
                                        if ($statusname == 1) {
                                            $status_text = 'Activo';
                                            $status_badge = 'badge badge-success badge-custom';
                                        } else {
                                            $status_text = 'Inactivo';
                                            $status_badge = 'badge badge-danger badge-custom';
                                        }
                                        ?>

                                        <p>
                                            <span class="<?php echo $status_badge ?>"><?php echo $status_text ?></span>
                                        </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table mt-3">
                                        <thead>
                                            <tr>
                                            <th scope="col">Placa <i class="fas fa-sort-up"></i><i class="fas fa-sort-down"></i></th>
                                                <th scope="col">Marca <i class="fas fa-sort-up"></i><i class="fas fa-sort-down"></i></th>
                                                <th scope="col">Modelo <i class="fas fa-sort-up"></i><i class="fas fa-sort-down"></i></th>
                                                <th scope="col">Tipo <i class="fas fa-sort-up"></i><i class="fas fa-sort-down"></i></th>
                                                <th scope="col">Fecha registro <i class="fas fa-sort-up"></i><i class="fas fa-sort-down"></i></th>
                                                <th scope="col">Fecha vencimiento <i class="fas fa-sort-up"></i><i class="fas fa-sort-down"></i></th>
                                                <th scope="col">Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            //Establecer la conexión a la base de datos
                                            require_once "../controller/conexion.php";

                                            //Obtener el documento del usuario en sesión
                                            $dninumber = $_SESSION["documento"];

                                            //Construir la consulta SQL
                                            $sql = "SELECT * FROM vehiculos WHERE documento = '$dninumber'";

                                            //Ejecutar la consulta
                                            $resultado = mysqli_query($conn, $sql);

                                            //Mostrar los resultados en la tabla HTML
                                            while($fila = mysqli_fetch_assoc($resultado)) { ?>
                                                <tr>
                                                    <td><?php echo $fila['placa']; ?></td>
                                                    <td><?php echo $fila['marca']; ?></td>
                                                    <td><?php echo $fila['modelo']; ?></td>
                                                    <td><?php echo $fila['tipo_vehiculo']; ?></td>
                                                    <td><?php echo date('d/m/Y', strtotime($fila['date_record'])); ?></td>
                                                    <td><?php echo date('d/m/Y', strtotime('+1 year', strtotime($fila['date_record']))); ?></td>
                                                    <?php
                                                            if ($fila['estado'] == 'en curso') {
                                                                $status_text = 'En curso';
                                                                $status_badge = 'badge badge-success badge-custom';
                                                            } elseif ($fila['estado'] == 'pausado') {
                                                                $status_text = 'Pausado';
                                                                $status_badge = 'badge badge-warning badge-custom';
                                                            } elseif ($fila['estado'] == 'finalizado') {
                                                                $status_text = 'Finalizado';
                                                                $status_badge = 'badge badge-primary badge-custom';
                                                            } else {
                                                                $status_text = 'Desconocido';
                                                                $status_badge = 'badge badge-secondary badge-custom';
                                                            }
                                                    ?>

                                                        <td><span class="<?php echo $status_badge; ?>"><?php echo $status_text; ?></span>
                                                </tr>
                                            <?php }

                                            //Cerrar la conexión a la base de datos
                                            mysqli_close($conn);
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
            <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Feb 2020', 'Mar 2020', 'Abr 2020', 'May 2020'],
                    datasets: [{
                        label: 'Nuevos usuarios',
                        data: [50, 100, 150, 200],
                        backgroundColor: [
                            '#12C9E5',
                            '#12C9E5',
                            '#12C9E5',
                            '#111B54'
                        ],
                        maxBarThickness: 30,
                        maxBarLength: 2
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
            </script>
</body>

</html>