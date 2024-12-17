if (document.addEventListener) {
    window.addEventListener("load", inicio);
} else if (document.attachEvent) {
    window.attachEvent("onload", inicio);
}

function inicio() {
    let botonIngreso = document.getElementById("guardar-ingreso");
    if (document.addEventListener) {
        botonIngreso.addEventListener("click", procesarIngreso);
    } else if (document.attachEvent) {
        botonIngreso.attachEvent("onclick", procesarIngreso);
    }
    let botonGasto = document.getElementById("guardar-gasto");
    if (document.addEventListener) {
        botonGasto.addEventListener("click", procesarGasto);
    } else if (document.attachEvent) {
        botonGasto.attachEvent("onclick", procesarGasto);
    }
}

function procesarGasto(event) {
    event.preventDefault();
    
    // Obtener datos del formulario
    const empresa = document.getElementById("empresa").value.trim();
    const numeroFactura = document.getElementById("numero_factura").value.trim();
    const tipoIVA = document.querySelector("input[name='iva']:checked").value;
    const fecha = document.getElementById("fecha").value;
    const importeSinIVA = parseFloat(document.getElementById("importe").value);
    let iva;

    // Calcular IVA según el tipo seleccionado
    if (tipoIVA == "iva21") {
        iva = importeSinIVA * 0.21;
    } else if (tipoIVA == "iva10") {
        iva = importeSinIVA * 0.10;
    }

    // Preparar los datos para el envío
    const formData = new FormData();
    formData.append("numero_factura", numeroFactura);
    formData.append("empresa", empresa);
    formData.append("iva", iva);
    formData.append("fecha", fecha);
    formData.append("importe", importeSinIVA);
    

    // Realizar la solicitud al servidor
    fetch('../controllers/altaGasto.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(message => {
        // Mostrar mensaje de éxito
        alert(message);
        // Limpiar los campos del formulario
        document.getElementById('formulario-gastos').reset();
    })
    .catch(error => {
        // Mostrar mensaje de error si ocurre algún problema
        console.error('Error:', error);
    });
}
function procesarIngreso(event) {
    event.preventDefault();
    
    // Obtener datos del formulario
    const empresa = document.getElementById("empresa").value.trim();
    const numeroFactura = document.getElementById("numero_factura").value.trim();
    const tipoIVA = document.querySelector("input[name='iva']:checked").value;
    const fecha = document.getElementById("fecha").value;
    const importeSinIVA = parseFloat(document.getElementById("importe").value);
    let iva;

    // Calcular IVA según el tipo seleccionado
    if (tipoIVA == "iva21") {
        iva = importeSinIVA * 0.21;
    } else if (tipoIVA == "iva10") {
        iva = importeSinIVA * 0.10;
    }

    // Preparar los datos para el envío
    const formData = new FormData();
    formData.append("empresa", empresa);
    formData.append("numero_factura", numeroFactura);
    formData.append("iva", iva);
    formData.append("fecha", fecha);
    formData.append("importe", importeSinIVA);
    

    // Realizar la solicitud al servidor
    fetch('../controllers/altaIngreso.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(message => {
        // Mostrar mensaje de éxito
        alert(message);
        // Limpiar los campos del formulario
        document.getElementById('formulario-gastos').reset();
    })
    .catch(error => {
        // Mostrar mensaje de error si ocurre algún problema
        console.error('Error:', error);
    });
}