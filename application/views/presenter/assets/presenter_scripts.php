<script>
    //change slides
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


    $('.full_screen').click(function(){
        if(localStorage.getItem("full_screen") == 1)
             localStorage.removeItem("full_screen");
        else
            localStorage.setItem("full_screen", 1);
    });
</script> 