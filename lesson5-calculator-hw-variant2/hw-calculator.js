var res = document.getElementById("result");

function resetBtn (){
	var reset = "";
	res.value = reset;
	return reset;
}
function clearedByNum(value){
	if ((res.value.indexOf("+") == -1 && res.value.indexOf("=") == -1)||
		(res.value.indexOf("-") == -1 && res.value.indexOf("=") == -1)||
		(res.value.indexOf("*") == -1 && res.value.indexOf("=") == -1)||
		(res.value.indexOf("/") == -1 && res.value.indexOf("=") == -1)){
		}
	else {
		res.value = "";
	} 
}
function notDisplayOper (){
	if(res.value != "0" && res.value != "+" && res.value != "-"&& res.value != "*" && res.value != "/"){
	}
	else{
		res.value = "";
	} 
}
function display(value){
	res.value += document.getElementById("num"+value).innerHTML;
}
function displayPlus(){
	if(res.value.indexOf("+") != -1 ||
		res.value.indexOf("-") != -1 ||
		res.value.indexOf("*") != -1 ||
		res.value.indexOf("/") != -1 	){
			res.value = res.value + document.getElementById("equal").innerHTML + eval(res.value)}
	else{
		res.value += document.getElementById("plus").innerHTML;
	}
	
}
function displayMinus(){
	if(res.value.indexOf("+") != -1 || 
		res.value.indexOf("-") != -1 ||	
		res.value.indexOf("*") != -1 ||	
		res.value.indexOf("/") != -1 ){
			res.value = res.value + document.getElementById("equal").innerHTML + eval(res.value)}
	else{
		res.value += document.getElementById("minus").innerHTML;
	}
}
function displayMulti(){
if(res.value.indexOf("+") != -1 ||
	res.value.indexOf("-") != -1 ||
	res.value.indexOf("*") != -1 ||
	res.value.indexOf("/") != -1 ){
		res.value = res.value + document.getElementById("equal").innerHTML + eval(res.value)}
	else{
		res.value += document.getElementById("multiple").innerHTML;}
}
function displayDivision(){
if(res.value.indexOf("+") != -1 ||
	res.value.indexOf("-") != -1 ||
	res.value.indexOf("*") != -1 ||
	res.value.indexOf("/") != -1){
		res.value = res.value + document.getElementById("equal").innerHTML + eval(res.value)}
	else{
		res.value += document.getElementById("division").innerHTML;}
}
function result(){
if (res.value.indexOf("=") == -1){
	res.value = res.value + document.getElementById("equal").innerHTML + eval(res.value)}
	else{
		res.value="";
	}
}