<?php
include 'partials/header.php';

// Fetch all messages from the database
$query = "SELECT * FROM message ORDER BY time DESC";
$posts = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        .messages-section {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
        }

        .messages-section h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .message-card {
            background-color: #ffffff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease;
        }

        .message-card:hover {
            transform: scale(1.02);
        }

        .message-card h2 {
            margin: 0;
            color: #007bff;
            font-size: 18px;
        }

        .message-card p {
            color: #555;
            margin: 10px 0;
            line-height: 1.5;
        }

        .message-card .meta {
            font-size: 14px;
            color: #999;
            margin-top: 10px;
        }

        .no-messages {
            text-align: center;
            font-size: 18px;
            color: #777;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <section class="messages-section">
        <h1>Messages</h1>

        <?php if (mysqli_num_rows($posts) > 0): ?>
            <?php while ($post = mysqli_fetch_assoc($posts)): ?>
                <div class="message-card">
                    <h2><?php echo htmlspecialchars($post['Name']); ?></h2>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($post['email']); ?></p>
                    <p><?php echo htmlspecialchars($post['Main_message']); ?></p>
                    <div class="meta">Received on: <?php echo date("F j, Y, g:i a", strtotime($post['time'])); ?></div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="no-messages">No messages to display.</p>
        <?php endif; ?>
    </section>

    <?php include 'partials/footer.php'; ?>
</body>

</html>