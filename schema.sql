CREATE DATABASE php_pdo_db;

USE php_pdo_db;

CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    body TEXT,
    author VARCHAR(50) NOT NULL,
    is_published BOOLEAN,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO posts (title, body, author, is_published)
VALUES
    ('Sample Post 1', 'This is the body of the first post.', 'John Doe', true),
    ('Sample Post 2', 'This is the body of the second post.', 'Jane Smith', true),
    ('Sample Post 3', 'This is the body of the third post.', 'Alice Johnson', false),
    ('Sample Post 4', 'This is the body of the fourth post.', 'Bob Williams', true),
    ('Sample Post 5', 'This is the body of the fifth post.', 'Eva Davis', false);
