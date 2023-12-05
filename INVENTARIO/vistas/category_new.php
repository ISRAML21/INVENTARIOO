<div class="container">

    <h2 class="subtitle">Nueva categoría</h2>
</div>

<div class="container">


    <form action="./php/categoria_guardar.php" method="POST" class="form_newpro" autocomplete="off">
        <div class="columns">
            <div class="column">
                <div class="control_form">
                    <label class="produc_label">Nombre</label>
                    <input class="input_produc" type="text" name="categoria_nombre"
                        pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{4,50}" maxlength="50" required>
                </div>
            </div>
            <div class="column">
                <div class="control_form">
                    <label class="produc_label">Ubicación</label>
                    <input class="input_produc" type="text" name="categoria_ubicacion"
                        pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{5,150}" maxlength="150">
                </div>
            </div>
        </div>
        <p class="button_guardar">
            <button type="submit" class="button_produc">Guardar</button>
        </p>


        <script>
        function mostrarMensaje() {
            var mensaje = document.getElementById("mensajeEmergente");
            mensaje.style.display = "block"; // Mostrar el mensaje emergente
            setTimeout(function() {
                mensaje.style.display = "none"; // Ocultar el mensaje después de unos segundos
            }, 3000); // Cambia este valor (en milisegundos) para ajustar el tiempo que el mensaje estará visible
        }
        </script>
    </form>
</div>