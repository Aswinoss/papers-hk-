function changeLang(lang){
          
            var req = new XMLHttpRequest();
            var vol = document.getElementById("vol_email");
            var params="volunteer_email="+vol.value+"&language="+lang;
            req.open("POST","/volunteer/language" , true);
            req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            req.send(params);
            pausecomp(500);
            location.reload();
}

function pausecomp(ms) {
ms += new Date().getTime();
while (new Date() < ms){}
} 

$(function() {	

	$("#eng").click(function(){
		changeLang('English');
	});
	$("#hin").click(function(){
		changeLang('Hindi');
	});
});