window.addEventListener('load', function() {
    var form = document.getElementById('form');
    var individual = form;
    resultHTML = '';
        function orgForm(){
                resultHTML = '<form action="" class="login-form">\
                <!-- Organization name-->\
                <div class="input-group">\
                  <input type="text" placeholder="Organization name" id="name">\
                </div>\
                <!-- Username or Email -->\
                <div class="input-group">\
                  <input type="email" placeholder="Username or Email" id="username">\
                </div>\
                <div class="input-group">\
                    <input type="tel" placeholder="Mobile number" id="number" pattern="[0-9]{10}">\
                </div>\
                <!-- City-->\
                <div class="input-group">\
                  <input type="text" placeholder="Current working city" id="city">\
                </div>\
                <!-- State-->\
                <div class="input-group">\
                  <input type="text" placeholder="State" id="state">\
                </div>\
                <!-- Address -->\
                <div class="input-group">\
                  <input type="text" placeholder="Permanent Address" id="address">\
                </div>'
                
            form.innerHTML=resultHTML;
        }

        function indiForm (){
                resultHTML = '<form action="" class="login-form">\
                <!-- Full name-->\
                <div class="input-group">\
                  <input type="text" placeholder="Full name" id="name">\
                </div>\
                <!-- Username or Email -->\
                <div class="input-group">\
                  <input type="email" placeholder="Username or Email" id="username">\
                </div>\
                <div class="input-group">\
                    <input type="tel" placeholder="Mobile number" id="number" pattern="[0-9]{10}">\
                </div>\
                <!-- DOB -->\
                <div class="input-group">\
                  <input type="date" placeholder="Date of birth" id="dob">\
                </div>\
                <!--Gender-->\
                <div class="input-group">\
                    <p style="margin-bottom: 0; align-self: flex-start;">What\'s your gender?</p>\
                    <div style="align-self: flex-start;">\
                    <input type="radio" id="female" name="gender" value="female">\
                    <label for="female">Female</label>\
                    <input type="radio" id="other" name="gender" value="other">\
                    <label for="other">Rather not to say</label>\
                    </div>\
                </div>\
                <!-- City-->\
                <div class="input-group">\
                  <input type="text" placeholder="Current city" id="city">\
                </div>\
                <!-- State-->\
                <div class="input-group">\
                  <input type="text" placeholder="State" id="state">\
                </div>\
                <!-- Address -->\
                <div class="input-group">\
                  <input type="text" placeholder="Permanent Address" id="address">\
                </div>\
                <!--Martial Status -->\
                <div class="input-group">\
                    <p style="margin-bottom: 0; align-self: flex-start;">What\'s your martial status?</p>\
                    <div style="align-self: flex-start;">\
                    <input type="radio" id="single" name="martial" value="single">\
                    <label for="single">Single</label>\
                    <input type="radio" id="married" name="martial" value="married">\
                    <label for="married">Married</label>\
                    <input type="radio" id="divorced" name="martial" value="divorced">\
                    <label for="divorced">Divorced</label>\
                    </div>\
                </div>\
                <!--Language Known -->\
                <div class="input-group">\
                    <p style="margin-bottom: 0; align-self: flex-start;">What\'s language you speak?</p>\
                    <div>\
                    <input type="checkbox" id="hindi" name="language" value="hindi">\
                    <label for="hindi">Hindi</label>\
                    <input type="checkbox" id="english" name="language" value="english">\
                    <label for="english">English</label>\
                    <input type="checkbox" id="other" name="language" value="other">\
                    <label for="other">Other local language</label>\
                    </div>\
                </div>'

                form.innerHTML=resultHTML;
        }
        var org = document.getElementById('org');
        org.addEventListener('click', orgForm);

        var indi = document.getElementById('individual');
        indi.addEventListener('click', indiForm);
    });