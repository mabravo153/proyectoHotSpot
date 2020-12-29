<?php
include('conexion.php');



if ((isset($_POST['nameFormData']) && !empty($_POST['nameFormData'])) && (isset($_POST['lastNameFormData']) && !empty($_POST['lastNameFormData'])) && (isset($_POST['emailFormData']) && !empty($_POST['emailFormData']))) {
    #Datos Que Vienen Desde El Mikrotik
    $mac = $_COOKIE['mac'];
    $ip  = $_COOKIE['ip'];
    $rid = $_COOKIE['rid'];
    $parque = $_COOKIE['parque'];
    $linkloginonly = $_COOKIE['link-login-only'];
    $linkorigesc = $_COOKIE['link-orig-esc'];

    #Datos Que Tomo De La Pagina
    $nombres =  filter_var($_POST['nameFormData'], FILTER_SANITIZE_STRING);
    $apellidos = filter_var($_POST['lastNameFormData'], FILTER_SANITIZE_STRING);
    $sanitazeEmail = filter_var($_POST['emailFormData'], FILTER_SANITIZE_EMAIL);
    $edad = filter_var($_POST['ageFormData'], FILTER_SANITIZE_STRING);
    $sexo = filter_var($_POST['sexFormData'], FILTER_SANITIZE_STRING);
    $telefono = filter_var($_POST['phoneFormData'], FILTER_SANITIZE_STRING);
    
    if (filter_var($sanitazeEmail, FILTER_VALIDATE_EMAIL)) {

        try {
            $query = "INSERT INTO `cliente` (nombres, apellidos, email, edad, sexo, celular) VALUES ('$nombres', '$apellidos', '$sanitazeEmail', '$edad', '$sexo', '$telefono')";
            $result = mysqli_query($connection, $query);

            if ($result) {

                $insertQuery = "INSERT INTO `cliente_login` (fechayhora, fecha, hora, celular, router_id, parque, macequipo, ipequipo) VALUES(CURRENT_TIMESTAMP(),CURDATE(), CURTIME(), '$telefono', '$rid', '$parque', '$mac', '$ip')";
                $result = mysqli_query($connection, $insertQuery);

                // header('Location: ' . $linkloginonly . '?dst=' . $linkorigesc . '&username=T-' . $mac);

                http_response_code(200);
                echo json_encode(array(
                    "msg" => "Proceso Completado",
                    "code" => 200,
                    "link" => $linkloginonly . '?dst=' . $linkorigesc . '&username=T-' . $mac
                ));
                die();
            } else {
                http_response_code(500);
                echo json_encode(array(
                    "msg" => "Ha Ocurrido Un Error, No Se Guardo La Informacion",
                    "code" => 500
                ));
                die();
            }
        } catch (\Throwable $th) {
            http_response_code(500);
            echo json_encode(array(
                "msg" => "Ha Ocurrido Un Error, Validar La Informacion",
                "code" => 500
            ));
            die();
        }
    } else {
        http_response_code(500);
        echo json_encode(array(
            "msg" => "Ha Ocurrido Un Error, Debe Ser Un Email Valido",
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
