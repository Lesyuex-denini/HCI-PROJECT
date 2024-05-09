<?php
session_start();
include_once "db_connection.php";

$errors = array();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $signupUsername = $_POST['signupUsername'];
    $signupEmail = $_POST['signupEmail'];
    $signupPassword = $_POST['signupPassword'];
    $signupVerifyPassword = $_POST['signupverifyPassword'];

    if (!empty($signupUsername) && !empty($signupEmail) && !empty($signupPassword) && !empty($signupVerifyPassword)) {

        $checkUsernameQuery = "SELECT * FROM users WHERE name='$signupUsername'";
        $checkUsernameResult = mysqli_query($conn, $checkUsernameQuery);

        $checkEmailQuery = "SELECT * FROM users WHERE email='$signupEmail'";
        $checkEmailResult = mysqli_query($conn, $checkEmailQuery);

        if (mysqli_num_rows($checkUsernameResult) > 0) {
            $errors[] = "Username is already taken.";
        }

        if (mysqli_num_rows($checkEmailResult) > 0) {
            $errors[] = "Email is already registered.";
        }

        if ($signupPassword != $signupVerifyPassword) {
            $errors[] = "Passwords do not match.";
        }

        if (empty($errors)) {
            $hashedPassword = password_hash($signupPassword, PASSWORD_DEFAULT);

            $query = "INSERT INTO users (name, email, password_hash) VALUES ('$signupUsername','$signupEmail' , '$hashedPassword')";
            mysqli_query($conn, $query);
            header("Location: login.php");

        }
    } else {
        $errors[] = "Please enter valid information.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <!-- Bootstrap CSS -->  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Varela+Round&display=swap');

        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Varela+Round&family=Zen+Tokyo+Zoo&display=swap');

        body {
            background-color: #BA90C6;
            margin: 0;
            padding: 0;
        }

        .mb-3 {
            color: #FAF9F6;
            font-family: 'Varela Round', sans-serif;
        }

        .box {
            margin-top: 20px;
            display: grid;
            place-items: center;
            font-family: 'Varela Round', sans-serif;
            z-index: -1;
        }
        .box p{
            font-weight: bold;
            font-size: 100px;
            text-transform: uppercase;
            color: #F3BCC8;
            animation: animate 4s infinite alternate;
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
            color: #FAF9F6 !important;
            border: 1px solid #FAF9F6 !important;
            padding: 10px !important;
            margin: 5px !important;
        }

        button {}

        header {
            margin: 0;
            padding: 0;
            background-color: transparent;
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
            color: #FAF9F6;
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
            text-align: center;
        }

        #signupForm {
            text-align: left;
            max-width: 350px;
            margin: auto;
            margin-top: -50px;
        }

        #signupForm label {
            color: #FAF9F6;
        }
        :root {
            --clr-neon: #C780FA;
            --clr-bg: hsl(0, 0%, 0%);
        }
        .signup {
            letter-spacing: 3px;
            text-transform: uppercase;
            font-family: 'Varela Round';
            background: #7F669D;
            font-size: 15px;
            display: inline-block;
            cursor: pointer;
            text-decoration: none;
            color: #F3BCC8;
            border: #400E32;
            padding: 0.25em 1em;
            border-radius: 0.25em;
            margin-left: 11px;
            width: 130px;
            height: 50px;
            text-shadow: 0 0 0.125em hsl(0 0% 100% / 0.3), 0 0 0.45em currentColor;
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
            background-color: #7F669D;
            z-index: -1;
            transition: opacity 100ms linear;
        }

        .signup:hover,
        .signup:focus {
            color: #fff;
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
            letter-spacing: 3px;
            text-transform: uppercase;
            font-family: 'Varela Round';
            background: #7F669D;
            font-size: 15px;
            display: inline-block;
            cursor: pointer;
            text-decoration: none;
            color: #F3BCC8;
            border: #400E32;
            padding: 0.25em 1em;
            border-radius: 0.25em;
            margin-left: 6px;
            width: 130px;
            height: 50px;
            text-shadow: 0 0 0.125em hsl(0 0% 100% / 0.3), 0 0 0.45em currentColor;
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
            background-color: #7F669D;
            z-index: -1;
            transition: opacity 100ms linear;
        }

        .login:hover,
        .login:focus {
            color: #fff;
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
        h2 {
                    margin-top: -15px;
                    display: grid;
                    place-items: center;
                    font-family: 'Varela Round', sans-serif;
                    z-index: -1;
                }
                h2{
                    font-size: 40px;
                    text-transform: uppercase;
                    color: #FBF1D3;
                    animation: animate 3s infinite alternate;
                }
            .alert-danger {
                height: 85px;
                margin-left: 9px;
                margin-bottom: -20px;
                list-style-type: disc; 
                padding-left: 20px; 
                }
            .mb-3 label{
                font-family: 'Outfit', sans-serif;
                color: #ffffff;
            }
        input#photo.form-control{
            width: 105px;
        }
        textarea#bio.form-control{
            width: 300px;
        }

        @media (max-width: 768px) {
            .box {
                margin-top: 30px;
            }

            .box p {
                font-size: 70px;
            }

            .signup-form {
                margin-top: 40px !important;
            }
        }

        @media (max-width: 576px) {
            .box p {
                font-size: 60px;
            }

            .signup-form {
                margin-top: 40px !important;
            }
        }

            </style>
        </head>

        <body>
            <div class="box">
                <p>SHOPHEAR</p>
            </div>


    <h2>Sign Up</h2>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 signup-form">
                <form id="signupForm" method="POST" action="signup.php">
                    <div class="mb-3">
                        <label for="signupUsername" class="form-label">Username:</label>
                        <input type="text" name="signupUsername" class="form-control" id="signupUsername" required>
                    </div>
                    <div class="mb-3">
                        <label for="signupEmail" class="form-label">Email:</label>
                        <input type="email" name="signupEmail" class="form-control" id="signupEmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="signupPassword" class="form-label">Password:</label>
                        <input type="password" name="signupPassword" class="form-control" id="signupPassword" required>
                    </div>
                    <div class="mb-3">
                        <label for="signupverifyPassword" class="form-label">Verify Password:</label>
                        <input type="password" name="signupverifyPassword" class="form-control"
                            id="signupverifyPassword" required>
                            <?php if (!empty($errors)) : ?>
                            <div class="alert alert-danger mt-3 text-center">
                                <ul class="list-unstyled">
                                    <?php
                                    foreach ($errors as $error) :
                                    ?>
                                        <li><?php echo $error; ?></li>
                                    <?php
                                    endforeach;
                                    ?>
                                </ul>
                            </div>
                    <?php endif; ?>
                        <span id="passwordMatchMessage"></span><br>
                    </div>
                    <div class="mt-3 text-center d-flex flex-column align-items-center">
                        <div class="btn-group">
                            <button type="submit" id="signup" name="signup" class="signup">Sign Up</button>
                            <span class="or-divider">already have an account? >></span>
                            <button type="button" onclick="window.location.href='login.php'" class="login">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


<script>
    document.getElementById("signupForm").addEventListener("submit", function (event) {
        var password = document.getElementById("signupPassword").value;
        var verifyPassword = document.getElementById("signupverifyPassword").value;
        var passwordMatchMessage = document.getElementById("passwordMatchMessage");

        if (password !== verifyPassword) {
            event.preventDefault();
            passwordMatchMessage.innerHTML = "Passwords do not match";
            passwordMatchMessage.style.color = "red";
        } else {
            passwordMatchMessage.innerHTML = "Passwords match!";
            passwordMatchMessage.style.color = "green";
        }
    });
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        document.getElementById("signupForm").addEventListener("submit", function (event) {
            event.preventDefault();
            var username = document.getElementById("signupUsername").value;
            var email = document.getElementById("signupEmail").value;
            var verifypassword = document.getElementById("signupverifyPassword").value;
            var password = document.getElementById("signupPassword").value;

            alert("Sign Up successful!\nUsername: " + username + "\nemail: " + email "\nPassword: " + password);
        });
    </script>

</body>

</html>
