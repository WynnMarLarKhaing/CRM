$(function() {
  $("#customers").change(function(){  
  	$("#email").html(
  		$(":selected",this).data("email")
	)

	$("#phone").html(
  		$(":selected",this).data("phone")
	)
  })


  $("#products").change(function(){  
  	$("#make").html(
  		$(":selected",this).data("make")
	)

	$("#model").html(
  		$(":selected",this).data("model")
	)
  })
});