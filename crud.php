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

// fetch_all_posts($pdo, $stmt, "obj");

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

$post = create_post(
    $pdo,
    "Bye, World!",
    "Quia a quas dolorem officiis quos. Voluptatum dolores accusamus quo architecto.",
    "Victor W"
);

echo print_r($post);

function update_post($pdo, $id, $body)
{
    $sql = "UPDATE posts SET body = :body WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["body" => $body, "id" => $id]);
    echo "Post Updated";
}

// update_post($pdo, 11, "Lorem ipsum dolor sit amet, consectetur adipisicing elit.");


function delete_post($pdo, $id)
{
    $sql = "DELETE FROM posts WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["id" => $id]);
    echo "Post deleted";
}

// delete_post($pdo, 11);


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
