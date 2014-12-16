
var grappleAmbienceElement = document.createElement('audio');


$(document).ready(function() 
{
	//establish employme voice welcome element
	var grappleWelcomeVoiceElement = document.createElement('audio');
	grappleWelcomeVoiceElement.setAttribute('src', 'data/audios/grappleStartupAudio.ogg');
	grappleWelcomeVoiceElement.load()
	grappleWelcomeVoiceElement.addEventListener("load", function() { 
		grappleWelcomeVoiceElement.play(); 
		$(".duration span").html(grappleWelcomeVoiceElement.duration);
		$(".filename span").html(grappleWelcomeVoiceElement.src);
	}, false);

	grappleWelcomeVoiceElement.play ();

	
	var grappleWelcomeVoiceBlanketElement = document.createElement('audio');
	grappleWelcomeVoiceBlanketElement.setAttribute('src', 'data/audios/grappleVoiceBlanketAudio.ogg');
	grappleWelcomeVoiceBlanketElement.load()
	grappleWelcomeVoiceBlanketElement.addEventListener("load", function() { 
		grappleWelcomeVoiceBlanketElement.play(); 
		$(".duration span").html(grappleWelcomeVoiceBlanketElement.duration);
		$(".filename span").html(grappleWelcomeVoiceBlanketElement.src);
	}, false);
	

	grappleWelcomeVoiceBlanketElement.play ();
	
	
	
	grappleAmbienceElement.setAttribute('src', 'data/audios/grappleStartupAudio.ogg');
	grappleAmbienceElement.load()
	grappleAmbienceElement.addEventListener("load", function() { 
		grappleAmbienceElement.play(); 
		$(".duration span").html(grappleAmbienceElement.duration);
		$(".filename span").html(grappleAmbienceElement.src);
	}, false);

	grappleAmbienceElement.play ();
});




function playSound ( soundStream )
{
	var soundElement = document.createElement('audio');
	soundElement.setAttribute('src', soundStream);
	soundElement.load()
	soundElement.addEventListener("load", function() { 
		soundElement.play(); 
		$(".duration span").html(soundElement.duration);
		$(".filename span").html(soundElement.src);
	}, false);

	soundElement.play();
}


	var grappleAmbienceRunningEnquiry = false;
	function toggleTrackFlag ()
	{
		grappleAmbienceRunningEnquiry = grappleAmbienceRunningEnquiry ? false : !grappleAmbienceRunningEnquiry ? true : false; //GENIUS CODING BY JORDAN MICAH BENNETT lol
	}
	function toggleAmbience ()
	{
		toggleTrackFlag ();
		if (grappleAmbienceRunningEnquiry)
			grappleAmbienceElement.play();
		else
			grappleAmbienceElement.pause();
	}