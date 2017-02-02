<?php
if( defined('TS_HEADER') ) return;
define('UNTARGETED', TRUE);
if(!isset($_SESSION)) session_start(); 
error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE); 
ini_set('display_errors', TRUE); 
set_time_limit(300);

include '../../includes.php';

$webfiles = array(
'webadd' => array('prm' => 1, 'p' => ''),
'webdel' => array('prm' => 1, 'p' => ''),
'loginweb' => array('prm' => 0, 'p' => ''),
'registerweb' => array('prm' => 0, 'p' => ''),
'logoutwebu' => array('prm' => 1, 'p' => ''),
'webaddv' => array('prm' => 1, 'p' => ''),
'webprogress' => array('prm' => 1, 'p' => ''),
'webaddproges' => array('prm' => 1,'p' => ''),
);

if($webfiles[$webpp]['prm'] == 1 && !$_SESSION['uid']){
	echo '0: Esta acción es solo para registrados.';
}else{
$webpp = $tsGlobal->secure($_GET['pp']);
$ppeg = 'templates/web_files/'.$webfiles[$webpp]['p'].'.php';
switch($webpp){
	case 'webadd':
	include '../class/upload.class.php';
	$tsUpload =& tsUpload::getInstance();
	echo $tsUpload->upload($_FILES['file']);
	break;
	case 'webdel':
    include '../class/upload.class.php';
	$tsUpload =& tsUpload::getInstance();
	$idfilehe = $tsGlobal->secure($_POST['id']);
	echo $tsUpload->delete_upload($idfilehe);
	break;
	case 'loginweb':
	$nicknamel = $tsGlobal->secure($_POST['nickname']);
	$passwordl = $tsGlobal->secure($_POST['password']);
    echo $tsUser->loginUser($nicknamel, $passwordl);
	break;
	case 'registerweb':
	echo $tsUser->register();
	break;
	case 'logoutwebu':
    echo $tsUser->cerrar();
	break;
	case 'webaddv':
    	include '../class/upload.class.php';
	$tsUpload =& tsUpload::getInstance();
	echo $tsUpload->varios_upload($_FILES["archivos"]);
	break;
	case 'webprogress':
    if(isset($_GET['progress_key']) and !empty($_GET['progress_key'])){ 
    	// apc_fetch();
    $status = $_GET['progress_key'];  
    echo $status['current']/$status['total']*100;
    exit;
    }
	break;
	case 'webaddproges':
    $uiq = uniqid();
    echo $uiq;
	break;
	default:
	echo '0: La pagina no existe.';
	break;
}
if($webfiles[$webpp]['p']){ if(file_exists($ppeg)){ include $ppeg; }else{ echo '0: No se encontro el archivo.'; } }else{}
}
?>