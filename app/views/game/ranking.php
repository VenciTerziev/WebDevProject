<?php
require_once '/../../ViewHelpers/TableViewHelper.php';

$rows = $_SESSION['temp'];
$count = 1;
echo "<h1>Ranking</h1>";

$table = TableViewHelper::create()
            ->setTableAttributes(["padding-right" => "10px"]);

foreach ($rows as $row) {
    $table->addRow([$count, $row['username']]);
    $count++;
}
echo $table->render();

?>
<a href="/WebDevProject/public/home">Home</a>


