var webrft = { is_show: false, show: function() { 
if(this.is_show) return; else this.is_show = true; if($('#webmodal').html() == '') $('#webmodal').html('<div id="modal_content"><div id="modal_loading"></div><div id="modal_titulo"></div><div id="modal_body"></div><div id="modal_buttons"></div></div>').fadeIn(250);  if($('#modal_content').height() > $(window).height()-60) $('#modal_content').css({'position':'absolute', 'top':20}); else $('#modal_content').css('top', $(window).height()/2-$('#modal_content').height()/2); $('#modal_content').css('left', $(window).width()/2-$('#modal_content').width()/2); $('#black-screen').show(); $('#black-screen').click(function(){ modal.close() }); }, title: function(title){ $('#modal_content #modal_titulo').html(title + '<a href="javascript:webrft.close()" class="modal_close" title="Cerrar"></a>'); }, body: function(body, width, height){ $('#webmodal #modal_content').width(width?width:'').height(height?height:''); $('#webmodal #modal_body').html(body); }, buttons: function(btn_1, btn1_link, btn_2, btn2_link) { $('#webmodal #modal_buttons').html(''); if(btn_1) { $('#webmodal #modal_buttons').append('<a onClick="' + (btn1_link=='close'?'webrft.close()':btn1_link) + '" class="accept">' + btn_1 + '</a>'); } if(btn_2) { $('#webmodal #modal_buttons').append('<a onClick="' + (btn2_link=='close'?'webrft.close()':btn2_link) + '" class="cancel">' + btn_2 + '</a>'); } if($('#webmodal #modal_buttons').html() == '') $('#webmodal #modal_buttons').remove(); }, close: function(){	this.is_show = false; $('#black-screen').fadeOut(250); $('#webmodal #modal_content').fadeOut('fast', function(){ $(this).remove() }); $('#webmodal').fadeOut(250); this.load_fin(); }, alert: function(title, body, reload){ this.load_fin(); this.show(); this.title(title); this.body(body); $('#webmodal #modal_body').css({'text-align' : 'center'}); this.buttons('Aceptar', (reload ? 'location.reload();' : 'webrft.close()')); }, load_inicio: function() { $('#webmodal #modal_loading').fadeIn('fast');	}, load_fin: function() { $('#webmodal #modal_loading').fadeOut('fast'); }	 } 
var global = {
	loginweb: function(){
	webrft.show();
	webrft.title('Iniciar Sesión');
	webrft.body('<form method="POST" id="loginm"><div id="aviso"></div><input type="text" id="nicknamel" placeholder="Nick de usuario"/><input type="password" id="passwordl" placeholder="123456" /></form>');
	webrft.buttons('Iniciar sesión', 'global.loginset()', 'cancelar', 'close');
	},
	loginset: function(){ 
	$("#loading").fadeIn(250); 
	$.ajax({ 
	url: web_data.url+'/ajx/loginweb.php', 
	type: 'POST', 
	data: 'nickname='+$("#nicknamel").val()+'&password='+$("#passwordl").val(), 
	success: function(h){ 
	switch(h.charAt(1)){ 
	case 0: case '0': 
	$("#loading").fadeOut(250); 
	$("#loginm #aviso").html(h.substring(3)).fadeIn(250); 
	break; 
	case 1: case '1': 
	$("#loading").fadeOut(250); 
	webrft.alert('Iniciar Sesión', h.substring(3), 1); 
	location.reload();
	break; 
	default: 
	$("#loading").fadeOut(250); 
	webrft.alert('Iniciar Sesión', h.substring(3), 1); 
	break; 
    } 
    } 
    });
	},
	registroweb: function(){
	webrft.show();
	webrft.title('Registrarme');
	webrft.body('<form method="POST" id="registro"><div id="aviso"></div><div id="title">Nickname</div><input type="text" id="nickname" placeholder="Nick identificador de usuario" /><div id="title">Correo electronico</div><input type="text" id="mail" placeholder="example@correo.com" /><div id="title">Contraseña</div><input type="password" id="pass" placeholder="Escribe aqui tu contraseña" /><div id="title">Repite tu contraseña</div><input type="password" id="passtwo" placeholder="Vuelve a escribir aqui tu contraseña" /></form>');
	webrft.buttons('Registrarme', 'global.setregistro()', 'Cancelar', 'close');
	},
	setregistro: function(){
    $("#loading").fadeIn(250);
    $.ajax({
    	url: web_data.url+'/ajx/registerweb.php',
    	type: 'POST',
    	data: 'name='+$('#nickname').val()+'&pass='+$('#pass').val()+'&repass='+$('#passtwo').val()+'&mail='+$('#mail').val(),
    	success: function(h){
        switch(h.charAt(1)){
        case 0: case '0':
 	    $("#loading").fadeOut(250); 
	    $("#registro #aviso").html(h.substring(3)).fadeIn(250); 
        break;
        case 1: case '1':
	    $("#loading").fadeOut(250); 
	    $("#registro #aviso").html(h.substring(3)).fadeIn(250); 
	    location.reload();
        break;
        default:
	    $("#loading").fadeOut(250); 
	    $("#registro #aviso").html(h.substring(3)).fadeIn(250); 
        break;
        }
    	}
    });
	},
	setlogout: function(){
	webrft.show();
	webrft.title('Cerrar sesion');
	webrft.body('¿Estas seguro que deseas cerrar sesión?');
	webrft.buttons('Cerrar sesión', 'global.logoutset()', 'Cancelar', 'close');
	},
	logoutset: function(){
		$("#loading").fadeIn(250);
    		$.ajax({
			url: web_data.url+'/ajx/logoutwebu.php',
			type: 'POST',
			data: 'ger=26FQW151f98weq',
			success: function(h){
            switch(h.charAt(1)){
            	case 0: case '0':
            	$("#loading").fadeOut(250);
                webrft.alert('Error', h.substring(3));
            	break;
            	case 1: case '1':
                $("#loading").fadeOut(250);
                webrft.alert('Echo', h.substring(3), 1);
                location.reload();
            	break;
            	default:
                $("#loading").fadeOut(250);
                webrft.alert('Aviso', h.substring(3), 1);
            	break;
            }
			}
		});
	},
	globalsdowkeys: function(title, size, enlace, key){
    webrft.alert('Enlace de descarga y key definida.', '<div style="padding-top: 8px;width:515px;"><div style="font-size: 13px;line-height: 21px;color: #333333;white-space: nowrap;-webkit-user-select: text;-khtml-user-select: text;-moz-user-select: text;-ms-user-select: text;">'+title+' <span style="color: #999999;">'+size+'</span></div><div style="font-size: 13px;line-height: 21px;color: #333333;white-space: nowrap;-webkit-user-select: text;-khtml-user-select: text;-moz-user-select: text;-ms-user-select: text;">'+enlace+'<span id="keyval" style="color: #999999;display:none;">?detekey='+key+'</span></div><div style="position: relative;margin: 27px -75px 0px -4px;overflow: hidden;width: 110px;float: left;"><input style="width: 21px;height: 21px;background-position: left -8554px;background-image: url(https://g.cdn1.mega.co.nz/images/mega/main-sprite.png?v=7);background-repeat: no-repeat;float: left;cursor: pointer;margin: 0 0 0 0;margin: 5px 11px 0 0;webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;" type="checkbox" id="divkeyval" value="1" onclick=\'if($("#divkeyval").is(":checked")){ $("#keyval").fadeIn(250); }else{ $("#keyval").fadeOut(250); }\' /> Mostrar key de acceso</div></div>');
	},
}
