<?php

// MySQLi
$dbServerName = "INSERT HERE YOUR HOST";
$dbUserName = "INSERT HERE YOUR USERNAME";
$dbPassword = "INSERT HERE YOUR PASSWORD";
$dbName = "INSERT HERE YOUR DB NAME";

// Connect to db
$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

// If there is an error...
if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}
// Query that will get all entries
$sql = 'SELECT id FROM maindb LIMIT 10';

// Query and get result
$result = mysqli_query($conn, $sql);

// Fetch the results
$rawData = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Freeing the result from memory
mysqli_free_result($result);

// Close connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Hello Bulma!</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css"
    />
  </head>
  <body>
    <div class="container">
      <div class="columns">
        <div class="column">
          <table class="table table is-bordered">
            <thead>
              <th><abbr title="ID">Id</abbr></th> 
              <th><abbr title="First Name">First Name</abbr></th> 
              <th><abbr title="Last Name">First Name</abbr></th> 
              <th><abbr title="Email">Email</abbr></th> 
              <th><abbr title="Gender">Gender</abbr></th> 
              <th><abbr title="IPAddress">Gender</abbr></th> 

            </thead>
            <tbody>
              
              <?php foreach($rawData as $data){?>
                <tr>
              <th>
                <abbr title="ID"><?php echo htmlspecialchars($data['id']); ?></abbr>
              </th>
              </tr>
            <?php } ?>
               
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
