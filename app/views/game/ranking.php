<?php
$rows = $_SESSION['temp'];
$count = 1;
echo "<h1>Ranking</h1>";
echo "<table>";
foreach ($rows as $row) {
    echo '<tr><td style="padding-right: 10px">' . $count . "</td><td>".$row['username'] ."</td></tr>";
    $count++;
}
echo "</table>";
?>
<a href="/WebDevProject/public/home/logged">Home</a>


