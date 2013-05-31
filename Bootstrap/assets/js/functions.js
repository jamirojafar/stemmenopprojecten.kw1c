function getCookie(c_name)
{
var c_value = document.cookie;
var c_start = c_value.indexOf(" " + c_name + "=");
if (c_start == -1)
{
c_start = c_value.indexOf(c_name + "=");
}
if (c_start == -1)
{
c_value = null;
}
else
{
c_start = c_value.indexOf("=", c_start) + 1;
var c_end = c_value.indexOf(";", c_start);
if (c_end == -1)
{
c_end = c_value.length;
}
c_value = unescape(c_value.substring(c_start,c_end));
}
return c_value;
}

function speel()
{

	var iPad = getCookie('ipad');

	if (iPad == "true")
	{

		var player = document.getElementById('speler');
		
		player.load();
		player.play();
		
	}

}

function openVoteBox(object,id,cat){
	 var name = $(object).closest('.item').find('p.name').html();
	 
	 $('#votebox, #overlay').fadeIn('fast');
	 $('#votebox .projectname').html(name);
	 
	 // Maak een post request naar de stem handler
	 $('#votebox button[name="stem"]').click(function(){
		$('#votebox button[name="stem"]').html("Bezig...");
		
		$.post("./assets/php/votehandler.php", { itemid: id,cat: cat}, function(data) {
			console.log(data);
			if(data.result == true){
				$('#votebox .projectname').html("succesvol uitgebracht");
				$('#votebox button[name="stem"]').hide();
				$('#votebox p').html('Dit scherm sluit automatisch, of gebruik onderstaande knop.');
				$('.row .item').fadeOut('slow');
				$('h3.subtitle').html("Je hebt al gestemd in deze categorie.");
				setTimeout(function(){
					$('#votebox, #overlay').fadeOut('fast');
				},2000);
			}
			else{
				$('#votebox .projectname').html("Mislukt");
				$('#votebox p').html('Stem niet succesvol doorgevoerd.<br/><i style="color: red;">"'+data.err+'"</i>');
				$('#votebox button[name="stem"]').html("Stem");
			}
		}, "json");
	});
}

$(document).ready(function(){
	$('#votebox button[name="close"]').click(function(){
		$('#votebox, #overlay').fadeOut('fast');
	});
});