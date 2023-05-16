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
    <link rel="stylesheet" href="../assets/css/sweetalert2.min.css">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,700&display=swap" rel="stylesheet">

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Dashboard - Cenda</title>
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
                        <div class="col-12">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <p class="info_card">
                                            Para iniciar el proceso de la revisión técnicomecánica, debes registrar tu vehículo en nuestro sistema proporcionando información como la placa, marca, modelo y tipo de vehículo. Una vez registrado, podrás generar una solicitud para programar una cita en un centro de inspección autorizado para llevar a cabo la revisión.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <div class="col-12 mt-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <form id="recordid">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inputAddress2">Documento</label>
                                                <input type="text" class="form-control" id="dni" value="<?php  echo $dninumber?>" readonly>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputEmail4">Placa</label>
                                                <input type="text" class="form-control" id="plate" placeholder="ABC-123">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputPassword4">Marca</label>
                                                <input type="text" class="form-control" id="brand" placeholder="Ktm">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputAddress">Modelo</label>
                                                <input type="text" class="form-control" id="model" placeholder="2023">
                                            </div>
                                            <div class="form-group col-md-6 d-flex align-items-end">
                                                <div class="form-group align-self-end">
                                                    <label for="inputFile">Foto vehículo</label>
                                                    <input type="file" class="form-control-file" id="img">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputAddress2">Tipo</label>
                                                <select name="" id="type" class="form-control">
                                                    <option value="Moto">Motos</option>
                                                    <option value="Livianos">Livianos</option>
                                                    <option value="Pesados">Pesados</option>
                                                    <option value="Motocarro">Motocarro</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6 d-flex align-items-end">
                                                <div class="form-group align-self-end">
                                                    <label for="inputFile">Tarjeta propiedad</label>
                                                    <input type="file" class="form-control-file" id="card">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAddress2">Estado</label>
                                            <select name="" id="status" class="form-control">
                                                <option value="En curso">En curso</option>
                                                <option value="Pausado">Pausado</option>
                                                <option value="Finalizado">Finalizado</option>
                                            </select>
                                        </div>
                                        <button type="button" class="btn btn-primary" onclick="record()">Registrar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../assets/js/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>


    <script>
        const record = async () => {
        var dninumber = document.querySelector("#dni").value;
        var platenumber = document.querySelector("#plate").value;
        var brandvehicle = document.querySelector("#brand").value;
        var modelvehicle = document.querySelector("#model").value;
        var imgvehicle = document.querySelector("#img").value;
        var typevehicle = document.querySelector("#type").value;
        var cardvehicle = document.querySelector("#card").value;
        var statusvehicle = document.querySelector("#status").value;

        if (platenumber.trim() === "" || brandvehicle.trim() === "" || modelvehicle.trim() === "" 
        || imgvehicle.trim() === "" || typevehicle.trim() === "" || cardvehicle.trim() === ""
        || statusvehicle.trim() === "" ) {
            Swal.fire({
                icon: "error",
                text: "Por favor complete los campos vacíos!",
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#0c4cbb",
            });
              
            if (platenumber.trim() === "") {
                document.querySelector("#plate").style.border = "1px solid red";
            }
            if (brandvehicle.trim() === "") {
                document.querySelector("#brand").style.border = "1px solid red";
            }

            if (modelvehicle.trim() === "") {
                document.querySelector("#model").style.border = "1px solid red";
            }
            return;
        }

        const datos = new FormData();
        datos.append("dni", dninumber);
        datos.append("plate", platenumber);
        datos.append("brand", brandvehicle);
        datos.append("model", modelvehicle);
        datos.append("img", imgvehicle);
        datos.append("type", typevehicle);
        datos.append("card", cardvehicle);
        datos.append("status", statusvehicle);

        var respuesta = await fetch("../controller/application.php", {
            method: "POST",
            body: datos,
        });

        var resultado = await respuesta.json();

        if (resultado.success == true) {
            Swal.fire({
                icon: "success",
                text: resultado.message,
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#0c4cbb",
            });
            document.querySelector("#documentForm").reset();
            setTimeout(function () {
                window.location.href = "admin/index.php";
            },1000);
        } else {
            Swal.fire({
                icon: "error",
                text: resultado.message,
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#0c4cbb",
            });
            document.querySelector("#documentForm").reset();
            }
        };
    </script>
</body>

</html>