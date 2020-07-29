$(document).ready(function(){
	
	$('#price-range-submit').hide();

	$("#min_price,#max_price").on('change', function () {
//alert(hjmjbm)
	  $('#price-range-submit').show();

	  var min_price_range = parseInt($("#min_price").val());

	  var max_price_range = parseInt($("#max_price").val());
		//alert(max_price_range)
	  if (min_price_range > max_price_range) {
		$('#max_price').val(min_price_range);
	  }

	  $("#slider-range").slider({
		 // alert(efdxgxh)
		values: [min_price_range, max_price_range]
	  });
	  
	});


	$("#min_price,#max_price").on("paste keyup", function () {                                        

	  $('#price-range-submit').show();

	  var min_price_range = parseInt($("#min_price").val());

	  var max_price_range = parseInt($("#max_price").val());
	  
	  if(min_price_range == max_price_range){

			max_price_range = min_price_range + 100;
			
			$("#min_price").val(min_price_range);		
			$("#max_price").val(max_price_range);
	  }

	  $("#slider-range").slider({
		values: [min_price_range, max_price_range]
	  });

	});



	$("#slider-range,#price-range-submit").click(function () {

	  var min_price = $('#min_price').val();
	  var max_price = $('#max_price').val();

	  $("#searchResults").text("Here List of products will be shown which are cost between " + min_price  +" "+ "and" + " "+ max_price + ".");
	});





	$('#price-range-submit1').hide();

	$("#min_price1,#max_price1").on('change', function () {

	  $('#price-range-submit1').show();

	  var min_price_range = parseInt($("#min_price1").val());

	  var max_price_range = parseInt($("#max_price1").val());

	  if (min_price_range > max_price_range) {
		$('#max_price1').val(min_price_range);
	  }

	  $("#slider-range1").slider({
		values: [min_price_range, max_price_range]
	  });
	  
	});


	$("#min_price1,#max_price1").on("paste keyup", function () {                                        

	  $('#price-range-submit1').show();

	  var min_price_range = parseInt($("#min_price1").val());

	  var max_price_range = parseInt($("#max_price1").val());
	  
	  if(min_price_range == max_price_range){

			max_price_range = min_price_range + 100;
			
			$("#min_price1").val(min_price_range);		
			$("#max_price1").val(max_price_range);
	  }

	  $("#slider-range1").slider({
		values: [min_price_range, max_price_range]
	  });

	});


  


	$("#slider-range1,#price-range-submit1").click(function () {

	  var min_price = $('#min_price1').val();
	  var max_price = $('#max_price1').val();

	  $("#searchResults1").text("Here List of products will be shown which are cost between " + min_price  +" "+ "and" + " "+ max_price + ".");
	});








//price-range-submit2

	$('#price-range-submit2').hide();

	$("#min_price2,#max_price2").on('change', function () {

	  $('#price-range-submit2').show();

	  var min_price_range = parseInt($("#min_price2").val());

	  var max_price_range = parseInt($("#max_price2").val());

	  if (min_price_range > max_price_range) {
		$('#max_price2').val(min_price_range);
	  }

	  $("#slider-range2").slider({
		values: [min_price_range, max_price_range]
	  });
	  
	});


	$("#min_price2,#max_price2").on("paste keyup", function () {                                        

	  $('#price-range-submit2').show();

	  var min_price_range = parseInt($("#min_price2").val());

	  var max_price_range = parseInt($("#max_price2").val());
	  
	  if(min_price_range == max_price_range){

			max_price_range = min_price_range + 100;
			
			$("#min_price2").val(min_price_range);		
			$("#max_price2").val(max_price_range);
	  }

	  $("#slider-range2").slider({
		values: [min_price_range, max_price_range]
	  });

	});


	$(function () {
	  $("#slider-range2").slider({
		range: true,
		orientation: "horizontal",
		min: 0,
		max: 10000,
		values: [0, 10000],
		step: 100,

		slide: function (event, ui) {
		  if (ui.values[0] == ui.values[1]) {
			  return false;
		  }
		  
		  $("#min_price2").val(ui.values[0]);
		  $("#max_price2").val(ui.values[1]);
		}
	  });

	  $("#min_price2").val($("#slider-range2").slider("values", 0));
	  $("#max_price2").val($("#slider-range2").slider("values", 1));

	});

	$("#slider-range2,#price-range-submit2").click(function () {

	  var min_price = $('#min_price2').val();
	  var max_price = $('#max_price2').val();

	  $("#searchResults2").text("Here List of products will be shown which are cost between " + min_price  +" "+ "and" + " "+ max_price + ".");
	});






	//price-range-submit3

	$('#price-range-submit3').hide();

	$("#min_price3,#max_price3").on('change', function () {

	  $('#price-range-submit3').show();

	  var min_price_range = parseInt($("#min_price3").val());

	  var max_price_range = parseInt($("#max_price3").val());

	  if (min_price_range > max_price_range) {
		$('#max_price3').val(min_price_range);
	  }

	  $("#slider-range3").slider({
		values: [min_price_range, max_price_range]
	  });
	  
	});


	$("#min_price3,#max_price3").on("paste keyup", function () {                                        

	  $('#price-range-submit3').show();

	  var min_price_range = parseInt($("#min_price3").val());

	  var max_price_range = parseInt($("#max_price3").val());
	  
	  if(min_price_range == max_price_range){

			max_price_range = min_price_range + 100;
			
			$("#min_price3").val(min_price_range);		
			$("#max_price3").val(max_price_range);
	  }

	  $("#slider-range3").slider({
		values: [min_price_range, max_price_range]
	  });

	});


	$(function () {
	  $("#slider-range3").slider({
		range: true,
		orientation: "horizontal",
		min: 0,
		max: 10000,
		values: [0, 10000],
		step: 100,

		slide: function (event, ui) {
		  if (ui.values[0] == ui.values[1]) {
			  return false;
		  }
		  
		  $("#min_price3").val(ui.values[0]);
		  $("#max_price3").val(ui.values[1]);
		}
	  });

	  $("#min_price3").val($("#slider-range3").slider("values", 0));
	  $("#max_price3").val($("#slider-range3").slider("values", 1));

	});

	$("#slider-range3,#price-range-submit3").click(function () {

	  var min_price = $('#min_price3').val();
	  var max_price = $('#max_price3').val();

	  $("#searchResults3").text("Here List of products will be shown which are cost between " + min_price  +" "+ "and" + " "+ max_price + ".");
	});





//price-range-submit3

	$('#price-range-submit4').hide();

	$("#min_price4,#max_price4").on('change', function () {

	  $('#price-range-submit4').show();

	  var min_price_range = parseInt($("#min_price4").val());

	  var max_price_range = parseInt($("#max_price4").val());

	  if (min_price_range > max_price_range) {
		$('#max_price4').val(min_price_range);
	  }

	  $("#slider-range4").slider({
		values: [min_price_range, max_price_range]
	  });
	  
	});


	$("#min_price3,#max_price4").on("paste keyup", function () {                                        

	  $('#price-range-submit4').show();

	  var min_price_range = parseInt($("#min_price4").val());

	  var max_price_range = parseInt($("#max_price4").val());
	  
	  if(min_price_range == max_price_range){

			max_price_range = min_price_range + 100;
			
			$("#min_price4").val(min_price_range);		
			$("#max_price4").val(max_price_range);
	  }

	  $("#slider-range4").slider({
		values: [min_price_range, max_price_range]
	  });

	});


	$(function () {
	  $("#slider-range4").slider({
		range: true,
		orientation: "horizontal",
		min: 0,
		max: 10000,
		values: [0, 10000],
		step: 100,

		slide: function (event, ui) {
		  if (ui.values[0] == ui.values[1]) {
			  return false;
		  }
		  
		  $("#min_price4").val(ui.values[0]);
		  $("#max_price4").val(ui.values[1]);
		}
	  });

	  $("#min_price4").val($("#slider-range4").slider("values", 0));
	  $("#max_price4").val($("#slider-range4").slider("values", 1));

	});

	$("#slider-range4,#price-range-submit4").click(function () {

	  var min_price = $('#min_price3').val();
	  var max_price = $('#max_price3').val();

	  $("#searchResults4").text("Here List of products will be shown which are cost between " + min_price  +" "+ "and" + " "+ max_price + ".");
	});

//price-range-submit5

	$('#price-range-submit5').hide();

	$("#min_price5,#max_price5").on('change', function () {

	  $('#price-range-submit5').show();

	  var min_price_range = parseInt($("#min_price5").val());

	  var max_price_range = parseInt($("#max_price5").val());

	  if (min_price_range > max_price_range) {
		$('#max_price5').val(min_price_range);
	  }

	  $("#slider-range5").slider({
		values: [min_price_range, max_price_range]
	  });
	  
	});


	$("#min_price5,#max_price5").on("paste keyup", function () {                                        

	  $('#price-range-submit5').show();

	  var min_price_range = parseInt($("#min_price5").val());

	  var max_price_range = parseInt($("#max_price5").val());
	  
	  if(min_price_range == max_price_range){

			max_price_range = min_price_range + 100;
			
			$("#min_price5").val(min_price_range);		
			$("#max_price5").val(max_price_range);
	  }

	  $("#slider-range5").slider({
		values: [min_price_range, max_price_range]
	  });

	});


	$(function () {
	  $("#slider-range5").slider({
		range: true,
		orientation: "horizontal",
		min: 0,
		max: 10000,
		values: [0, 10000],
		step: 100,

		slide: function (event, ui) {
		  if (ui.values[0] == ui.values[1]) {
			  return false;
		  }
		  
		  $("#min_price5").val(ui.values[0]);
		  $("#max_price5").val(ui.values[1]);
		}
	  });

	  $("#min_price5").val($("#slider-range5").slider("values", 0));
	  $("#max_price5").val($("#slider-range5").slider("values", 1));

	});

	$("#slider-range5,#price-range-submit5").click(function () {

	  var min_price = $('#min_price3').val();
	  var max_price = $('#max_price3').val();

	  $("#searchResults4").text("Here List of products will be shown which are cost between " + min_price  +" "+ "and" + " "+ max_price + ".");
	});



});