<?php

include('conexion.php');


if (isset($_POST['inputTelefono'])) {

    $router_id = $_COOKIE['rid'];
    $parque = $_COOKIE['parque'];
    $macequipo = $_COOKIE['mac'];
    $ipequipo = $_COOKIE['ip'];

    $phone = $_POST['inputTelefono'];

    $query = "SELECT * FROM cliente WHERE celular = $phone";
    $response = mysqli_query($connection, $query);

    if ($response->num_rows != 0) {

        try {
            $insertQuery = "INSERT INTO `cliente_login` (fecha, hora, celular, router_id, parque, macequipo, ipequipo) VALUES(CURDATE(), CURTIME(), '$phone', '$router_id', '$parque', '$macequipo', '$ipequipo')";
            $result = mysqli_query($connection, $insertQuery);

            if ($result) {
                http_response_code(200);
                echo json_encode(array(
                    "msg" => "Ha sido insertada la informacion",
                    "code" => 200
                ));

                die();
            } else {
                http_response_code(500);
                echo json_encode(array(
                    "msg" => "Ah ocurrido un error al ingresar informacion a la base de datos",
                    "code" => 500
                ));

                die();
            }
        } catch (\Throwable $th) {

            http_response_code(500);
            echo json_encode(array(
                "msg" => "Ah ocurrido un error al ingresar informacion a la base de datos",
                "code" => 500
            ));
            die();
        }
    } else {
        http_response_code(404);
        echo json_encode(array(
            "msg" => "El numero de telefono no ha sido encontrado",
            "code" => 404
        ));

        die();
    }
} else {
    http_response_code(500);
    echo json_encode(array(
        "msg" => "Ah ocurrido un error, el numero de telefono es necesario",
        "code" => 500
    ));

    die();
}
