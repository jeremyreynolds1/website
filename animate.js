/*
	I already have animations present on my website. The purpose of this is to create general cases and run animations that way. 
*/
function animate(animationHeadingEntrance, animationContentEntrance, animationHeadExit, animationContentExit){
	//$(element).text(); gets text inside anchor tag. Could be useful when switching between sites.
	//using classes for different sites as tiggers to kick off the animation.
	
	//create multiple variables for the various entrance/exit animations for the heading and content from animate.css
	var headingEntrance = animationHeadingEntrance;
	var contentEntrance = animationContentEntrance;
	var headingExit = animationHeadExit;
	var contentExit = animationContentExit;
	
	//add animation to heading
	$("#heading").css("animation-duration", "2s").css("-webkit-animation-duration", "2s");
	$("#heading").addClass("animated " + headingEntrance);
				
	//add animation to div content
	$("#content").css("animation-duration", "2s").css("-webkit-animation-duration", "2s");
	$("#content").css("animation-delay", "4s").css("-webkit-animation-delay", "4s");
	$("#content").addClass("animated " + contentEntrance);
	
	//creating triggers for on "click" for different links
	$(".about").click(function(){
		/*//remove previous animation class from heading
		$("#heading").removeClass(headingEntrance);
		//add exit animation to heading
		$("#heading").addClass(headingExit);
		$("#heading").css("animation-duration", "2s").css("-webkit-animation-duration", "2s");
		
		$("#content").removeClass(contentEntrance);
		$("#content").addClass(contentExit);
		$("#content").css("animation-duration", "2s").css("-webkit-animation-duration", "2s");
		
		//function used to detect end of animations. On end of content animation; load new page.
		$('#content').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function myFunction(){
						window.location.href = "aboutme.html"
					});*/
					window.location.href="aboutme.html"
		
	});
	
	$(".home").click(function(){
		/*//remove previous animation class from heading
		$("#heading").removeClass(headingEntrance);
		//add exit animation to heading
		$("#heading").addClass(headingExit);
		$("#heading").css("animation-duration", "2s").css("-webkit-animation-duration", "2s");
		
		$("#content").removeClass(contentEntrance);
		$("#content").addClass(contentExit);
		$("#content").css("animation-duration", "2s").css("-webkit-animation-duration", "2s");
		
		//function used to detect end of animations. On end of content animation; load new page.
		//$('#content').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function myFunction(){
						window.location.href = "home.html"
					});/*/
		window.location.href="home.html";
		
	});
	
	$(".resume").click(function(){
		/*//remove previous animation class from heading
		$("#heading").removeClass(headingEntrance);
		//add exit animation to heading
		$("#heading").addClass(headingExit);
		$("#heading").css("animation-duration", "2s").css("-webkit-animation-duration", "2s");
		
		$("#content").removeClass(contentEntrance);
		$("#content").addClass(contentExit);
		$("#content").css("animation-duration", "2s").css("-webkit-animation-duration", "2s");
		
		//function used to detect end of animations. On end of content animation; load new page.
		$('#content').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function myFunction(){
						window.location.href = "resume.html"
					});*/
		window.location.href="resume.html";			
		
	});
	
	$(".projects").click(function(){
		/*//remove previous animation class from heading
		$("#heading").removeClass(headingEntrance);
		//add exit animation to heading
		$("#heading").addClass(headingExit);
		$("#heading").css("animation-duration", "2s").css("-webkit-animation-duration", "2s");
		
		$("#content").removeClass(contentEntrance);
		$("#content").addClass(contentExit);
		$("#content").css("animation-duration", "2s").css("-webkit-animation-duration", "2s");
		
		//function used to detect end of animations. On end of content animation; load new page.
		$('#content').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function myFunction(){
						window.location.href = "projects.html"
					});*/
			window.location.href = "projects.html"
	});
	
	$(".ums").click(function(){
		/*//remove previous animation class from heading
		$("#heading").removeClass(headingEntrance);
		//add exit animation to heading
		$("#heading").addClass(headingExit);
		$("#heading").css("animation-duration", "2s").css("-webkit-animation-duration", "2s");
		
		$("#content").removeClass(contentEntrance);
		$("#content").addClass(contentExit);
		$("#content").css("animation-duration", "2s").css("-webkit-animation-duration", "2s");
		
		//function used to detect end of animations. On end of content animation; load new page.
		$('#content').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function myFunction(){
						window.location.href = "ums.php"
					});*/
					window.location.href = "ums.php"
	});
	
	//on cluster link click
	$(".cluster").click(function(){
		/*//remove previous animation class from heading
		$("#heading").removeClass(headingEntrance);
		//add exit animation to heading
		$("#heading").addClass(headingExit);
		$("#heading").css("animation-duration", "2s").css("-webkit-animation-duration", "2s");
		
		$("#content").removeClass(contentEntrance);
		$("#content").addClass(contentExit);
		$("#content").css("animation-duration", "2s").css("-webkit-animation-duration", "2s");
		
		//function used to detect end of animations. On end of content animation; load new page.
		$('#content').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function myFunction(){
			window.location.href = "cluster.html"
		});*/
		window.location.href = "cluster.html"
	});	
}