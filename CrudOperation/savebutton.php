<?php include 'links.php'; ?>



<?php
echo "hello";
if (isset ($POST['savebutton'])) {

   $Id=$_POST['update_Id'];

  $Name = $_POST['Name'];
  $Email = $_POST['Email'];
  $Concern = $_POST['Concern'];
  $Password = $_POST['password'];

  echo "$Id";

  $Updatequery = "UPDATE contactus  SET  Name ='$Name' ,Email='$Email', Concern='$Concern' , Password='$password'   WHERE Id='$Id'";

  $result = mysqli_query($conn, $Updatequery);

  if ($result) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your data had been successfully submitted.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    // header("location:database.php");

  } else {
    echo "Record has not been submitted beacuse of an error :" . mysqli_error($conn);

    '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> Your data had been successfully submitted.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>';
  }
}

?>
