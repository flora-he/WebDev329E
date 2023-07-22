top_img = "agra"
img_src = new Array ("agra", "ajanta", "akshardham", "gateway", "hawa", "mehrangarh", "mysore","qutub", "sun", "taj", "victoria")
console.log("img_src:"+img_src)
index=0
slideLayer = document.getElementById("top_img").style
console.log("slideLayer:"+slideLayer)
//setInterval(changeImage, 3000);
function changeImage() {
	
	slideLayer = document.getElementById("ajanta");
	// confused with what parseInt does? and left?
	layerPosition = parseInt(slideLayer.style.left);
	// start_img = img_src[1]
	slideLayer.style.left = (layerPosition + 5) + "px";
	setTimeout("changeImage()", 20);
	//index++;
	//myInterval = 
}

function stopFunction() {
	clearInterval(myInterval);
}
