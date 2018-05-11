//submit Form
function submitForm(){
	document.getElementById("sessionInfo").value = JSON.stringify(sessionStorage);
	document.getElementById("sendContent").submit();
}


//Load initial processing, according to the page;
function initialLoad(){
	setUserNamePanel();
	updateCartValues();
	
	if(getFileName() == "shopPage.php"){
		updateProductQuantities();
	}
	
	
	if(getFileName() == "signUpPage.php"){
		if(!isNull(sessionStorage.name))
			document.getElementById("name").value = sessionStorage.name;
		
		if(!isNull(sessionStorage.address))
			document.getElementById("address").value = sessionStorage.address;
		
		if(!isNull(sessionStorage.phone))
			document.getElementById("phone").value = sessionStorage.phone;
		
		validateAll();
	}
	

	
	sessionStorage.validateCC = false;
	sessionStorage.validateCCExpDate = false;
	sessionStorage.validateName = false;
	sessionStorage.validadeAddress = false;

}

//Build checkOutTables
function buildCheckOutTables(jsonSession){
	
	if(isNull(jsonSession)){
		jsonSession = sessionStorage;
	}
	//build checkout table
	if(getFileName() == "checkOutPage.php" && !isNull(jsonSession.cart)){
		 var $table = $('#table');
		$(function () {
			$('#table').bootstrapTable({
				data: JSON.parse(jsonSession.cart)
			});
		});
	}

	//build checkout table
	if(getFileName() == "checkOutPage.php" && !isNull(jsonSession.cart)){
		 var $table2 = $('#table2');
		$(function () {
			$('#table2').bootstrapTable({
				data: JSON.parse(jsonSession.totals)
			});
		});
	}
}

//Update product quantities, according to the cart
function updateProductQuantities(){
	if(!isNull(sessionStorage.cart)){
		var cartArray = JSON.parse(sessionStorage.cart);
		
		for(var i = 0; i < cartArray.length; i++){
			var shopItem = cartArray[i];
			document.getElementById("productQuant" + cartArray[i].itemCode).value = cartArray[i].quantity;
			
		}
	}
}

//Save user data in signUp page
function signUpSaveData(){

	if(document.getElementById("signUpFailedMessage").style.visibility == "visible")
		return;
	
	
    if(typeof(Storage) !== "undefined") {
        sessionStorage.name = document.getElementById("name").value;
		sessionStorage.address = document.getElementById("address").value;
		sessionStorage.phone = document.getElementById("phone").value;
		//sessionStorage.ccNumber = document.getElementById("ccNumber").value;
		//sessionStorage.ccExpDate = document.getElementById("expDate").value;
		sessionStorage.cart = JSON.stringify(new Array());
		sessionStorage.totalPayable = 0;
		sessionStorage.taxes = 0;
		sessionStorage.totalPayableAfterTaxes = 0;
	
		
		document.getElementById("successMessage").innerHTML = " &nbsp;&nbsp;You are ready to shop!";
		setVisibility("signUpSuccessMessage","visible");
		
		setUserNamePanel(sessionStorage.name);
		
		updateCartValues();

		//window.location.href = "shopPage.php";
       
    } else { 
		document.getElementById("successMessage").innerHTML = " Your browser is too old for this website! Please upgrade it!";
        setVisibility("signUpFailedMessage","visible");
   }
	
	
}

//The the user name in top right panel when user is logged in
function setUserNamePanel(){

	if(!isNull(sessionStorage.name))
		document.getElementById("userNamePanel").innerHTML = sessionStorage.name;
	else
		document.getElementById("userNamePanel").innerHTML = " Sign Up to Shop";	
	
}

//Set the visibility of an HTML element
function setVisibility(elementID,visibility){

	var dom = document.getElementById(elementID).style;

	if(visibility == "visible")
		dom.display = "block";
	else
		dom.display = "none";
}


//Verify if there is only digits in a string
function hasOnlyNumbers(string){
	if(string.match(/^\d+$/) != null)
		return true;
	else
		return false;
}

//Verify if there is only letter in uppercase
function hasOnlyUpperCaseLetters(string){
	if(string.match(/^[A-Z]*$/g) != null)
		return true;
	else
		return false;
}

//trim - remove blank spaces in the end or start of a string
function trim (string){
    return string.replace(/^\s+|\s+$/g,"");
}

//Verify a range between two numbers
function verifyRange(testingValue, minLimit, maxLimit){
	var normalizedValue = trim(testingValue + "");
	if(!hasOnlyNumbers(normalizedValue))
		return false;
	
	normalizedValue = parseInt(normalizedValue);
	if(normalizedValue >= minLimit && normalizedValue <=maxLimit)
		return true;
	else
		return false;
}

//Verify it the variable is null
function isNull(myVar){
	myVar = trim(((myVar + "").toLowerCase()));
	if(myVar == "" || myVar == "null" || myVar == "undefined")
		return true;
	else
		return false;
	
}

//Get HTML file name
function getFileName(){
	var path = window.location.pathname;
	var page = path.split("/").pop();
	return page;
}

//Add element in Cart
function addToCart(productCode){
	
	if(!isNull(sessionStorage.name)){
		
		//define shop item object
		var shopItem = new Object();
		shopItem.itemCode = productCode;	
		shopItem.productName = document.getElementById("product" + productCode + "Name").innerHTML;
		shopItem.price = parseFloat(document.getElementById("price" + productCode).innerHTML.split("$")[1]);
		shopItem.priceShow = "$" + shopItem.price;
		shopItem.quantity = parseInt(document.getElementById("productQuant" + productCode).value);
		shopItem.total = shopItem.price * shopItem.quantity;
		shopItem.totalShow = " $" + shopItem.total;

		
		//Verify if shop item exist, if it is, remove it to add a new entry
		var cartArray = JSON.parse(sessionStorage.cart);
		for(var i = 0; i < cartArray.length; i++){
			if(cartArray[i].itemCode == shopItem.itemCode){				
				//Remove shop item
				cartArray.splice(i,1);
				break;
			}
		}
		
						
		if(shopItem.quantity < 1){
			//Add to cart session the shop item in string format		
			sessionStorage.cart = JSON.stringify(cartArray);
			
			document.getElementById("itemAddedToCart").innerHTML = shopItem.productName + " removed from shopping cart."
			
			//Update cart display size
			updateCartValues();
			return;
		}
		
		//Add to cart session the shop item in string format		
		cartArray.push(shopItem);				
		sessionStorage.cart = JSON.stringify(cartArray);
		
		//Update cart display size
		updateCartValues();
		
		document.getElementById("itemAddedToCart").innerHTML = shopItem.productName + " added in shopping cart."
	
	}else{
		window.location.href = "signUpPage.php";
	}
	
	
}

//Clear shopping cart
function clearCart(){
	sessionStorage.cart = JSON.stringify(new Array());
	sessionStorage.totals = JSON.stringify(new Array());
	//Update cart display size
	updateCartValues();

}

//Calculate Cart quantity items
function updateCartValues(){
	
	if(isNull(sessionStorage.name)){
		document.getElementById("cartSize").innerHTML = "";	
	}else{	
		
		var cartArray = JSON.parse(sessionStorage.cart);
		var totalQuantity = 0;
		var totalPayable = 0;
		for(var i = 0; i < cartArray.length; i++){
			totalQuantity += parseInt(cartArray[i].quantity);
			totalPayable += parseFloat(cartArray[i].total);
		}
		
		//Update quantity of elements
		document.getElementById("cartSize").innerHTML = "(" + totalQuantity + ")";
		sessionStorage.totalPayable = totalPayable.toFixed(2);
		sessionStorage.taxes = (totalPayable * 0.1).toFixed(2);
		sessionStorage.totalPayableAfterTaxes = (totalPayable + parseFloat(sessionStorage.taxes)).toFixed(2);
		
		var totals = new Array();
		var objTotals = new Object();
		objTotals.totalPayableToShow =  "$" + sessionStorage.totalPayable;
		objTotals.taxesToShow =  "$" + sessionStorage.taxes;
		objTotals.totalPayableAfterTaxesToShow = "$" + sessionStorage.totalPayableAfterTaxes;
		
		totals.push(objTotals);

		sessionStorage.totals = JSON.stringify(totals);
	}
	
}

//finish purchase
function finishPurchase(jsonSession){
	document.getElementById("finalValue").innerHTML = 'Total for Payment: ' + (JSON.parse(jsonSession.totals))[0].totalPayableAfterTaxesToShow;
	document.getElementById("ccNumber").innerHTML = 'Using CrediCard Number: ' + jsonSession.ccNumber;
	document.getElementById("ccExpDate").innerHTML = 'Valid Until: ' + jsonSession.ccExpDate;
	document.getElementById("address").innerHTML = 'Shipping Address: ' + jsonSession.address;
	document.getElementById("phone").innerHTML = 'Phone: ' + jsonSession.phone;
}

//Plus one in cart
function plusOne(elementID, number){
	var num = parseInt(number) + 1
	document.getElementById(elementID).value = num;
}

//Remove one in cart
function minusOne(elementID, number){
	if(!isNull(number) && number > 0){
		var num = parseInt(number) - 1
		document.getElementById(elementID).value = num;
	}
	
}

//choose validator
function validateCard(ccNumber){
	
	if(isNull(ccNumber)){
		document.getElementById("failedMessage").innerHTML = " You need a credit card number. Please fill up.";
		setVisibility("signUpFailedMessage","visible");		
		return false;
	}
	
	var amex = document.getElementById("amexType").checked;
	var visa = document.getElementById("visaType").checked;
	var master = document.getElementById("masterType").checked;
	
	if(amex){
		var isValid = validateAmex(ccNumber);
		if(!isValid){
			document.getElementById("failedMessage").innerHTML = " Wrong American Express card number. Please verify.";
			setVisibility("signUpFailedMessage","visible");
			return false;
		}else{
			//setVisibility("signUpFailedMessage","hidden");
			return true;
		}
	}
	
	if(visa){
		var isValid = validateVisa(ccNumber);
		if(!isValid){
			document.getElementById("failedMessage").innerHTML = " Wrong Visa card number. Please verify.";
			setVisibility("signUpFailedMessage","visible");
			return false;
		}else{
			//setVisibility("signUpFailedMessage","hidden");
			return true;
		}
	}
	
	if(master){
		var isValid = validateMaster(ccNumber);
		if(!isValid){
			document.getElementById("failedMessage").innerHTML = " Wrong Master card number. Please verify.";
			setVisibility("signUpFailedMessage","visible");
			return false;
		}else{
			//setVisibility("signUpFailedMessage","hidden");
			return true;
		}
	}
	
	if(!amex && !visa && !master){
		document.getElementById("failedMessage").innerHTML = " Select your credit card type.";
		setVisibility("signUpFailedMessage","visible");
		return false;
	}
	
	
		 
}

//Validate American Express
function validateAmex(ccNumber)  
{  
	var pattern = /^(?:3[47][0-9]{13})$/;  
	if(ccNumber.match(pattern)) 
		return true;  
	else
        return false;  
} 

//Validate Visa
function validateVisa(ccNumber)  
{  
	var pattern = /^(?:4[0-9]{12}(?:[0-9]{3})?)$/;  
	if(ccNumber.match(pattern))  
		return true;  
	else  
		return false;
}

//Validate MasterCard
function validateMaster(ccNumber)  
{  
	var pattern = /^(?:5[1-5][0-9]{14})$/;  
	if(ccNumber.match(pattern))  
		return true;  
    else  
		return false;  

} 

//Validate Expiration Date
function validateCardDate(date){
	var pattern = /[0-1][0-2]\/[1-5][0-9]$/;
	if(date.match(pattern)){
		//setVisibility("signUpFailedMessage","hidden");
		return true;
	}else{
		document.getElementById("failedMessage").innerHTML = " Wrong date format. Please verify.";
		setVisibility("signUpFailedMessage","visible");
		return false;
	}
}

//Validate Name
function validateName(name){
	var pattern = /.*\w.*\s.*\w.*/;
	if(name.match(pattern)){
		//setVisibility("signUpFailedMessage","hidden");
		return true;
	}else{
		document.getElementById("failedMessage").innerHTML = " Wrong name format. Please enter at least first and last name.";
		setVisibility("signUpFailedMessage","visible");
		return false;
	}
}

//Validate address
function validateAddress(address){
	if(isNull(address)){
		document.getElementById("failedMessage").innerHTML = " You need an address. Please fill up.";
		setVisibility("signUpFailedMessage","visible");
		return false;
	}else{
		//setVisibility("signUpFailedMessage","hidden");
		return true;
	}
}

//validate all
function validateAll(){
	var name = validateName(document.getElementById("name").value);
	var address = validateAddress(document.getElementById("address").value);
	var cc = validateCard(document.getElementById("ccNumber").value);
	var cardDate = validateCardDate(document.getElementById("expDate").value);
	
	if(!name || !address || !cc || !cardDate){
		setVisibility("signUpFailedMessage","visible");
	}else{
		setVisibility("signUpFailedMessage","hidden");
	}
}
