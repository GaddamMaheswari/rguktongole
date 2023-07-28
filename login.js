document.addEventListener("DOMContentLoaded", function() {
  
  var form = document.getElementById("stu-login-form");
  var usernameInput = document.getElementById("stu-username");
  var passwordInput = document.getElementById("stu-password");

  
  form.addEventListener("submit", function(event) {
    event.preventDefault(); 

    var username = usernameInput.value;
    var password = passwordInput.value;

    
    var usernamePattern = /^(o180|o170|o160|o200)\d{3}$/i;
    
    if (username.match(usernamePattern) && username === password) {    
      window.location.href = "./sidebar/index.html";
    } else {
      alert("Invalid username or password!"); 
    }
  });
});
