$(document).ready(function() {
   // process the form
    $('#loginform').submit(function(event) {

       	var username = document.getElementById("username").value;
var password = document.getElementById("password").value;
// Returns successful data submission message when the entered information is stored in database.
var dataString = 'username=' + username + '&password=' + password;
if (username == '' || password == '') {
alert("Please Fill All Fields");
} else {
// AJAX code to submit form.
$.ajax({
type: "POST",
url: "http://carib.unicoreonline.com/php/login.php",
data: dataString,
cache: false,
success: function(html) 
{
	if(html == "you are a Resource" || html == "you are a Client" || html == "you are a Supplier")
	window.location.href = "index2.html";
	else alert("Unsuccessful Login Please Try again!");
	
	
}
});
}

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});