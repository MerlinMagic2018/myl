$(document).ready(function() {

	//toggle 1 or 2 column layout
	$("#columns-2").addClass("open");
	$("#columns-2-nav").addClass("open");
	$(".aside").addClass("open");
	$("#columns-1").addClass("open");
	$("#columns-1-nav").addClass("open");
	
	//view 1 column
	$("a[href='#columns-1']").click(function(e){
		$("#columns-1").removeClass("closed").addClass("open").find(".closed").removeClass("closed").addClass("open");			
		$("#columns-1-nav").removeClass("closed").addClass("open");
		
		$("#columns-2").removeClass("open").addClass("closed");				
		$(".aside").removeClass("open").addClass("closed");
		$("#columns-2-nav").removeClass("open").addClass("closed");
		e.preventDefault();
	});
	
	//view 2 column
	$("a[href='#columns-2']").click(function(e){
		$("#columns-2").removeClass("closed").addClass("open").find(".closed").removeClass("closed").addClass("open");
		$(".aside").removeClass("closed").addClass("open");
		$("#columns-2-nav").removeClass("closed").addClass("open");
		
		$("#columns-1").removeClass("open").addClass("closed");
		$("#columns-1-nav").removeClass("open").addClass("closed");
		e.preventDefault();
	});
	
	//view all
	$("a[href='#view-all']").click(function(e){
		$(".closed").removeClass("closed").addClass("open");
		e.preventDefault();
	});
	
	//view individual sections
	$(".sg-nav li").click(function(e){
		var item = $(this).index();
		var columns = $(this).parent().attr("id");
		isolate(item,columns);
		e.preventDefault();
	})

});

function isolate(item,columns){
	
	if(columns == "columns-2-nav")
	{
		$("#columns-2").removeClass("closed").addClass("open");
		$(".aside").removeClass("closed").addClass("open");
		$("#columns-1").removeClass("open").addClass("closed");
		$("#columns-2").find(".sg-pattern").addClass("closed");
		$("#columns-2 .sg-pattern:eq("+item+")").removeClass("closed").addClass("open");
	}
	else
	{
		$("#columns-1").removeClass("closed").addClass("open");
		$("#columns-2").removeClass("open").addClass("closed");
		$(".aside").removeClass("open").addClass("closed");
		$("#columns-1").find(".sg-pattern").addClass("closed");
		$("#columns-1 .sg-pattern:eq("+item+")").removeClass("closed").addClass("open");
	}
}