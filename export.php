<?php  
//export.php  
include 'db.php';
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM card_activation order by 1 desc";
 $result = mysqli_query($con, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>S.L</th>  
                         <th>Card Name</th>  
                         <th>Name</th>  
                         <th>Course</th>
                         <th>Year level</th>
                         <th>Section</th>
                         <th>Birth day</th>
                         <th>Gender</th>
                         <th>Email</th>
                         <th>Mobile no.</th>
                         <th>Father Name</th>  
                         <th>Mother name</th>  
                         <th>Address</th>
                         <th>Issue Date:</th> 
                         

                    </tr>
  ';
  $i = 0;
  while($row = mysqli_fetch_array($result))
  {
    $sl = ++$i;
   $output .= '
    <tr>  
                         <td > '.$sl.' </td>
                         <td>'.$row["u_card"].'</td>  
                         <td>'.$row["u_f_name"]  .$row["u_l_name"].'</td>
                         <td>'.$row["course"].'</td>
                         <td>'.$row["yearlevel"].'</td>
                         <td>'.$row["section"].'</td>  
                         <td>'.$row["u_birthday"].'</td>
                         <td>'.$row["u_gender"].'</td>
                         <td>'.$row["u_email"].'</td>  
                         <td>'.$row["u_phone"].'</td>
                         <td>'.$row["u_father"].'</td>  
                         <td>'.$row["u_mother"].'</td>   
                         <td>'.$row["u_village"] .$row["u_police"] .$row["u_dist"] .$row["u_pincode"].'</td>    
                        <td>'.$row["uploaded"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Students_Record.xls');
  echo $output;
 }
}
?>