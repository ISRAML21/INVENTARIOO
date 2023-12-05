<?php
    /*== Almacenando datos ==*/
    $usuario = limpiar_cadena($_POST['login_usuario']);
    $clave = limpiar_cadena($_POST['login_clave']);

    /*== Verificando campos obligatorios ==*/
    if ($usuario == "" || $clave == "") {
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
        exit();
    }

    /*== Verificando integridad de los datos ==*/
    if (verificar_datos("[a-zA-Z0-9]{4,20}", $usuario)) {
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                El USUARIO no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    if (verificar_datos("[a-zA-Z0-9$@.-]{7,100}", $clave)) {
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                Las CLAVE no coinciden con el formato solicitado
            </div>
        ';
        exit();
    }

    $check_user = conexion();
    $check_user_query = $check_user->query("SELECT * FROM usuario WHERE usuario_usuario='$usuario'");
    if ($check_user_query->rowCount() == 1) {
        $check_user_data = $check_user_query->fetch();

        if ($check_user_data['usuario_usuario'] == $usuario && password_verify($clave, $check_user_data['usuario_clave'])) {
            $_SESSION['id'] = $check_user_data['usuario_id'];
            $_SESSION['nombre'] = $check_user_data['usuario_nombre'];
            $_SESSION['apellido'] = $check_user_data['usuario_apellido'];
            $_SESSION['usuario'] = $check_user_data['usuario_usuario'];
            $_SESSION['rol'] = $check_user_data['id_rol'];

            if ($_SESSION['rol'] == 1) {
                if (headers_sent()) {
                    echo "<script> window.location.href='index.php?vista=home'; </script>";
                } else {
                    header("Location: index.php?vista=home");
                }
            } elseif ($_SESSION['rol'] == 2) {
                if (headers_sent()) {
                    echo "<script> window.location.href='index.php?vista=home_cajero'; </script>";
                } else {
                    header("Location: index.php?vista=home_cajero");
                }
            }
        } else {
            echo '
                <div class="notification is-danger is-light">
                    <strong>¡Ocurrió un error inesperado!</strong><br>
                    Usuario o contraseña incorrectos
                </div>
            ';
        }
    } else {
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrió un error inesperado!</strong><br>
                Usuario o contraseña incorrectos
            </div>
        ';
    }

    $check_user = null;
?>