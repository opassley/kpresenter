<!DOCTYPE html>
<html lang="en-gb" dir="ltr" class="uk-height-1-1">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta property="og:image" content="<?php echo base_url(); ?>assets/images/kairos_logo_451x451.png">
		
        <title>Kairos Network, Presenter:: Screen One</title>
		<link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.png" type="image/x-icon">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>favicon.png">
       <link href="https://fonts.googleapis.com/css?family=Open+Sans:800&display=swap" rel="stylesheet">
	   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		
	   <link rel="stylesheet" href="<?php echo base_url('assets/css/presenter_screen1.css'); ?>">
	   <style>
	   </style>
	</head>
	
	<body> 
	
		<div class="media_container"><div id="media"></div></div>
		<div id="screen" class="flex-container" ondblClick="toggleFullscreen()">
			
		</div>
		
		<!-- Presentation script -->
		
		<script>
			var SLIDE_BODY=null;
			var SLIDE_TYPE;
			var VIDEO_CONTROL;
			var VIDEO_ID;
			var url='';
			var player;
			
			
			function loadScreen(){
				//adds video controls
				if(SLIDE_TYPE=="video" && VIDEO_CONTROL != localStorage.getItem("video_control"))
					video_control(localStorage.getItem("video_control"));
				
				//check to ensure the same content is not being re written
				if(SLIDE_BODY != localStorage.getItem("currentSlide"))
					{
					    if(localStorage.getItem("slide_type") == "new_video"){
    						localStorage.setItem("slide_type","video"); 
    						location.reload();
					    }
						
					document.getElementById("screen").innerHTML = "";
					document.getElementById("screen").classList.remove("hide");
					SLIDE_BODY = localStorage.getItem("currentSlide");
					
					SLIDE_TYPE = localStorage.getItem("slide_type");
					//alert(SLIDE_TYPE);
					if (SLIDE_TYPE == "text" || SLIDE_TYPE == "default" || SLIDE_TYPE == "verse" || SLIDE_TYPE == ""){ 
						document.getElementById("media").classList.add("hide");
						document.getElementById("screen").innerHTML = SLIDE_BODY;
						player.pauseVideo();
					}
					else 
						if (SLIDE_TYPE == "image"){
							document.getElementById("media").classList.add("hide");
							var tag = document.createElement('img');
							
							tag.src = SLIDE_BODY;
							document.getElementById('screen').appendChild(tag);
							player.pauseVideo();
						} 
						else if(SLIDE_TYPE == "video"){
							document.getElementById("media").innerHTML="";
							document.getElementById("screen").classList.add("hide");
							url = SLIDE_BODY.replace(/(>|<)/gi,'').split(/(vi\/|v=|\/v\/|youtu\.be\/|\/embed\/)/);
							
							if(url[2] !== undefined){
								VIDEO_ID = url[2].split(/[^0-9a-z_\-]/i);
								VIDEO_ID = VIDEO_ID[0];
							}
							else 
								VIDEO_ID = url;
							  
								 
							
							
							var tag = document.createElement('script');

							tag.src = "https://www.youtube.com/iframe_api";
							var firstScriptTag = document.getElementsByTagName('script')[0];
							firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
							
							}
				}//end of test to see if the same content is not being repeated. 		
			
			
			}
			
			// 3. This function creates an <iframe> (and YouTube player)
			//    after the API code downloads.
			
			function onYouTubeIframeAPIReady() {
			  player = new YT.Player('media', {
				height: '720',
				width: '1280',
				videoId: VIDEO_ID,
				playerVars: {
				  'playsinline': 1
				}
			  });
			}

			 

			function video_control(action) {
			  if(action=="stop")
				  player.stopVideo();
			  else
				if(action=="play"){
					player.playVideo();
				}else
				if(action=="pause"){
					player.pauseVideo();
				}else
				if(action=="mute"){
					player.mute();
				}else
				if(action=="unmute"){
					player.unMute();
				}
			} 
		  
			
			//load the screen in a loop every x seconds
			setInterval(loadScreen, 500); 
			
			
			/* opens browser in ful screen */
			var elem = document.getElementById("screen");
			function openFullscreen() {
				if (elem.requestFullscreen) {
					elem.requestFullscreen();
				} else if (elem.mozRequestFullScreen) { /* Firefox */
				elem.mozRequestFullScreen();
				} else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
				elem.webkitRequestFullscreen();
				} else if (elem.msRequestFullscreen) { /* IE/Edge */
				elem.msRequestFullscreen();
				}
			}
			
			/* Close fullscreen */
			function closeFullscreen() {
				if (document.exitFullscreen) {
					document.exitFullscreen();
				}else if (document.mozCancelFullScreen) { /* Firefox */
					document.mozCancelFullScreen();
				}else if (document.webkitExitFullscreen) { /* Chrome, Safari and Opera */
					document.webkitExitFullscreen();
				}else if (document.msExitFullscreen) { /* IE/Edge */
				document.msExitFullscreen();
				}
			}
			
			var toggle = null;
			function toggleFullscreen()
			{
				if(!toggle){
					toggle = 1;
					openFullscreen();//calls full screen function
				}
				else
				{
					toggle = null;
					location.reload();
				}
			}
		</script>


	  <!-- //////////////////////////-->
	 
	</body>
	
	
	<!-- Add functionality scripts 
	<script src="<?php //echo base_url('assets/js/youtube_script.js'); ?>"></script> 
	--> 
	
</html>
