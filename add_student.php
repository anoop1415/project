<?php 
include 'dbconnect.php';
// if(!$_SESSION['email']){

//     $_SESSION['login_first'] = "please login first";
//     header('location: index.php');
// }
if(isset($_POST['add'])){
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $fathername = mysqli_real_escape_string($conn, $_POST['fathername']);
    $birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $district = mysqli_real_escape_string($conn, $_POST['district']);
    $nationality = mysqli_real_escape_string($conn, $_POST['nationality']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $image = $_FILES['image']['name'];
    $image_type= $_FILES['image']['type'];
    $image_tmp= $_FILES['image']['tmp_name'];
    $image_size= $_FILES['image']['size'];
   if(!$image_type == 'image/jpg' or !$image_type == 'image/png'){
       $size_error = "Invalid Image formate";
   }
       else if($image_size <= 2000 ){
           $type_error = "Image size is larger the 2 MB";
       }
       else{
         move_uploaded_file($image_tmp , "st_image/$image");
         $sql = "insert into student_detail (fname, lname, father_name, email, mobile, birthdate,gender, district,city, state, nation, photo) values ('$fname','$lname','$fathername','$email','$mobile','$birthdate','$gender','$district','$city','$state','$nationality','$image')";
         $run = mysqli_query($conn,$sql);
         if($run){
             $success = "student data submitted successfully";
         }
         else{
             $error = "unable to submit data please try again";
         }
       }
   


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script>
        jQuery(document).ready(function($){
            $('#toggler').click(function(event){
                {
                    event.preventDefault();
                    $('#wrap').toggleClass('toggled');
                }
            });
        });
    </script>
</head>
<body>
    <div class="d-flex" id="wrap">
        <div class="sidebar bg-light border-light">
            <div class="sidebar-heading">
                <p class="text-center">Manage Studens</p>
            </div>
            <ul class="list-group list-group-flush">
                <a href="main.php" class="list-group-item list-group-item-action">
                    <i class="fa fa-vcard-o"></i>Dashboard
                </a>
                <a href="add_student.php" class="list-group-item list-group-item-action">
                    <i class="fa fa-user"></i>Add Student
                </a>
                <a href="view_student.php" class="list-group-item list-group-item-action">
                    <i class="fa fa-eye"></i>View Student
                </a>
                <a href="edit_student_detail.php" class="list-group-item list-group-item-action">
                    <i class="fa fa-pencil"></i>Edit Student
                </a>
                <a href="logout.php" class="list-group-item list-group-item-action">
                    <i class="fa fa-sign-out"></i>Logout
                </a>
            </ul>
        </div>
        <div class="main-body">
            <button class="btn btn-outline-light bg-danger mt-3" id="toggler">
                <i class="fa fa-bars"></i>
            </button> 
            <section id="main-form">
            <span class = "text-centre text-success font-weight-bold" ><?php echo @$size_error; echo @$type_error ; ?></span>

                <h2 class="text-center text-danger pt-3 font-weight-bold"> Student Management System</h2>
                <div class="container bg-danger" id="formsetting">
                    <h3 class="text-center text-white pb-4 pt-2 font-weight-bold">Add Student Details</h3>
                    <form mehtod = "post" action ="add_student.php" enctype = "multipart/form-data" >
                    <div class="row">
                        <div class="col-md-5 col-sm-5 col-12 m-auto">
                            <div class="form-group">
                            <label class="text-white">First Name</label>
                            <input type="text" name="fname" placeholder="Enter your first name" class="form-control" required ="required">
                            </div>
                            <div class="form-group">
                            <label class="text-white">Email</label>
                            <input type="text" name="email" placeholder="Enter your Email" class="form-control" required ="required">
                            </div> 
                            <div class="form-group">
                            <label class="text-white">Father Name</label>
                            <input type="text" name="fathername" placeholder="Enter your father name" class="form-control" required ="required">
                            </div> 
                            <div class="form-group">
                                <label class="text-white">Gender</label>
                                <input type="radio" name="gender" value="male" class="form-check-input">
                                <label class="form-check-label text-white pl-2" for="male">Male</label>
                                <input type="radio" name="gender" value="female" class="form-check-input">
                                <label class="form-check-label text-white pl-2" for="female">Female</label>
                            </div>
                            <div class="form-group">
                                <label class="text-white">City</label>
                                <input type="text" name="city" placeholder="Enter your City" class="form-control" required ="required">
                            </div>
                            <div class="form-group">
                            <label class="text-white">Nationality</label>
                            <input type="text" name="nationality" placeholder="Enter your nationality" class="form-control" required ="required">
                            </div>       
                        </div>

                        <div class="col-md-5 col-sm-5 col-12 m-auto">
                            <div class="form-group">
                                <label class="text-white">Last Name</label>
                                <input type="text" name="lname" placeholder="Enter your last name" class="form-control" required ="required">
                            </div>
                            <div class="form-group">
                                <label class="text-white">Birthdate</label>
                                <input type="date" name="birthdate" placeholder="Enter your Birthdate" class="form-control" required ="required">
                            </div>
                            <div class="form-group">
                                <label class="text-white">Mobile</label>
                                <input type="text" name="mobile" placeholder="Enter your Mobile no." class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="text-white">District</label>
                                <input type="text" name="district" placeholder="Enter your District" class="form-control" required ="required">
                            </div>
                            <div class="form-group">
                                <label class="text-white">State</label>
                                <input type="text" name="state" placeholder="Enter your State" class="form-control">
                            </div>
                            <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text" id="inputGroupFileAddon01">Upload Photo</span></div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name = "image">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                            </div>
                            <input type="submit" name="add" value="Add detail" class="btn btn-success px-5 mt-2">
                            <span class = "text-centre text-success font-weight-bold" ><?php echo @$success; echo @$error ; ?></span>
                        </div>
                        
                </div>
                </form>
            </div>
            </section>
        </div>
    </div>
</body>
</html>