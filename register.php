<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="css/bootstrap
    .min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js
    "></script>
    <script src="js/bootstrap.min.js
    "></script>
    <style>
        body {
        background: #f7f7f7;
        }
        #regForm {
        margin: auto;
        width: 60%;
        padding: 20px;
        border: 1px solid #ccc;
        box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
        font-family: Helvetica, Arial, sans-serif;
        }
        h2 {
        text-align: center;
        color: #444;
        }
        input[type=text],
        select {
        max-width: 400px;
        display: block;
        margin: 10px auto;
        padding: 10px;
        border: 1px solid #ccc;
        }

        </style>

</head>
<body> -->
    <?php
    // echo'
    //  <form action="login.php" id="regForm" method="post">
    //  Username:
    //  <input type="text" id="username" name="username"><br><br>
    //  Password:
    //  <input type="password" id="pass" name="pass"><br><br>
    //  Confirm password:
    //  <input type="password" onkeyup="check()" id="confirmpass" name="confirmpass"><span id="
    //  spn"></span><br><br>
    //  Email:
    //  <input type="email" id="email" name="email"><br><br>
    //  Date of Birth:
    //  <input type="date" id="dob" name="dob"><br><br>
    //  Gender:
    //  <select id="gender" name="gender">
    //  <option value="Male">Male</option>
    //  <option value="Female">Female</option>
    //  </select><br><br>
    //  Country:
    //  <input list="countries" name="country"/>
    //  <datalist id="countries">
    //  <option value="Afghanistan">
    //  <option value="Albania">
    //  <option value="Algeria">
    //  Other: <input type="text" id="other_country" name="other_country">
    //  </datalist><br><br>
    //  Language:
    //  English
    //  <input type="checkbox" id="english" name="language[]" value="English" checked><br>
    //  Spanish
    //  <input type="checkbox" id="spanish" name="language[]" value="Spanish"><br><br>
    //  <input type="submit" value="Register">
    //  </form>';?>
     <!-- <script>
        function check() {
        var pass = document.getElementById("pass").value;
        var confirmPass = document.getElementById("confirmpass").value;
        if (pass != "" && confirmPass != ""){
        if (pass == confirmPass) {
        document.getElementById("spn").innerHTML = "Passwords match.";
        } else {
        document.getElementById("spn").innerHTML = "Passwords do not match.";
        }
        }
        }
    </script>
</body>
</html> -->

<!DOCTYPE html> 
<html lang="en"> 
    <head> 
        <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Sign up</title> 
         <style> 
         .error { color: red; } 
         /* .content { padding: 20px; margin: 5% auto;} */
            #myForm {
                display: flex;
                flex-direction: column;
                width: 30%;
                height: 90vh;
                margin: 5% auto;
            }
            #myForm input[type="email"],
            #myForm input[type="password"],
            #myForm input[type="submit"]{
                margin-bottom: 10px;
                padding: 10px;
                border: 1px solid #ccc;
            }
            #myForm input[type="submit"] {
                background-color: #4CAF50;
                color: white;
            }

         </style> 
         </head> 
    <body> 
        <h2 style="text-align:center">Sign up</h2>
        <?php
        echo'
        <form id="myForm" method="POST">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br> 
            <label for="pwd">Password:</label><br> 
            <input type="password" id="pwd" name="pwd" required><br> 
            <label for="cpwd">Confirm Password:</label><br> 
            <input type="password" id="cpwd" name="cpwd" required><br> 
            <input type="submit" value="Submit"> 
        </form>
        <p id="spn" class="error"></p>';
        if ($_SERVER["REQUEST_METHOD"]=="POST"){
            $uname=isset($_POST['email']) ? $_POST['email'] : '';
            $pwd=isset($_POST['pwd']) ? $_POST['pwd'] : '';
            $cpwd=isset($_POST['cpwd']) ? $_POST['cpwd'] : '';


            $servername="localhost";
            $username="root";
            $password="";
            $dbname="ojtone";
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error);}
            else{
                if($uname && $pwd){
                    $sql="SELECT * FROM users WHERE email='".$uname."'";
                    $result=$conn->query($sql);
                    if($row=$result->fetch_assoc()){
                        echo "<script>document.getElementById('spn').innerHTML='This Email has been registered!';</script>";
                    }
                    else{
                        if($pwd==$cpwd){
                            $sql="INSERT INTO user (email, passwords) VALUES ('$uname','$cpwd')";
                            if($conn->query($sql)===TRUE){
                                echo"data inserted";
                                }else{echo 'Error: '. $conn->error;}
                        }
                    }
                }
            }

        }
        ?>
        <script>
            document.getElementById("myForm").addEventListener("submit", function(event) {
                event.preventDefault();
                var email = document.getElementById("email").value;
                var pwd = document.getElementById("pwd").value;
                var cpwd = document.getElementById("cpwd").value;
                if (pwd === cpwd) {
                    document.getElementById("spn").innerHTML = "Passwords match.";
                    document.getElementById("spn").style.color = "green";
                } else {
                    document.getElementById("spn").innerHTML = "Passwords do not match.";
                    document.getElementById("spn").style.color = "red";
                }
            });
        </script>
    </body> 
</html>