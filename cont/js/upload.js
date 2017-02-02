var uppja = {
addqq21: function(){
$("#loading").fadeIn(250); var inputFileImage = document.getElementById("fileup"); var file = inputFileImage.files[0]; var data = new FormData(); data.append("file",file); var url = web_data.url+'/ajx/webadd.php';
$.ajax({ url:url, type:"POST", contentType:false, data:data, processData:false, cache:false, success: function(h){  switch(h.charAt(1)){ case 1: case '1': $("#loading").fadeOut(250);  $("#fileup").val('');  $("#previewur").val(h.substring(3)); break; case 0: case '0': $("#loading").fadeOut(250);  $("#previewur").val(h.substring(3)); break; default: $("#loading").fadeOut(250); $("#previewur").val(h.substring(3)); break; } } });
},
addqq22: function(dete){
$("#loading").fadeIn(250); $("#bar"+dete).css({width: '8%'}); var inputFileImage = document.getElementById("fileup"); var file = inputFileImage.files[0]; var data = new FormData(); data.append("file",file); var url = web_data.url+'/ajx/webadd.php';
$.ajax({ url:url, type:"POST", contentType:false, data:data, processData:false, cache:false, 
success: function(h){ $("#loading").fadeOut(250); $("#bar"+dete).css({width: '100%'}); $("#fileup").val(''); $('#progress'+dete).fadeOut(250); $("#arc"+dete).html(h.substring(3));  } 
});
},
}

//Codes
$(document).ready(function(){

// Ready document 
$(".progress").show();
$(".badge").show(); 
$(".bar").show(); 

// Ready document fin
});