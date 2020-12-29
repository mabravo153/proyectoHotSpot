<?php

include('conexion.php');

if(isset($_GET['inicialQuery'])){

    $macequipo = $_COOKIE['mac'];

    $query = "SELECT macequipo as Contador FROM cliente_login WHERE macequipo=$macequipo AND (TIMESTAMPDIFF(HOUR, (SELECT MAX(FechaYHora) FROM cliente_login WHERE macequipo=$macequipo),CURRENT_TIMESTAMP()))>24";
    $response = mysqli_query($connection, $query);

    if (is_null($response)) {
        http_response_code(200);
        echo json_encode(array(
            "status" => 200
        ));
    } else {
        http_response_code(500);
        echo json_encode(array(
            "status" => 500
        ));
    }
}


if (isset($_POST['inputTelefono'])) {

    $router_id = $_COOKIE['rid'];
    $parque = $_COOKIE['parque'];
    $macequipo = $_COOKIE['mac'];
    $ipequipo = $_COOKIE['ip'];

    $phone = $_POST['inputTelefono'];

    $query = "SELECT * FROM cliente WHERE celular = $phone";
    $response = mysqli_query($connection, $query);

    if ($response->num_rows > 0) {
        try {
        
            if ($result) {
                http_response_code(200);
                echo json_encode(array(
                    "msg" => "Ha Sido Insertada La Informacion",
                    "code" => 200
                ));

                die();
            } else {
                http_response_code(500);
                echo json_encode(array(
                    "msg" => "Ha Ocurrido Un Error Al Ingresar Informacion A La Base De Datos",
                    "code" => 500
                ));

                die();
            }
        } catch (\Throwable $th) {

            http_response_code(500);
            echo json_encode(array(
                "msg" => "Ha Ocurrido Un Error Al Ingresar Informacion A La Base De Datos",
                "code" => 500
            ));
            die();
        }
    } else {
        http_response_code(404);
        echo json_encode(array(
            "msg" => "El Numero De Telefono No Ha Sido Encontrado",
            "code" => 404,
            "phone" => $_POST['inputTelefono']
        ));

        die();
    }
} else {
    http_response_code(500);
    echo json_encode(array(
        "msg" => "Ha Ocurrido Un Error, El Numero De Telefono Es Necesario",
        "code" => 500
    ));

    die();
}
