<?php

class PostManager
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchAllPosts()
    {
        $sql = "SELECT * FROM posts";
        try {
            $stmt = $this->pdo->query($sql);
            $posts = $stmt->fetchAll();
            return array(
                "status" => true,
                "message" => "successful",
                "data" => $posts
            );
        } catch (PDOException $e) {
            return array(
                "status" => false,
                "message" => "unsuccessful",
                "error" => $e->getMessage()
            );
        }
    }

    public function createPost($title, $body, $author)
    {
        $sql = "INSERT INTO posts (title, body, author) VALUES (:title, :body, :author)";
        try {
            $stmt = $this->pdo->prepare($sql);
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

    public function updatePost($id, $body)
    {
        $sql = "UPDATE posts SET body = :body WHERE id = :id";
        try {
            $stmt = $this->pdo->prepare($sql);
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

    public function deletePost($id)
    {
        $sql = "DELETE FROM posts WHERE id = :id";
        try {
            $stmt = $this->pdo->prepare($sql);
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

    public function searchPost($search_string)
    {
        $sql = "SELECT * FROM posts WHERE title LIKE ?";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$search_string]);
            $posts = $stmt->fetchAll();
            return array(
                "status" => true,
                "message" => "post title search successful!",
                "data" => $posts
            );
        } catch (PDOException $e) {
            return array(
                "status" => false,
                "message" => "post title search failed!",
                "error" => $e->getMessage()
            );
        }
    }
}
