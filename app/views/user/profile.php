<?php

$data = $_POST['temp'];

echo "<h1 style=\"padding:5px\">Hello ". htmlspecialchars($data['username']) . "</h1>";
echo "<h2> Resources : </h2>";
echo "<h3> Gold: ". htmlspecialchars($data['gold']) ." </h3>";
echo "<h3> Food: ". htmlspecialchars($data['food']) ." </h3>";


