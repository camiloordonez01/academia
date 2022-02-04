<?php
	$webhookContent = "";

    $webhook = fopen('php://input' , 'rb');
    while (!feof($webhook)) {
        $webhookContent .= fread($webhook, 4096);
    }
    fclose($webhook);

    $datos = json_decode("[".$webhookContent."]");

    $status = $datos[0]->status;
    $email = $datos[0]->billing->email;

    $user='academia';
	$pass='fTORI3geuf';
	$serve='127.0.0.1';
	$db='campusvirtual';

	$con = mysqli_connect($serve, $user, $pass, $db);
	$con->set_charset("utf8");

	/*$sql = "INSERT INTO webhooks (datos) VALUES ('".$status." , ".$email."')";
    $con->query($sql);*/
    if($status=='active'){
    	$sql2 = "UPDATE users SET activo=1 WHERE email='".$email."'";
    	$con->query($sql2);
    }else if($status=='on-hold'){
    	$sql2 = "UPDATE users SET activo=0 WHERE email='".$email."'";
    	$con->query($sql2);
    }

    echo ($status." , ".$email);
?>