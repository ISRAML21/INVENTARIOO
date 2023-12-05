<div class="container is-fluid mb-6">
    <h2 class="subtitle">Nuevo usuario</h2>
</div>
<?php
		require_once "./php/main.php";
	?>
<div class="container">


    <form action="./php/usuario_guardar.php" method="POST" class="form_newpro" autocomplete="off">
        <div class="columns">
            <div class="column">
                <div class="control_form">
                    <label>Nombre</label>
                    <input class="input_produc" type="text" name="usuario_nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}"
                        maxlength="40" required>
                </div>
            </div>
            <div class="column">
                <div class="control_form">
                    <label class="produc_label">Apellidos</label>
                    <input class="input_produc" type="text" name="usuario_apellido"
                        pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="control_form">
                    <label class="produc_label">Usuario</label>
                    <input class="input_produc" type="text" name="usuario_usuario" pattern="[a-zA-Z0-9]{4,20}"
                        maxlength="20" required>
                </div>
            </div>
            <div class="column">
                <div class="control_form">
                    <label class="produc_label">Email</label>
                    <input class="input_produc" type="email" name="usuario_email" maxlength="70">
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="control_form">
                    <label class=" produc_label">Clave</label>
                    <input class="input_produc" type="password" name="usuario_clave_1" pattern="[a-zA-Z0-9$@.-]{7,100}"
                        maxlength="100" required>
                </div>
            </div>
            <div class="column">
                <div class="control_form">
                    <label class="produc_label">Repetir clave</label>
                    <input class="input_produc" type="password" name="usuario_clave_2" pattern="[a-zA-Z0-9$@.-]{7,100}"
                        maxlength="100" required>
                </div>
            </div>
            <div class="column">
                <div class="control_form">
                    <label class="produc_label">Rol</label><br>
                    <div class="select_rol">
                        <select name="id_rol">
                            <option class="button_select" value=" " selected=" ">Seleccione una opción</option>

                            <?php
    						$cargo=conexion();
    						$cargo=$cargo->query("SELECT * FROM cargo");
    						if($cargo->rowCount()>0){
    							$cargo=$cargo->fetchAll();
    							foreach($cargo as $row){
    								echo '<option value="'.$row['id_rol'].'" >'.$row['rol'].'</option>';
				    			}
				   			}
				   			$cargo=null;
				    	?>
                        </select>
                    </div>
                </div>
            </div>
        </div>



        <p class="button_guardar">
            <button type="submit" class="button_produc">Guardar</button>
        </p>
    </form>
</div>