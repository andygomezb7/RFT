<?php
if(!defined('UNTARGETED')) die('No se permite el acceso directo al este archivo');
$mysql['secure_code'] = substr(md5('SF3_S3CUR3'.rand(0, 9)) ,0, 6);
$mysql['server'.$mysql['secure_code']] = 'localhost';
$mysql['user'.$mysql['secure_code']] = 'root';
$mysql['db'.$mysql['secure_code']] = 'rftw';
$mysql['password'.$mysql['secure_code']] = '';
$mysqli = new mysqli($mysql['server'.$mysql['secure_code']], $mysql['user'.$mysql['secure_code']], $mysql['password'.$mysql['secure_code']], $mysql['db'.$mysql['secure_code']]);
$mysqli->query("set names 'utf8'");
$mysql = '';
date_default_timezone_set('America/Guatemala');
?>