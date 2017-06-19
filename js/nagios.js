$(document).ready(function(){
	var mydate = new Date();
	$("#drlcode").focus(function(){
		$("#drlcode").attr("value","");
		$('#drlcode').css('borderColor','#ffffff');
		$("#drlcodeId").val("");
		$("#errormsg").html("");
	});
	$("#drlcode").autocomplete({
		autoFocus: true,
		source: "getDRLCode.php",
		select: function(event, ui){
			$("#drlcode").val(ui.item.label);	
			$("#drlcodeId").val(ui.item.value);
			var starttime=$("#starttime").val();
			var endtime=$("#endtime").val();
			event.preventDefault();
			$.get("Ajax.php?action=getgraph&code="+ui.item.value+"&starttime="+starttime+"&endtime="+endtime,function(data,status){
				$("#errormsg").html(data);	
			});
		}
    });
	
	$("#doplayers").click(function(){
		var textval = $("#drlcodeId").val();
		var starttime=$("#starttime").val();
		var endtime=$("#endtime").val();
		if(textval.length != 5){
			$("#drlcode").attr("value","请正确选择DRL信息");
			$('#drlcode').css('borderColor','red');
			return false;
		}
		$.get("Ajax.php?action=getgraph&code="+textval+"&starttime="+starttime+"&endtime="+endtime,function(data,status){
			$("#errormsg").html(data);	
    });
  });
  $("button").click(function(){
	var textval = $("#drlcodeId").val(); 
	if(textval.length != 5){
		$("#drlcode").attr("value","请正确选择DRL信息");
		$('#drlcode').css('borderColor','red');
		return false;
	}
		starttime=$(this).val();
		$.get("Ajax.php?action=getgraph&code="+textval+"&starttime="+starttime,function(data,status){
			$("#errormsg").html(data);
		});
	});
	$('#reservationtime').daterangepicker({
		timePicker: true,
		timePicker12Hour:false,
		changeYear: true,
		timePickerIncrement: 5,
		maxDate:mydate.toLocaleString(),
		format: 'YYYY-MM-DD HH:mm'
	  }, function(start, end, label) {
		var starttime=Date.parse(start.format('YYYY-MM-DD HH:mm:ss')) / 1000;
		var endtime=Date.parse(end.format('YYYY-MM-DD HH:mm:ss')) / 1000;
		$("#starttime").val(starttime);
		$("#endtime").val(endtime);
		var textval = $("#drlcodeId").val(); 
		if(textval.length != 5){
			$("#drlcode").attr("value","请正确选择DRL信息");
			$('#drlcode').css('borderColor','red');
			return false;
		}
		$.get("Ajax.php?action=getgraph&code="+textval+"&starttime="+starttime+"&endtime="+endtime,function(data,status){
			$("#errormsg").html(data);
		});
	  });
	
});