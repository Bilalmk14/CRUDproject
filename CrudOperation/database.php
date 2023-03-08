<?php include 'links.php'; ?>

<!DOCTYPE html>

<html>

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <title>Student Data</title>

</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<body class="db-body">

  <div class="tablediv">
    <table class="table">
      <thead>
        <tr bgcolor="grey">
          <th>Id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Concern</th>
          <th>Password</th>
          <th colspan="2">Operations</th>
        </tr>
      </thead>

      <tbody bgcolor="#D3D3D3">
        <?php

        $selectquery = "SELECT * FROM contactus";

        $query = mysqli_query($conn, $selectquery);

        while ($res = mysqli_fetch_array($query)) {

        ?>

          <tr id="tr">
            <td> <?php echo $res['Id'] ?> </td>
            <td> <?php echo $res['Name'] ?> </td>
            <td> <?php echo $res['Email'] ?> </td>
            <td> <?php echo $res['Concern'] ?> </td>
            <td> <?php echo $res['password'] ?> </td>
            <td>
              <i class="fa fa-pencil-square editbtn " aria-hidden="true" data-toggle="modal" data-target="#myModal"> </i>
              Update
            </td>

            <td> <a href="delete.php?Id=<?php echo $res['Id']; ?>"> <i class="fa fa-trash" aria-hidden="true">

                </i> </a> Delete
            </td>
          </tr>

        <?php
        }
        ?>

      </tbody>
  </div>

  </table>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>

          <form action="#" method="POST">

            <h1>Update Form</h1>
            <label for="Id" class="form-label">Id</label>
            <input class="form-control" id="update_Id" name="update_Id" required>

            <div class="mb-3">
              <label for="Name" class="form-label">Name</label>
              <input type="text" class="form-control" id="Name" name="Name" required>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="Email" name="Email" required>

              <div class="mb-3">
                <label for="desc" class="form-label">Description</label>
                <input class="form-control" name="Concern" id="Concern" cols="150" rows="5" required>
              </div>

            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" name="save" Id="save" class="btn btn-primary">Save</button>

          </form>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <a href="http://localhost:81/PHP/CrudOperation/database.php"> <button class="btn btn-dark ">Data</button> </a>
        </div>
      </div>
    </div>
  </div>
  </div>

  <a href="http://localhost:81/PHP/CrudOperation/form.php"> <button class="btn btn-dark ">Form</button></a>
  
  <script>
    $(document).ready(function() {
      $('.editbtn').on('click', function() {
        $('#myModal').modal('show');

        $tr = $(this).closest('tr');
        console.log($tr);
        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data);

        $('#update_Id').val(data[0]);
        $('#Name').val(data[1]);
        $('#Email').val(data[2]);
        $('#Concern').val(data[3]);
        $('#password').val(data[4]);

      });
    });
  </script>


  <?php

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $Id = $_POST['update_Id'];
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Concern = $_POST['Concern'];
    $Password = $_POST['password'];



    $Updatequery = "UPDATE contactus  SET  Name ='$Name' ,Email='$Email', Concern='$Concern' , Password='$Password'   WHERE Id='$Id'";


    $result = mysqli_query($conn, $Updatequery);

    if ($result) {
      // header("location:database.php");

    } else {
      echo "Record has not been submitted beacuse of an error :" . mysqli_error($conn);
    }
  }
  ?>




</body>




</html>