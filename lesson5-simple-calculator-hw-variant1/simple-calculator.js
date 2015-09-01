function operations (){
	var operation = document.getElementById("selectOper");
	var res = 0;
	
	if (isNaN(parseInt(document.getElementById("leftPart").value))){
		document.getElementById("leftPart").style.borderColor="red";
		alert("Please type a number!");
	}
	else{
		document.getElementById("leftPart").style.borderColor="green";
		var leftNum = parseInt(document.getElementById("leftPart").value);
	}
	if (isNaN(parseInt(document.getElementById("rightPart").value))){
		document.getElementById("rightPart").style.borderColor="red";
		alert("Please type a number!");
	}
	else{
		document.getElementById("rightPart").style.borderColor="green";
		var rightNum = parseInt(document.getElementById("rightPart").value);
	}
	switch(operation.selectedIndex){
		case 0:
			alert("Please select an operation!");
			break;
		case 1:
			res = leftNum + rightNum;
			break;				
		case 2:
			res = leftNum - rightNum;
			break;				
		case 3:
			res = leftNum * rightNum;
			break;				
		case 4:
			res = leftNum / rightNum;
			break;
		default: alert("Error!");
	}
	document.getElementById("result").value = res;
	return res;
}
