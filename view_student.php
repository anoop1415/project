<?php
include 'dbconnect.php';
// if(!$_SESSION['email']){

//     $_SESSION['login_first'] = "please login first";
//     header('location: index.php');
// }

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
                <h3 class = "text-centre text-success"><?php echo @$_GET['update_success'];echo @$_GET['update_error']; echo @$_GET['delete_msg'] ?></h3>
                <h2 class="text-center text-danger pt-3 font-weight-bold"> Student Management System</h2>
                <div class="container bg-danger" id="formsetting">
                    <h3 class="text-center text-white pb-4 pt-2 font-weight-bold">View Student Details</h3>
                    <div class="row">
                        <div class="col-mt-12 col-sm-12 col-12" style="overflow-x:auto;">
                            <table class="table table-bordered text-white table-responsive">
                                <thead>
                                    <tr>
                                        <th>SNO.</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Fathername</th>
                                        <th>Gender</th>
                                        <th>Email</th>
                                        <th>Birthdate</th>
                                        <th>Mobile</th>
                                        <th>City</th>
                                        <th>District</th>
                                        <th>State</th>
                                        <th>Nationality</th>
                                        <th>Photo</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <?php
                                $sql="select * from student_detail";
                                $run=mysqli_query($conn,$sql);
                                $i=1;
                                while($row= mysqli_fetch_assoc($run))
                                {
                                ?>

                                <tbody>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $row['fname']; ?></td>
                                        <td><?php echo $row['lname']; ?></td>
                                        <td><?php echo $row['father_name']; ?></td>
                                        <td><?php echo $row['gender']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['birthdate']; ?></td>
                                        <td><?php echo $row['mobile']; ?></td>
                                        <td><?php echo $row['city']; ?></td>
                                        <td><?php echo $row['district']; ?></td>
                                        <td><?php echo $row['state']; ?></td>
                                        <td><?php echo $row['nation']; ?></td>
                                        <td>
                                            <a href="st_image/<?php echo $row['photo']; ?>">
                                            <img src="st_image/<?php echo $row['photo']; ?>" alt="photo" width="50" height="50"></a>
                                        </td>
                                        <td>
                                            <a style="color: white; text-decoration:none" href="edit_student_detail.php?edit_student=<?php echo @$row['st_id'];?>">
                                                Edit
                                            </a>|
                                            <a style="color: white; text-decoration:none" href="delete_student_detail.php?delete_student=<?php echo @$row['st_id'];?>">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                                    <?php } ?>
                            </table>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>
</body>
</html>