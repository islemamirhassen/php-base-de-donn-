<!DOCTYPE html>
<html>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>

<body>

<h3>update article</h3>

<div>
  <form action="save.php" method="post">
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

$sql = "SELECT * FROM article where id=".$_REQUEST["id"];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
   $row = $result->fetch_assoc(); 
    echo "<label for="fname">id:</label>";
    echo "<input value='".$row["id"]."' type="text" id="fname" name="id" >";
    echo "<label for="fname">Name :</label>";
    echo "<input value='" . $row["name"]. "' type="text" id="fname" name="name" >";
    echo "<label for="lname">Price :</label>";
    echo "<input value='" . $row["price"]. "' type="text" id="lname" name="price" >";
    echo " <label for="quantity">quantity :</label>";
    echo " <input value='" . $row["quantity"]. "' type="text" id="lname" name="quantity" >"; 
} else {
    echo "0 results";
}

$conn->close();
?>
    <input type="submit" value="envoyer">
  </form>
</div>


</body>
</html>


