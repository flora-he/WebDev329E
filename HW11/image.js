puzzle_src = new Array ("puzzle1", "puzzle2", "puzzle3");
puzzle_array = new Array ("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12")

function get_puzzle () {
	rnd_idx = Math.trunc (Math.random() * puzzle_src.length);
	return puzzle_src[rnd_idx];
}

// function to choose which out of the 3 puzzles
window.addEventListener("load", function choosePuzzle() {
	shownPuzzleNum = get_puzzle();
	shownPuzzle = document.getElementById(shownPuzzleNum).style.display="block";
});

// function to place images randomly
window.addEventListener("load", function placeImages() {
	
	idx_num = rnd_idx+1;
	img = '<img class="puzzleback" src="puzzle1/puzzleback.gif" style="top: 100px; left: 300px">'
	for (i=0; i<puzzle_array.length; i++) {
		positionTop = Math.trunc (Math.random()*425);
		console.log("Pos Top:", positionTop, typeof postionTop)
		positionTop = positionTop;
		console.log("Pos Top New:", positionTop)
		positionLeft = Math.trunc (Math.random()*425);
		console.log("Position left:", positionLeft, typeof positionLeft)
		zindex=i+1;

		img += '<img src="'+shownPuzzleNum+'/'+'img'+idx_num+'-'+puzzle_array[i] + '.jpg'+'" style="position: relative; top:'+positionTop+'px;'+'left:'+positionLeft+'px;'+'z-index: '+zindex+';" onmousedown="grabber(event);">';
	}
	console.log("img:", img)
	document.getElementById(shownPuzzleNum).innerHTML=img;
});

theElement.style.position = 'absolute';
theElement.style.zIndex = '20'
// function for grabber event
function grabber(event) {
	// set the global variable for the element to be moved
	//theElement.style.zIndex = 20;
	theElement = event.currentTarget;
	console.log("thElement:", theElement)
	// determine the position of the word to be grabbed, first removing the units from left and top
	posX = parseInt(theElement.style.left);
	console.log("posX", posX)	
	posY = parseInt(theElement.style.top);
	console.log("posY", posY)
	//comput the difference between where it is and where the mouse click occurred
	diffX = event.clientX - posX;
	diffY = event.clientY - posY;

	// Now register the event handlers for moving and dropping the word
	document.addEventListener("mousemove", mover, true);
	document.addEventListener("mouseup", dropper, true);

	theElement.ondragstart = function() {
	return false;
};
}

// the event handler function for moving the word
function mover(event) {
	// Compute the new position, add the units, and move the word
	theElement.style.left = (event.clientX - diffX) + "px";
	theElement.style.top = (event.clientY - diffY) + "px";
}

// event handler function for dropping the word
function dropper(event) {
	// Unregister the event handlers for mouseup and mousemove
	document.removeEventListener("mouseup", dropper, true);
	document.removeEventListener("mousemove", mover, true);
}

/*
 *
theElement.onmousedown = function(event) {
	theElement.style.position = 'absolute';
	theElement.style.zIndex = 20;
}; */
