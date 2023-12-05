<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Document</title>
</head>

<body>
    <div class="container is-fluid">
        <h1 class="title">Papeleria "Los Muñes"</h1>
        <h2 class="subtitle">¡Bienvenido
            <?php  echo "Administrador" . " " .$_SESSION['usuario']; ?>!</h2>
        <img class="logo_cajero" src="./img/logo_admin.png" width="100px">
    </div>

    <footer>
        <div class="footer-content">
            <p>© <?php echo date('Y'); ?> Todos los derechos reservados.</p>
            <p>InventaSOFT</p>
        </div>
    </footer>
</body>

</html>