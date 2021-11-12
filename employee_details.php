<?php
include('connection.php');
//delete details 
if(!empty($_GET['del'])){
    $id=$_GET['del'];
    if(mysqli_query($conn,"delete from employee_details where id=$id")){
        header("location:employee_details.php");
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

</head>
<body>
<table class="table table-dark table-hover">
  <thead>
            <tr>
                <td colspan="13" align="center">
                    <a href="Index.php">Add Employee</a>
            </td>
            </tr>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Email</th>
      <th scope="col">User Name</th>
      <th scope="col">Name</th>
      <th scope="col">Age</th>
      <th scope="col">City</th>
      <th scope="col">Gender</th>
      <th scope="col">Company Name</th>
      <th scope="col">School Name</th>
      <th scope="col">State</th>
      <th scope="col">Pincode</th>
      <th scope="col">Time</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php
            $sel=mysqli_query($conn,"select * from employee_details order by created_at desc");
            if(mysqli_num_rows($sel)>0){
                $sn=1;
                while($arr=mysqli_fetch_assoc($sel)){
                    ?>
                    <tr>
                        <td><?php echo $sn ?></td>
                        <td><?php echo $arr['email']; ?></td>
                        <td><?php echo $arr['uname']; ?></td>
                        <td><?php echo $arr['name']; ?></td>
                        <td><?php echo $arr['age']; ?></td>
                        <td><?php echo $arr['city']; ?></td>
                        <td><?php echo $arr['gender']; ?></td>
                        <td><?php echo $arr['cname']; ?></td>
                        <td><?php echo $arr['sname']; ?></td>
                        <td><?php echo $arr['state']; ?></td>
                        <td><?php echo $arr['pincode']; ?></td>
                        <td><?php echo $arr['created_at']; ?></td>
                        <td><a href="Edit_employee.php?edit=<?php echo $arr['id'];?>">Edit</a> 
                         &nbsp; &nbsp; &nbsp; 
                        <a href="?del=<?php echo $arr['id'];?>">Delete</a></td>

                    </tr>
                    <?php
                    $sn++;
                }
            }
            
            else{
                ?>
                <tr>
                    <td colspan="13" align="center">No Records Found</td>
                </tr>
                <?php
            }
            ?>
  </tbody>
</table>
</body>
</html>