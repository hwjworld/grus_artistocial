<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=JejuGothic&display=swap" rel="stylesheet" />
    <title>DECO1800/7180 Artistocial Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/initialize.css">
    <link rel="stylesheet" href="css/publicStyle.css">
    <link rel="stylesheet" href="css/signin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
</head>

<body>
    <!-- <div class="Login_style">
        <div class="top_style"></div>
    
        <div class="background_style"></div>
        <input type="email" class="email"></div>
        <input type="password" class="password"></div>
        <div class="button_style"></div><span class="word_style">Bio:</span>
        <span class="email_style">Occupation:</span>
        <input type="text" class="lastname"></div>
        <input type="text" class="occupation"></div><span class="occupation_style">Name:</span>
        <span class="lastname_style">Password:</span>
        <input type="text" class="firstName"></div><span class="firstname_style">Email Address(ID):</span>
        <span class="sign_up">SIGN UP</span><a href="loginComplete.html" class="continue">Continue</a>
        <div class="figure_one">
            <div class="figure_two"></div>
            <div class="figure_three"></div>
            <div class="figure_four"></div>
            <div class="figure_five">
                <div class="figure_six"></div>
            </div>
            <div class="stomachLogin">
                <div class="figure_seven">
                    <div class="stomachLoginTop"></div>
                </div>
                <div class="figure_eight"></div>
            </div>
            <div class="figure_eye_one"></div>
            <div class="figure_eye_two"></div>
            <div class="figure_arm"></div>
            <div class="rightHandLogin"></div>
            <div class="squre_style">
                <div class="figure_nine"><span class="sentense_style">Nice to meet you!</span></div>
                <div class="name"></div>
            </div>
        </div>
    </div> -->

    <div class="content-info">
        
        <iframe frameborder="no" scrolling="no" class="w-100-iframe top-iframe" src="layout/topTab.php?color=000000"></iframe>
    
        <div class="logo-image">
            <img src="images/artistocial.png" width="230" height="100">
        </div>
        <div class="yellow-background"></div>
        <span class="top-signin">SIGN UP</span>

        <form action="../be/pgreq/signup.php" method="POST" id="reg-form">
        <input type="text" class="email" id="f_occupation" ></div>
        <input type="text" class="password" id="f_bio"></div>
        <div class="button_style"></div><span class="word_style">Bio:</span>
        <span class="email_style">Occupation:</span>
        <input type="password" class="lastname" id="f_password"></div>
        <input type="text" class="occupation" id="f_name"></div><span class="occupation_style">Name:</span>
        <span class="lastname_style">Password:</span>
        <input type="text" class="firstName" id="f_email"></div><span class="firstname_style">Email Address(ID):</span>
        <span class="sign_up">SIGN UP</span><a href="#" class="continue" id="submit_button">Continue</a>
        </form>
        <div class="figure_one">
            <div class="figure_two"></div>
            <div class="figure_three"></div>
            <div class="figure_four"></div>
            <div class="figure_five">
                <div class="figure_six"></div>
            </div>

            <div class="figure_eye_one"></div>
            <div class="figure_eye_two"></div>
            <div class="figure_arm"></div>
            <div class="rightHandLogin"></div>
            <div class="squre_style">
                <div class="figure_nine"><span class="sentense_style">Nice to meet you!</span></div>
                <div class="name"></div>
            </div>
        </div>
    </div>

   
    <script language="javascript">
        $("#submit_button").click(function(){$("#reg-form").submit();});
        $("#reg-form").submit(function(e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var form = $(this);
            var actionUrl = form.attr('action');
            $.ajax({
                type: "POST",
                url: actionUrl,
                // dataType: "text",
                data: {email:$("#f_email").val(),
                    password:$("#f_password").val(),
                    name: $("#f_name").val(),
                    occupation:$("#f_occupation").val(),
                    bio:$("#f_bio").val()
                }, // serializes the form's elements.
                success: function(data)
                {
                    if(data.indexOf("Signup successful")>=0){
                        alert("Signup successful");
                        top.location.href="loginComplete.php";
                    }else{
                        alert(data); // show response from the php script. 
                    }
                }
            });

            });

    </script>
</body>
<iframe frameborder="no" scrolling="no" class="w-100-iframe-signin footer-iframe" src="layout/footer.php?color=F4CF0A"></iframe>
</html>