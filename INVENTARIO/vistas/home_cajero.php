<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Document</title>
</head>


<body>
    <div>
        <h1 class="title_cajero">Papeleria "Los Muñes"</h1>
        <h2 class="subtitle_cajero">¡Bienvenido
            <?php echo "Cajero ".$_SESSION['usuario']; ?>!</h2>
        <img class="logo_cajero" src="./img/logo_cajero.png" width="100px">
    </div>

    <footer>
        <div class="footer-content">
            <p>© <?php echo date('Y'); ?> Todos los derechos reservados.</p>
            <p>InventaSOFT</p>
        </div>
    </footer>
</body>

</html>