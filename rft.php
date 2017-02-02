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

$SDF16SAD85F49WE = $tsGlobal->secure($_GET['detedata']);
$sd14as1as9e89w5w6e = $tsGlobal->secure($_GET['detekey']);
$sa5sdf19a8f16w5e1f9aw5saa = $mysqli->query("SELECT up_name, up_vname, up_img, up_size, up_key, up_code, up_date, up_ftype, up_typesize, up_state FROM rft_uploads WHERE up_code='".$SDF16SAD85F49WE."'");
$s1sdwew6w6w6 = $sa5sdf19a8f16w5e1f9aw5saa->fetch_assoc();
$typefile = $s1sdwew6w6w6['up_ftype'];
if($typefile == 'jpg' or $typefile == 'png' or $typefile == 'gif' or $typefile == 'jpeg' or $typefile == 'PNG' or $typefile == 'JPG' or $typefile == 'JPEG' or $typefile == 'GIF'){ 
$askdjowmeflñwefa4as85fw = 'arc/co';
}elseif($typefile == 'js' or $typefile == 'php' or $typefile == 'css' or $typefile == 'docx' or $typefile == 'zip' or $typefile == 'rar' or $typefile == 'txt' or $typefile == 'psd' or $typefile == 'exe' or $typefile == 'html'){
$askdjowmeflñwefa4as85fw = 'arc/he';
}else{ echo 'Archive no detected.'; }
if($s1sdwew6w6w6['up_name']){
if($s1sdwew6w6w6['up_state'] == 1){
	$namefileito = $s1sdwew6w6w6['up_code'];
    $ss1f9a5er1fas95awe = $tsGlobal->secure($_POST['metakey']);
if($ss1f9a5er1fas95awe == $s1sdwew6w6w6['up_key']){    
	if($typefile == 'js' or $typefile == 'php' or $typefile == 'css' or $typefile == 'html'){
		$typeito = $typefile; 
		$namefileitose = $s1sdwew6w6w6['up_vname'];
    $enlace = $askdjowmeflñwefa4as85fw.'/'.$namefileito.'.txt';   
    }else{ $typeito = $typefile; 
    $enlace = $askdjowmeflñwefa4as85fw."/".$namefileito.'.'.$typeito; 
    $namefileitose = $s1sdwew6w6w6['up_vname'];
    }
header ("Content-Disposition: attachment; filename=".$namefileitose." "); 
header ("Content-Type: application/octet-stream");
header ("Content-Length: ".filesize($enlace));
readfile($enlace);
echo "<script languaje='javascript' type='text/javascript'>$(document).ready(function(){ window.close(); });</script>";
}else{

include 'header.php';

if($sd14as1as9e89w5w6e && $sd14as1as9e89w5w6e == $s1sdwew6w6w6['up_key']){
echo '<form action="" method="POST">
<div>
<div style="width: 30%;float: left;margin: 0px 15px 0px 0px;height: 100%;background: #CCCCCC;">ADs</div>
<div><div><div></div><div><div><div><div><input type="hidden" value="'.$sd14as1as9e89w5w6e.'" name="metakey" /></div></div></div></div></div></div>
<div style="width: 541px;height: 210px;overflow: hidden;float: left;padding: 66px 0px;margin: 160px 0px 0px 95px;">
<div style="float: left;width: 41%;margin: 0px 7px 0px 0px;">
<div style="float:left;margin: 0px 8px 0px 0px;"><img style="height: 204px;margin: -12px 0px 0px 0px;" src="http://'.$tsGlobal->settings['url'].'/basepage/4r4s/65dsf16a5sd1f6a.png"></div>
</div>
<div style="float: left;width: 56%;font-size: 15px;font-weight: 100;padding: 35px 0px;">
<div style="margin: 0px 0px -16px 0px;font-size: 15px;line-height: 18px;color: #333333;padding-top: 5px;">'.$s1sdwew6w6w6['up_vname'].'</div>
<br />
<div style="color: #9C9898;">'.$s1sdwew6w6w6['up_size'].' '.$s1sdwew6w6w6['up_typesize'].'</div> 
<input type="submit" id="btndow" style="margin: 12px 0px 0px 0px;" class="active" value="Descargar" />
</div>
</div>
</div>
</form>
';
}else{
echo '
<form action="" method="POST">
<div>
<div style="width: 30%;float: left;margin: 0px 15px 0px 0px;height: 100%;background: #CCCCCC;">ADs</div>
<div><div><div></div><div><div><div><div></div></div></div></div></div></div>
<div style="width: 541px;height: 210px;overflow: hidden;float: left;padding: 66px 0px;margin: 160px 0px 0px 126px;">
<div style="float: left;width: 24%;margin: 0px 7px 0px 0px;">
</div>
<div style="float: left;width: 70%;font-size: 15px;font-weight: 100;">
<div style="float:left;margin: 0px 8px 0px 0px;"><img style="height: 52px;" src="http://'.$tsGlobal->settings['url'].'/basepage/4r4s/65f46sa5df1sadf.png"></div>
<div style="font-size: 13px;  line-height: 18px;  color: #333333;  padding-top: 5px;">Introduzca la clave del archivo</div>
<input type="text" class="input" placeholder="Introduce aqui la clave del archivo" name="metakey" style="width: 260px;">
<input type="submit" id="btndow" class="active" value="Descargar" />
</div>
</div>
</div>
</form>
';
}
include 'footer.php';

}
}else{ echo 'File no active.'; }
}else{ echo 'File no exist.'; }
?>