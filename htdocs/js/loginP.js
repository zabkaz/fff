function validateEmail(email) 
{
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

function verify_login_p(){  
  var login = $('#ver_loginP').val();
  $.ajax({    
    type: "GET",  
    url: "/checkLoginP",
    data: "login=" + login,
    success: function(data){          
        if(data.localeCompare('success') != 0){
          document.getElementById('ver_loginP').setCustomValidity("Přihlašovací jméno již existuje");
          document.getElementById('registerP').click();
        }else{			
			next_reg_1_p();
		}        
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) { 
        alert("Status: " + textStatus + "|| Error: " + errorThrown);
    }       
  });
}

function clearErr(){
	document.getElementById('ver_loginP').setCustomValidity("");
	document.getElementById('ver_pass').setCustomValidity("");
  // preco v indexe je password pre E je to aj inde pre E?
}

function next_reg_1_p() {
  el1 = document.getElementById("first-rowP");
  el2 = document.getElementById("second-rowP");  

  var pass = document.forms["reg_formP"]["password"].value;
  var username = document.forms["reg_formP"]["username"].value;  
  
  if ((pass.length < 3) || (username.length < 3)) {
    var err_msg = "Jméno a heslo by měli mít alespoň 3 znaky!";
    document.getElementById('ver_loginP').setCustomValidity(err_msg);
    document.getElementById('registerP').click();
  }else{
    el1.style.display = 'none';
    el2.style.display = 'block';  
    document.getElementById('ver_loginP').setCustomValidity("");
    var active = document.querySelector('.circle.active');
    active.classList.toggle('active');  
    active.nextElementSibling.className += ' active';
  }
}

function next_reg_2_p() {
  el1 = document.getElementById("second-rowP");
  el2 = document.getElementById("third-rowP");
  
  var f_name = document.forms["reg_formP"]["first_name"].value;
  var l_name = document.forms["reg_formP"]["last_name"].value; 
  var email = document.forms["reg_formP"]["email"].value;   
  
  var err_msg = '';
  if(validateEmail(email) === false){
    document.getElementById('registerP').click();
  }else{
    if ((f_name.length < 1) || (l_name.length < 1)) {
      document.getElementById('registerP').click();
    }else{
      el1.style.display = 'none';
      el2.style.display = 'block';  
      var active = document.querySelector('.circle.active');
      active.classList.toggle('active');  
      active.nextElementSibling.className += ' active';
    }
  }
}
