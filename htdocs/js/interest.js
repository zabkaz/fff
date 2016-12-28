function add_interest(name, id){    
    $.ajax({    
    type: "GET",  
    url: "/addInterest",
    data: "name=" + name + "& id=" + id,
    success: function(data){          
        if(data.localeCompare('success') === 0){
          $('.'+name).toggleClass('active')
        }else{
          alert('fail');
        }         
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) { 
        alert("Status: " + textStatus + "|| Error: " + errorThrown);
    }       
  }); 
}
