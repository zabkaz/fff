function selectPlace(place, id){   
 $('.stand').removeClass('selected');
 $.ajax({    
    type: "POST",  
    url: "select_place.php",
    data: "place=" + place + "& id=" + id,	
    success: function(data){          
        if(data.localeCompare('success') === 0){
          $('.stand' + place).toggleClass('selected');	
        }else{
          alert('Chyba!');
        }         
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) { 
        alert("Status: " + textStatus + "|| Error: " + errorThrown);
    }       
  }); 
}
