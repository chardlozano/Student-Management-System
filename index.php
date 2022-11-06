<?php
include('db.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Web-based Student Management System</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #ebdfe5">

	<div class="container">
	<center><img src="upload_images/trimexlogo2.png" width="450px" height="100px" alt="trimex logo"></center>
	<h1 class="text-center">Student Management System</h1><br><br>
	<a href="login.php" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Log out</a>
	<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal">
  <i class="fa fa-plus"></i> Add New
  </button>
  <!-- <a href="#" class="btn btn-success pull-right"><span class="glyphicon glyphicon-print"></span> Print PDF</a> -->
  <hr>
		<table class="table table-bordered table-striped table-hover" id="myTable">
		<thead>
			<tr>
			   <th class="text-center" scope="col">S.L</th>
				<th class="text-center" scope="col">Student Id</th>
				<th class="text-center" scope="col">Name</th>
				<th class="text-center" scope="col">Course</th>
				<th class="text-center" scope="col">Year level</th>
				<th class="text-center" scope="col">Section</th>
				<th class="text-center" scope="col">View</th>
				<th class="text-center" scope="col">Edit</th>
				<th class="text-center" scope="col">Delete</th>
			</tr>
		</thead>
			<?php

        	$get_data = "SELECT * FROM card_activation order by 1 desc";
        	$run_data = mysqli_query($con,$get_data);
			$i = 0;
        	while($row = mysqli_fetch_array($run_data))
        	{
				$sl = ++$i;
				$id = $row['id'];
				$u_card = $row['u_card'];
				$u_f_name = $row['u_f_name'];
				$u_l_name = $row['u_l_name'];
				$u_course = $row['course'];
				$u_yearlevel = $row['yearlevel'];
				$u_section = $row['section'];

        		$image = $row['image'];

        		echo "

				<tr>
				<td class='text-center'>$sl</td>
				<td class='text-left'>$u_card</td>
				<td class='text-left'>$u_f_name   $u_l_name</td>
				<td class='text-left'>$u_course</td>
				<td class='text-left'>$u_yearlevel</td>
				<td class='text-center'>$u_section</td>
			
				<td class='text-center'>
					<span>
					<a href='#' class='btn btn-success mr-3 profile' data-toggle='modal' data-target='#view$id' title='Prfile'><i class='fa fa-address-card-o' aria-hidden='true'></i></a>
					</span>
					
				</td>
				<td class='text-center'>
					<span>
					<a href='#' class='btn btn-warning mr-3 edituser' data-toggle='modal' data-target='#edit$id' title='Edit'><i class='fa fa-pencil-square-o fa-lg'></i></a>

					     
					    
					</span>
					
				</td>
				<td class='text-center'>
					<span>
					
						<a href='#' class='btn btn-danger deleteuser' title='Delete'>
						     <i class='fa fa-trash-o fa-lg' data-toggle='modal' data-target='#$id' style='' aria-hidden='true'></i>
						</a>
					</span>
					
				</td>
			</tr>


        		";
        	}

        	?>

			
			
		</table>
		<form method="post" action="export.php">
     <input type="submit" name="export" class="btn btn-success" value="Export Data" />
    </form>
	</div>


	<!---Add in modal---->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
		<!-- <center><img src="https://codingcush.com/uploads/logo/logo_61b79976c34f5.png" width="300px" height="80px" alt=""></center> -->
        <h2 class="modal-title text-center">Add New Student</h2>
      </div>
      <div class="modal-body">
        <form action="add.php" method="POST" enctype="multipart/form-data">
			
			<!-- This is test for New Card Activate Form  -->
			<!-- This is Address with email id  -->
<div class="form-row">
<div class="form-group col-md-6">
<label for="inputEmail4">Student no.</label>
<input type="text" class="form-control" name="card_no" placeholder="Enter Student no." maxlength="10" required>
</div>
<div class="form-group col-md-6">
<label for="inputPassword4">Mobile no.</label>
<input type="phone" class="form-control" name="user_phone" placeholder="Enter Mobile no." maxlength="11" required>
</div>
</div>


<div class="form-row">
<div class="form-group col-md-6">
<label for="firstname">First Name</label>
<input type="text" class="form-control" name="user_first_name" placeholder="Enter First Name">
</div>
<div class="form-group col-md-6">
<label for="lastname">Last Name</label>
<input type="text" class="form-control" name="user_last_name" placeholder="Enter Last Name">
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
<label for="inputState2">Course</label>
<select id="inputState2" name="user_course" class="form-control">
  <option selected>Select...</option>
  <option>BA Psychology</option>
  <option>BS Accountancy</option>
  <option>BS Accounting  Information Technology</option>
  <option>BSBA Financial Management</option>
  <option>BSBA Human Resource Management</option>
  <option>BSBA Marketing Management</option>
  <option>BSBA Operation Management</option>
  <option>BS Criminology</option>
  <option>BS Computer Engineering</option>
  <option>BS Computer Science</option>
  <option>BS Information Technology</option>
  <option>BS Social Work</option>
  <option>BS Tourism Management</option>
  <option>BS Real Estate Management</option>
  <option>BS Office Management</option>
  <option>BTVTE Electronics Technology</option>
  <option>BTVTE Food and Service Management</option>
</select>
</div>
<div class="form-group col-md-6">
<label for="inputState1">Year level</label>
<select id="inputState1" name="user_yearlevel" class="form-control">
  <option selected>Select...</option>
  <option>1st year</option>
  <option>2nd year</option>
  <option>3rd year</option>
  <option>4th year</option>
</select>
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
<label for="section">Section</label>
<input type="text" class="form-control" name="user_section" placeholder="Enter your section">
</div>
<div class="form-group col-md-6">
<label for="inputState">Gender</label>
<select id="inputState" name="user_gender" class="form-control">
  <option selected>Select...</option>
  <option>Male</option>
  <option>Female</option>
</select>
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
<label for="inputPassword4">Date of Birth</label>
<input type="date" class="form-control" name="user_dob" placeholder="Date of Birth">
</div>
<div class="form-group col-md-6">
<label for="email">Email </label>
<input type="email" class="form-control" name="user_email" placeholder="Enter Email ">
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
<label for="inputAddress">Street & Barangay</label>
<input type="text" class="form-control" name="village" placeholder="">
</div>
<div class="form-group col-md-6">
<label for="inputAddress2">District/Municipality</label>
<input type="text" class="form-control" name="police_station" placeholder="">
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
<label for="inputCity">City/Province</label>
<input type="text" class="form-control" name="dist">
</div>
<div class="form-group col-md-6">
<label for="inputZip">Zip Code</label>
<input type="text" class="form-control" name="pincode">
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
<label for="fathername">Father's Name</label>
<input type="text" class="form-control" name="user_father" placeholder="Enter Father's Name">
</div>
<div class="form-group col-md-6">
<label for="mothername">Mother's Name</label>
<input type="text" class="form-control" name="user_mother" placeholder="Enter Mother's Name">
</div>
</div>


<!-- <div class="form-group">
<label for="family">Family Member's</label>
    <textarea class="form-control" name="family" rows="3" placeholder="Optional"></textarea>
</div> -->

        	<div class="form-group">
        		<label>Image</label>
        		<input type="file" name="image" class="form-control" >
        	</div>

        	
        	 <input type="submit" name="submit" class="btn btn-info btn-large" value="Submit">
        	
        	
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<!------DELETE modal---->




<!-- Modal -->
<?php

$get_data = "SELECT * FROM card_activation";
$run_data = mysqli_query($con,$get_data);

while($row = mysqli_fetch_array($run_data))
{
	$id = $row['id'];
	echo "

<div id='$id' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title text-center'>Are you sure you want to delete?</h4>
      </div>
      <div class='modal-body'>
        <a href='delete.php?id=$id' class='btn btn-danger' style='margin-left:250px'>Delete</a>
      </div>
      
    </div>

  </div>
</div>


	";
	
}


?>


<!-- View modal  -->
<?php 

// <!-- profile modal start -->
$get_data = "SELECT * FROM card_activation";
$run_data = mysqli_query($con,$get_data);

while($row = mysqli_fetch_array($run_data))
{
	$id = $row['id'];
	$card = $row['u_card'];
	$name = $row['u_f_name'];
	$name2 = $row['u_l_name'];
	$course = $row['course'];
	$yearlevel = $row['yearlevel'];
	$section = $row['section'];
	$father = $row['u_father'];
	$mother = $row['u_mother'];
	$gender = $row['u_gender'];
	$email = $row['u_email'];
	// $aadhar = $row['u_aadhar'];
	$Bday = $row['u_birthday'];
	$family = $row['u_family'];
	$phone = $row['u_phone'];
	//$address = $row['u_state'];
	$village = $row['u_village'];
	$police = $row['u_police'];
	$dist = $row['u_dist'];
	$pincode = $row['u_pincode'];
	//$state = $row['u_state'];
	$time = $row['uploaded'];
	
	$image = $row['image'];
	echo "

		<div class='modal fade' id='view$id' tabindex='-1' role='dialog' aria-labelledby='userViewModalLabel' aria-hidden='true'>
		<div class='modal-dialog'>
			<div class='modal-content'>
			<div class='modal-header'>
				<h2 class='modal-title' id='exampleModalLabel'>Profile <i class='fa fa-user-circle-o' aria-hidden='true'></i></h2>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
				</button>
			</div>
			<div class='modal-body'>
			<div class='container' id='profile'> 
				<div class='row'>
					<div class='col-sm-4 col-md-2'>
						<img src='upload_images/$image' alt='' style='width: 150px; height: 150px;' ><br>
		
						<i class='fa fa-id-card' aria-hidden='true'></i> $card<br>
						<i class='fa fa-phone' aria-hidden='true'></i> $phone  <br>
						Date Registered: <br>
						$time
					</div>
					<div class='col-sm-3 col-md-6'>
						<h3 class='text-primary'>$name $name2</h3>
						<h4>$course</h4>
						<h4>$yearlevel</h4>
						<h4>$section</h4>
						<p class='text-secondary'>
						<i class='fa fa-venus-mars' aria-hidden='true'> : </i> $gender
						<br />
						<i class='fa fa-envelope-o' aria-hidden='true'> : </i> $email
						<br />
						<i class='fa fa-home' aria-hidden='true'> Address: </i> $village, $police, <br> $dist - $pincode
						<br />
						</p>
						<div class='card' style='width: 18rem;'>
						<i class='fa fa-users' aria-hidden='true'></i> Parents: <br>
								<strong>Father's name: </strong><br>
								$father <br>
								<strong>Mother's name: </strong><br>
								$mother <br>
						</div>
						
						
						<!-- Split button -->
					</div>
				</div>

			</div>   
			</div>
			<div class='modal-footer'>
				<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
			</div>
			</form>
			</div>
		</div>
		</div> 


    ";
}


// <!-- profile modal end -->


?>





<!----edit Data--->

<?php

$get_data = "SELECT * FROM card_activation";
$run_data = mysqli_query($con,$get_data);

while($row = mysqli_fetch_array($run_data))
{
	$id = $row['id'];
	$card = $row['u_card'];
	$name = $row['u_f_name'];
	$name2 = $row['u_l_name'];
	$course = $row['course'];
	$yearlevel = $row['yearlevel'];
	$section = $row['section'];
	$father = $row['u_father'];
	$mother = $row['u_mother'];
	$gender = $row['u_gender'];
	$email = $row['u_email'];
	// $aadhar = $row['u_aadhar'];
	$Bday = $row['u_birthday'];
	$family = $row['u_family'];
	$phone = $row['u_phone'];
///$address = $row['u_state'];
	$village = $row['u_village'];
	$police = $row['u_police'];
	$dist = $row['u_dist'];
	$pincode = $row['u_pincode'];
	//$state = $row['u_state'];
	// $staffCard = $row['staff_id'];
	$time = $row['uploaded'];
	$image = $row['image'];
	echo "

<div id='edit$id' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
             <button type='button' class='close' data-dismiss='modal'>&times;</button>
             <h2 class='modal-title text-center'>Edit Your Information</h2> 
      </div>

      <div class='modal-body'>
        <form action='edit.php?id=$id' method='post' enctype='multipart/form-data'>

		<div class='form-row'>
		<div class='form-group col-md-6'>
		<label for='inputEmail4'>Student no.</label>
		<input type='text' class='form-control' name='card_no' placeholder='Enter Student no.' maxlength='12' value='$card' required>
		</div>
		<div class='form-group col-md-6'>
		<label for='inputPassword4'>Mobile No.</label>
		<input type='phone' class='form-control' name='user_phone' placeholder='Enter Mobile no.' maxlength='11' value='$phone' required>
		</div>
		</div>
		
		
		<div class='form-row'>
		<div class='form-group col-md-6'>
		<label for='firstname'>First Name</label>
		<input type='text' class='form-control' name='user_first_name' placeholder='Enter First Name' value='$name'>
		</div>
		<div class='form-group col-md-6'>
		<label for='lastname'>Last Name</label>
		<input type='text' class='form-control' name='user_last_name' placeholder='Enter Last Name' value='$name2'>
		</div>
		</div>
		
		<div class='form-row'>
		<div class='form-group col-md-6'>
		<label for='inputState2'>Course</label>
		<select id='inputState2' name='user_course' class='form-control' value='$course'>
			<option selected>Select...</option>
			<option>BA Psychology</option>
			<option>BS Accountancy</option>
			<option>BS Accounting  Information Technology</option>
			<option>BSBA Financial Management</option>
			<option>BSBA Human Resource Management</option>
			<option>BSBA Marketing Management</option>
			<option>BSBA Operation Management</option>
			<option>BS Criminology</option>
			<option>BS Computer Engineering</option>
			<option>BS Computer Science</option>
			<option>BS Information Technology</option>
			<option>BS Social Work</option>
			<option>BS Tourism Management</option>
			<option>BS Real Estate Management</option>
			<option>BS Office Management</option>
			<option>BTVTE Electronics Technology</option>
			<option>BTVTE Food and Service Management</option>
		</select>
		</div>
		<div class='form-group col-md-6'>
		<label for='inputState1'>Year level</label>
		<select id='inputState1' name='user_yearlevel' class='form-control' value='$yearlevel'>
		  <option selected>Select...</option>
		  <option>1st year</option>
		  <option>2nd year</option>
		  <option>3rd year</option>
		  <option>4th year</option>
		</select>
		</div>
		</div>

		<div class='form-row'>
		<div class='form-group col-md-6'>
		<label for='section'>Section</label>
		<input type='text' class='form-control' name='user_section' placeholder='' value='$section'>
		</div>
		<div class='form-group col-md-6'>
		<label for='inputState'>Gender</label>
		<select id='inputState' name='user_gender' class='form-control' value='$gender'>
		<option selected>Select...</option>
		<option>Male</option>
		<option>Female</option>
		</select>
		</div>
		</div>

		<div class='form-row'>
		<div class='form-group col-md-6'>
		<label for='inputPassword4'>Date of Birth</label>
		<input type='date' class='form-control' name='user_dob' placeholder='Date of birth' value='$Bday'>
		</div>
		<div class='form-group col-md-6'>
		<label for='email'>Email</label>
		<input type='email' class='form-control' name='user_email' placeholder='Enter Email' value='$email'>
		</div>
		</div>

		<div class='form-row'>
		<div class='form-group col-md-6'>
		<label for='inputAddress'>Street & Barangay</label>
		<input type='text' class='form-control' name='village' placeholder='' value='$village'>
		</div>
		<div class='form-group col-md-6'>
		<label for='inputAddress2'>District/Municipality</label>
		<input type='text' class='form-control' name='police_station' placeholder='' value='$police'>
		</div>
		</div>

		<div class='form-row'>
		<div class='form-group col-md-6'>
		<label for='inputCity'>City/Province</label>
		<input type='text' class='form-control' name='dist' value='$dist'>
		</div>
		<div class='form-group col-md-6'>
		<label for='inputZip'>Zip Code</label>
		<input type='text' class='form-control' name='pincode' value='$pincode'>
		</div>
		</div>
		
		<div class='form-row'>
		<div class='form-group col-md-6'>
		<label for='fathername'>Father's Name</label>
		<input type='text' class='form-control' name='user_father' placeholder='Enter Father's Name' value='$father'>
		</div>
		<div class='form-group col-md-6'>
		<label for='mothername'>Mother's Name</label>
		<input type='text' class='form-control' name='user_mother' placeholder='Enter Mother's Name' value='$mother'>
		</div>
		</div>
        	

        	<div class='form-group'>
        		<label>Image</label>
        		<input type='file' name='image' class='form-control'>
        		<img src = 'upload_images/$image' style='width:50px; height:50px'>
        	</div>

        	
        	
			 <div class='modal-footer'>
			 <input type='submit' name='submit' class='btn btn-info btn-large' value='Submit'>
			 <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
		 </div>


        </form>
      </div>

    </div>

  </div>
</div>


	";
}


?>

<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>

</body>
</html>
