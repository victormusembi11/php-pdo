<?php

require __DIR__ . "/db_conn.php";

$stmt = $pdo->query("SELECT * FROM posts");

function fetch_all_posts($stmt, $type)
{

    if ($type == "assoc") {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo $row["title"] . "<br>";
        }
    } elseif ($type == "obj") {
        while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
            echo $row->title . "<br>";
        }
    }
}

fetch_all_posts($stmt, "obj");
