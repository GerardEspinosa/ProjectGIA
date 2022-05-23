Swal.fire({
    title: '¡Enhorabuena!',
    text: 'Servicio contratado con exito',
    icon: 'success',
    confirmButtonText: 'Ok',
    allowOutsideClick: false
}).then((result) => {
    if (result.isConfirmed) {
        window.location.href = "userPanel.php";
    }
})


