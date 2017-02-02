<?php 
if(!$title) $title = $tsGlobal->settings['title'].' | '. $tsGlobal->settings['lema']; 
if(!$descripcion) $descripcion = $tsGlobal->settings['descripcion'];
if(!$metatags) $metatags = $tsGlobal->settings['metatags'];
?>
<html>
</head>
<meta charset="utf-8" />
<title><?php echo  $title;?></title>
<meta name="description" content="<?php echo $descripcion; ?>" />
<meta name="keywords" content="<?php echo $metatags; ?>" />
<link rel="stylesheet" type="text/css" href="http://<?php echo $tsGlobal->settings['url']; ?>/css/global.css">
<link rel="stylesheet" type="text/css" href="http://<?php echo $tsGlobal->settings['url']; ?>/css/<?php echo $page; ?>.css">
<link href="http://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://<?php echo $tsGlobal->settings['url']; ?>/js/<?php echo $page; ?>.js"></script>
<script type="text/javascript" src="http://<?php echo $tsGlobal->settings['url']; ?>/js/global.js"></script>
<script src="http://www.wortit.net/js/jquery.plugins.js" type="text/javascript"></script>
<script src="http://www.wortit.net/js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://<?php echo $tsGlobal->settings['url']; ?>/cont/js/jquery.2.1.1.min.js"></script>
<script type="text/javascript">
var web_data = { url: 'http://<?php echo $tsGlobal->settings['url']; ?>', page: '<?php echo $page; ?>', }
$(document).ready(function(){ 
  $("#left").bind("contextmenu",function(e){ $("#SDF65Sf19").show().css({ left:e.pageX, top:e.pageY }); return false;  }); $(document).click(function(){ $("#SDF65Sf19").hide(); });  $("#rftavt").click(function(){ if($("#usermenu").css('display') == 'block'){ $("#usermenu").hide(); }else{ $("#usermenu").show(); } });  
 $('#fileup').bind('change', function() {
 var nualpsa = Math.round(Math.random()*1000000);
  $('#resultarch').append('<div id="archs'+nualpsa+'" class="div">'+$('#fileup').val().substring(12)+' <div id="close" onclick="$(\'#archs'+nualpsa+'\').remove();">x</div><br /><div id="arc'+nualpsa+'" style="overflow-y: auto;"></div> <div class="progress" id="progress'+nualpsa+'" ><div class="bar" id="bar'+nualpsa+'" style="width:0%;"></div></div> </div>');
  uppja.addqq22(nualpsa);
 });

});
</script>
</head>
<body>
  <div id="page"></div>
<ul id="SDF65Sf19"> 
<li class="first"><a onclick="$('#fileup').click();">Upload File</a></li> 
<li><a href="#">Add carpet</a></li> 
<li class="last"><a href="#">Add file</a></li> 
</ul>
   <div id="loading" style="display:none;"><img style="width: 30px;margin: 3px 0px 0px 0px;" src="http://i.imgur.com/jeZo4Pm.gif" /></div>
<div id="menu"><ul>
          <div style="float:left;">
         <li><a href="http://<?php echo $tsGlobal->settings['url']; ?>/#home"><img src="http://<?php echo $tsGlobal->settings['url']; ?>/arc/img/logo.png" style="margin: 2px 0px -13px 0px;"></a></li>
          </div>
          <div style="float:right;" id="right">
         <?php if($tsUser->uid){ ?>
         <li><a id="rftavt"><img src="<?php echo $tsUser->uavatar; ?>" /></a></li>
         <li><a onclick="global.setlogout();"><img style="margin: 0px 0px -9px 0px;width: 22px;" src="http://<?php echo $tsGlobal->settings['url']; ?>/basepage/4r4s/65sda4f65sadf.png" /></a></li>
         <?php }else{ ?>
         <li><a onclick="global.loginweb();">Iniciar sesión</a></li>
         <li><a onclick="global.registroweb();">Registrarme</a></li>
         <?php } ?>
           </div>
</ul></div>
<?php if($tsUser->uid){ ?>
<div id="usermenu">
  <div id="menrow"></div>
<li><a href="http://<?php echo $tsGlobal->settings['url']; ?>/">Mi RFT</a></li>
<li><a href="http://<?php echo $tsGlobal->settings['url']; ?>/micuenta/">Mi cuenta</a></li>
<li><a onclick="global.setlogout();">Cerrar sesión</a></li>
</div>
 <?php } ?>
   <div id="black-screen"></div>
   <div id="webmodal"></div>
   <div id="contweb">