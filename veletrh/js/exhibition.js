function selectPlace(place, id){   
 $('.stanok').removeClass('selected');
 $.ajax({    
    type: "POST",  
    url: "select_place.php",
    data: "place=" + place + "& id=" + id,	
    success: function(data){          
        if(data.localeCompare('success') === 0){
          $('.stanok' + place).toggleClass('selected');	
        }else{
          alert('Chyba!');
        }         
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) { 
        alert("Status: " + textStatus + "|| Error: " + errorThrown);
    }       
  }); 
}
