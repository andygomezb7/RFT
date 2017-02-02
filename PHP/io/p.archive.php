<?php
$smds51f9awwe54f9w = $tsGlobal->secure($_GET['conts']);
$msoadfkm = $mysqli->query("SELECT up_name, up_img, up_size, up_key, up_code, up_date, up_ftype, up_typesize, up_state FROM rft_uploads WHERE up_name='".$smds51f9awwe54f9w."'");
$s4sf8w1w6 = $msoadfkm->fetch_assoc();
if($s4sf8w1w6['up_name']){
if($s4sf8w1w6['up_state'] == 1){
$archive = $s4sf8w1w6;
$archive['size'] = $archive['up_size'].' '.$archive['up_typesize'];
$s74df198s1f9wa16we = 1;
}else{
$s74df198s1f9wa16we = 2;
}
}else{ $s74df198s1f9wa16we = 3; }

?>