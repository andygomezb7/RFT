<script type="text/javascript" src="http://<?php echo $tsGlobal->settings['url'].'/js/upload.js'; ?>"></script>
<div id="home">
<?php if($tsUser->uid){  ?>
    <script type="text/javascript">
        var c=document.getElementById("tutorial"); var cxt=c.getContext("2d");
        cxt.fillStyle ="grey"; cxt.beginPath(); cxt.arc(60,60,50,0,Math.PI*2,true); cxt.closePath(); cxt.fill();
    </script>
<div id="conthome">

<div id="left">
	<div id="titleh">Ultimos archivos</div>
<div id="contentup">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="gtbnameid"><tbody><tr>
                  <th class="grid-first-th" width="30"><span class="grid-header-star"></span></th>
                  <th style="width: 223px;border-left: 2px solid white;">Name</th>
                  <th width="100" style="border-left: 2px solid white;">Size</th>
                  <th width="130" style="border-left: 2px solid white;">Type</th>
                  <th width="120" style="border-left: 2px solid white;">Created</th>
                  <th width="50" style="border-left: 2px solid white;">URL</th>
</tr></tbody></table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="grid-table fm">
<tbody>
<?php while($row = $ultUploads->fetch_assoc()){ ?>
<tr id="file">
<td width="30" style="border-bottom: 1px solid #DDDDDD;" id="dataclick" onclick="webrft.alert('<?php echo $row['up_name']; ?>', '<div style=min-height:259px;min-width:400px; ><div style=width:189px;height:259px;float:left;><div class=\'img <?php echo $row['up_ftype'];?>\'><?php if($row['up_ftype'] == 'png' or $row['up_ftype'] == 'gif' or $row['up_ftype'] == 'jpg' or $row['up_ftype'] == 'jpeg'){ ?><div id=background style=\'background-image: url(http://<?php echo $tsGlobal->settings['url']; ?>/page/<?php echo $row['up_ftype'];?>/<?php echo $row['up_code'];?>.<?php echo $row['up_ftype'];?>);background-repeat: no-repeat;background-position: center;background-color:#FFFFFF;\'></div><?php } ?></div></div><div style=float:left;width:62%;font-size:21px;>Nombre: <?php echo $row['up_vname']; ?><br />Tipo: <?php echo $row['up_ftype']; ?><br /> Tamaño: <?php echo $row['up_size']; ?> <?php echo $row['up_typesize']; ?> </div></div>');">
<canvas id="tutorial" width="8" height="8" style="border: 1px solid rgb(209, 209, 209);background: #CCCCCC;border-radius: 15px;margin: 0px 0px 0px 10px;">Tu navegador no soporta canvas. Actualizalo</canvas>
</td>
<td style="width: 223px;border-bottom: 1px solid #DDDDDD;"><?php echo $row['up_vname']; ?></td>
<td width="100" style="border-bottom: 1px solid #DDDDDD;"><?php echo $row['up_size']; ?> <?php echo $row['up_typesize']; ?></td>
<td width="130" style="border-bottom: 1px solid #DDDDDD;text-transform: capitalize;">Archive <?php echo $row['up_ftype']; ?></td>
<td width="120" style="border-bottom: 1px solid #DDDDDD;"><?php echo $tsGlobal->setHace($row['up_date']); ?></td>
<td width="50" style="border-bottom: 1px solid #DDDDDD;"><a id="dataclick" onclick="global.globalsdowkeys('<?php echo $row['up_vname']; ?>', '<?php echo $row['up_size']; ?> <?php echo $row['up_typesize']; ?>', 'http://<?php echo $tsGlobal->settings['url']; ?>/basename/ur/<?php echo $row['up_code']; ?>/', '<?php echo $row['up_key']; ?>');" style="cursor:pointer;background: #FFFFFF;padding: 14px 10px 1px 10px;z-index:100000;"><img src="http://<?php echo $tsGlobal->settings['url']; ?>/basepage/5f5s/ir.png" /></a></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>


</div>

<div id="right">
<div id="titleh">Subida de archivos</div>
<div id="formh">
<form enctype="multipart/form-data" id="uploadImage" action="http://<?php echo $tsGlobal->settings['url'].'/ajx/webadd.php'; ?>" method="POST">
<div style="overflow: hidden;margin: 0px auto 6px auto;width: 83%;">
<div class="custom-input-file"><input type="file" class="input-file" name="file" id="fileup" value="arch">Subir archivo</div>
<div class="custom-input-file" style="margin: 0px 0px 0px 5px;"><input type="file" class="input-file" name="files" id="fileups" value="url">Subir URL</div>
</div>

<input type="button" class="active" id="btndefault" value="Subir" />
<br />
<textarea id="previewur"></textarea>
</form>
<hr>
<div id="resultarch"></div>
<div id="titleh">Tu información</div>
<div>
Almacenamiento: <?php echo $sdf1w65sizeu; ?>/<?php echo $se14we1s55['u_maxsize']; ?> GB
</div>
</div>
</div>


</div>
<?php }else{ ?>
<div id="conthome">
<a onclick="webrft.alert('hola', 'esta es la modal');">Esta es la modal</a>
	</div>
<?php } ?>
</div>
