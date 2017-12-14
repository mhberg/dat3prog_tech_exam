<?php
include ("connect.php");
$sql = "SELECT blurb, description, difficulty, graphic, keywords, length, tours.packageId, price, region, tourId, tourName, packageDescription, packageGraphic, packageTitle 
FROM tours, packages WHERE tours.packageId = packages.packageId";
//$sql = "SELECT blurb, description, difficulty, graphic, keywords, length, packageId, price, region, tourId, tourName FROM tours";
$result = $connect->query($sql);

      if($result->num_rows > 0){
        echo "<table class='table'>";
        echo "<thead><tr>
          <th scope='col'>Blurb</th>
          <th scope='col'>Description</th>
          <th scope='col'>Difficulty</th>;
          <th scope='col'>Graphic</th>
          <th scope='col'>Keywords</th>
          <th scope='col'>Length</th>
          <th scope='col'>Package ID</th>
          <th scope='col'>Price</th>
          <th scope='col'>Region</th>
          <th scope='col'>Tour ID</th>
          <th scope='col'>Tour Name</th>
          <th scope='col'>Package Title</th>
          <th scope='col'>Package Description</th>
          <th scope='col'>Package Graphic</th>";
        echo "</tr></thead>";
      while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>" . $row["blurb"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "<td>" . $row["difficulty"] . "</td>";
        echo "<td><img src='/explore_images/" . $row["graphic"] . "' alt='" . $row["graphic"] . "' >" . "</td>";
        echo "<td>" . $row["keywords"] . "</td>";
        echo "<td>" . $row["length"] . "</td>";
        echo "<td>" . $row["packageId"] . "</td>";
        echo "<td>" . $row["price"] . "</td>";
        echo "<td>" . $row["region"] . "</td>";
        echo "<td>" . $row["tourId"] . "</td>";
        echo "<td>" . $row["tourName"] . "</td>";
        echo "<td>" . $row["packageTitle"] . "</td>";
        echo "<td>" . $row["packageDescription"] . "</td>";
        echo "<td><img src='/explore_images/" . $row["packageGraphic"] . "' alt='" . $row["packageGraphic"] . "' >" . "</td>";

        echo "</tr>";
      }
      echo "</table>";
    } else {
      echo "<br>0 results found";
    }
    $connect->close();
?>