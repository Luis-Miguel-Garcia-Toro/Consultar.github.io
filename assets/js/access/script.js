const plateButton = async () => {
    var dniplate = document.querySelector("#numberPlate").value;
    var passwordplate = document.querySelector("#password").value;

    if (dniplate.trim() === "" || passwordplate.trim() === "") {
        Swal.fire({
            icon: "error",
            text: "Por favor complete los campos vacios!",
            confirmButtonText: "Aceptar",
            confirmButtonColor: "#0c4cbb",
        });
        return;
    }

    if (!validatePlate(dniplate)) {
        Swal.fire({
            icon: "error",
            text: "La placa ingresada no tiene un formato valido!",
            confirmButtonText: "Aceptar",
            confirmButtonColor: "#0c4cbb",
        });
        return;
    }

    const datos = new FormData();
    datos.append("numberPlate", dniplate);
    datos.append("password", passwordplate);

    var respuesta = await fetch("../../../controller/plate.php", {
        method: "POST",
        body: datos,
    });

    var resultado = await respuesta.json();

    if(resultado.success==true){
        Swal.fire({
            icon: "error",
            text: resultado.message,
            confirmButtonText: "Aceptar",
            confirmButtonColor: "#0c4cbb",
        });
        document.querySelector("#plateForm").reset();

    }else{
        Swal.fire({
            icon: "success",
            text: resultado.message,
            confirmButtonText: "Aceptar",
            confirmButtonColor: "#0c4cbb",
        });
        document.querySelector("#plateForm").reset();
    }
};
