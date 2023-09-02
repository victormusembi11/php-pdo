<?php

require __DIR__ . "/db_conn.php";

function fetch_all_posts($pdo, $stmt, $type)
{
    $stmt = $pdo->query("SELECT * FROM posts");

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


function create_post($pdo, $title, $body, $author)
{
    $sql = "INSERT INTO posts (title, body, author) VALUES (:title, :body, :author)";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["title" => $title, "body" => $body, "author" => $author]);
        return array(
            "status" => true,
            "message" => "successful"
        );
    } catch (PDOException $e) {
        return array(
            "status" => false,
            "message" => "unsuccessful",
            "error" => $e->getMessage()
        );
    }
}


function update_post($pdo, $id, $body)
{
    $sql = "UPDATE posts SET body = :body WHERE id = :id";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["body" => $body, "id" => $id]);
        return array(
            "status" => true,
            "message" => "post updated successfully!"
        );
    } catch (PDOException $e) {
        return array(
            "status" => false,
            "message" => "post update failed!",
            "error" => $e->getMessage()
        );
    }
}


function delete_post($pdo, $id)
{
    $sql = "DELETE FROM posts WHERE id = :id";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["id" => $id]);
        return array(
            "status" => true,
            "message" => "post deleted successfully!"
        );
    } catch (PDOException $e) {
        return array(
            "status" => false,
            "message" => "post deletion failed!",
            "error" => $e->getMessage()
        );
    }
}


function search_post($pdo, $search_string)
{
    $sql = "SELECT * FROM posts WHERE title LIKE ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$search_string]);
    $posts = $stmt->fetchAll();

    foreach ($posts as $post) {
        echo $post->title . "<br>";
    }
}


// search_post($pdo, "%Adventure%");
