<?php

include('template/header.php');

?>
<header>
  <img class="logo" src="img/alcaldia.jpg" alt="Imagen Alcaldia" />
</header>
<main class="contenedor">
  <div class="row justify-content-center separacion-logo">

    <div class="col-md-3 col-xl-3">

    </div>

    <div class="col-xl-6 col-md-6 " id="formulario">
      <form method="POST" class="formulario-calificacion" id="survieForm">
        <p class="text-center parrafo">Califica nuestro servicio</p>

        <div class="form-group center-radio">
          <p class="clasificacion" id="inputsSurvie">
            <input id="radio1" type="radio" name="estrellas" value="5"><label for="radio1">★</label>
            <input id="radio2" type="radio" name="estrellas" value="4"><label for="radio2">★</label>
            <input id="radio3" type="radio" name="estrellas" value="3"><label for="radio3">★</label>
            <input id="radio4" type="radio" name="estrellas" value="2"><label for="radio4">★</label>
            <input id="radio5" type="radio" name="estrellas" value="1"><label for="radio5">★</label>
          </p>
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1" class="label-comentario">Dejanos tus comentarios</label>
          <textarea class="form-control" name="comentarios" id="messageSurvie" rows="3"></textarea>
        </div>


        <input type="hidden" name="telefono" value="<?php echo $_GET['phone'] ?>" id="phoneFormSurvie">

        <button type="submit" class="btn btn-outline-success btn-lg btn-block">Enviar Formulario</button>
      </form>
    </div>
    <div class="col-md-3 col-xl-3">

    </div>
  </div>
</main>
<?php

include('template/footer.php')

?>