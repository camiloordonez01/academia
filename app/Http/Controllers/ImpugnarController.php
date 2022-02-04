<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Preguntas;
use App\Respuestas;
use App\Correctas;
use Illuminate\Support\Facades\Redirect;
use DB;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ImpugnarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isActive');
    }
    public function index(Request $request, $id)
    {
    	$pregunta = DB::select('SELECT preguntas.pregunta FROM preguntas, temas WHERE preguntas.temas_id = temas.id AND preguntas.tipo="1" AND preguntas.id ="'.$id.'"');
    	$respuestas = DB::table('respuestas')->where('preguntas_id','=',$id)->get();
        $correcta = DB::table('correctas')->where('preguntas_id','=',$id)->get('respuestas_id');

    	return view('panel.impugnacion.index',["pregunta"=>$pregunta[0],"respuestas"=>$respuestas,"correcta"=>$correcta[0]]);
    }
    public function enviar(Request $request)
    {

		$mail = new PHPMailer();

		$mail->IsSMTP();
		$mail->SMTPDebug  = 0;
		$mail->Host       = 'mail.academiacentralstation.com';
		$mail->Port       = 587;
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth   = true;
		$mail->Username   = "impugnaciones@academiacentralstation.com";
		$mail->Password   = "Nuritas616";
		$mail->CharSet = 'UTF-8';

		$mail->SetFrom('impugnaciones@academiacentralstation.com', 'Academia Central');
		$mail->AddAddress('gestionacademia@academiacentralstation.com', Auth::user()->name);

		$mail->Subject = 'Impugnacion de pregunta';
		$mail->MsgHTML('
				<!DOCTYPE html>
				<html>
				<head>
					<meta charset="UTF-8">
					<title>Impugnacion de una pregunta</title>
				</head>
				<body>
					<div style="width: 100%; text-align: center;"> 
						<div style="width: 60%;border: 1px solid black; border-radius: 5px;margin: auto;">
							<div  style="width: 100%;border-bottom: 1px solid black;background-color: #42424B;"> 
								<img width="200" src="https://panel.project2.justmarketing.es/image/logo.png" style="padding: 10px 0px;">
							</div>
							<div style="width: 100%;border-bottom: 1px solid black;display: flex;">
								<div style="width: 30%;border-right: 1px solid black;float: left;padding: 10px 20px;text-align: center;">
									<span>Nombre</span>
								</div>
								<div style="width: 70%;float: left;padding: 10px 20px;text-align: center;">
									<span>'.Auth::user()->name.'</span>
								</div>
							</div>
							<div style="width: 100%;border-bottom: 1px solid black;display: flex;">
								<div style="width: 30%;border-right: 1px solid black;float: left;padding: 10px 20px;text-align: center;">
									<span>Email</span>
								</div>
								<div style="width: 70%;float: left;padding: 10px 20px;text-align: center;">
									<span>'.Auth::user()->email.'</span>
								</div>
							</div>
							<div style="width: 100%;border-bottom: 1px solid black;display: flex;">
								<div style="width: 30%;border-right: 1px solid black;float: left;padding: 10px 20px;text-align: center;">
									<span>Pregunta</span>
								</div>
								<div style="width: 70%;float: left;padding: 10px 20px;text-align: center;">
									<span>'.$request->get('pregunta').'</span>
								</div>
							</div>
							<div style="width: 100%;border-bottom: 1px solid black;display: flex;">
								<div style="width: 30%;border-right: 1px solid black;float: left;padding: 10px 20px;text-align: center;">
									<span>Respuesta A</span>
								</div>
								<div style="width: 70%;float: left;padding: 10px 20px;text-align: center;">
									<span>'.$request->get('respuesta')[0].'</span>
								</div>
							</div>
							<div style="width: 100%;border-bottom: 1px solid black;display: flex;">
								<div style="width: 30%;border-right: 1px solid black;float: left;padding: 10px 20px;text-align: center;">
									<span>Respuesta B</span>
								</div>
								<div style="width: 70%;float: left;padding: 10px 20px;text-align: center;">
									<span>'.$request->get('respuesta')[1].'</span>
								</div>
							</div>
							<div style="width: 100%;border-bottom: 1px solid black;display: flex;">
								<div style="width: 30%;border-right: 1px solid black;float: left;padding: 10px 20px;text-align: center;">
									<span>Respuesta C</span>
								</div>
								<div style="width: 70%;float: left;padding: 10px 20px;text-align: center;">
									<span>'.$request->get('respuesta')[2].'o</span>
								</div>
							</div>
							<div style="width: 100%;border-bottom: 1px solid black;display: flex;">
								<div style="width: 30%;border-right: 1px solid black;float: left;padding: 10px 20px;text-align: center;">
									<span>Respuesta D</span>
								</div>
								<div style="width: 70%;float: left;padding: 10px 20px;text-align: center;">
									<span>'.$request->get('respuesta')[3].'o</span>
								</div>
							</div>
							<div style="width: 100%;border-bottom: 1px solid black;display: flex;">
								<div style="width: 30%;border-right: 1px solid black;float: left;padding: 10px 20px;text-align: center;">
									<span>Correcta</span>
								</div>
								<div style="width: 70%;float: left;padding: 10px 20px;text-align: center;">
									<span>'.$request->get('correcta').'</span>
								</div>
							</div>
							<div style="width: 100%;display: flex;">
								<div style="width: 30%;border-right: 1px solid black;float: left;padding: 10px 20px;text-align: center;">
									<span>Justificacion</span>
								</div>
								<div style="width: 70%;float: left;padding: 10px 20px;text-align: center;">
									<span>'.$request->get('justificacion').'</span>
								</div>
							</div>
						</div>
					</div>
				</body>
				</html>
			');
		$mail->AltBody = 'This is a plain-text message body';
		//Enviamos el correo
		if(!$mail->Send()) {
		  	dd("Error: " . $mail->ErrorInfo);
		} else {
    		return Redirect('/control/test?enviado=true');
		}

		
    }
}
