<!DOCTYPE html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
  a:link, a:visited {
  background-color: #f44336;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: red;
}

</style>
</head>
<body>
<a href="insert.html"  style=" background-color: green;">insert</a>
<table id="customers">
  <tr>
    <th>id</th>
    <th>Name</th>
    <th>prix</th>
    <th>quantity</th>
    <th>editer et delete</th>
  </tr>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stock";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM article";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>".$row["id"]. "</td><td> " . $row["name"]. "</td><td> " . $row["price"]. "</td><td> " . $row["quantity"]. "</td><td><a href='update.php?id=" . $row["id"]. "' style=' background-color: blue;'>editer</a>   <a href='sup.php?id=" . $row["id"]. "'>delete</a></td></tr> " ;
    }
} else {
    echo "0 results";
}

$conn->close();
?>
</table>
</body>
</html>