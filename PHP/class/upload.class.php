<?php   if ( ! defined('TS_HEADER')) exit('No se permite el acceso directo ala web');
/** FUNCIONES GLOBALES | POWERED BY: Wortit Developers **/

class tsUpload{
	var $settings;
	var $querys = 0;
	// INSTANCIA DE LA CLASE
	public static function &getInstance(){
	static $instance;
	if( is_null($instance) ){ $instance = new tsUpload(); }
	return $instance;
	}
	/* +++++++++++++++++++++++++++++++++++ */

        /*
        BUSCAR EL TIPO DE ARCHIVO EN SU NOMBRE: NO HAY DE OTRA -YAO
    */  
    function obtTypeArch($nombre) {     
        // Separamos las palabras
        $palabras = explode('.',$nombre);
        // Despues del punto es la extension
        $sep = count($palabras)-1;
        // Sacamos la extension :D
        $ext = $palabras[$sep];
        //
        return $ext;
    }

    // Calcular el tamaño de el archivo
     function tmnarch($type ,$peso , $decimales = 2 ){
     $clase = array(" Bytes", " KB", " MB", " GB", " TB"); 
if($type == 1){ return round($peso/pow(1024,($i = floor(log($peso, 1024)))),$decimales); }else{  $skdwo = round($peso/pow(1024,($i = floor(log($peso, 1024)))),$decimales); return $clase[$i]; }
     }

	function upload($files){
    global $mysqli, $tsGlobal, $tsUser;
    $sqlfile = $files;
    $filename = $sqlfile['name'];
    $typefile = $this->obtTypeArch($filename);
    $sizefiless = $sqlfile['size'];
    $sizefile = $this->tmnarch(1, $sizefiless);
    $typesizefile = $this->tmnarch(2, $sizefiless);
    $key = substr(md5(uniqid(mt_rand(), false)),0, 15);
    $kdfaw4 = time().time().rand(7, 1000000);
    $code = substr(md5(md5($kdfaw4)),0, 11);
    $date = time();
    $pref = time().time().time().time().time().rand();
    $prefigh = substr(md5($pref),0, 23);
    if($tsUser->uid){
        $kmlsawe5fw = $mysqli->query("SELECT u_maxsize, u_size FROM rft_members WHERE u_id='".$tsUser->uid."'");
    $ksjdokemw = $kmlsawe5fw->fetch_assoc();
    if($ksjdokemw['u_maxsize'] > $tsUser->maxsize){ return '0: Haz alcanzado tu maximo de subida de archivos. <b>¡Actualiza tu cuenta!</b>'; }else{
    if($typefile == 'jpg' or $typefile == 'png' or $typefile == 'gif' or $typefile == 'jpeg' or $typefile == 'PNG' or $typefile == 'JPG' or $typefile == 'JPEG' or $typefile == 'GIF'){ 
    $direct = TS_ROOT.'/arc/co/';
    if(copy($sqlfile['tmp_name'], $direct.$prefigh.'.'.$typefile)){ 
        $namefileske = $prefigh;
    $url = $tsGlobal->settings['url'].'/basename/ur/'.$namefileske.'/?detekey='.$key;
    if($tsUser->uid) $typeusip = $tsUser->uid; else $typeusip = $tsGlobal->getRealIP();
    if($tsUser->uid) $typefilesnwpq = 1; else $typefilesnwpq = 0;
    $sd65f4as91a6se0wa3q = $filename;
    $sd5f4a6ds1sd56se3w32 = $ksjdokemw['u_size']+$sizefiless;
    $mysqli->query("UPDATE rft_members SET u_size='".$sd5f4a6ds1sd56se3w32."' WHERE u_id='".$tsUser->uid."'");  
     $mysqli->query("INSERT INTO rft_uploads(
     up_name, up_vname, up_img, up_size, up_key, up_code, up_date, up_type, up_ftype, up_typesize, up_user, up_vsize) VALUES('".$code."', '".$sd65f4as91a6se0wa3q."', '0', '".$sizefile."', '".$key."', '".$namefileske."', '".$date."', '".$typefilesnwpq."', '".$typefile."', '".$typesizefile."', '".$typeusip."', '".$sizefiless."')");  
     return '1: http://'.$url; 
     }else{ return '0: Ocurrio un error, intenta nuevamente.'; }
     }elseif($typefile == 'js' or $typefile == 'php' or $typefile == 'css' or $typefile == 'docx' or $typefile == 'zip' or $typefile == 'rar' or $typefile == 'txt' or $typefile == 'psd' or $typefile == 'exe' or $typefile == 'html' or $typefile == 'mp4' or $typefile == 'mp3' or $typefile == 'pdf' or $typefile == '3gp' or $typefile == '3gpp' or $typefile == 'avi' or $typefile == 'flv' or $typefile == 'meta' or $typefile == 'pptx' or $typefile == 'xls' or $typefile == 'wav'){
    $direct = TS_ROOT.'/arc/he/';
    if($typefile == 'js' or $typefile == 'php' or $typefile == 'css' or $typefile == 'html'){ $aofkmawokm = 'txt'; }else{ $aofkmawokm = $typefile; }
    if(copy($sqlfile['tmp_name'], $direct.$prefigh.'.'.$aofkmawokm)){ 
        $namefileske = $prefigh;
    $url = $tsGlobal->settings['url'].'/basename/ur/'.$namefileske.'/?detekey='.$key;
    if($tsUser->uid) $typeusip = $tsUser->uid; else $typeusip = $tsGlobal->getRealIP();
    if($tsUser->uid) $typefilesnwpq = 1; else $typefilesnwpq = 0;
    $sd65f4as91a6se0wa3q = $filename;
    $sd5f4a6ds1sd56se3w32 = $ksjdokemw['u_size']+$sizefiless;
    $mysqli->query("UPDATE rft_members SET u_size='".$sd5f4a6ds1sd56se3w32."' WHERE u_id='".$tsUser->uid."'"); 
     $mysqli->query("INSERT INTO rft_uploads(
     up_name, up_vname, up_img, up_size, up_key, up_code, up_date, up_type, up_ftype, up_typesize, up_user, up_vsize) VALUES('".$code."', '".$sd65f4as91a6se0wa3q."', '1', '".$sizefile."', '".$key."', '".$namefileske."', '".$date."', '".$typefilesnwpq."', '".$typefile."', '".$typesizefile."', '".$typeusip."', '".$sizefiless."')");  
     return '1: http://'.$url; 
     }else{ return '0: Ocurrio un error, intenta nuevamente.'; }
     }else{ return '0: El formato no es valido, Consulta nuestras politicas  ::  '.$typefile; }
     }
     }else{ return '0: Esta acción es solo para usuarios registrados.'; }
    /* FIN funcion  upload(); */
	}


    /* SUBIR VARIOS ARCHIVOS */

        function varios_upload($files){
    global $mysqli, $tsGlobal, $tsUser;
    if($tsUser->uid){
        $kmlsawe5fw = $mysqli->query("SELECT u_maxsize, u_size FROM rft_members WHERE u_id='".$tsUser->uid."'");
    $ksjdokemw = $kmlsawe5fw->fetch_assoc();
    if($ksjdokemw['u_maxsize'] > $tsUser->maxsize){ return '0: Haz alcanzado tu maximo de subida de archivos. <b>¡Actualiza tu cuenta!</b>'; }else{
      $tot1sf6a5sd = count($sqlfile["name"]);
    // Tipo de archivo 
      $url = '';
      for ($i = 0; $i < $tot1sf6a5sd; $i++){

          $sqlfile = $files;
    $filename = $sqlfile['name'][$i];
    $typefile = $this->obtTypeArch($filename);
    $sizefiless = $sqlfile['size'][$i];
    $sizefile = $this->tmnarch(1, $sizefiless);
    $typesizefile = $this->tmnarch(2, $sizefiless);
    $key = substr(md5(uniqid(mt_rand(), false)),0, 15);
    $kdfaw4 = time().time().rand(7, 1000000);
    $code = substr(md5(md5($kdfaw4)),0, 11);
    $date = time();
    $pref = time().time().time().time().time().rand();
    $prefigh = substr(md5($pref),0, 23);

    if($typefile == 'jpg' or $typefile == 'png' or $typefile == 'gif' or $typefile == 'jpeg' or $typefile == 'PNG' or $typefile == 'JPG' or $typefile == 'JPEG' or $typefile == 'GIF'){ 
    $direct = TS_ROOT.'/arc/co/';
    if(copy($sqlfile['tmp_name'][$i], $direct.$prefigh.'.'.$typefile)){ 
        $namefileske = $prefigh;
    $url .= $tsGlobal->settings['url'].'/basename/ur/'.$namefileske.'/?detekey='.$key;
    if($tsUser->uid) $typeusip = $tsUser->uid; else $typeusip = $tsGlobal->getRealIP();
    if($tsUser->uid) $typefilesnwpq = 1; else $typefilesnwpq = 0;
    $sd65f4as91a6se0wa3q = $filename;
    $sd5f4a6ds1sd56se3w32 = $ksjdokemw['u_size']+$sizefiless;
    $mysqli->query("UPDATE rft_members SET u_size='".$sd5f4a6ds1sd56se3w32."' WHERE u_id='".$tsUser->uid."'");  
     $mysqli->query("INSERT INTO rft_uploads(
     up_name, up_vname, up_img, up_size, up_key, up_code, up_date, up_type, up_ftype, up_typesize, up_user, up_vsize) VALUES('".$code."', '".$sd65f4as91a6se0wa3q."', '0', '".$sizefile."', '".$key."', '".$namefileske."', '".$date."', '".$typefilesnwpq."', '".$typefile."', '".$typesizefile."', '".$typeusip."', '".$sizefiless."')");  
     }else{ return '0: Ocurrio un error, intenta nuevamente.'; }
     }elseif($typefile == 'js' or $typefile == 'php' or $typefile == 'css' or $typefile == 'docx' or $typefile == 'zip' or $typefile == 'rar' or $typefile == 'txt' or $typefile == 'psd' or $typefile == 'exe' or $typefile == 'html' or $typefile == 'mp4' or $typefile == 'mp3' or $typefile == 'pdf' or $typefile == '3gp' or $typefile == '3gpp' or $typefile == 'avi' or $typefile == 'flv' or $typefile == 'meta' or $typefile == 'pptx' or $typefile == 'xls'){
    $direct = TS_ROOT.'/arc/he/';
    if($typefile == 'js' or $typefile == 'php' or $typefile == 'css' or $typefile == 'html'){ $aofkmawokm = 'txt'; }else{ $aofkmawokm = $typefile; }
    if(copy($sqlfile['tmp_name'][$i], $direct.$prefigh.'.'.$aofkmawokm)){ 
        $namefileske = $prefigh;
    $url .= $tsGlobal->settings['url'].'/basename/ur/'.$namefileske.'/?detekey='.$key;
    if($tsUser->uid) $typeusip = $tsUser->uid; else $typeusip = $tsGlobal->getRealIP();
    if($tsUser->uid) $typefilesnwpq = 1; else $typefilesnwpq = 0;
    $sd65f4as91a6se0wa3q = $filename;
    $sd5f4a6ds1sd56se3w32 = $ksjdokemw['u_size']+$sizefiless;
    $mysqli->query("UPDATE rft_members SET u_size='".$sd5f4a6ds1sd56se3w32."' WHERE u_id='".$tsUser->uid."'"); 
     $mysqli->query("INSERT INTO rft_uploads(
     up_name, up_vname, up_img, up_size, up_key, up_code, up_date, up_type, up_ftype, up_typesize, up_user, up_vsize) VALUES('".$code."', '".$sd65f4as91a6se0wa3q."', '1', '".$sizefile."', '".$key."', '".$namefileske."', '".$date."', '".$typefilesnwpq."', '".$typefile."', '".$typesizefile."', '".$typeusip."', '".$sizefiless."')");  
     }else{ $url = '0: Ocurrio un error, intenta nuevamente.'; }
     return $url;
     }else{ return '0: El formato no es valido, Consulta nuestras politicas  ::  '.$typefile; }
     }
     // Fin tipo de archivo 
     }
     }else{ return '0: Esta acción es solo para usuarios registrados.'; }
    /* FIN funcion  upload(); */
    }

    function delete_upload($idfile){
        global $mysqli, $tsGlobal, $tsUser;
    $sf9w6w5e = $mysqli->fetch_assoc($mysqli->query("SELECT up_id, up_name, up_key, up_code, up_user FROM rft_uploads WHERE up_id='".$idfile."'"));
    $t149ase1 = $mysqli->fetch_assoc($mysqli->query("SELECT u_permissions, u_nick, u_id"));
    if($sf9w6w5e['up_name']){
    if($tsUser->uid){
    if($sf9w6w5e['up_user'] == $tsUser->uid or $t149ase1['u_permissions'] == 2){
    if($mysqli->query("UPDATE rft_members SET u_size-'".$sf9w6w5e['up_vsize']."' WHERE u_id='".$tsUser->uid."'")){
    if($mysqli->query("INSERT INTO rft_binpaper(bp_obj, bp_member, bp_key, bp_code, bp_admin, bp_date, bp_ultdate) VALUES('".$idfile."', '".$sf9w6w5e['up_user']."', '".$sf9w6w5e['up_key']."', '".$sf9w6w5e['up_code']."', '".$tsUser->uid."', '".time()."', '".time()."')")){
    if($mysqli->query("UPDATE rft_uploads SET up_state='0' WHERE up_id='".$idfile."'")){
        $mysqli->query("UPDATE rft_members SET u_size=u_size+'".$sf9w6w5e['up_vsize']."' WHERE u_id='".$tsUser->uid."'"); 
    return '1: Archivo eliminado correctamente.';
    }else{ return '0: Ocurrio un error al eliminar el archivo, Intenta nuevamente.'; }
    }else{ return '0: Ocurrio un error #hiohe7'; }
    }else{ return '0: Ocurrio un error #bepo45'; }
    }else{ return '0: No tienes permisos para ejecutar esta acción.'; }
    }else{ return '0: Esta acción es solo para registrados.'; }
    }else{ return '0: El archivo no existe.'; }
    }

/* FIN DE LA CLASS */
}