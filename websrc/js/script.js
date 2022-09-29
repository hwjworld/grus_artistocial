function myFunction() {
    var x = document.getElementById("art");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
}
function myFunction() {
    var x = document.getElementById("art2");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
}






















// function getYear(year) {
// 	if(year) {
// 		return year.match(/[\d]{4}/); // This is regex (https://en.wikipedia.org/wiki/Regular_expression)
// 	}
// }

// function iterateRecords(data) {

// 	console.log(data);

// 	$.each(data.result.records, function(recordKey, recordValue) {

// 		var recordTitle = recordValue["dc:title"];
// 		var recordYear = getYear(recordValue["dcterms:temporal"]);
// 		var recordImage = recordValue["150_pixel_jpg"];
// 		var recordDescription = recordValue["dc:description"];

// 		if(recordTitle && recordYear && recordImage && recordDescription) {

// 			if(recordYear < 1900) { // Only get records from the 19th century

// 				$("#records").append(
// 					$('<article class="record">').append(
// 						$('<h2>').text(recordTitle),
// 						$('<h3>').text(recordYear),
// 						$('<img>').attr("src", recordImage),
// 						$('<p>').text(recordDescription)
// 					)
// 				);

// 			}

// 		}

// 	});
// 	setTimeout(function() {
// 		$("body").addClass("loaded");
// 		}, 1000); // 2 second delay

// 	$("#filter-count strong").text($(".record:visible").length);

// 	$("#filter-text").keyup(function(){
// 		var searchTerm = $(this).val();
// 		console.log(searchTerm);
// 		$(".record").hide();
// 		$(".record:contains('" + searchTerm + "')").show();
// 		$("#filter-count strong").text($(".record:visible").length);
// 		});
		

// }

// $(document).ready(function() {

// 	var data = {
// 		resource_id: "9eaeeceb-e8e3-49a1-928a-4df76b059c2d",
// 		limit: 1
// 	}

// 	$.ajax({
// 		url: "https://data.qld.gov.au/api/3/action/datastore_search",
// 		data: data,
// 		dataType: "jsonp", // We use "jsonp" to ensure AJAX works correctly locally (otherwise XSS).
// 		cache: true,
// 		// success: function(data) {
// 		// 	iterateRecords(data);
// 		// }
// 		success: function(data) {
// 			localStorage.setItem("slqData", JSON.stringify(data));
// 			iterateRecords(data);
// 			}
// 	});

	

// });


