
<div id="main" class="container-fluid">
	<div class="row primary-text" >
		<div class="col-8">
			<h3 id="top_bar" class="showtitle" uk-sticky >
				<span class="presenter_name">
					<a href="<?=site_url('presenter')?>" >
						<?=$this_slideshow['title'];?>
					</a>
				</span>
				
				<button class="btn btn-primary btn-fab btn-fab-mini" data-toggle="modal" data-target=".mini_previews" data-toggle="tooltip" data-placement="top" title="All Slides">
				  <i class="material-icons">view_comfy</i>
				</button>
				 
				
				<button id="prev-slide" onClick="changeSlide(prev_slide)" class="btn btn-primary btn-fab btn-fab-mini btn-round" >
				  <i class="material-icons">skip_previous</i>
				</button>
				 
				<span id="current_slide_number" >1</span> / <span id="total_slides">1</span>
		
				<button id="next-slide" onClick="changeSlide(next_slide)" class="btn btn-primary btn-fab btn-fab-mini btn-round" >
				  <i class="material-icons">skip_next</i>
				</button>
				
				<button id="makenewSlide" class="btn btn-primary btn-fab btn-fab-mini btn-round" data-toggle="modal" data-target="#newslideModal"  >
				  <i class="material-icons" data-toggle="tooltip" data-placement="top" title="New Slide">add_to_queue</i>
				</button>
				
				<button class="btn btn-primary btn-fab btn-fab-mini btn-round" title="Add New Song"  data-toggle="modal" data-target="#add_new_song">
					<i class="material-icons">queue_music</i>
				</button>
				
				<button class="btn btn-primary btn-fab btn-fab-mini btn-round" data-toggle="modal" data-target="#edit_currentslideModal" title="Edit Slide">
				  <i class="material-icons" data-toggle="tooltip" data-placement="top" title="Edit Slide">edit</i>
				</button>
				
				<a target="presenter_screen" href="<?=site_url('presenter/screen_one')?>">
					<button class="btn btn-primary btn-fab btn-fab-mini btn-round"  data-toggle="tooltip" data-placement="top" title="Launch LiveScreen" >
						<i class="material-icons">launch</i> 
					</button>
				</a>
				<button class="btn btn-primary btn-fab btn-fab-mini btn-round" onClick="openFullscreen();">
				  <i class="material-icons" data-toggle="tooltip" data-placement="top" title="Full Screen">settings_overscan</i>
				</button>
				
				<button class="btn btn-primary btn-fab btn-fab-mini btn-round full_screen" onClick="openFullscreen();">
				  <i class="material-icons" data-toggle="tooltip" data-placement="top" title="Full Screen">settings_overscan</i>
				</button>
				
				<span id="video_controls" >
					<video_dislplay></video_dislplay>
					
					<button onclick="video_control('play')" class="btn btn-rose btn-fab btn-fab-mini btn-round" data-toggle="tooltip" data-placement="top" title="Play Video">
					  <i class="material-icons">play_arrow</i>
					</button>
					
					<button onclick="video_control('pause')"  class="btn btn-rose btn-fab btn-fab-mini btn-round" data-toggle="tooltip" data-placement="top" title="Pause Video">
					  <i class="material-icons">pause</i>
					</button>
					<button onclick="video_control('stop')"  class="btn btn-rose btn-fab btn-fab-mini btn-round" data-toggle="tooltip" data-placement="top" title="Stop Video">
					  <i class="material-icons">stop</i>
					</button>
					
					<button onclick="video_control('mute')"  class="btn btn-rose btn-fab btn-fab-mini btn-round" data-toggle="tooltip" data-placement="top" title="Mute Video">
					  <i class="material-icons">volume_off</i>
					</button>
					
					<button onclick="video_control('unmute')"  class="btn btn-rose btn-fab btn-fab-mini btn-round" data-toggle="tooltip" data-placement="top" title="Unmute Video">
					  <i class="material-icons">volume_up</i>
					</button>
					 
					<script>
					//Video Controls
					function video_control(player_action){ 
						localStorage.setItem("video_control",player_action); //sends a command to video player
					 
					}
					//Beacon
					function beacon(beacon_command){ 
						localStorage.setItem("beacon",beacon_command); //sends a command to video player
					 
					}
	
					</script>
				</span>
			
			
			</h3>
				
			<pairing_code style="display:none;">
				<input type="number" id="livescreen_code" class="form-control" style="width:75%; margin-right:-25px; display:inline;font-size:30px;">
				<button id="submit_livescreen_code" onclick="start_livescreen()" class="btn btn-primary btn-fab btn-fab-mini btn-round" title="Pair" >
					Link Live Screen
				</button>
			</pairing_code>
		
			<dummy></dummy>
			<script>
				function start_livescreen(){
					var my_pairing_code = $("#livescreen_code").val();
					var check_url="<?=site_url('presenter/start_livescreen/')?>"+my_pairing_code;
					//alert(check_url);
					$("dummy").load(check_url, function(responseTxt, statusTxt, xhr){
						if(responseTxt)
						$("pairing_code").toggle();
						$("dummy").toggle();
					  }); 
					}//end of start_livescreen function
					

			</script>
		
		
		</div>
		
		
		<div class="col-4">
			<!-- Example single danger button -->
			<div class="btn-group">
			  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  <i class="material-icons">lock_open</i>Admin
			  </button>
			  <div class="dropdown-menu">
				<a class="dropdown-item" href="<?=site_url()?>">Home</a>
				<a class="dropdown-item" href="#"  data-toggle="modal" data-target="#edit_slideModal">Edit Slide</a>
				<a class="dropdown-item" href="#" data-toggle="modal" data-target="#newslideModal">New Slide</a>
				<a class="dropdown-item" href="#" data-toggle="modal" data-target="#full_slideshow_text" onClick="load_slideshow_text()">Show Text</a>
				<a class="dropdown-item" href="<?=site_url('slide');?>">All Slides</a>
				 <div class="dropdown-divider"></div>
				<a href="<?=site_url('presenter/change_show')?>"  class="dropdown-item" >Change Show</a>
				<a href="<?=site_url('slideshow/add/'.$this_presenter['id'])?>"  class="dropdown-item" >Add New SlideShow</a>
				<a href="#" onClick='$("pairing_code").toggle();document.getElementById("livescreen_code").focus();' class="dropdown-item" >
					Access Livescreen
				</a>
				<div class="dropdown-divider"></div>
				<a href="<?=site_url('presenter/add')?>"  class="dropdown-item" >Add New Presenter</a>
				<a class="dropdown-item" href="<?=site_url('presenter/edit/').$this_presenter['id'];?>" >Settings</a>
				<a class="dropdown-item" href="<?=site_url('presenter/exit_presenter/');?>" >Close Presenter</a>
				
				

			  </div>
			</div>
			
			
		</div>
	</div>
	<!-- end of to row -->
		
	<!-- second row -->
	<div class="row">	
		<div id="screen_frame" class="col-md-8">
			<!-- //////////  START PREVIEW WINDOW  -->
			
			<!-- //////////  TABS -->
			<div class="card card-nav-tabs ">
                <div class="card-header card-header-primary">
                  <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                  
				  <div class="nav-tabs-navigation"> 
                    <div class="nav-tabs-wrapper" >
                     
					 <ul class="nav nav-tabs " data-tabs="tabs">
                        <li class="nav-item">
							<a class="nav-link active show" href="#profile" data-toggle="tab">
								<span uk-icon="icon: tv"></span>
								<div class="ripple-container"></div>
							</a>
                        </li>
						
                
                         
                        <?php foreach($sub_slides_titles as $s){?>
                        	<li runat="server" class="nav-item slideshow_song_tab<?=$s['id']?>" id="slideshow_<?=$s['id']?>" ondblclick="delete_slideshow_song(<?=$this_slideshow['id']?>,<?=$s['id']?>)">
								<a class="nav-link" href="#<?=$s['slug'].$s['id']?>" data-toggle="tab">
									&bull; <?=$s['title']?> 
									<div class="ripple-container"></div>
								</a>  
							</li>
                        <?php };?> 
                        
						  


<!--
						
                        <li class="nav-item">
                          <a class="nav-link" href="#settings" data-toggle="tab">
                            <i class="material-icons">library_books</i> Settings
                          <div class="ripple-container"></div></a>
                        </li>
						-->
						<li class="nav-item" id="add_song_tab">
                          <a class="nav-link" href="#"  data-toggle="modal" data-target="#full_songlist_titles" data-toggle="tooltip" data-placement="top" title="All Titles" >
                            <i class="material-icons">add</i> 
                          <div class="ripple-container"></div></a>
                        </li>
                      </ul>
					  
    
                    </div>
                  </div>
                </div>
				
				
				
                <div class="card-body ">
                  <div class="tab-content text-center">
                    
					<!-- ///////////////////////////////////// -->
					
					<div class="tab-pane active show" id="profile">
						<div id="current_slide" style="white-space:pre-line;">
							Loading...
						</div>
						
					</div>
					
					<!-- ///////////////////////////////////// -->
					<script>
							function get_slides_num(myDiv,parentDiv)
							{
								let numb = document.getElementById(myDiv).childElementCount; 
								numb = numb-1;
								document.getElementById("total_slides").innerHTML = numb;
								
								var index = $("#"+parentDiv).index();
								index = index + 1;
									document.getElementById("current_slide_number").innerHTML = index;
								
								 
							 


							}
						</script> 
						
						<?php foreach($sub_slides_titles as $s): ?>
						<?php 
							//$Song->song_slides( $s['id']); 
							$song = $this->Song_model->get_song($s['id']);
						
							/* $this->load->view('song/preview',$data); */
							$slides = $this->Slide_model->get_song_slides($s['id']);
						?>
						 
						
								
						<div class="tab-pane" id="<?=$song['slug'].$song['id']?>">
							<p>
								<ul id="song_<?=$song['id']?>"  class="slide-tiles" >
									<?php foreach($slides as $s):?>
										<li id="slide_thumb<?=$s['id']?>">
											<a href="#<?=$s['id']?>" class="click_slide" onclick="change_slide(<?=$s['id']?>, '<?=$s['type']?>')" onMouseUp="get_slides_num('song_<?=$song['id']?>','slide_thumb<?=$s['id']?>')"> 
											<!-- <a href="#<?=$s['id']?>" class="click_slide" aria-slide_type="lyrics" onclick="change_slide(this)"> -->
												- <?=$s['order']?> -
												<pre id="slidebody<?=$s["id"]?>">
													<?=$s["body"]?>
												</pre>
											</a>
											<a href="#" uk-icon="icon: file-edit" onClick="edit_slide(<?=$s['id']?>)" ></a>
											<a href="#" uk-icon="icon: trash" onClick="delete_slide(<?=$s['id']?>)"></a>
										</li>  
										
										
										<?php endforeach;?>
										
										<li id="slide_thumb_add">
											<a href="#" class="click_slide" onclick="addSlide(<?=$song['id']?>)">
												<h6> - Add New Slide - </h6>
												<span uk-icon="icon: plus-circle; ratio: 2"></span> 
											</a>
											<a href="#" class="click_slide" onclick="get_lyrics(<?=$song['id']?>)">
												<h6> - Get Lyrics - </h6>
												<span uk-icon="icon: file-text; ratio: 2"></span> 
											</a>
											</li>
									</ul>
								</p>
							</div>
						
					<?php endforeach ?> 
					
                        	
                    <div class="tab-pane" id="messages">
                      <p> I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at.</p>
                    </div>
					
					<!-- ////////////////////////////
					
                    <div class="tab-pane" id="settings">
                      <p>I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. So when you get something that has the name Kanye West on it, it’s supposed to be pushing the furthest possibilities. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus.</p>
                    </div>
                     -->
					<div id="dummy_tab"></div>
					<!-- ///////////////////////////////////// -->
					
                  </div>
                </div>
              </div>
			  
			  <!-- //////////  END TABS -->
				
				
				
			<!-- END PREVIEW WINDOW -->
			
		</div>
		
		<div class="col-md-4">
		<digiclock>
			<span uk-icon="clock"></span> <div id="digiclock">Digital Clock</div>
		</digiclock>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header card-header-text card-header-rose" uk-sticky>
							<div class="card-icon">
								<h3 class="card-title">
									<span id="br_title">Bible Reference </span><span id="br_title_verse"></span> 		
									<br_controls class="uk-align-right" >
										<span onclick="change_verse('prev')" uk-icon="icon: chevron-left;ratio:2"></span> 
										<span onclick="change_verse('next')" uk-icon="icon: chevron-right;ratio:2"></span>
									</br_controls>
								</h3>
							</div>
					  </div> 
					  <div class="card-body" id="presenter_bible">
						Kairos Bible Project	
					  </div>
					</div>
					<br>
					<div class="card">
						<div class="card-header card-header-text card-header-rose">
							<div class="card-icon">
								<h3 class="card-title">Notes </h3>
							</div>
					  </div>
					  <div class="card-body" id="next-slide-preview">
						previous slide contents
					  </div>
					</div>
				</div>
				
			</div>
			
		</div>
	</div>
	<!--// End of second row -->
	
	<!--// Third row-->
	<div class="row">
		<div class="col-12" id="controls">
			
			
			
			
			
		</div>
	</div>
	<!-- end of controls row -->


	
</div><!-- End of container fluid-->

<!-- All modals for th eindex file -->
<?php 
	$this->load->view('presenter/presenter_index_modals2'); 
?>
<!--// modals-->

<script>
	/* ------------- SCRIPTS --------- */

	function change_slide(slide_id,slide_type)
	{ 
		var text;
		if(slide_id == "new-slide-body"){
			text = document.getElementById(slide_id).value;
		}
		else{
			$("#current_slide").load("https://kpresenter.xyz/presenter2/select_slide/"+slide_id); 
			//select a slide and update slide number
			text = $("#slidebody"+slide_id).text(); 
		//alert(text);  
		}
		localStorage.setItem("currentSlide",text);
		localStorage.setItem("slide_type",slide_type);
		
		if(slide_type == "video"){
			$("#video_controls").removeClass("hide");  
			$("#video_controls").addClass("show");
		}
		else
			$("#video_controls").addClass("hide");
			
		if(localStorage.getItem("slide_type") == "video")
			localStorage.setItem("slide_type","new_video"); 
		
		if(localStorage.getItem("slide_type") == "text")
			localStorage.setItem("slide_type","text"); 
		
		if(localStorage.getItem("slide_type") == "image")
			localStorage.setItem("slide_type","image"); 
			
		$(".slide-tiles li").removeClass("slide-tiles_active");  
		$("#slide_thumb"+slide_id).addClass("slide-tiles_active");
		
		//Assign value to edit current slide container
		$("#edit-currentslide-body").load("https://kpresenter.xyz/presenter/slide_text/");
				  
				  
				  
		//$("#edit-currentslide-body").load("https://kpresenter.xyz/presenter/slide_text/");
	} 

	
 //add song to slideshow
function add_song(song_id){
	var url = "<?=site_url('slideshow_song/quick_add/').$this_slideshow['id'].'/';?>"+song_id;
	var target_div = "#songtitle_"+song_id;
	$(target_div).prepend("<div uk-spinner></div>").addClass("kn-fade-list");

	var content;
	$.get(url, function(data){ 
    content= data;
	$('#add_song_tab').before(content);
	$(target_div).fadeOut(1000); 
	$("#full_songlist_titles").modal("hide");  

});

//$('#full_songlist_titles').modal('hide'); //option to hide list after selected
	var url2 = "<?=site_url('song/song_slides/');?>"+song_id;
	$.get(url2, function(data){
		content= data;
		$('#dummy_tab').before(content);
	});
	
}



/* 
End of Confirm Delete ---------------------------------------------------------
*/
</script> 


<!-- Remove song titles from quick search list -->
<style>
<?php foreach($sub_slides_titles as $s){
echo "li#songtitle_".$s['id'].",";
 }?> 
 hide{display:none}
 </style>  

	<script>
		//script for auto complete function
		var artiste_list = [<?php foreach($artistes as $a)echo '"'.$a['display_name'].'",';?>];//generates artistes array dynamically
	</script>	
<!-- Presenter scripts -->
<?php 
	$this->load->view('presenter/assets/presenter_scripts'); 
?>
<!--// presenter_scripts-->

<!-- Presenter Styles -->
<?php 
	$this->load->view('presenter/assets/presenter_styles'); 
?>
<!--// presenter_styles-->
