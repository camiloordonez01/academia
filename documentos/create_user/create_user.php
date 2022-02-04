<?php
	$webhookContent = "";

    $webhook = fopen('php://input' , 'rb');
    while (!feof($webhook)) {
        $webhookContent .= fread($webhook, 4096);
    }
    fclose($webhook);

    $datos = json_decode("[".$webhookContent."]");

	$firstname = $datos[0]->first_name;
	$lastname = $datos[0]->last_name;
	$email = $datos[0]->email;
	$username = $datos[0]->username;
	$password = password_hash($datos[0]->billing->company, PASSWORD_BCRYPT, ['cost' => 10]);
	$date = date("Y-m-d H:i:s");

	$user='academia';
	$pass='fTORI3geuf';
	$serve='127.0.0.1';
	$db='campusvirtual';

	$con = mysqli_connect($serve, $user, $pass, $db);
	$con->set_charset("utf8");

	/*$sql = "INSERT INTO webhooks (datos) VALUES ('".$firstname." , ".$lastname." , ".$email." , ".$username." , ".$password." , ".$date."')";
    $con->query($sql);*/

    $sql2 = "INSERT INTO users (name, email, password, created_at, updated_at, tipo, activo) VALUES ('".$firstname." ".$lastname."' , '".$email."' , '".$password."' , '".$date."' , '".$date."' , '2' , '0')";
    $con->query($sql2);

    echo ($firstname." , ".$lastname." , ".$email." , ".$username." , ".$password." , ".$date);
?>

