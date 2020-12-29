<?php

setcookie("rid", $_POST['rid']);
setcookie("parque", $_POST['parque']);
setcookie("mac", $_POST['mac']);
setcookie("ip", $_POST['ip']);
setcookie("username", $_POST['username']);
setcookie("link-login", $_POST['link-login']);
setcookie("link-orig", $_POST['link-orig']);
setcookie("error", $_POST['error']);
setcookie("chap-id", $_POST['chap-id']);
setcookie("chap-challenge", $_POST['chap-challenge']);
setcookie("link-login-only", $_POST['link-login-only']);
setcookie("link-orig-esc", $_POST['link-orig-esc']);

include('template/header.php');

?>
<header>
    <img class="logo" src="img/alcaldia.jpg" alt="Imagen Alcaldia">
</header>
<main class="contenedor">
    <div class="row">

        <div class="col-xl-6 col-md-6">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img\1580987699_917247_1580987870_noticia_normal.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img\barranquilla-celebra-en-casa-207-años-de-fundacion.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img\imagenBarraquilla.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6 " id="formularioTelefono">
            <form method="POST" class="formulario-contacto contenedor" id="phoneForm">
                <div class="form-group correo-electronico">
                    <label for="inputPassword4">Ingresa tu numero de telefono</label>
                    <input type="tel" name="inputTelefono" id="inputTelefono" class="form-control" placeholder="315000000" required>
                </div>
                <button type="submit" class="btn btn-lg btn-primary btn-block">Enviar Formulario</button>
            </form>
        </div>
    </div>

</main>


<?php

include('template/footer.php')

?>