<?php
/* 
 RFT WITCLO
 DEVELOPER BY ANDY GÓMEZ
 DATE HOME 27 JUL 14
 UPLOAD THE ARCHIVE
*/
    if( defined('TS_HEADER') ) return;
    define('UNTARGETED', TRUE);
if(!isset($_SESSION)) session_start(); 
error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE); 
ini_set('display_errors', TRUE); 
set_time_limit(300);

include 'includes.php';

/* DEFINE  */
$page = $tsGlobal->secure($_GET['p']);

if(!isset($page) ) $page = '';

if($page){
if(file_exists(TS_PHP.'p.'.$page.'.php')) include TS_PHP.'p.'.$page.'.php'; else echo 'El archivo php no existe.';
include 'header.php';
if(file_exists(TS_TEMP.$page.'.php')) include TS_TEMP.$page.'.php'; else echo 'El template no existe.';
    include 'footer.php';
}

?>