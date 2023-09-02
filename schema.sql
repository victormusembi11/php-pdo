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
    ('Book Review: "The Great Adventure"', 'This is a review of "The Great Adventure" by John Doe.', 'John Doe', true),
    ('Exploring Uncharted Territories', 'A journey into the unknown with Jane Smith.', 'Jane Smith', false),
    ('The Art of Coding', 'Discover the world of programming with Alice Johnson.', 'Alice Johnson', true),
    ('The Mystery of the Lost City', 'Join Bob Williams on an epic quest to find the lost city.', 'Bob Williams', true),
    ('A Journey Through Time', 'Travel through history with Eva Davis as your guide.', 'Eva Davis', false),
    ('Programming Tips and Tricks', 'Learn valuable coding tips from John Doe.', 'John Doe', true),
    ('The Secrets of the Universe', 'Unravel the mysteries of the cosmos with Jane Smith.', 'Jane Smith', true),
    ('Cooking Adventures', 'Alice Johnson shares her culinary journey.', 'Alice Johnson', false),
    ('The Hidden Treasures', 'Join Bob Williams on another adventure to discover hidden treasures.', 'Bob Williams', false),
    ('Exploring the Natural World', 'Eva Davis takes you on a journey through the wonders of nature.', 'Eva Davis', true);
    ('Hello, World!', 'Unravel the mysteries of the cosmos with Jane Smith.', 'Jane Smith', true),

