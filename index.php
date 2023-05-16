<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/estilos.css" />
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Inicio</title>
</head>

<body>
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="card custom-height" style="box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3) !important;">
            <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
                <li class="nav-item w-50 text-center">
                    <a class="nav-link active btl" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                        aria-controls="pills-home" aria-selected="true">Placa</a>
                </li>
                <li class="nav-item w-50 text-center">
                    <a class="nav-link btr" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                        aria-controls="pills-profile" aria-selected="false">Documento</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="form px-4 pt-5 pb-0">
                        <form id="plateForm">
                            <input type="text" class="form-control" placeholder="Número de placa" autocomplete="off"
                                id="numberPlate" />
                            <input type="password" class="form-control" placeholder="Contraseña" autocomplete="off"
                                id="password" />
                            <button type="button" class="btn btn-dark  enter d-block mx-auto my-auto"
                                onclick="plateButton()">Acceder</button>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="form px-4 pt-5 pb-0">
                        <form method="post" id="documentForm">
                            <input type="text" class="form-control" placeholder="Número de documento" autocomplete="off"
                                id="numberDocument" />
                            <input type="password" class="form-control" placeholder="Contraseña" autocomplete="off"
                                id="passwordIdentify" />
                            <button type="button" class="btn btn-dark enter d-block mx-auto my-auto"
                                onclick="documentButton()">Acceder</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/sweetalert2.all.min.js"></script>
    <script src="assets/js/functions/fields.js"></script>
    
    <script>
        const plateButton = async () => {
        var dniplate = document.querySelector("#numberPlate").value;
        var passwordplate = document.querySelector("#password").value;

        if (dniplate.trim() === "" || passwordplate.trim() === "") {
            Swal.fire({
                icon: "error",
                text: "Por favor complete los campos vacíos!",
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#0c4cbb",
            });

            if (dniplate.trim() === "") {
                document.querySelector("#numberPlate").style.border = "1px solid red";
            }
            if (passwordplate.trim() === "") {
                document.querySelector("#password").style.border = "1px solid red";
            }
            return;
        }

        const datos = new FormData();
        datos.append("numberPlate", dniplate);
        datos.append("password", passwordplate);

        var respuesta = await fetch("controller/plate.php", {
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
            document.querySelector("#plateForm").reset();

            // Delay the redirection by a few seconds
            setTimeout(function () {
                window.location.href = "admin/indexplate.php";
            }, 1000); // 3000 milliseconds = 3 seconds
        } else {
            Swal.fire({
                icon: "error",
                text: resultado.message,
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#0c4cbb",
            });
            document.querySelector("#plateForm").reset();
            }
        };
    </script>


    <script>
        const documentButton = async () => {
        var dni = document.querySelector("#numberDocument").value;
        var passwordni = document.querySelector("#passwordIdentify").value;

        if (dni.trim() === "" || passwordni.trim() === "") {
            Swal.fire({
                icon: "error",
                text: "Por favor complete los campos vacíos!",
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#0c4cbb",
            });
              
            if (dni.trim() === "") {
                document.querySelector("#numberDocument").style.border = "1px solid red";
            }
            if (passwordni.trim() === "") {
                document.querySelector("#passwordIdentify").style.border = "1px solid red";
            }
            return;
        }

        const datos = new FormData();
        datos.append("numberDocument", dni);
        datos.append("passwordIdentify", passwordni);

        var respuesta = await fetch("controller/document.php", {
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