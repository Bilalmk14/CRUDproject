<?php include 'Links.php'; ?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Student Form</title>

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark  ">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Get Post</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <div class="main">

    <form action="#" method="post" id="formid">

      <h1>Student Form</h1>

      <center>
        <div class="NameInput">
          <label for="Name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="EmailAddress">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="Description">
          <label for="desc" class="form-label">Description</label>
          <textarea class="form-control" name="desc" id="desc" cols="150" rows="5" required></textarea>
        </div>


        <div class="Password">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="pass" name="pass" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </center>
    </form>

  </div>

  <a href="http://localhost:81/PHP/CrudOperation/database.php"> <button class="btn btn-dark ">Student Data</button> </a>



  <?php

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $desc = $_POST['desc'];
    $pass = $_POST['pass'];

    $sql = "INSERT INTO `contactus`(`Name`, `Email`, `Concern`, `password`) VALUES ('$name','$email','$desc','$pass')";
    $result = mysqli_query($conn, $sql);
    echo $result;
    if ($result == 1) {
      echo "record created";
    } else {
      echo "record has not been submitted beacuse of error :" . mysqli_error($conn);
    }
  }

  ?>

</body>


</html>