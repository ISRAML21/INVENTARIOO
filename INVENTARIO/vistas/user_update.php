<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

<?php
	require_once "./php/main.php";

    $id = (isset($_GET['user_id_up'])) ? $_GET['user_id_up'] : 0;
    $id=limpiar_cadena($id);
?>
<div class="container is-fluid mb-6">
    <?php if($id==$_SESSION['id']){ ?>
    <h1 class="title">Mi cuenta</h1>
    <h2 class="subtitle">Actualizar datos de cuenta</h2>
    <?php }else{ ?>
    <h1 class="title">Usuarios</h1>
    <h2 class="subtitle">Actualizar usuario</h2>
    <?php } ?>
</div>

<div class="container pb-6 pt-6">

    ?>

    <?php


        /*== Verificando usuario ==*/
    	$check_usuario=conexion();
    	$check_usuario=$check_usuario->query("SELECT * FROM usuario WHERE usuario_id='$id'");

        if($check_usuario->rowCount()>0){
        	$datos=$check_usuario->fetch();
	?>

    <div class="form-rest mb-6 mt-6"></div>

    <form action="./php/usuario_actualizar.php" method="POST" class="form_newpro" autocomplete="off">

        <input type="hidden" name="usuario_id" value="<?php echo $datos['usuario_id']; ?>" required>

        <div class="columns">
            <div class="column">
                <div class="control_form">
                    <label class="produc_label">Nombre</label>
                    <input class="input_produc type=" text" name="usuario_nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}"
                        maxlength="40" required value="<?php echo $datos['usuario_nombre']; ?>">
                </div>
            </div>
            <div class="column">
                <div class="control_form">
                    <label class="produc_label">Apellidos</label>
                    <input class="input_produc type=" text" name="usuario_apellido"
                        pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required
                        value="<?php echo $datos['usuario_apellido']; ?>">
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="control_form">
                    <label class="produc_label">Usuario</label>
                    <input class="input_produc type=" text" name="usuario_usuario" pattern="[a-zA-Z0-9]{4,20}"
                        maxlength="20" required value="<?php echo $datos['usuario_usuario']; ?>">
                </div>
            </div>
            <div class="column">
                <div class="control_form">
                    <label class="produc_label">Email</label>
                    <input class="input_produc type=" email" name="usuario_email" maxlength="70"
                        value="<?php echo $datos['usuario_email']; ?>">
                </div>
            </div>
            <div class="column">
                <div class="control_form">
                    <label class="produc_label">Rol</label><br>
                    <div class="select_rol">
                        <select name="id_rol">
                            <?php
                        $_SESSION['rol'] == 2; // Esto es solo un ejemplo, debes obtener el valor real del rol del usuario

// Verificar si el id_rol es diferente de 2 (no es administrador)
if ($_SESSION['rol'] == 2) {

                            echo '<option class="button_select" value=" " selected=" ">Seleccione una opción</option>';
                            
                $cargo = conexion();
                $cargo = $cargo->query("SELECT * FROM cargo");
                if ($cargo->rowCount() > 0) {
                    $cargo = $cargo->fetchAll();
                    foreach ($cargo as $row) {
                        // Agregar una condición para permitir que solo el rol con ID 1 pueda cambiar
                        if ($row['id_rol'] == 2) {
                            echo '<option value="' . $row['id_rol'] . '">' . $row['rol'] . '</option>';
                        }
                    }
                }
            }else{
                echo '<option class="button_select" value=" " selected=" ">Seleccione una opción</option>';
                $cargo=conexion();
                $cargo=$cargo->query("SELECT * FROM cargo");
                if($cargo->rowCount()>0){
                    $cargo=$cargo->fetchAll();
                    foreach($cargo as $row){
                        echo '<option value="'.$row['id_rol'].'" >'.$row['rol'].'</option>';
                    }
                   }
            }
                $cargo = null;
                ?>


                        </select>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <p class="has-text-centered">
            Si NO desea actualizar la clave deje los campos vacíos.
        </p>
        <br>
        <div class="columns">
            <div class="column">
                <div class="control_form">
                    <label class="produc_label">Clave</label>
                    <input class="input_produc" type="password" name="usuario_clave_1" pattern="[a-zA-Z0-9$@.-]{7,100}"
                        maxlength="100">
                </div>
            </div>
            <div class="column">
                <div class="control_form">
                    <label class="produc_label">Repetir clave</label>
                    <input class="input_produc" type="password" name="usuario_clave_2" pattern="[a-zA-Z0-9$@.-]{7,100}"
                        maxlength="100">
                </div>
            </div>
        </div>
        <button type="button" id="showPasswords"> <img src="./img/pestanas.png" width="29px"></button>
        <script>
        const passwordInputs = document.querySelectorAll('input[type="password"]');
        const showPasswordsButton = document.getElementById('showPasswords');
        let passwordsVisible = false;

        showPasswordsButton.addEventListener('click', function() {
            passwordsVisible = !passwordsVisible;
            passwordInputs.forEach(input => {
                input.type = passwordsVisible ? 'text' : 'password';
            });

            showPasswordsButton.innerHTML = passwordsVisible ?
                '<img src="./img/ojos.png" width="29px">' :
                '<img src="./img/pestanas.png" width="29px">';
        });
        </script>

        <br><br><br>
        <p class="has-text-centered">
            Para poder actualizar los datos de este usuario por favor ingrese su USUARIO y CLAVE con la que ha iniciado
            sesión
        </p>
        <div class="columns">
            <div class="column">
                <div class="control_form">
                    <label class="produc_label">Usuario</label>
                    <input class="input_produc" type=" text" name="administrador_usuario" pattern="[a-zA-Z0-9]{4,20}"
                        maxlength="20" required>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="control_form">
                <label class="produc_label">Clave</label>
                <input class="input_produc" type="password" name="administrador_clave" pattern="[a-zA-Z0-9$@.-]{7,100}"
                    maxlength="100" required>
            </div>
            <button type="button" id="showPassword"><img src="./img/pestanas.png" width="29px"
                    alt="Mostrar/Ocultar"></button>



            <script>
            const passwordInput = document.querySelector(
                'input[name="administrador_clave"]');
            const showPasswordButton = document.getElementById('showPassword');

            showPasswordButton.addEventListener('click', function() {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    showPasswordButton.innerHTML =
                        '<img src="./img/ojos.png"  width="29px">';
                } else {
                    passwordInput.type = 'password';
                    showPasswordButton.innerHTML =
                        '<img src="./img/pestanas.png"  width="29px">';
                }
            });
            </script>


        </div>
        <p class="button_guardar">
            <button type="submit" class="button_produc">Actualizar</button>
        </p>
    </form>
    <?php 
		}else{
			include "./inc/error_alert.php";
		}
		$check_usuario=null;
	?>
</div>