function modal_login() {
    el = document.getElementById("overlay");
    el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
}

function processing(){  
    var el1 = document.getElementById('sign-in');
    var el2 = document.getElementById('sign-up');
    
    if(el1.style.display != 'none'){
      el1.style.display = 'none';
      el2.style.display = 'block';
    }else{
      el1.style.display = 'block';
      el2.style.display = 'none';
    }    
}

function validateEmail(email) 
{
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

function verify_login(){  
  var login = $('#ver_login').val();
  $.ajax({    
    type: "GET",  
    url: "/checkLogin",
    data: "login=" + login,
    success: function(data){          
        if(data.localeCompare('success') != 0){
          document.getElementById('ver_login').setCustomValidity("Přihlašovací jméno již existuje");
          document.getElementById('register').click();
        }else{
			next_reg_1();
		}        
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) { 
        alert("Status: " + textStatus + "|| Error: " + errorThrown);
    }       
  });
}

function next_reg_1() {
	
  el1 = document.getElementById("first-row");
  el2 = document.getElementById("second-row");  

  var pass = document.forms["reg_form"]["password"].value;
  var username = document.forms["reg_form"]["username"].value;  
  
  if ((pass.length < 4) || (username.length < 4)) {
    var err_msg = "Login a heslo by měli mít alespoň 4 znaky!";
    document.getElementById('ver_login').setCustomValidity(err_msg);
    document.getElementById('register').click();
  }else{
    el1.style.display = 'none';
    el2.style.display = 'block';  
    document.getElementById('ver_login').setCustomValidity("");
    var active = document.querySelector('.circle.active');
    active.classList.toggle('active');  
    active.nextElementSibling.className += ' active';
  }
}

function next_reg_2() {
  el1 = document.getElementById("second-row");
  el2 = document.getElementById("third-row");
  
  var c_name = document.forms["reg_form"]["c_name"].value;
  var tel_num = document.forms["reg_form"]["tel_num"].value; 
  var email = document.forms["reg_form"]["email"].value;   
  
  var err_msg = '';
  if(validateEmail(email) === false){
    document.getElementById('register').click();
  }else{
    if ((c_name.length < 3) || (tel_num.length < 9)) {
      err_msg = 'Company name or tel. number are too short!';
      document.getElementById('reg_name').setCustomValidity(err_msg);
      document.getElementById('register').click();
    }else{
      el1.style.display = 'none';
      el2.style.display = 'block';  
      var active = document.querySelector('.circle.active');
      active.classList.toggle('active');  
      active.nextElementSibling.className += ' active';
    }
  }
}

function next_reg_3() {
  el1 = document.getElementById("third-row");
  el2 = document.getElementById("fourth-row");
  
  var street = document.forms["reg_form"]["street"].value;
  var city = document.forms["reg_form"]["city"].value; 
  var zip = document.forms["reg_form"]["zip"].value;   
  var country = document.forms["reg_form"]["country"].value;   
  
    if ((street.length < 1) || (city.length < 1) || (zip.length < 1) || (country.length < 1) ) {
      document.getElementById('register').click();
    }else{
      el1.style.display = 'none';
      el2.style.display = 'block';  
      var active = document.querySelector('.circle.active');
      active.classList.toggle('active');  
      active.nextElementSibling.className += ' active';
    }
}