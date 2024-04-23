<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up and Log In Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        @import url('https://fonts.googleapis.com/css2?family=Neonderthaw&family=Outfit:wght@600&family=Roboto:wght@400;500&family=Varela+Round&family=Zen+Tokyo+Zoo&display=swap');
        html, body {
          margin: 0;
          padding: 0;
          height: 100%;
        }

        body {
            overflow: hidden;
            background-image: url("pictures/background_bar.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .mb-3 {
            color: #FAF9F6;
            font-family: 'Varela Round', sans-serif;
        }

        .box {
            margin-top: 55px;
            display: grid;
            place-items: center;
             font-family: 'zen tokyo zoo', sans-serif;
             z-index: -1;
        }
        .box p{
            font-size: 80px;
            text-transform: uppercase;
            color: #ffd9e2;
            text-shadow: 0 0 0 transparent,
                        0 0 10px #ff003c,
                        0 0 20px rgba(255, 0, 60, 0.5),
                        0 0 40px #ff003c,
                        0 0 100px #ff003c,
                        0 0 200px #ff003c,
                        0 0 300px #ff003c,
                        0 0 500px #ff003c,
                        0 0 1000px #ff003c;

                animation: animate 3s infinite alternate;
        }

        @keyframes animate{
            40%{
                opacity: 1;
            }
            42%{
                opacity: 0.8;
            }
            43%{
                opacity: 1;
            }
            45%{
                opacity: 1;
            }
            40%{
                opacity: 1;
            }
        }
        input {
            background: rgba(0, 0, 0, 0.5) !important;
            color: #FAF9F6 !important; /* Change to the desired text color */
            border: 1px solid #FAF9F6 !important;
            padding: 10px !important;
            margin: 5px !important;
        }

        button {}

        header {
            margin: 0;
            padding: 0;
            background-color: transparent; /* Set background color to transparent */
        }
        h2{
            text-align: center;
            color: #FAF9F6;
            font-family: 'Varela Round', sans-serif;
            z-index: 2;
        }
        .or-divider {
            margin-left: 7px;
            margin-right: 7px;
            align-self: center;
            color: #FAF9F6; /* Set the text color to black or a color that contrasts well with your background */
            font-family: 'Varela Round', sans-serif;
        }
        .signcontainer {
            background-color: #000000;
        }

        .sign {
            position: relative;
            background: none;
            color: #303030;
            font-size: 4rem;
            display: inline-block;
            font-family: 'Varela Round', sans-serif;
        }

        .col-md-6 {
            color: #ffffff;
            font-size: 30px;
            margin-top: -60px;
            text-align: center;
        }

        #signupForm {
            text-align: left; /* Align the text to the left within the form */
            max-width: 350px; /* Set a maximum width for the form if needed */
            margin: auto; /* Center the form horizontally */
            margin-top: -50px;
        }

        #signupForm label {
            color: #FAF9F6;
        }
        :root {
  --clr-neon: hsl(346, 100%, 50%);
  --clr-bg: hsl(0, 0%, 0%);
}
.signup {
  text-transform: uppercase;
  font-family: 'zen tokyo zoo', sans-serif;
  background: rgba(0, 0, 0, 0.5) !important;
  font-size: 15px;
  display: inline-block;
  cursor: pointer;
  text-decoration: none;
  color: var(--clr-neon);
  border: var(--clr-neon) 0.125em solid;
  padding: 0.25em 1em;
  border-radius: 0.25em;
  margin-left: 11px;
  width: 130px;
  height: 50px;

  text-shadow: 0 0 0.125em hsl(0 0% 100% / 0.3), 0 0 0.45em currentColor;

  box-shadow: inset 0 0 0.5em 0 var(--clr-neon), 0 0 0.5em 0 var(--clr-neon);

  position: relative;
}

.signup::before {
  pointer-events: none;
  content: "";
  position: absolute;
  background: var(--clr-neon);
  top: 90%;
  left: 0;
  width: 100%;
  height: 100%;

  transform: perspective(3em) rotateX(40deg) scale(1, 0.35);
  filter: blur(1em);
  opacity: 0.7;
}

.signup::after {
  content: "";
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  box-shadow: 0 0 2em 0.5em var(--clr-neon);
  opacity: 0;
  background-color: var(--clr-neon);
  z-index: -1;
  transition: opacity 100ms linear;
}

.signup:hover,
.signup:focus {
  color: var(--clr-bg);
  text-shadow: none;
}

.signup:hover::before,
.signup:focus::before {
  opacity: 1;
}
.signup:hover::after,
.signup:focus::after {
  opacity: 1;
}
.login {
  text-transform: uppercase;
  font-family: 'zen tokyo zoo', sans-serif;
  background: rgba(0, 0, 0, 0.5) !important;
  font-size: 15px;
  display: inline-block;
  cursor: pointer;
  text-decoration: none;
  color: var(--clr-neon);
  border: var(--clr-neon) 0.125em solid;
  padding: 0.25em 1em;
  border-radius: 0.25em;
  margin-left: 6px;
  width: 130px;
  height: 50px;

  text-shadow: 0 0 0.125em hsl(0 0% 100% / 0.3), 0 0 0.45em currentColor;

  box-shadow: inset 0 0 0.5em 0 var(--clr-neon), 0 0 0.5em 0 var(--clr-neon);

  position: relative;
}

.login::before {
  pointer-events: none;
  content: "";
  position: absolute;
  background: var(--clr-neon);
  top: 90%;
  left: 0;
  width: 100%;
  height: 100%;

  transform: perspective(3em) rotateX(40deg) scale(1, 0.35);
  filter: blur(1em);
  opacity: 0.7;
}

.login::after {
  content: "";
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  box-shadow: 0 0 2em 0.5em var(--clr-neon);
  opacity: 0;
  background-color: var(--clr-neon);
  z-index: -1;
  transition: opacity 100ms linear;
}

.login:hover,
.login:focus {
  color: var(--clr-bg);
  text-shadow: none;
}

.login:hover::before,
.login:focus::before {
  opacity: 1;
}
.login:hover::after,
.login:focus::after {
  opacity: 1;
}
.col-md-6 p{
            margin-top: 20px;
            display: grid;
            place-items: center;
            font-family: 'Outfit', sans-serif;
             z-index: -1;
        }
        .col-md-6 p{
            font-size: 20px;
            text-transform: uppercase;
            color: #FFEA00;
            text-shadow: 0 0 0 transparent,
                        0 0 10px #FFEA00,
                        0 0 20px rgba(255, 0, 60, 0.5),
                        0 0 40px #FFEA00,
                        0 0 100px #FFEA00,
                        0 0 200px #FFEA00,
                        0 0 300px #FFEA00,
                        0 0 500px #FFEA00,
                        0 0 1000px #FFEA00;

                animation: animate 3s infinite alternate;
        }
        button {
  text-align: center;
  margin-top: 55px;
  font-family: 'Outfit', sans-serif;
  font-size: 20px;
  color: #000000;
  cursor: pointer;
  border-radius: 100px;
  border: 0px solid #000;   
  background-color: #FF003C;
  height: 50px;
  width: 200px;
  transition: box-shadow 0.3s ease; /* Add a transition for smoother changes */
}

/* Initiate Auto-Pulse animations */
button.pulse-button {
  animation: borderPulse 1s infinite ease-out, 10s infinite ease-in;
}

/* Faster pulse animation on hover */
button.auto-pulse:hover {
  animation: borderPulseHover 0.5s infinite ease-out, 5s infinite ease-in;
}

/* Add initial animation to the button without user interaction */
button.auto-pulse {
  animation: borderPulse 1s infinite ease-out, 10s infinite ease-in;
}

/* Declare border pulse animation */
@keyframes borderPulse {
  0% {
    box-shadow: inset 0px 0px 0px 5px rgba(300, 60, 60, 10), 0px 0px 0px 0px rgba(200, 0, 30, 1);
  }
  100% {
    box-shadow: inset 0px 0px 0px 3px rgba(117, 117, 255, 0.2), 0px 0px 0px 15px rgba(255, 40, 40, 0);
  }
}

/* Declare faster border pulse animation on hover */
@keyframes borderPulseHover {
  0% {
    box-shadow: inset 0px 0px 0px 5px rgba(300, 60, 60, 10), 0px 0px 0px 0px rgba(200, 0, 30, 1);
  }
  100% {
    box-shadow: inset 0px 0px 0px 3px rgba(117, 117, 255, 0.2), 0px 0px 0px 15px rgba(255, 40, 40, 0);
  }
}

@media (max-width: 768px) {
    .box p {
        font-size: 60px;
    }

    .col-md-6 {
        font-size: 20px;
    }
}

@media (max-width: 767px) {
    .container {
        padding: 20px;
    }
}


    </style>
</head>

<body>
    <div class="box">
        <p>WELCOME</p>
        <p>------to------</p>
        <p>ShopHear</p>
    </div>

    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <p>we are hear for you</p>
            <button type="button" class="auto-pulse pulse-button" onclick="window.location.href='signup.php'">feeling curious?</button>
        </div>
    </div>
</div>



    <!-- Bootstrap JS and Popper.js (required for Bootstrap's JavaScript plugins) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Simple JavaScript for form validation -->
    <script>
        var button = document.getElementById('log');
        var username;
        var password;
        button.addEventListener('click', function() {
          
          user = document.getElementById("signupUsername").value;


          alert("clicked" + user);
        });
    </script>

</body>

</html>


</body>
</html>