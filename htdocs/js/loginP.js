function validateEmail(email) 
{
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

function probe_login(){

  var login = $('#main_login').val();
  var pass = $('#main_pass').val();

  if ((pass.length < 4) || (login.length < 4)) {
    document.getElementById('login_err').style.display = 'block';
    return false;
  }

  $.ajax({    
    type: "POST",  
    url: "probe_login.php",
    data: "login=" + login + "& pass=" + pass,
    success: function(data){
        if(data.localeCompare('success') === 0){
          var log = document.getElementById('login_form');          
          log.submit();          
        }else{
          document.getElementById('login_err').style.display = 'block';          
        }        
    },
    error: function(jqXHR, textStatus, errorThrown){
      alert("Nepodařilo se kontaktovat server");
    }         
  });
  return false;
}

function verify_login(){
  var login = $('#ver_login').val();

  $.ajax({    
    type: "POST",  
    url: "check_login.php",
    data: "login=" + login,
    success: function(data){          
        if(data.localeCompare('success') === 0){
          next_reg_1();
        }else{
          document.getElementById('ver_login').setCustomValidity("Přihlašovací jméno již existuje");
          document.getElementById('register').click();
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
  
  var f_name = document.forms["reg_form"]["f_name"].value;
  var l_name = document.forms["reg_form"]["l_name"].value; 
  var email = document.forms["reg_form"]["email"].value;   
  
  var err_msg = '';
  if(validateEmail(email) === false){
    document.getElementById('register').click();
  }else{
    if ((f_name.length < 1) || (l_name.length < 1)) {
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