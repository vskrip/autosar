$(document).ready(function(){
    $(".toc").click(function(){
		$.ajax({
			url: $(this).attr("data-url"),
			cache: false,
			success: function(html){
				$("#divcontent").html(html);
			}
		});
	});
});
