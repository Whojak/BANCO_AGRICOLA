
    function validarFormulario() {
    var nombre = document.getElementById("nombre").value;
    var apellido = document.getElementById("apellido").value;
    var dui = document.getElementById("dui").value;
    var telefono = document.getElementById("numero_tel").value;
    var correo = document.getElementById("correo").value;
    var contrasena = document.getElementById("contrasena").value;
    var rol = document.getElementById("rol").value;

    // Expresiones regulares
    var expNombreApellido = /^[a-zA-Z\s]+$/;
    var expDui = /^\d{8}-\d{1}$/;
    var expTelefono = /^\d{4}-\d{4}$/;
    var expContrasena = /^(?=.*[A-Z])(?=.*[@]).{4,}$/;
    var expCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!expNombreApellido.test(nombre) || !expNombreApellido.test(apellido)) {
        alert("Nombre y apellido deben contener solo letras.");
    return false;
    }

    if (!expDui.test(dui)) {
        alert("El DUI debe tener el formato 00000000-0.");
    return false;
    }

    if (!expTelefono.test(telefono)) {
        alert("El teléfono debe tener el formato 0000-0000.");
    return false;
    }

    if (!expContrasena.test(contrasena)) {
        alert("La contraseña debe contener al menos una mayúscula, un @ y tener más de 4 caracteres.");
    return false;
    }

    if (!expCorreo.test(correo)) {
        alert("El correo electrónico no tiene un formato válido.");
    return false;
    }

    return true;
  }
