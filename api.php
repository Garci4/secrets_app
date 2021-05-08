<?php
  include_once 'secrets.php';

  $secret = new Secret();

  $con = mysqli_connect("127.0.0.1", "root", "", "SECRETS_DB");

  if ($con) {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $json = $secret->post_secret($con, $_POST);
    } else {
      if ($_SERVER['REQUEST_METHOD'] == "GET") {
        $_link = $_GET["link"];
        $json = $secret->get_secret($con, $_link);
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
