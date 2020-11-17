<?php
session_start();
require "../inc/connectionToMySql.php";

// Getting value of the select and passing it to query component
if(isset($_POST['moreRows'])){
  if(!empty($_POST['moreRows'])){
    $selectedQ = $_POST['moreRows'];
    $_SESSION["rows"]=$selectedQ;
    // Post-Redirect-Get code in order to get more/less row with one submit only => https://stackoverflow.com/questions/4142809/simple-php-post-redirect-get-code-example
    header( "Location: {$_SERVER['REQUEST_URI']}", true, 303 );
   exit();
  } 
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Data from Mysql</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css" />
</head>

<body>
<div class="container m-5">
  <h1 class="is-size-1">Fetched data</h1>
</div>
  <div class="container m-5">
    <table class="table table is-bordered">
      <thead>
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>IP Address</th>
      </thead>
      <tbody>
        <!-- Mapping the data ID column-->
        <?php foreach ($rawData as $data) { ?>
          <tr>
            <!-- As Row Header, ID col -->
            <th>
              <?php echo htmlspecialchars($data['id']); ?>
            </th>
            <!-- As first cel, first name, second last name etc etc col -->
            <td>
              <?php echo htmlspecialchars($data['first_name']); ?>
            </td>
            <!-- Last Name col -->
            <td>
              <?php echo htmlspecialchars($data['last_name']); ?>
            </td>
            <!-- Email col -->
            <td>
              <?php echo htmlspecialchars($data['email']); ?>
            </td>
            <!-- Gender col -->
            <td>
              <?php echo htmlspecialchars($data['gender']); ?>
            </td>
            <!-- Ip Address col -->
            <td>
              <?php echo htmlspecialchars($data['ip_address']); ?>
            </td>
          </tr>
        <?php } ?>
        <!-- End Mapping the data -->
      </tbody>
    </table>
    <form method="POST">
<select name="moreRows">
<option disabled selected>Choose Quantity</option>
<option value="20">20</option>
<option value="30">30</option>
<option value="40">40</option>
</select>
<input type="submit" name="submit" value="Choose Options">
</form>

  </div>
 
</body>

</html>