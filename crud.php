<?php

require __DIR__ . "/db_conn.php";

function create_post($pdo, $title, $body, $author)
{
    $sql = "INSERT INTO posts (title, body, author) VALUES (:title, :body, :author)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["title" => $title, "body" => $body, "author" => $author]);
    echo "Post Added!";
}

create_post(
    $pdo,
    "Hello, World!",
    "Quia a quas dolorem officiis quos. Voluptatum dolores accusamus quo architecto.",
    "Victor M"
);
