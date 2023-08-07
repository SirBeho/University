<?php
try {
    $mysqli = new mysqli("localhost", "root", "", "data");
    
} catch (mysqli_sql_exception $e) {
    echo "Error:". $e->getMessage();
}