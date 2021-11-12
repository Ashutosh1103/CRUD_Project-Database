<?php
include("connection.php");


$id=$_GET['edit'];
$sel=mysqli_query($conn,"select * from employee_details where id=$id");
$arr=mysqli_fetch_assoc($sel);



// error variables 
 $nameErr = $emailErr = $unameErr = $ageErr = $cityErr = $genderErr = $companyErr = $schoolErr = $pincodeErr  = "";

if(isset($_POST['sub'])){
  $email=$_POST['email'];
  $uname=$_POST['uname'];
  $name=$_POST['name'];
  $age=$_POST['age'];
  $city=$_POST['city'];
  $gender=$_POST['gender'];
  $cname=$_POST['cname'];
  $sname=$_POST['sname'];
  $state=$_POST['state'];
  $pincode=$_POST['pincode']; 
   

     // email validation 
     if (empty($email)) {
      $emailErr = "Email Address is required.";
      } else if (!preg_match("/^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+$/", $email)) {
      $emailErr = "Invalid Email Address.";
      }

       // uname validation 
    if (empty($uname)) {
      $unameErr = "User Name is required.";
     } else if (!preg_match("/^[a-zA-Z ]+$/", $uname)) {
      $unameErr = "Invalid User Name,Only Characters and white spaces are allowed.";
    }

     // name validation 
     if (empty($name)) {
      $nameErr = "Name is required.";
  } else if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
      $nameErr = "Only Characters and white spaces are allowed.";
  } 

   // age validation 
   if (empty($age)) {
    $ageErr = "Please Enter your Age.";
    }

    // city validation 
   if (empty($city)) {
    $cityErr = "Please Enter your City.";
    }

    // gender validation 
    if (empty($gender)) {
        $genderErr = "Please Select your Gender.";
    }

     // companyname validation 
     if (empty($cname)) {
      $companyErr = "Company Name is required.";
  } 
  

   // school validation 
   if (empty($sname)) {
    $schoolErr = "School Name is required.";
    }

     // pincode validation 
   if (empty($pincode)) {
    $pincodeErr = "Please Enter your Pincode.";
    }


    
        if(mysqli_query($conn,"update employee_details set email='$email',uname='$uname',name='$name',age=$age,city='$city',gender='$gender',cname='$cname',sname='$sname',state='$state',pincode=$pincode where id=$id")){
            header("location:employee_details.php");
        }
        else {
            echo "Updating error";
        }
  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <style>
    .card-registration .select-input.form-control[readonly]:not([disabled]) {
      font-size: 1rem;
      line-height: 2.15;
      padding-left: .75em;
      padding-right: .75em;
    }
    .card-registration .select-arrow {
      top: 13px;
    }
    </style>

</head>
<body>


<section class="h-100 bg-dark">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">
            <div class="col-xl-6 d-none d-xl-block">
              <img
                src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-registration/img4.jpg"
                alt="Sample photo"
                class="img-fluid"
                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;"
              />
            </div>
            <div class="col-xl-6">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase">Edit Employee</h3>

                
                  <form method="post">
                  <div class="form-outline mb-4">
                  <input type="text" id="email" name="email" value="<?php echo $arr['email'];?>" class="form-control form-control-lg" />
                  <label class="form-label" for="email">Email</label>
                  <small id="err" class="form-text text-danger"><?php echo $emailErr; ?></small>
                </div>
                  
               

                <div class="form-outline mb-4">
                  <input type="text" id="uname" name="uname" value="<?php echo $arr['uname'];?>" class="form-control form-control-lg" />
                  <label class="form-label" for="uname">User Name</label>
                  <small id="err" class="form-text text-danger"><?php echo $unameErr; ?></small>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="name" name="name" value="<?php echo $arr['name'];?>" class="form-control form-control-lg" />
                  <label class="form-label" for="name">Name</label>
                  <small id="err" class="form-text text-danger"><?php echo $nameErr; ?></small>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="age" name="age" value="<?php echo $arr['age'];?>" class="form-control form-control-lg" />
                  <label class="form-label" for="age">Age</label>
                  <small id="err" class="form-text text-danger"><?php echo $ageErr; ?></small>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="city" name="city" value="<?php echo $arr['city'];?>" class="form-control form-control-lg" />
                  <label class="form-label" for="city">City</label>
                  <small id="err" class="form-text text-danger"><?php echo $cityErr; ?></small>
                </div>

                <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                  <h6 class="mb-0 me-4">Gender: </h6>

                  <div class="form-check form-check-inline mb-0 me-4">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="gender"
                      id="femaleGender"
                      
                      value="<?php echo $arr['gender'];?>"
                    />
                    <label class="form-check-label" for="femaleGender">Female</label>
                  </div>

                  <div class="form-check form-check-inline mb-0 me-4">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="gender"
                      id="maleGender"
                      value="<?php echo $arr['gender'];?>"
                    />
                    <label class="form-check-label" for="maleGender">Male</label>
                  </div>

                  <div class="form-check form-check-inline mb-0">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="others"
                      id="otherGender"
                      value="<?php echo $arr['gender'];?>"
                    />
                    <label class="form-check-label" for="otherGender">Other</label>
                  </div>
                  <small id="err" class="form-text text-danger"><?php echo $genderErr; ?></small>

                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="cname" name="cname" value="<?php echo $arr['cname'];?>" class="form-control form-control-lg" />
                  <label class="form-label" for="cname">Company Name</label>
                  <small id="err" class="form-text text-danger"><?php echo $companyErr; ?></small>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="sname" name="sname" value="<?php echo $arr['sname'];?>" class="form-control form-control-lg" />
                  <label class="form-label" for="sname">School Name</label>
                  <small id="err" class="form-text text-danger"><?php echo $schoolErr; ?></small>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                  <label class="form-label" for="state">State:</label>
                    <select class="select" name="state">
                      <option value="Maharastra">Maharastra</option>
                      <option value="Goa">Goa</option>
                      <option value="Rajasthan">Rajasthan</option>
                      <option value="Kerala">Kerala</option>
                    </select>

                  </div>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="pincode" name="pincode" value="<?php echo $arr['pincode'];?>" class="form-control form-control-lg" />
                  <label class="form-label" for="pincode">PinCode</label>
                  <small id="err" class="form-text text-danger"><?php echo $pincodeErr; ?></small>
                </div>

                <div>
                <input type="submit" name="sub">
                </div>

                </form>

               

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>