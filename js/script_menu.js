$(document).ready(function(){
	//link1
	$(".menu").click(function(){
		//alert($(this).attr('id'));
		   $(".loading").show();
                  $.post("index.php/menu/getmenu",{'view': $(this).attr('id')},function(data){
                      $("#show").html(data)
                      $(".loading").hide();
                  });
	});
});