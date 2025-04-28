<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "BlogWebsite1";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle comment actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_comment'])) {
        $blog_id = (int)$_POST['blog_id'];
        $username = $conn->real_escape_string($_POST['username']);
        $comment = $conn->real_escape_string($_POST['comment']);

        if (!empty($username) && !empty($comment)) {
            $insert_comment = "INSERT INTO comments (blog_id, username, comment) VALUES ('$blog_id', '$username', '$comment')";
            $conn->query($insert_comment);
        }
    } elseif (isset($_POST['edit_comment'])) {
        $comment_id = (int)$_POST['comment_id'];
        $updated_comment = $conn->real_escape_string($_POST['updated_comment']);
        $update_query = "UPDATE comments SET comment = '$updated_comment' WHERE id = '$comment_id'";
        $conn->query($update_query);
    } elseif (isset($_POST['delete_comment'])) {
        $comment_id = (int)$_POST['comment_id'];
        $delete_query = "DELETE FROM comments WHERE id = '$comment_id'";
        $conn->query($delete_query);
    }
}

// Fetch blogs
$sql = "SELECT * FROM blogs ORDER BY created_at DESC";
$result = $conn->query($sql);

// Fetch comments
$comments_query = "SELECT * FROM comments ORDER BY id ASC";
$comments_result = $conn->query($comments_query);
$comments = [];
while ($row = $comments_result->fetch_assoc()) {
    $comments[$row['blog_id']][] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Homepage</title>
    
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="style1.css">

    <style>
        /* Black-Orange Gradient for the Body */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #ff6600, #000);
            color: #fff;
            height: 100%;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        /* Blog Container */
        .blog-container {
            width: 100%;
            max-width: 900px;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        /* Blog Styling */
        .blog {
            display: flex;
            background-color: #111;
            border: 1px solid #444;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .blog img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            margin-right: 20px;
            border-radius: 10px;
        }

        .blog-content {
            padding: 20px;
            flex: 1;
        }

        .blog h2 {
            color: #ff6600;
            margin-bottom: 10px;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .blog h2:hover {
            color: #fff;
            transform: translateX(10px);
        }

        .blog-body {
            display: none;
            margin-top: 10px;
            padding: 15px;
            background-color: #222;
            border-radius: 8px;
        }

        .show-content {
            display: block;
        }

        /* Comments Section */
        .comments {
            margin-top: 20px;
        }

        .comments form {
            margin-top: 10px;
        }

        .comments textarea {
            width: 100%;
            margin: 5px 0;
        }

        button[type="submit"][name="add_comment"] {
    background-color: #ff6600; /* Orange background */
    color: #fff; /* White text */
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1rem;
    transition: background-color 0.3s ease;
}

button[type="submit"][name="add_comment"]:hover {
    background-color: #e65c00; /* Darker orange on hover */
}

    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <h1>
                <a id="logo" href="index.php">A1</a> <a id="logo1" href="index.php">Bites</a>
            </h1>
            <nav class="navbar">
                <ul class="navbar-list">
                    <li><a href="index.php" class="navbar-link">Home</a></li>
                    <li><a href="menu.html" class="navbar-link">Menu</a></li>
                    <li><a href="location.html" class="navbar-link">Location</a></li>
                    <li><a href="index1.php" class="navbar-link">Blog</a></li>
                    <li><a href="contactusform.html" class="navbar-link">Contact Us</a></li>
                </ul>
            </nav>
            <button onclick="openMenu()" class="btn btn-hover">Reservation for Event</button>
        </div>
    </header><br><br><br><br>

    <h1>Welcome to Our Blog</h1>
    <div class="blog-container">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="blog">
                    <?php if (!empty($row['thumbnail'])): ?>
                        <img src="uploads/<?= htmlspecialchars($row['thumbnail']) ?>" alt="Thumbnail">
                    <?php endif; ?>
                    <div class="blog-content">
                        <h2 class="blog-title"><?= htmlspecialchars($row['title']) ?></h2>
                        <div class="blog-body">
                            <p><?= nl2br(htmlspecialchars($row['content'])) ?></p>
                            <small>Posted on: <?= $row['created_at'] ?></small>

                            <!-- Comments Section -->
                            <div class="comments">
                                <h3>Comments</h3>
                                <?php if (isset($comments[$row['id']])): ?>
                                    <?php foreach ($comments[$row['id']] as $comment): ?>
                                        <div class="comment">
                                            <p><strong><?= htmlspecialchars($comment['username']) ?>:</strong> <?= htmlspecialchars($comment['comment']) ?></p>
                                            <form method="post" style="display: inline;">
                                                <input type="hidden" name="comment_id" value="<?= $comment['id'] ?>">
                                                <textarea name="updated_comment" rows="2"><?= htmlspecialchars($comment['comment']) ?></textarea>
                                                <button type="submit" name="edit_comment">Edit</button>
                                            </form>
                                            <form method="post" style="display: inline;">
                                                <input type="hidden" name="comment_id" value="<?= $comment['id'] ?>">
                                                <button type="submit" name="delete_comment">Delete</button>
                                            </form>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p>No comments yet. Be the first to comment!</p>
                                <?php endif; ?>

                                <!-- Add Comment Form -->
                                <form method="post">
                                    <input type="hidden" name="blog_id" value="<?= $row['id'] ?>">
                                    <input type="text" name="username" placeholder="Your Name" required>
                                    <textarea name="comment" placeholder="Your Comment" rows="3" required></textarea>
                                    <button type="submit" name="add_comment">Add Comment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No blogs available.</p>
        <?php endif; ?>
    </div>

    <script>
        $(document).ready(function() {
            $('.blog-title').click(function() {
                $(this).next('.blog-body').toggleClass('show-content');
            });
        });

        function openMenu() {
            window.location.href = "event.html";
        }
    </script>
</body>
</html>
