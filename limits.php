<?php

require __DIR__ . "/db_conn.php";

// disable emulation so, LIMIT in sql works
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

function read_limited_posts($pdo, $author, $is_published, $limit)
{
    $sql = "SELECT * FROM posts WHERE author = :author && is_published = :is_published LIMIT :limit";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["author" => $author, "is_published" => $is_published, "limit" => $limit]);
    $posts = $stmt->fetchAll();

    foreach ($posts as $post) {
        echo $post->title . "<br>";
    }
}

read_limited_posts($pdo, "Jane Smith", true, 1);
