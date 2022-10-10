

<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
               
<tbody>
<?php
$DATABASE_HOST='localhost';
$DATABASE_USER='root';
$DATABASE_PASS='';
$DATABASE_NAME='form';

// Create connection
$con = mysqli_connect($DATABASE_HOST , $DATABASE_USER , $DATABASE_PASS , $DATABASE_NAME);
// Check connection
$vid=$_GET['id'];
$ret=mysqli_query($con,"select * from users where ID =$vid");
//$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
 
?>
 <tr>
    <th>User Name</th>
    <td><?php  echo $row['username'];?></td></br>
    <th>Email</th>
    <td><?php  echo $row['email'];?></td></br>
  </tr>
  
<?php 
//$cnt=$cnt+1;
}?>
                 
</tbody>
</table>