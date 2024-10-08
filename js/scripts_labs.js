function update_position_list(element,byName,display){
	var expval;
	var exppos;
	var checkedValue = null; 
	var positions = ['C','LW','RW','D','G'];
	var pos = [];
	var pcount = 0;
	var inputElements = document.getElementsByClassName('position');

    console.log(`Element: ${element}, By Name: ${byName}, Display: ${display}`);
    // Existing logic

	for(var i=0; inputElements[i]; ++i){
		if(inputElements[i].checked){
		   pos[pcount++] = positions[i];
		}
	}

	var elements = (byName) ? document.getElementsByName(element) : document.getElementsByClassName(element);

	for (i=0;i<elements.length;i++) {
		expval = elements[i].value.split('|');
		if(expval.length > 2){
			exppos = expval[3].split(',');
			for (p=0;p<exppos.length;p++) {
				if(inArray(exppos[p],pos)){
					document.getElementById("line1_"+expval[7]).style.display = "" + display;
					break;
				}else{
					// display none for li
					document.getElementById("line1_"+expval[7]).style.display = "none";
				}
			}
		}
	}
}

function toggleFullFarm(){
	var values = [];
	
	var element = document.getElementById("FullFarmEnableLocal");
	element.value = (element.value == "true") ? "false" : "true";
	
	document.querySelectorAll('input[type=hidden].rvField').forEach(function(elem) {
			
		// convert string/text value to real JavaScript type for better code handling
		if (!isNaN(elem.value)) {
			val = parseInt(elem.value);
		}
		else if(elem.value === 'true') {val = true;}
		else if(elem.value === 'false') {val = false;}
		else {val = elem.value;}
		
		values.push(val);
	})
	roster_validator.apply(null,values);
}


function inArray(needle, haystack) {
	var ret = false;
    var length = haystack.length;
    for(var i = 0; i < length; i++) {
        if(haystack[i] == needle){ret = true;}
    }
    return ret;
}

function position_number_array(){
	var positions = [];
	positions[0] = [1,3,5,7,9,11,13,15]; // Centres
	positions[1] = [2,3,6,7,10,11,14,15]; // Left Wings
	positions[2] = [4,5,6,7,12,13,14,15]; // Right Wings
	positions[3] = [8,9,10,11,12,13,14,15]; // Defense
	positions[4] = [16]; // Goalies
	positions[5] = [1,2,3,4,5,6,7,9,10,11,12,13,14,15]; // Forwards
	positions[6] = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16]; // All

	return positions;
}