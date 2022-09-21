<html>
    <head>
        <title>Sign up </title>
        <style>
            BODY{
                font-family: Arial, Helvetica, sans-serif;
                background-color: black;
            }
            *{
                box-sizing: border-box;
            }
            .container{
                padding: 16px;
                background-color: white;
            }
            input[type=text],input[type=email],input[type=number],input[type=address],input[type=city],input[type=state],input[type=pincode],input[type=country],input[type=company_name],input[type=occupation],input[type=year_of_experiences],input[type=password]{
                width: 100%;
                height: 5px;
                padding: 15px;
                margin:5px 0 22px 0;
                display: inline-block;
                border: none;
                outline: none;
                background: whitesmoke;
            }
            input[type=text]:focus,input[type=email]:focus,input[type=number]:focus,input[type=address]:focus,input[type=city]:focus,input[type=state]:focus,input[type=pincode]:focus,input[type=country]:focus,input[type=company_name]:focus,input[type=occupation]:focus,input[type=year_of_experiences]:focus,input[type=password]:focus{
                background-color: #ddd;
                outline: none;
            }
            .registerbtn{
                background-color: turquoise;
                color: black;
                padding: 16px 20px;
                margin: 8px;
                cursor: pointer;
                width: 100%;
                opacity: 0.9;
            }
            .registerbtn:hover{
                opacity: 1;
            }
            a{
                color: blue;
            }
            .login{
                background-color: whitesmoke;
                text-align: center;
            }
        </style>
    </head> 
    <body>
 
  <?php

  include 'dbcon.php';

    if(isset($_POST['submit'])){
        $Full_name = mysqli_real_escape_string($con, $_POST['Full name']) ;
        $Email = mysqli_real_escape_string($con, $_POST['Email']) ;
        $Mobile_number = mysqli_real_escape_string($con, $_POST['Mobile_number']) ;
        $Address =  mysqli_real_escape_string($con, $_POST['Address']) ;
        $City =  mysqli_real_escape_string($con, $_POST['City']) ;
        $State =  mysqli_real_escape_string($con, $_POST['State']) ;
        $Pincode =  mysqli_real_escape_string($con, $_POST['Pincode']) ; 
        $Country =  mysqli_real_escape_string($con, $_POST['Country']);
        $Company_name =  mysqli_real_escape_string($con, $_POST['Company_Name']) ;
        $Occupation =  mysqli_real_escape_string($con, $_POST['Occupation']) ;
        $Year_of_experiences =  mysqli_real_escape_string($con, $_POST['Year_of_Experiences']) ;
        $Password =  mysqli_real_escape_string($con, $_POST['Password']) ;
        $Cpassword =  mysqli_real_escape_string($con, $_POST['Cpassword']) ;

        $Pass = password_hash($Password, PASSWORD_BCRYPT);
        $Cpass = password_hash($Cpassword, PASSWORD_BCRYPT);

        $emailquery = " select * from registration where email='$email' ";
        $query = mysqli_query($con,$emailquery);

        $emailcount = mysqli_num_rows($query);

        if($emailcount>0){
             echo "email already exists";
        }else{
            if($Password === $Cpassword){
               
                $insertquery = " insert into registration(Full_name, Email, Mobile_number, Address, City, State, Pincode, Country, Company_name, Occupation, Year_of_experience, Password, Cpassword) values('$Full_name','$Email','$Mobile_number','$Address','$City','$State','$Pincode','$Country','$Company_name','$Occupaation','$Year_of_experiences','$Pass','$Cpass')";
            
            $iquery = mysqli_query($con, $insertquery);

            if($iquery){
                ?>
                <script>
                      alert("Inserted Successful");
                </script>
                <?php
             }else{
                 ?>
                 <script>
                     alert("no inserted");
                 </script>
                 <?php
             }

            }else{
                echo " password not matching";
            }
        }

    }

   ?>

        <div class="container">
        <form action="" method="POST">
            <h1>Sign up</h1>
            <p>Please fill this form to Register</p>
            <hr/>
            <label>Full Name:-</label>
            <input type="text" placeholder="Full_Name"/>
            <br/>
            <label>Email:-</label>
            <input type="Email" placeholder="Email"/>
            <br/>
            <label>Mobile_Number:-</label>
            <input type="Number" placeholder="Mobile_Number"/>
            <br/>
            <label>Address:-</label>
            <input type="Address" placeholder="Address"/>
            <br/>
            <label>City:-</label>
            <input type="City" placeholder="City"/>
            <br/>
            <label>State:-</label>
            <input type="State" placeholder="State"/>
            <br/>
            <label>Pincode:-</label>
            <input type="Pincode" placeholder="Pincode"/>
            <br/>
            <label>Country:-</label>
            <input type="Country" placeholder="Country"/>
            <br/>
            <label>Company_Name:-</label>
            <input type="Company_Name" placeholder="Company_Name"/>
            <br/>
            <label>Occupation:-</label>
            <input type="Occupation" placeholder="Occupation"/>
            <br/>
            <label>Year_of_experiences:-</label>
            <input type="Year_of_experiences" placeholder="Year_of_experiences"/>
            <br/>
            <label>Password:-</label>
            <input type="password" placeholder="Password"/>
            <br/>
            <label>Cpassword:-</label>
            <input type="password" placeholder="Password"/>
            <p>
                By creating an account you agree to our
                <a href="#">Terms and Privacy</a>
            </p>
            <button type="submit" name="submit" class="registerbtn">Create Account</button>

            <div class="login">

            <p>Already have account?<a href="login.html">Login</a></p>
        </form>
        
    </body>
</html>