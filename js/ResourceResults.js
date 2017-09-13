function getTopData()
{
	var userid =  "1";
  var dataString = 'userid=' + userid; 
  getContactData();
  getBookingData();
  getReviewData();
$.ajax({
url: "http://carib.unicoreonline.com/php/getData1.php", // Url to which the request is send
type: "POST",            // Type of request to be send, called as method
data: dataString, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
//alert(data);
$("#data1").html(data);
}
});
};

function getContactData()
{
	var userid =  "1";
  var dataString = 'userid=' + userid; 
$.ajax({
url: "http://carib.unicoreonline.com/php/getData2.php", // Url to which the request is send
type: "POST",            // Type of request to be send, called as method
data: dataString, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
//alert(data);
$("#contactinfo").html(data);
}
});
};

function getBookingData()
{
	var userid =  "1";
  var dataString = 'userid=' + userid; 
$.ajax({
url: "http://carib.unicoreonline.com/php/getData3.php", // Url to which the request is send
type: "POST",            // Type of request to be send, called as method
data: dataString, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
//alert(data);
$("#listing-overview").html(data);
}
});
};

function getReviewData()
{
	var userid =  "1";
  var dataString = 'userid=' + userid; 
$.ajax({
url: "http://carib.unicoreonline.com/php/getData4.php", // Url to which the request is send
type: "POST",            // Type of request to be send, called as method
data: dataString, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
//alert(data);
$("#reviewinfo").html(data);
}
});
};

window.onload = getTopData();