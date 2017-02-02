<?php   if ( ! defined('TS_HEADER')) exit('No se permite el acceso directo ala web');
/** FUNCIONES GLOBALES | POWERED BY: Wortit Developers **/

class tsGlobal{
	var $settings;
	var $querys = 0;
	// INSTANCIA DE LA CLASE
	public static function &getInstance(){
	static $instance;
	if( is_null($instance) ){ $instance = new tsGlobal(); }
	return $instance;
	}

	public function isMobile() {
    $mobiles = array( "midp", "240x320", "blackberry", "netfront", "nokia", "panasonic", "portalmmm", "sharp", "sie-", "sonyericsson", "symbian", "windows ce", "windows phone", "benq", "mda", "mot-", "opera mini", "philips", "pocket pc", "sagem", "samsung", "sda", "sgh-", "vodafone", "xda", "iphone", "android" );
    foreach($mobiles as $mobileClient){ if (strstr(strtolower($_SERVER['HTTP_USER_AGENT']), $mobileClient)) return true; }
    return false;
    }
	
	// FUNCION MOSTRAR	
	function tsGlobal(){
		// CARGANDO CONFIGURACIONES
		$this->settings['domain'] = str_replace('http://','',$this->settings['direccion_url']);
		$this->settings['title'] = 'RFT';
		$this->settings['lema'] = 'Guardando tus recuerdos';
		$this->settings['descripcion'] = 'RFT - Sube tus imagenes a nuestros servidores ¡Ahora!';
		$this->settings['metatags'] = 'upload, subir, archivos, web, img, image, png, jpg, gif, png';
		$this->settings['url'] = 'localhost/rft';
        //
	    }
	
	
	/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

    /* 
    *  Numeros en 15k  => 15 mil , 1M => 1 millon
    */

    function posnum($number){
     	$pre = 'KMG';
	if ($number >= 1000) {
		for ($i=-1; $number>=1000; ++$i) {
			$number /= 1000;
		}
		return round($number,1).$pre[$i];
	} else return $number;
    }

     function sizetext($peso , $decimales = 2 ){
     $clase = array(" Bytes", " KB", " MB", " GB", " TB"); 
     return round($peso/pow(1024,($i = floor(log($peso, 1024)))),$decimales).' '.$clase[$i]; 
     }
	
	  /*
        antiFlood()
    */
    public function antiFlood($fetch ,$print = true, $type = 'post', $msg = '')
    {
        //
        $now = time();
        $msg = empty($msg) ? 'No puedes realizar tantas acciones en tan poco tiempo.' : $msg;
        //
        $limit = 15;
        $resta = $now - $fetch;
        if($resta < $limit) {
            $msg = '0: '.$msg.' Int&eacute;ntalo en '.($limit - $resta).' segundos.';
            // TERMINAR O RETORNAR VALOR
            if($print) die($msg);
            else return $msg;
        }
        else {
            // ANTIFLOOD
            if(empty($_SESSION['flood'][$type])) {
                $_SESSION['flood'][$type] = time();
            } else $_SESSION['flood'][$type] = $now;
            // TODO BIEN
            return true;
        }
    }
	
		/*
		setHace()
	*/
	function setHace($fecha, $show = false){
		$fecha = $fecha; 
		$ahora = time();
		$tiempo = $ahora-$fecha; 
		if($fecha <= 0){
			return 'Nunca';
		}
		elseif(round($tiempo / 31536000) <= 0){ 
			if(round($tiempo / 2678400) <= 0){ 
				 if(round($tiempo / 86400) <= 0){ 
					 if(round($tiempo / 3600) <= 0){ 
						if(round($tiempo / 60) <= 0){ 
							if($tiempo <= 60){ $hace = 'instantes'; } 
						} else  { 
							$can = round($tiempo / 60); 
							if($can <= 1) {    $word = 'minuto'; } else { $word = 'minutos'; } 
							$hace = $can. " ".$word; 
						} 
					} else { 
						$can = round($tiempo / 3600); 
						if($can <= 1) {    $word = 'hora'; } else {    $word = 'horas'; } 
						$hace = $can. " ".$word; 
					} 
				} else  { 
					$can = round($tiempo / 86400); 
					if($can <= 1) {    $word = 'd&iacute;a'; } else {    $word = 'd&iacute;as'; } 
					$hace = $can. " ".$word;
				} 
			} else  { 
				$can = round($tiempo / 2678400);  
				if($can <= 1) {    $word = 'mes'; } else { $word = 'meses'; } 
				$hace = $can. " ".$word; 
			}
		 }else  {
			$can = round($tiempo / 31536000); 
			if($can <= 1) {    $word = 'a&ntilde;o';} else { $word = 'a&ntilde;os'; } 
			$hace = $can. " ".$word; 
		 }
		 //
		 if($show == true) return 'Hace '.$hace;
		 else return $hace;
	}
		/*
		setSEO($string, $max) $max : MAXIMA CONVERSION
		: URL AMIGABLES
	*/
	function setSEO($string, $max = false) {
		$string = str_replace(' ', '-', $string);
		// ESPAÑOL
		$espanol = array('á','é','í','ó','ú','ñ');
		$ingles = array('a','e','i','o','u','n');
		// MINUS
		$string = str_replace($espanol,$ingles,$string);
		$string = trim($string);
		$string = trim(preg_replace('/[^ A-Za-z0-9_]/', '-', $string));
		$string = preg_replace('/[ \t\n\r]+/', '-', $string);
		$string = preg_replace('/[ -]+/', '-', $string);
		//
		if($max) {
			$string = str_replace('-','',$string);
			$string = strtolower($string);
		}
		//
		return $string;
	}

       /** DIAS TRANSCURRIDOS ENTRE DOS FECHAS **/

       function daystr($fecha_i,$fecha_f){
       $dias = (strtotime($fecha_i)-strtotime($fecha_f))/86400;
       $dias = abs($dias); $dias = floor($dias);
       return $dias;
       }

		/*
		secure()
	*/
	public function secure($var, $xss = FALSE)
    {
        $var = mysql_real_escape_string(function_exists('magic_quotes_gpc') ? stripslashes($var) : $var);
        /**
       * if ($xss)
        *{
        *$var = htmlspecialchars($var, ENT_NOQUOTES,'UTF-8');
        *}*/
     return $var;
    }

/*** OBTENER IMAGENES DE CARPETAS ***/

function get_icons($f = 'cats', $size = null){
		global $web;
        $arr_ext = array('jpg', 'png', 'gif');
        $mydir = opendir(TS_ROOT.'/images/icons/'.$f);
        while($file = readdir($mydir)){
            $ext = substr($file, -3);
            if(in_array($ext, $arr_ext)){
                if(!empty($size)){
                    $im_size = substr($file, -6, 2);
                    if ($size == $im_size)
                        $icons[] = substr($file, 0, -7);
                }else $icons[] = $file;
            }
        }
        return $icons;
    }

	
		 function getBodyimg($texto) {
    $foto = '';
    ob_start();
    ob_end_clean();
    preg_match_all("/<img[\s]+[^>]*?src[\s]?=[\s\"\']+(.*\.([gif|jpg|png|jpeg]{3,4}))[\"\']+.*?>/", $texto, $array);
    $foto = $array [1][0];
    if(empty($foto)){
        $foto = $this->settings['direccion_url'].'/images/avatar/group.png';
    }
    return $foto;
     }
	 
	 
function wrecorte($texto, $limite=100){   
    $texto = trim($texto);
    $texto = strip_tags($texto);
    $tamano = strlen($texto);
    $resultado = '';
    if($tamano <= $limite){
        return $texto;
    }else{
        $texto = substr($texto, 0, $limite);
        $palabras = explode(' ', $texto);
        $resultado = implode(' ', $palabras);
        $resultado .= '...';
    }   
    return $resultado;
}
	
	/*
	 IP ORIGINAL
	   */
	   function getRealIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
        return $_SERVER['HTTP_CLIENT_IP'];
       
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
   
    return $_SERVER['REMOTE_ADDR'];
}


	/*
		setJSON($tsContent)
	*/
	function setJSON($data, $type = 'encode'){
		require_once(TS_ROOT.'/ext/JSON.php');	// INCLUIMOS LA CLASE
		$json = new Services_JSON;	// CREAMOS EL SERVICIO
        if($type == 'encode') return $json->encode($data);
        elseif($type == 'decode') return $json->decode($data);            
	}
	
		/*
		setPagesLimit($tsPages, $start = false)
	*/
	function setPageLimit($tsLimit, $start = false, $tsMax = 0){
		if($start == false)
		$tsStart = empty($_GET['page']) ? 0 : (int) (($_GET['pagina'] - 1) * $tsLimit);
		else {
    		$tsStart = (int) $_GET['s'];
            $continue = $this->setMaximos($tsLimit, $tsMax);
            if($continue == true) $tsStart = 0;
        }
		//
		return $tsStart.','.$tsLimit;
	}
    /*
        setMaximos()
        :: MAXIMOS EN LAS PAGINAS
    */
    function setMaximos($tsLimit, $tsMax){
        // MAXIMOS || PARA NO EXEDER EL NUMERO DE PAGINAS
        $ban1 = ($_GET['page'] * $tsLimit);
        if($tsMax < $ban1){
            $ban2 = $ban1 - $tsLimit;
            if($tsMax < $ban2) return true;
        } 
        //
        return false;
    }
	    /**/
	// Constructs a page list.
	// $pageindex = constructPageIndex($scripturl . '?board=' . $board, $_REQUEST['start'], $num_messages, $maxindex, true);
	function pageIndex($base_url, &$start, $max_value, $num_per_page, $flexible_start = false){
        // QUITAR EL S de la base_url
        $base_url = explode('&s=',$base_url);
        $base_url = $base_url[0];
		// Save whether $start was less than 0 or not.
		$start_invalid = $start < 0;
	
		// Make sure $start is a proper variable - not less than 0.
		if ($start_invalid)
			$start = 0;
		// Not greater than the upper bound.
		elseif ($start >= $max_value)
			$start = max(0, (int) $max_value - (((int) $max_value % (int) $num_per_page) == 0 ? $num_per_page : ((int) $max_value % (int) $num_per_page)));
		// And it has to be a multiple of $num_per_page!
		else
			$start = max(0, (int) $start - ((int) $start % (int) $num_per_page));
	
		$base_link = '<a class="navPages" href="' . ($flexible_start ? $base_url : strtr($base_url, array('%' => '%%')) . '&s=%d') . '">%s</a> ';
	
			// If they didn't enter an odd value, pretend they did.
			$PageContiguous = (int) (5 - (5 % 2)) / 2;
	
			// Show the first page. (>1< ... 6 7 [8] 9 10 ... 15)
			if ($start > $num_per_page * $PageContiguous)
				$pageindex = sprintf($base_link, 0, '1');
			else
				$pageindex = '';
	
			// Show the ... after the first page.  (1 >...< 6 7 [8] 9 10 ... 15)
			if ($start > $num_per_page * ($PageContiguous + 1))
				$pageindex .= '<b> ... </b>';
	
			// Show the pages before the current one. (1 ... >6 7< [8] 9 10 ... 15)
			for ($nCont = $PageContiguous; $nCont >= 1; $nCont--)
				if ($start >= $num_per_page * $nCont)
				{
					$tmpStart = $start - $num_per_page * $nCont;
					$pageindex.= sprintf($base_link, $tmpStart, $tmpStart / $num_per_page + 1);
				}
	
			// Show the current page. (1 ... 6 7 >[8]< 9 10 ... 15)
			if (!$start_invalid)
				$pageindex .= '[<b>' . ($start / $num_per_page + 1) . '</b>] ';
			else
				$pageindex .= sprintf($base_link, $start, $start / $num_per_page + 1);
	
			// Show the pages after the current one... (1 ... 6 7 [8] >9 10< ... 15)
			$tmpMaxPages = (int) (($max_value - 1) / $num_per_page) * $num_per_page;
			for ($nCont = 1; $nCont <= $PageContiguous; $nCont++)
				if ($start + $num_per_page * $nCont <= $tmpMaxPages)
				{
					$tmpStart = $start + $num_per_page * $nCont;
					$pageindex .= sprintf($base_link, $tmpStart, $tmpStart / $num_per_page + 1);
				}
	
			// Show the '...' part near the end. (1 ... 6 7 [8] 9 10 >...< 15)
			if ($start + $num_per_page * ($PageContiguous + 1) < $tmpMaxPages)
				$pageindex .= '<b> ... </b>';
	
			// Show the last number in the list. (1 ... 6 7 [8] 9 10 ... >15<)
			if ($start + $num_per_page * $PageContiguous < $tmpMaxPages)
				$pageindex .= sprintf($base_link, $tmpMaxPages, $tmpMaxPages / $num_per_page + 1);
	
		return $pageindex;
	}
		/*
		getPages($tsTotal, $tsLimit)
		: PAGINACION
	*/
	function getPages($tsTotal, $tsLimit){
		//
		$tsPages = ceil($tsTotal / $tsLimit);
		// PAGINA
		$tsPage = empty($_GET['pagina']) ? 1 : $_GET['pagina'];
		// ARRAY
		$pages['current'] = $tsPage;
		$pages['pages'] = $tsPages;
		$pages['section'] = $tsPages + 1;
		$pages['prev'] = $tsPage - 1;
		$pages['next'] = $tsPage + 1;
        $pages['max'] = $this->setMaximos($tsLimit, $tsTotal);
		// RETORNAMOS HTML
		return $pages;
	}
	
	    /*
        getPagination($total, $per_page)
    */
    function getPagination($total, $per_page = 10){
        // PAGINA ACTUAL
        $page = empty($_GET['page']) ? 1 : (int) $_GET['page'];
        // NUMERO DE PAGINAS
        $num_pages = ceil($total / $per_page);
        // ANTERIOR
        $prev = $page - 1;
        $pages['prev'] = ($page > 0) ? $prev : 0;
        // SIGUIENTE 
        $next = $page + 1;
        $pages['next'] = ($next <= $num_pages) ? $next : 0;
        // LIMITE DB
        $pages['limit'] = (($page - 1) * $per_page).','.$per_page; 
        // TOTAL
        $pages['total'] = $total;
        //
        return $pages;
    }
	
	/****
	ADD VISITAS
	***/

	function visitasAdd($id, $type){
   global $mysqli;
    /*
    * 1 => perfil -
    * 2 => grupo -
    * 3 => juego - 
    * 4 => bwort -
    * 5 => nota -
    * 6 => tema -
    * 7 => registro -
    * 8 => notificaciones -
    * 9 => tienda
    * 10 => mensajes entre -
    * 11 => home mensajes -
    * 12 => home grupos -
    * 13 => home logeado -
    * 14 => home inlogeado -
    * 15 => buscador -
    * 16 => foro home -
    * 17 => new home -
    * 18 => editar/cuenta -
    * 19 => editar/privacidad -
    * 20 => editar/seguridad -
    * 21 => chat global -
    * 22 => calendario -
    * 23 => recuperar contraseña -
    * 24 => tops juegos -
    * 25 => albums juegos -
    * 26 => favoritos juegos -
    * 27 => editar juego -
    * 28 => agregar juego -
    * 29 => home juegos -
    * 30 => agregar agregado juego -
    * 31 => agregar tema -
    * 32 => editar tema -
    * 33 => editar foro -
    * 34 => miembros de foro -
    * 35 => mod history de foro -
    * 36 => foro -
    * 37 => Nuevo foro -
    * 38 => mis foros -
    * 39 => buscador foro -
    * 40 => directorio foro -
    * 42 => mod history foro home -
    * 43 => favoritos foro home -
    * 44 => borradores foro home -
    */

	$hace = time();
	if($_SESSION['uid']){
	$u = $_SESSION['uid'];
	}else{
	$u = $this->getRealIP();
	}
	
	$mysqli->query("INSERT INTO visitas (id_v, type, v_hace, u_v) VALUES('".$id."', '".$type."', '".$hace."', '".$u."')");
	}
	
	/***
	TIPOS DE VISITAS
	***/
	
	function typeV($type){
	$typ = array(
	1 => 'perfil',
	2 => 'home',
	3 => 'grupo',
	4 => 'comun',
	5 => 'nota',
	6 => 'bwort',
	7 => 'juego',
	);
	
	}

	
/*** FIN CLASS ****/	
}
?>