<?php

include('conexion.php');

if (isset($_POST['messageFormSurvie'])) {

    $inputComentarios = $_POST['messageFormSurvie'];
    $inputEstrellas = $_POST['survieFormSurvie'];
    $inputTelefono = $_POST['phoneFormSurvie'];

    $router_id = $_COOKIE['rid'];
    $parque = $_COOKIE['parque'];
    $linkloginonly = $_COOKIE['link-login-only'];
    $linkorigesc =  $_COOKIE['link-orig-esc'];
    $mac = $_COOKIE['mac'];



    try {
        $query = "INSERT INTO `calificacion` (fecha, hora, calificacion, comentario, celular, router_id, parque) VALUES ( CURDATE(), CURTIME(), '$inputEstrellas', '$inputComentarios', '$inputTelefono', '$router_id', '$parque')";
        $result = mysqli_query($connection, $query);

        if ($result) {

            // header('Location: ' . $linkloginonly . '?dst=' . $linkorigesc . '&username=T-' . $mac);

            $insertQuery = "INSERT INTO `cliente_login` (fechayhora, fecha, hora, celular, router_id, parque, macequipo, ipequipo) VALUES(CURRENT_TIMESTAMP(), CURDATE(), CURTIME(), '$phone', '$router_id', '$parque', '$macequipo', '$ipequipo')";
            $result = mysqli_query($connection, $insertQuery);
            http_response_code(200);
            echo json_encode(array(
                "msg" => "Tienes navegacion",
                "code" => 200,
                "link" => $linkloginonly . '?dst=' . $linkorigesc . '&username=T-' . $mac
            ));
            die();
        } else {
            http_response_code(500);
            echo json_encode(array(
                "msg" => "Ha Ocurrido Un Error, al insertar informacion",
                "code" => 500
            ));

            die();
        }
    } catch (\Throwable $th) {
        http_response_code(500);
        echo json_encode(array(
            "msg" => "Ha Ocurrido Un Error",
            "code" => 500
        ));

        die();
    }
} else {
    http_response_code(500);
    echo json_encode(array(
        "msg" => "Ha Ocurrido Un Error, Toda La Informacion Es Requerida",
        "code" => 500
    ));

    die();
}
