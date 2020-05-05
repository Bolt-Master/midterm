<!doctype html>
<html>
  <head>
    <link rel="stylesheet" href="1.css"></link>
  </head>
<body>
<?php
  echo "<h1>ONLINE SHOP</h1>";
  echo "<br>";
  echo "<h3>";
  echo "Admin, the db is ";
  echo "</h3>";
?>


<table>
  <tr>
    <th>
      item_id
    </th>
    <th>
      item_name
    </th>
    <th>
      item_price
    </th>
    <th>
      item_comment
    </th>
    <th>
      insert
    </th>
  </tr>
  <tr>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <td>
        <input type="text" name="item_id" value="AUTO INCREMENT" readonly>
      </td>
      <td>
        <input type="text" name="item_name" value="NEW ITEM NAME">
      </td>
      <td>
        <input type="text" name="item_price" value="NEW ITEM PRICE">
      </td>
      <td>
        <input type="text" name="item_comment" value="NEW ITEM COMMENT">
      </td>
      <td>
        <input type="submit" name="insert" value="insert">
      </td>
    </form>
  </tr>
    <tr>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <td>
          <input type="text" name="item_id" value="" readonly>
        </td>
        <td>
          <input type="text" name="item_name" value="">
        </td>
        <td>
          <input type="text" name="item_price" value="">
        </td>
        <td>
          <input type="text" name="item_comment" value="">
        </td>
        <td>
          <input type="submit" name="insert" value="Get data" >
        </td>
      </form>
    </tr>
    <?php
  $item_id = -1;
  $item_name = "new item name";
  $item_price = -1;
  $item_comment = "new item comment";
  if
  (
     isset($_POST["item_id"]) && isset($_POST["item_name"]) &&
     isset($_POST["item_price"]) && isset($_POST["item_comment"])
  )
  {
    $item_id = $_POST["item_id"];
    $item_name = $_POST["item_name"];
    $item_price = $_POST["item_price"];
    $item_comment = $_POST["item_comment"];
  }

  $connect = new mysqli("localhost", "user1", "1234qwer", "shop_db");
  if($connect->connect_error){
    die("Connection failed: ".$connect->connect_error);
  }

  $stmt = $connect->prepare("INSERT INTO shop_db_table() VALUES (?, ?, ?, ?) ");
  $stmt->bind_param("isss", $item_id, $item_name, $item_price, $item_comment);
  if($stmt->execute() == true){
    echo "Successfully";
    $stmt->close();
  } else{
    die("Failed :".$stmt->connect_error);
  }

  $stmt = "SELECT * FROM shop_db_table";
  $result = $connect->query($stmt);

  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          echo "<tr><td> " . $row["item_id"]. "</td><td>" . $row["item_name"]. "</td> <td>" . $row["item_price"]. "</td><td>".$row["item_comment"]."</td></tr>";
      }
  } else {
      echo "0 results";
  }



?>
</table>
</body>
</html>
