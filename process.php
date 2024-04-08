<?php

    include "conn.php";
    session_start();

     //this code for registration//

    if(isset($_POST['reg'])){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        //----validation--//

        $validate_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' ");
        $n = mysqli_num_rows($validate_email);

        if($n <=0){

            $insert = mysqli_query($conn, "INSERT INTO users VALUES ('0','$name','$email','$password')");

            if($insert == true){
               ?>
               <script>
               alert("Registration Successfully");
               window.location.href = "index.php";
               </script>
               <?php
            }else{
    
                ?>
                <script>
                alert("Error in Registration");
                window.location.href = "reg.php";
                </script>
                <?php
            }
    
        }else{

            
            ?>
            <script>
            alert("Email already exist");
            window.location.href = "reg.php";
            </script>
            <?php

        }

        }

        //---------this code is for login//
        if(isset($_POST['login'])){

            $email = $_POST['email'];
            $password = $_POST['password'];

            $check = mysqli_query($conn, "SELECT * FROM  users WHERE email='$email' AND password='$password'");
            $num = mysqli_num_rows($check);

            if($num <= 0){
                ?>
                <script>
                alert("Wrong Email or Password");
                window.location.href = "index.php";
                </script>
                <?php
            
            }else{
                ?>
                <script>
                alert("Login Successfully");
                window.location.href = "index.php";
                </script>
                <?php
            }
            
        
        }
 


?>
