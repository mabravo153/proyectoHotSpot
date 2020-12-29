<?php

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
                        <img src="img\Aleta_de_Junior.jpeg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img\barranquilla.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6 " id="formulario">
            <form method="POST" class="formulario-contacto contenedor" id="dataForm">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Nombre
                        </label>
                        <input type="text" maxlength="100" name="nombres" id="inputDataName" class="form-control" placeholder="Sus Nombres" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Apellidos</label>
                        <input type="text" maxlength="100" name="apellidos" id="inputDataLastName" class=" form-control" placeholder="Sus Apellidos" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Edad
                        </label>
                        <input type="text" maxlength="5" name="edad" id="inputDataAge" class="form-control" placeholder="Su Edad" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputDataSex">Sexo</label>
                        <select name='sexo' id="inputDataSex" class="form-control">
                            <option selected disabled>Selecciona...</option>
                            <option value="masculino">Masculino</option>
                            <option value="femenino">Femenino</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                </div>

                <div class="form-group correo-electronico">
                    <label for="inputPassword4">Correo Electronico</label>
                    <input type="email" maxlength="100" name="email" id="inputDataEmail" class="form-control" placeholder="name@email.com" required>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="tyc" id="inputDatatyc" value="off">
                    <label class="form-check-label" for="flexCheckDefault">
                        <a href="#">Acepta los terminos y condiciones</a>
                    </label>
                </div>

                <input type="hidden" name="telefono" value="<?php echo $_GET['phone'] ?>" id="inputDataPhone">
                <button type="submit" class="btn btn-lg btn-primary btn-block">Enviar Formulario</button>
            </form>
        </div>
    </div>

</main>


<?php

include('template/footer.php')

?>