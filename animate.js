//running image transitions on animations.html

function animate(animationDuration, numImages, delayArray, customNames){
	//delayArray and customNames are arrays from animations.html
	
	var animationDuration = animationDuration;
	var stringNumImages = numImages;
	var numImages = Number(stringNumImages);
	
	//need to get file path for each image, should be /pictures/01.png
	
	//copy delayArray and customNames to arrays in here.
	var copyDelay = new Array(delayArray.length);
	for(var i = 0; i < delayArray.length; i++){
		copyDelay[i] = delayArray[i];
	}
	
	var copyNames = new Array(customNames.length);
	for(var j = 0; j < customNames.length; j++){
		copyNames[j] = customNames[j];
	}
	
	var finalPath = new Array(copyNames.length);
	for(var j = 0; j < copyNames.length; j++){
		finalPath[j] = "/pictures/" + copyNames[j] + ".png";
	}
	
	$("#image1").css("animation-duration", animationDuration).css("-webkit-animation-duration", animationDuration);
	$("#image1").addClass("animated "+ copyNames[0]);
	
	var countDelay = 0;
	var count = 0;
	var currentImage = 1;
	var nextImage = 2;
		//passing imageArray to change function
		change(imageArray);
	function change(imageArray){
			setTimeout(function(){
				$("#image"+currentImage).remove();
				$("#images").append("<img style='width:425px; height=425px' id=image"+ nextImage + " src="+ finalPath[count]+" />");
				$("#image"+ nextImage).css("animation-duration", animationDuration).css("-webkit-animation-duration", animationDuration);
				$("#image"+ nextImage).addClass("float-right padded-top padded-bottom padded-left animated "+ copyNames[count]);
				currentImage++;
				nextImage++
				count++;
				//delay += 5000;
				if(count < imageArray.length){
					countDelay++;
					change(imageArray);
				}
				//was animationDelay
			}, copyDelay[countDelay]);
		}

}