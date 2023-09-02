<?php

include_once __DIR__ . "/crud.php";

/* Fetch all Posts */
// fetch_all_posts($pdo, $stmt, "obj");

/* Create Post */
// $post = create_post(
//     $pdo,
//     "Bye, World!",
//     "Quia a quas dolorem officiis quos. Voluptatum dolores accusamus quo architecto.",
//     "Victor W"
// );

// echo print_r($post);

/* Update Post */
$post = update_post($pdo, 11, "Lorem ipsum dolor sit amet, consectetur adipisicing elit.");

echo print_r($post);
