function modal_login() {
    el = document.getElementById("overlay");
    el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
}

function validateEmail(email) 
{
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

function verify_login_e(){  
  var login = $('#ver_loginE').val();
  $.ajax({    
    type: "GET",  
    url: "/checkLoginE",
    data: "login=" + login,
    success: function(data){          
        if(data.localeCompare('success') != 0){
          document.getElementById('ver_loginE').setCustomValidity("Přihlašovací jméno již existuje");
          document.getElementById('registerE').click();
        }else{
			next_reg_1_e();
		}        
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) { 
        alert("Status: " + textStatus + "|| Error: " + errorThrown);
    }       
  });
}

function next_reg_1_e() {
	
  el1 = document.getElementById("first-rowE");
  el2 = document.getElementById("second-rowE");  

  var pass = document.forms["reg_formE"]["password"].value;
  var username = document.forms["reg_formE"]["username"].value;  
  
  if ((pass.length < 3) || (username.length < 3)) {
    var err_msg = "Jméno a heslo by měli mít alespoň 3 znaky!";
    document.getElementById('ver_loginE').setCustomValidity(err_msg);
    document.getElementById('registerE').click();
  }else{
    el1.style.display = 'none';
    el2.style.display = 'block';  
    document.getElementById('ver_loginE').setCustomValidity("");
    var active = document.querySelector('.circle.active');
    active.classList.toggle('active');  
    active.nextElementSibling.className += ' active';
  }
}

function next_reg_2_e() {
  el1 = document.getElementById("second-rowE");
  el2 = document.getElementById("third-rowE");
  
  var tel_num = document.forms["reg_formE"]["tel_num"].value; 
  var email = document.forms["reg_formE"]["email"].value;   
  
  var err_msg = '';
  if(validateEmail(email) === false){
    document.getElementById('registerE').click();
  }else{
    if (tel_num.length < 9) {
      err_msg = 'Telefonní číslo je příliš krátké.';
      document.getElementById('reg_num').setCustomValidity(err_msg);
      document.getElementById('registerE').click();
    }else{
      el1.style.display = 'none';
      el2.style.display = 'block';  
      var active = document.querySelector('.circle.active');
      active.classList.toggle('active');  
      active.nextElementSibling.className += ' active';
    }
  }
}

function next_reg_3_e() {
  el1 = document.getElementById("third-rowE");
  el2 = document.getElementById("fourth-rowE");
  
  var street = document.forms["reg_formE"]["street"].value;
  var city = document.forms["reg_formE"]["city"].value; 
  var zip = document.forms["reg_formE"]["zip"].value;   
  var country = document.forms["reg_formE"]["country"].value;   
  
    if ((street.length < 1) || (city.length < 1) || (zip.length < 1) || (country.length < 1) ) {
      document.getElementById('registerE').click();
    }else{
      el1.style.display = 'none';
      el2.style.display = 'block';  
      var active = document.querySelector('.circle.active');
      active.classList.toggle('active');  
      active.nextElementSibling.className += ' active';
    }
}