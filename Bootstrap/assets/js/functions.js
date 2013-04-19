function openVoteBox(object,id,cat){
	 var name = $(object).closest('.item').find('p.name').html();
	 
	 $('#votebox, #overlay').fadeIn('fast');
	 $('#votebox .projectname').html(name);
	 
	 // Maak een post request naar de stem handler
	 $('#votebox button[name="stem"]').click(function(){
		$.post("./assets/php/votehandler.php", { itemid: id,cat: cat}, function(data) {
			console.log(data);
			if(data.result == true){
				$('#votebox .projectname').html("succesvol uitgebracht");
				$('#votebox button[name="stem"]').hide();
				$('#votebox p').html('Dit scherm sluit automatisch, of gebruik onderstaande knop.');
				$('.row .item').each(function(index){
					$(this).delay(200*index).fadeOut('slow');
				});
				$('h3.subtitle').html("Je hebt al gestemd in deze categorie.");
				setTimeout(function(){
					$('#votebox, #overlay').fadeOut('fast');
				},2000);
			}
			else{
				$('#votebox .projectname').html("mislukt");
				$('#votebox p').html('Er is iets mis gegaan, probeer het opnieuw.');
			}
		}, "json");
	});
}

$(document).ready(function(){
	$('#votebox button[name="close"]').click(function(){
		$('#votebox, #overlay').fadeOut('fast');
	});
});