$.validator.addMethod("regex", function(value, element, param) {
    return this.optional(element) ||
        value.match(typeof param == "string" ? new RegExp(param) : param);
}); // Add method to plugin for processing regex……………

$("#RegisterForm").validate({

    rules: {
        // simple rules……
        number: {
            required: true,
            digits: true,
            minlength: 10,
            maxlength: 10
        },

        password: {
            required: true,
            regex: “ /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/”  
                    //regex for passsord strength……
        },

        re-password: {
            required: true,
            equalTo: "#password"      //match value with preentered password field…..
        }
    },

    messages: {                      //error messages………
        password: {

            regex: "The password must be eight character long and must contain one uppercase, one lower case letter and special character"
        }
    },
    submitHandler: function(form) {
        $(form).ajaxSubmit();
    }
});

var password = document.getElementById("password")
  , confirm_password = document.getElementById("re-password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;