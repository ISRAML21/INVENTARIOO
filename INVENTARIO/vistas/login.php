<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/styles.css">

</head>

<body>
    <div class="cabecera">
        <h1 class="cabecera_title">Papeleria "Los Muñes"</h1>
    </div>



    <div class="container_principal">

        <div class="card">
            <img src="img/login.png" width="400px">
            <nav>
                <ul>
                    <li><a href="#"></a></li>
                </ul>
            </nav>
        </div>

        <div class="form_login">
            <form class="form" action="" method="POST" autocomplete="off">
                <h1 class="form_title"> Inicio de sesion</h1>

                <div class="form_cointainer">
                    <div class="form_group">
                        <input class="form_input" type="text" name="login_usuario" placeholder=" "
                            pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required>
                        <label class="form_label">Usuario</label>
                        <span class="form_line"></span>
                    </div>

                    <div class="form_group">
                        <input class="form_input" type="password" name="login_clave" placeholder=" "
                            pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required>
                        <label class="form_label">Clave</label>
                        <span class="form_line"></span>
                    </div>

                    <input type="submit" class="form_submit" value="Iniciar sesion">

                    <?php
		if(isset($_POST['login_usuario']) && isset($_POST['login_clave'])){
			require_once "./php/main.php";
			require_once "./php/iniciar_sesion.php";
		}
	?>
                </div>
            </form>
        </div>
    </div>
    <footer>
        <div class="footer-content">
            <p>© <?php echo date('Y'); ?> Todos los derechos reservados.</p>
            <p>InventaSOFT</p>
        </div>
    </footer>
</body>

</html>