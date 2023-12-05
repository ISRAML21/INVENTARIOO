<div class="container is-fluid mb-6">
    <h2 class="subtitle">Nuevo producto</h2>
</div>

<div class="container pb-6 pt-6">
    <?php
		require_once "./php/main.php";
	?>


    <form action="./php/producto_guardar.php" method="POST" class="form_newpro" autocomplete="off"
        enctype="multipart/form-data">
        <div class="columns">
            <div class="column">
                <div class="control_form">
                    <label class="produc_label">Código de barra</label>
                    <input class="input_produc" type="text" name="producto_codigo" pattern="[a-zA-Z0-9- ]{1,70}"
                        maxlength="70" required>
                </div>
            </div>
            <div class="column">
                <div class="control_form">
                    <label class="produc_label">Nombre</label>
                    <input class="input_produc" type="text" name="producto_nombre"
                        pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" maxlength="70" required>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="control_form">
                    <label class="produc_label">Precio</label>
                    <input class="input_produc" type="text" name="producto_precio" pattern="[0-9.]{1,25}" maxlength="25"
                        required>
                </div>
            </div>
            <div class="column">
                <div class="control_form">
                    <label class="produc_label">Stock</label>
                    <input class="input_produc" type="text" name="producto_stock" pattern="[0-9]{1,25}" maxlength="25"
                        required>
                </div>
            </div>
            <div class="column">
                <div class="control_form">
                    <label class="produc_label">Categoría</label><br>
                    <div class="select_produc">
                        <select name="producto_categoria">
                            <option class="button_select" value=" " selected=" ">Seleccione una opción</option>
                            <?php
    						$categorias=conexion();
    						$categorias=$categorias->query("SELECT * FROM categoria");
    						if($categorias->rowCount()>0){
    							$categorias=$categorias->fetchAll();
    							foreach($categorias as $row){
    								echo '<option value="'.$row['categoria_id'].'" >'.$row['categoria_nombre'].'</option>';
				    			}
				   			}
				   			$categorias=null;
				    	?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="control_form">
                <label class="produc_label">Imagen del producto</label>
                <div class="file is-small has-name">
                    <label class="file-label">
                        <input class="input_img" type="file" accept="jpg" name="producto_foto"
                            accept=".jpg, .png, .jpeg">

                    </label>
                </div>
            </div>
        </div>
        <div>
            <p class="button_guardar">
                <button type="submit" class="button_produc">Guardar</button>
            </p>
        </div>
    </form>

</div>