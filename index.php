<?php

require __DIR__ . "/db_conn.php";

include_once __DIR__ . "/crud.php";
include_once __DIR__ . "/crud_oop.php";

/* Fetch all Posts */
// $posts = fetch_all_posts($pdo);

// foreach ($posts['data'] as $post) {
//     echo $post->title . "<br>";
// }

/* Create Post */
// $post = create_post(
//     $pdo,
//     "Bye, World!",
//     "Quia a quas dolorem officiis quos. Voluptatum dolores accusamus quo architecto.",
//     "Victor W"
// );

// echo print_r($post);

/* Update Post */
// $post = update_post($pdo, 11, "Lorem ipsum dolor sit amet, consectetur adipisicing elit.");

// echo print_r($post);

/* Delete Post */
// $post = delete_post($pdo, 11);

// echo print_r($post);

/* Search post by title */
// $search_results = search_post($pdo, "%Adventure%");

// foreach ($search_results["data"] as $post) {
//     echo $post->title . "<br>";
// }

/* Fetch All Posts OOP */
$postManager = new PostManager($pdo);

$result = $postManager->fetchAllPosts();

if ($result["status"]) {
    $posts = $result["data"];

    foreach ($posts as $post) {
        echo $post->title . "<br>";
    }
} else {
    echo "Error: " . $result["message"];
}
