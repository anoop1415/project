
<?php
// $conn = mysqli_connect("localhost","root","1234","student_db");
session_start();
include 'dbconnect.php'; //dbconnect.php content the code of conecction with mysql
$email_err = $pws_err = $success = $error = '';
if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $pass = password_hash($password, PASSWORD_BCRYPT);//password security provide if someone hacked our database hacker can not be able toh see our users password
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);
    $query = "select * from register where email = '$email'";//sql query for select data from database
    $run = mysqli_query($conn,$query);
    $row = mysqli_num_rows($run);
    if($row > 0){
        $email_err = "Email id alredy exists, please try another email";
    }
    else if($password !== $cpassword){
        $pws_err = "Your password do not match";
    }
    else{
        $sql = "INSERT INTO register(fname, email, password, cpassword) Values('$fname','$email','$pass','$cpass')";
        $run = mysqli_query($conn, $sql);
        if($run){
            $success = "Registerd Successfully";
           
        }
        else{
            $error = "Unable to submit data . Please try again";
          
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <!-- add bootstrap online for using freamwork  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">  

    <!-- javascript for display content according to user -->
    <script>
        function content1()
        {
            document.getElementById("div1").style.display="block";
            document.getElementById("div2").style.display="none";

        }
        function content2()
        {
            document.getElementById("div1").style.display="none";
            document.getElementById("div2").style.display="block";
            
        }
    </script>
</head>
<body>
    <section class = "">
        <p class = "text-center text-warning font-weight-bold"><?php echo @$_SESSION['login_first']; ?></p>
    <h2 class="text-center text-danger pt-5 font-weight-bold">Student Management System</h2>
    <h3 class= "text-center font-weight-bold text-danger"><? php echo @$_GET['error'] ?></h3>
    <div class="container bg-danger" id="formsetting">
        <h3 class="text-center text-white py-3">Admin Login || Register Panel</h3>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-12">
            <img src="images/cover.jpg" alt="cover image" class="img-fluid">
            </div>
            <div class="col-md-6 col-sm-6 col-12">
                <button class="btn btn-info px-5" onclick="content1()">Register</button>
                <button class="btn btn-info px-5" onclick="content2()">Login</button>
                <div id="div1" style="display: block" class="mt-4">

                <!-- registeration form start here -->
                <form method="post" action="">
                    <div class="form-group">
                        <label for="fname" class="text-white">Name</label>
                        <input class="form-control" type="text" id="fname" name="fname" placeholder="Enter your name" required = "required">
                    </div>
                    <div class="form-group">
                        <label for="email" class="text-white">Email</label>
                        <span class="float-right text-black font-weight-bold"><?php echo $email_err; ?></span>
                        <input class="form-control" type="text" id="email" name="email" placeholder="Enter your email" required = "required">
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-white">Password</label>
                        <input class="form-control" type="password" id="password" name="password" placeholder="Password" required = "required">
                    </div>
                    <div class="form-group">
                        <label for="cpassword" class="text-white">Confirm Password</label>
                        <span class="float-right text-black font-weight-bold"><?php echo $pws_err; ?></span>
                        <input class="form-control" type="password" id="cpassword" name="cpassword" placeholder="Re-Enter Password" required = "required">
                         
                    </div>
                    <input type="submit" name="submit" value="Register" class="btn btn-success px-5">
                    <span class="float-right text-black font-weight-bold"><?php echo $success; echo $error; ?></span>
                </form>
                </div>
                <div id="div2" style="display: none" class="mt-4">

                <!-- login form start here -->
                <form method="post" action="">
                    <div class="form-group">
                        <label for="email" class="text-white">Email</label>
                        <input class="form-control" type="text" id="email" name="email" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-white">Password</label>
                        <input class="form-control" type="password" id="password" name="password" placeholder="Password">
                    </div>
                    <input type="submit" name="submit1" value="Login" class="btn btn-success px-5">
                </form>
                </div>
               
            </div>
        </div>
    </div>   
</section>
</body>
</html>

<!-- php code for login  -->
<?php
if(isset($_POST['submit1'])){
    $email =$_SESSION['email'] = $_POST['email'];
    $pwd = $_POST['password'];
    $sql = "select * from register where email = '$email'";
    $run = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($run);
    $pwd_fetch = $row['password'];
    $pwd_decode = password_verify($pwd, $pwd_fetch);
    if($pwd_decode){
        echo "<script>window.open('main.php?success=Logged in successfully','_self')</script>";
    }
    else{
        echo "<script>window.open('index.php?error=username or password is incorrect','_self')</script>";
    }

}
?>
