<?php

include 'DBconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $Id = $_GET['Id'];
}

$deletequery = "DELETE FROM contactus WHERE Id= $Id ";
$query = mysqli_query($conn, $deletequery);

if ($query) {
?>
    <script>
        alert("Data has been Successfully Deleted");
    </script>

<?php

} else {
?>
    <script>
        alert("Failed to delete data");
    </script>

<?php
}

header('location:Form.php');

?>