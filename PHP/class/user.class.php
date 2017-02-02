<?php   if ( ! defined('TS_HEADER')) exit('No se permite el acceso directo ala web');
/** FUNCIONES GLOBALES | POWERED BY: Wortit Developers **/

class tsUser{
	var $settings;
	var $querys = 0;
	// INSTANCIA DE LA CLASE
	public static function &getInstance(){
	static $instance;
	if( is_null($instance) ){ $instance = new tsUser(); }
	return $instance;
	}

	 function login($id){
		global $mysqli, $tsGlobal;
			//=> VARIABLES DE SEGURIDAD
			$time = time();
			$cookie_name = 'LS_'.substr(md5($tsGlobal->settings['url']), 0, 6);
			$cookie_time = 60*60*24*7*12*10;
			$_SERVER['REMOTE_ADDR'] = $_SERVER['X_FORWARDED_FOR'] ? $_SERVER['X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
			$key_1 = $id;
			$key_2 = substr(sha1(md5($time).'RFT'), 0, 15);
			$key_3 = $time-5915;
			$key = $key_1.'_'.$key_2.'__'.$key_3;
			if($mysqli->query('INSERT INTO rft_sessions (s_key, s_user, s_ip, s_date, s_update, s_remember) VALUES (\''.$key_2.'\', \''.$key_1.'\', \''.$_SERVER['REMOTE_ADDR'].'\', \''.$time.'\', \''.$time.'\', \''.$rem.'\')')){
				$mysqli->query('UPDATE users SET u_online = \'1\' WHERE u_id = \''.$key_1.'\'');
				setcookie($cookie_name, $key, (time() + $cookie_time), '/', substr(array('http:', '/'), '', $tsGlobal->settings['url']));
				return '1: Redireccionando...';
			}else return '0: No se pudo completar la operaci&oacute;n';
	}


		function cerrar($user_id = 0, $all_sessions = false){
		global $mysqli, $tsGlobal;
		$user_id = empty($user_id) ? $this->uid : $user_id;
		if($user_id != $this->uid){
			$query = $mysqli->query('DELETE FROM rft_sessions WHERE s_user = \''.$user_id.'\' LIMIT 1');
			return '1: OKAY';
		}
		$cookie_name = 'LS_'.substr(md5($tsGlobal->settings['url']), 0, 6);
		$cookie = $tsGlobal->secure($_COOKIE[$cookie_name]);
		if($cookie && $user_id){
			$key_3 = str_replace('_', '', strstr($cookie, '__'))+5915;
			$part_1 = strstr($cookie, '__', true);
			$key_2 = str_replace('_', '', strstr($part_1, '_'));
			$key_1 = strstr($part_1, '_', true);
			$query = $mysqli->query('SELECT s_id, s_user FROM rft_sessions WHERE s_user = \''.$key_1.'\' AND s_key = \''.$key_2.'\' AND s_date = \''.$key_3.'\' LIMIT 1');
			$data = $query->fetch_assoc();
			if($data){
				$mysqli->query('UPDATE rft_members SET u_online = \'0\' WHERE u_id = \''.$user_id.'\'');
				$mysqli->query('DELETE FROM rft_sessions WHERE s_id = \''.intval($data['s_id']).'\' LIMIT 1');
				if($all_sessions) $mysqli->query('DELETE FROM rft_sessions WHERE s_user = \''.intval($data['s_user']).'\'');
				setcookie($cookie_name, '', (time() - 999*999), '/', substr(array('http:', '/'), '', $web['url']));
				return '1: Software by <b>WORTIT Developers</b>';
			}else return '0: Al parecer no te encuentras logueado';
		}else return '0: Al parecer ya no est&aacute;s logueado';
	   }
      

     function read(){
     global $mysqli, $tsGlobal;
		$cookie_name = 'LS_'.substr(md5($tsGlobal->settings['url']), 0, 6);
		$cookie = $tsGlobal->secure($_COOKIE[$cookie_name]);
		if($cookie){
			$key_3 = str_replace('_', '', strstr($cookie, '__'))+5915;
			$part_1 = strstr($cookie, '__', true);
			$key_2 = str_replace('_', '', strstr($part_1, '_'));
			$key_1 = strstr($part_1, '_', true);
			$query = $mysqli->query('SELECT s_user FROM rft_sessions WHERE s_user = \''.$key_1.'\' AND s_key = \''.$key_2.'\' AND s_date = \''.$key_3.'\' LIMIT 1');
			$data = $query->fetch_assoc();
			if($data['s_user']){
				$query = $mysqli->query("SELECT u_id, u_nick, u_email, u_maxsize, u_avatar FROM rft_members WHERE u_id='".$data['s_user']."'");
				$data = $query->fetch_assoc();
				$this->info = $data;
				$this->uid = $data['u_id'];
				$this->nick = $data['u_nick'];
				$this->maxsize = $data['u_maxsize'];
				$this->uavatar = $data['u_avatar'];
				$_SESSION['uid'] = $data['u_id'];
				$_SESSION['u_maxsize'] = $data['u_maxsize'];
			}
		}else{
			$time = time();
			$cookie_name = 'LS_'.substr(md5($tsGlobal->settings['url']), 0, 6);
			$cookie_time = 60*60*24*7*12*10;
			$key_1 = 0;
			$key_2 = substr(sha1(md5($time).'RFT'), 0, 15);
			$key_3 = $time-5915;
			$key = $key_1.'_'.$key_2.'__'.$key_3;
			if($mysqli->query('INSERT INTO rft_sessions (s_key, s_user, s_ip, s_date, s_update, s_remember) VALUES (\''.$key_2.'\', \'0\', \''.$_SERVER['REMOTE_ADDR'].'\', \''.$time.'\', \''.$time.'\', \'0\')')){
				setcookie($cookie_name, $key, (time() + $cookie_time), '/', substr(array('http:', '/'), '', $web['url']));
			}
		}
     }

	 // LOGEAMOS AL USUARIO ATRAVEZ DE UNA $_SESSION
	  function loginUser($username, $password){
	  global $mysqli, $tsGlobal;
	  if($this->uid){ return '0: Ya haz iniciado sesión.'; }else{
	  if($username && $password){ 
	  	$username = $username; 
	  	$pppassword = md5($password);
		$kmosweko = $mysqli->query("SELECT * FROM rft_members WHERE u_nick='".$username."'");
        $data = $kmosweko->fetch_assoc();
        $sdfleuaesk = $kmosweko->num_rows;
		if($sdfleuaesk > 0){ 
		if($pppassword == $data['u_pass']){ 
        // Cargamos la información del usuario
		$this->login($data['u_id']);
        $_SESSION['uid'] = $data['u_id']; 
        $_SESSION['nombre'] = $data['u_nick'];
        $_SESSION['maxsize'] = $data['u_maxsize'];		
        $this->is_member = $data['u_id'];
        $mysqli->query("UPDATE rft_members SET u_ulactive='".time()."' WHERE u_id='".$data['u_id']."'");			
        return '1: Haz iniciado sesion correctamente.'; 
		}else{ return '0: Tu contrase&ntilde;a es incorrecta.';  }
		}else{ return '0: El usuario no existe.'; }
		}else{ return '0: Inserta tus datos.'; }
	    }
	  }

	  /* 
	  *-----------------
	  *   REGISTRO
	  *-----------------
	  */

	 function register(){
	global $tsGlobal, $mysqli;

$nick = $tsGlobal->secure($_POST['name']);
$pass = $tsGlobal->secure($_POST['pass']);
$repass = $tsGlobal->secure($_POST['repass']);
$key = substr(md5(uniqid(mt_rand(), false)),0, 7);
$avt = substr(md5(uniqid(mt_rand(), false)),0, 7);
    $kdfaw4 = time().time().time().rand(18, 1000000);
$code = substr(md5(md5($kdfaw4)),0, 17);
$email = $tsGlobal->secure($_POST['mail']);
$date = time();
$passr = md5($pass);
$passrr = md5(md5($pass));
$ipu = $tsGlobal->getRealIP();
// MAXIMO DE GB SUBIDO POR USUARIO
$maxsize = 5;
// PERMISOS POR DEFECTO (1 => default; normal user, 2 => admin o mod)
$permissions = 1;
$sin_espacios = count_chars($nick, 1); 
$snowen = $mysqli->query("SELECT u_nick FROM rft_members WHERE u_nick='".$nick."'"); $kmsofrn = $snowen->num_rows;
if($nick && $pass && $repass && $email){
if($kmsofrn > 0 or $nick == 'account' or $nick == 'search'){ return '0: El nickname no esta disponible, prueba con otro'; }else{
if(!empty($sin_espacios[32])){ return '0: El nickname no puede contener espacios.'; }else{
if($pass != $repass){ return '0: Las contraseñas no son las mismas.'; }else{
	$ksodkfowk = $mysqli->query("SELECT u_email FROM rft_members WHERE u_email='".$email."'"); $mdlafkowqñ = $ksodkfowk->num_rows;
if($mdlafkowqñ > 0){ return '0: El correo ya esta registrado, prueba con otro.'; }else{	
$registroeject = $mysqli->query("INSERT INTO rft_members(u_nick, u_pass, u_rpass, u_key, u_code, u_email, u_ulactive, u_register, u_size, u_maxsize, u_permissions, u_ip) VALUES('".$nick."','".$passr."','".$passrr."','".$key."','".$code."','".$email."','".$date."','".$date."','0','".$maxsize."','".$permissions."', '".$ipu."')");
if($registroeject){
$insertId = $mysqli->insert_id;
/////////////////AVATAR ALEATORIO/////////
copy('http://'.$tsGlobal->settings['url'].'/arc/img/avatardefault.png','../../arc/co/'.$avt.'_200.png'); 
$avatarww = 'http://'.$tsGlobal->settings['url'].'/basepage/5f5s/'.$avt.'_200.png';
$mysqli->query("UPDATE rft_members SET u_avatar='".$avatarww."' WHERE u_id='".$insertId."'");
////////////////FIN ALEATORIO/////////////

				$time = time();
				$key3 = $time-573;
				$codemail = substr(md5($time.$insertId.$email), 0, 20);
				$email_to = $email;
				$email_subject = $tsGlobal->settings['title'].' | Bienvenido a '.$tsGlobal->settings['title'].'';
				$email_body = '<div style="background:#0f7dc1;padding:10px;font-family:Arial, Helvetica,sans-serif;color:#000">';
				$email_body .= '<h1 style="color:#FFFFFF; font-weight:bold; font-size:30px;">'.$tsGlobal->settings['title'].'</h1>';
				$email_body .= '<div style="background:#FFF;padding:10px;font-size:14px">';
				$email_body .= '<h2 style="font-family:Arial, Helvetica,sans-serif;color:#000;font-size:22px">Hola '.$nick.'</h2>';
				$email_body .= '<p style="font-family:Arial, Helvetica,sans-serif;color:#000">&iexcl;Te damos la bienvenida a '.$tsGlobal->settings['title'].'!</p>';
				$email_body .= '<p>Muchas gracias por formar parte de '.$tsGlobal->settings['title'].' - '.$tsGlobal->settings['lema'].'.';
				$email_body .= '</p><br /> <br />';
				$email_body .= '<p>Posteriormente podr&aacute;s acceder a tu cuenta con los siguientes datos:</p>';
				$email_body .= '<p>Nickname: '.$nick.' <br /> Contrase&ntilde;a: '.$pass.'</p><br />';
				$email_body .= '<p>Antes de empezar a interactuar con la comunidad, te recomendamos que visites las <a target="_blank" href="'.$tsGlobal->settings['url'].'/policies">politicas</a> del sitio.</p>';
				$email_body .= '<p>Esperamos que disfrutes enormemente tu visita.</p>';
				$email_body .= '<p>&iexcl;Te damos la bienvenida, Muchas gracias!</p>';
				$email_body .= '<p>Staff de '.$web['title'].'.</p>';
				$email_body .= '<div style="border-top:#CCC solid 1px;padding:10px 0">';
				$email_body .= '<span style="color:#666;font-size:11px">';
				$email_body .= '<center>El staff de <strong>'.$tsGlobal->settings['title'].'</strong></center>';
				$email_body .= '</span>';
				$email_body .= '</div>';
				$email_body .= '</div>';
				$email_body .= '</div>';
				$sender = $web['title']." <no-reply@".str_replace('www.', '', $tsGlobal->settings['title']).">";
				$email_headers = "MIME-Version: 1.0"."\n";
				$email_headers .= "Content-type: text/html; charset=utf-8"."\n";
				$email_headers .= "Content-Transfer-Encoding: 8bit"."\n";
				$email_headers .= "From: $sender"."\n";
				$email_headers .= "Return-Path: $sender"."\n";
				$email_headers .= "Reply-To: $sender\n";
				if(mail($email_to, $email_subject, $email_body, $email_headers)){
				$mysqli->query('INSERT INTO emails (e_user, e_email, e_code, e_key, e_ip, e_type, e_date) VALUES (\''.$insertId.'\', \''.$email.'\', \''.$codemail.'\', \''.$key3.'\', \''.$ipu.'\', \'1\', \''.$time.'\')');
                }else{}
//////////// ENVIO DE EMAIL DE BIENVENIDA ////////////
$this->login($insertId);
$_SESSION['uid'] = $insertId;
$this->is_member = $insertId;			   
return '1: http://'.$tsGlobal->settings['url'].'/account/'.$insertId;
}else{ return '0: Ocurrio un error al intentar lo solicitado, intenta nuevamente.'; }
}
}
} 	     
}
}else{ return '0: Rellena todos los campos.'; }
// Fin de la función
}

    function loadarch($usrr){
        global $tsGlobal, $tsUser, $mysqli;
     $usr = $tsGlobal->secure($usrr); 
     $query = $mysqli->query("SELECT * FROM rft_uploads WHERE up_user='".$usr."'"); 
     $data = $query;   
     return $data;
    }

/* FIN CLASS */
}
	?>