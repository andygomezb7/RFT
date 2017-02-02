<?php
// obtener archivos
$ultUploads = $tsUser->loadarch($tsUser->uid);

// Tu información
$snwelwse5 = $mysqli->query("SELECT u_nick, u_size, u_maxsize, u_permissions FROM rft_members WHERE u_id='".$tsUser->uid."'");
$se14we1s55 = $snwelwse5->fetch_assoc();
$sdf1w65sizeu = $tsGlobal->sizetext($se14we1s55['u_size']);
?>