<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
    session_destroy();
?>
<script>
        Swal.fire({
            title: 'Sesión cerrada',
            text: 'Has cerrado sesión exitosamente.',
            icon: 'success',
            confirmButtonText: 'OK',
            color: "black",
            background: "#fff",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = 'index.php';
            }
        });
    </script>
</body>
</html>