<?php

require __DIR__ . "/db_conn.php";

$author = "Jane Smith";

// insecure
$insecure_fetch = "SELECT *FROM posts WHERE AUTHOR = '$author'";

// fetch multiple posts
// two methods (positional parameters & named parameters)

function posts_positional_params($pdo, $author)
{
    $sql = "SELECT * FROM posts WHERE author = ?"; // positional param
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$author]); // positional param

    $posts = $stmt->fetchAll();

    foreach ($posts as $post) {
        echo $post->title . "<br>";
    }
}

function posts_named_params($pdo, $author)
{
    $sql = "SELECT * FROM posts WHERE author = :author"; // named param
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["author" => $author]); // named param

    $posts = $stmt->fetchAll();

    foreach ($posts as $post) {
        echo $post->title . "<br>";
    }
}

function posts_multi_named_params($pdo, $author, $is_published)
{
    $sql = "SELECT * FROM posts WHERE author = :author && is_published = :is_published"; // named param
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["author" => $author, "is_published" => $is_published]); // named param

    $posts = $stmt->fetchAll();

    foreach ($posts as $post) {
        echo $post->title . "<br>";
    }
}


// posts_positional_params($pdo, $author);
// posts_named_params($pdo, $author);
posts_multi_named_params($pdo, $author, "true");
