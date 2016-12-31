$( document ).ready(function() {
	
    var address2 = $("#corr-add").val();
    if(address2 != 0){
    	$("#corr-add").prop('checked', true);
    }else{
    	$("#corr-add").prop('checked', false);
		var boxy = document.getElementsByClassName("add2");    
	  	for(i=0; i< boxy.length; i++){
	  		boxy[i].disabled = true;    
    	}
    }
});

$('#corr-add').change(function(){
   var boxy = document.getElementsByClassName("add2");
   if (this.checked) {     
	  for(i=0; i< boxy.length; i++){
	  	boxy[i].disabled = false;
    }
   }
	else{
	   for(i=0; i< boxy.length; i++){
	  	boxy[i].disabled = true;	  	
	    }
	}
});