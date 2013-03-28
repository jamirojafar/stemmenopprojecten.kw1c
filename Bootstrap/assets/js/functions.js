function openVoteBox(object,id,cat){
	 var name = $(object).closest('.item').find('p.name').html();
	 
	 $('#votebox, #overlay').fadeIn('fast');
	 $('#votebox .projectname').html(name);
	 
	 // Maak een post request naar de stem handler
	 $('#votebox button[name="stem"]').click(function(){
		$.post("./assets/php/votehandler.php", { itemid: id}).done(function(data) {
			if(true == true){
				$('#votebox .projectname').html("succesvol uitgebracht");
				$('#votebox button[name="stem"]').hide();
				$('#votebox p').html('Dit scherm sluit automatisch, of gebruik onderstaande knop.');
				setTimeout(function(){
					$('#votebox, #overlay').fadeOut('fast');
				},2000);
			}
			else{
				$('#votebox .projectname').html("Stem mislukt");
			}
		});
	});
}

$(document).ready(function(){
	$('#votebox button[name="close"]').click(function(){
		$('#votebox, #overlay').fadeOut('fast');
	});
});