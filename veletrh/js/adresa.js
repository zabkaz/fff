$( document ).ready(function() {
	
    var adresa2 = $("#korespAdd").val();
    if(adresa2 != 0){
    	$("#korespAdd").prop('checked', true);
    }else{
    	$("#korespAdd").prop('checked', false);
    	var boxy = document.getElementsByClassName("adresa2");    
	  	for(i=0; i< boxy.length; i++){
	  		boxy[i].disabled = true;    
    	}
    }
});

//korespodencna adresa vystavovatela
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