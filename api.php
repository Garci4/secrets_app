<?php
  include_once 'secrets.php';

  $secret = new Secret();

  $con = mysqli_connect("localhost", "root", "", "SECRETS_DB");

  if ($con) {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $json = $secret->post_secret($con, $_POST);
    } else {
      if ($_SERVER['REQUEST_METHOD'] == "GET") {
        $json = $secret->get_secret();
      } else {
        $json = array("status" => 0, "Info" => "Request method not accepted!");
      }
    }
    // Set Content-type to JSON
    header('Content-type: application/json');
    echo json_encode($json);
  }
  else {
    echo "Database connection failed";
  }
?>
