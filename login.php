<?php
session_start();
include("db_connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $loginUsername = $_POST['loginUsername'];
    $loginPassword = $_POST['loginPassword'];

    if (!empty($loginUsername) && !empty($loginPassword)) {
        // Check if the username exists in the database
        $query = "SELECT * FROM users WHERE name = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $loginUsername);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // Username exists, now check if the password matches
            $row = $result->fetch_assoc();
            $hashedPassword = $row['password_hash'];

            if (password_verify($loginPassword, $hashedPassword)) {
                // Password matches, set session and redirect to home.php
                $_SESSION['login'] = true;
                $_SESSION['username'] = $row['name']; // Set the username in the session
                $_SESSION['user_id'] = $row['id']; // Assuming 'id' is the column name for the user ID in your databa
                header("Location: cocktails.php");
            } else {
                echo "Incorrect password";
            }
        } else {
            echo "Username not found";
        }
    } else {
        echo "Please enter valid information";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Varela+Round&display=swap');

        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Varela+Round&family=Zen+Tokyo+Zoo&display=swap');

        body {
            background-color: #AD88C6;
            background-image: url('yellow-bg.png');
            background-size: cover; 
            background-repeat: no-repeat;
            background-attachment: fixed; 
            margin: 0;
            padding: 0;
        }

        .mb-3 {
            color:#2e1142;
            font-family: 'Varela Round', sans-serif;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 8px;
        }

        .box {
            margin-top: 60px;
            display: grid;
            place-items: center;
            font-family: 'zen tokyo zoo', sans-serif;
            z-index: -1;
        }
        .box p {
            font-size: 180px; /* Increased font size */
            font-weight: bold; /* Added bold font weight */
            text-transform: uppercase;
            color: #bb7781;
            text-shadow: 0 0 0 transparent,
                        0 0 10px #240046,
                        0 0 20px rgba(36, 0, 70, 0.5),
                        0 0 40px #240046,
                        0 0 100px #240046,
                        0 0 200px #240046,
                        0 0 300px #240046,
                        0 0 500px #240046,
                        0 0 1000px #240046;
            animation: animate 5s infinite alternate;
        }

        @keyframes animate {
            40% {
                opacity: 0.1;
            }
            42% {
                opacity: 0.8;
            }
            43% {
                opacity: 1;
            }
            45% {
                opacity: 1;
            }
            40% {
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
            font-weight: bold;
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
        text-align: center;
        margin: 50px; /* Add margin to the form container */
        }   
        .container mt-5{
            margin-top: 20px;
        }

        #signupForm {
            text-align: left; /* Align the text to the left within the form */
            max-width: 350px; /* Set a maximum width for the form if needed */
            margin: auto; /* Center the form horizontally */
            margin-top: -50px;
        }

        #signupForm label {
            color: #37062b;
        }
        :root {
    --clr-neon: hsl(346, 100%, 50%);
    --clr-bg: hsl(0, 0%, 0%);
    }
    .signup {
    text-transform: uppercase;
    font-family: 'zen tokyo zoo', sans-serif;
    background: #37062b;
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


h2 {
            margin-top: -30px;
            margin-bottom: 80px;
            display: grid;
            place-items: center;
             font-family: 'zen tokyo zoo', sans-serif;
             z-index: -1;
        }
        h2{
            font-size: 30px;
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

@media (max-width: 768px) {
    .box {
        margin-top: 30px;
    }

    .box p {
        font-size: 70px;
    }
}

@media (max-width: 576px) {
    .box p {
        font-size: 60px;
    }
}

    </style>
</head>

<body>
    <div class="box">
        <p>SHOPHEAR</p>
    </div>

    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 sample">
        <form id="signupForm" method="POST" action="login.php">
    <div class="mb-3">
        <label for="signupUsername" class="form-label">Username:</label>
        <input type="text" class="form-control" id="signupUsername" name="loginUsername" required>
    </div>
    <div class="mb-3">
        <label for="signupPassword" class="form-label">Password:</label>
        <input type="password" class="form-control" id="signupPassword" name="loginPassword" required>
    </div>
    <div class="mt-3 text-center d-flex flex-column align-items-center">
        <div class="btn-group mx-auto">
            <button type="submit" class="login" id="log">Login</button>
        </div>
    </div>
    <div class="mt-3 text-center d-flex flex-column align-items-center">
        <div class="btn-group">
            <span class="or-divider">don't have an account? <span><br>
            <button type="button" onclick="window.location.href='signup.php'" class="signup">Sign Up</button>
            
        </div>
    </div>
    
</form>

        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>