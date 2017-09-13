function myFunction() {
var ProjectName = "Proj";

//alert("data recieved");
// Returns successful data submission message when the entered information is stored in database.
var dataString = 'ProjectName=' + ProjectName; 
getCount();

if (ProjectName == '') {
alert("Please Fill All Fields");
} else {
// AJAX code to submit form.
$.ajax({
type: "POST",
url: "http://carib.unicoreonline.com/php/searchResults.php",
data: dataString,
cache: false,
	success: function(html) {
		var obj = JSON.parse(html);
		for(var i = 0; i<obj.length; i++)
		{
			var hexColor = "";
			if(obj[i].isFinished=="true")
			{
				hexColor = "#4AAD52";
			}else
			{
			hexColor = "#BA1200";
			}
			
		var template = "<div class='card' data-id="+obj[i].id+">"+
								"<div class='project-content'>"+
									"<p class='project-title'>"+
										obj[i].company_name+
									"</p>"+
									"<p class='project-leader'>"+
										obj[i].full_name+
									"<p/>"+
									"<p class='project-client'>"+
										obj[i].email+
									"<p/>"+
									"<p class='project-budget'>"+
										obj[i].country+
									"<p/>"+
									"</div>"+
							"</div>"
							
			$("#example-table").append(template);
		}
		
		$(".card").click(function(){
			
			saveProjectSelection($(this).attr("data-id"))
		});
	}
});
}
return false;
};

function saveProjectSelection(Id)
{
	var dataString = "Resourceid="+Id
	$.ajax({
	type: "POST",
	url: "http://carib.unicoreonline.com/php/ResourceSession.php",
	data: dataString,
	cache: false,
	success: function(html) {
	if(html == "session Created")
	{
	 window.location.href = "./listings-single-page.html";
	}
	else alert("error");
	}
	});
};

function getCount()
{
	var userid =  "1";
  var dataString = 'userid=' + userid; 
$.ajax({
url: "http://carib.unicoreonline.com/php/getResultsCount.php", // Url to which the request is send
type: "POST",            // Type of request to be send, called as method
data: dataString, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
//alert(data);
$("#SearchCount").html(data);
}
});
};



window.onload = myFunction();