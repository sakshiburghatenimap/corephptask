<?php
$DATABASE_HOST='localhost';
$DATABASE_USER='root';
$DATABASE_PASS='';
$DATABASE_NAME='form';

// Create connection
$con = mysqli_connect($DATABASE_HOST , $DATABASE_USER , $DATABASE_PASS , $DATABASE_NAME);
// Check connection



// $sql = "SELECT id, username, email , password FROM users";
// $result = $con->query($sql);

// if ($result->num_rows > 0) {
//   // output data of each row
//   while($row = $result->fetch_assoc()) {
//     echo "id: " . $row["id"]. " - Name: " . $row["username"]. "-Email " . $row["email"]. "-Password " . $row["password"]. "<br>";
//   }
// } else {
//   echo "0 results";
// }
// $con->close();
?>
<!DOCTYPE html>

<html>

<head>

    <title>View Page</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>

<body>

    <div class="container">

        <h2>users</h2>

<table class="table">

    <thead>

        <tr>

        <th>ID</th>

        <th>User Name</th>

        <th>Action</th>

    </tr>

    </thead>

    <tbody> 

          <?php
               $sql = "SELECT id, username ,password, email FROM users";
                $result = $con->query($sql);

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
          ?>
                    <tr>

                    <td><?php echo $row['id']; ?></td>

                    <td><?php echo $row['username']; ?></td>

                    <td>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?php echo $row['id'] ?>">View</button>
                    </td>
                    <td><a class="btn-btn-info" href="detail.php?id=<?php echo $row['id']; ?> ">Detail</a>
                </td>
                    </tr>   
                    <div id="myModal<?php echo $row['id'] ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title">Details</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                              
                          </div>
                          <div class="modal-body">
                          <h3>Name : <?php echo $row['username']; ?></h3>
                          <h3>Email : <?php echo $row['email']; ?></h3>
                          
                          </div>
                      </div>
                    </div>
                  </div>
                
                    
        <?php   }    

                }

        ?>                

    </tbody>

</table>

    </div> 

</body>

</html>