<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<audio id="speler" controls="controls"><source src="ping.wav" type="audio/wav"></audio>

<button id="speelaf" onclick="speel();">fdff</button>

<script>

	function speel()
	{

	var player = document.getElementById('speler');
	
	player.load();
	player.play();
	
	}

	$('#speelaf').click();
	
</script>