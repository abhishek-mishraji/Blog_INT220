<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Vivek Pandey</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .hero {
            text-align: center;
            padding: 50px 20px;
            background-color: #f8f9fa;
        }

        .hero h1 {
            color: #333;
        }

        .hero img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .content {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }

        .map {
            margin-bottom: 20px;
        }

        .map iframe {
            width: 100%;
            height: 400px;
            border: 0;
        }

        .form {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .form form {
            display: flex;
            flex-direction: column;
        }

        .form form input,
        .form form textarea {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form form button {
            background: #55c4fd;
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px;
            border-radius: 5px;
        }

        .form form button:hover {
            background: #007bff;
        }
    </style>
</head>

<body>
    <header style="background-color: #f8f9fa; padding: 10px 0; text-align: center; position: fixed; top: 0; width: 100%; z-index: 1000; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
        <?php
        include 'partials/header.php';
        ?>
    </header>
    <!-- Hero Section -->
    <div class="hero">
        <h1>Let's have a talk</h1>
        <img src="vivek-banner.jpg" alt="Flamingo">
    </div>

    <!-- Contact Content -->
    <div class="content">
        <!-- Map Section -->
        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28773.774306001!2d81.846311!3d25.435801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x398533c5b3b3b3b3%3A0x3b3b3b3b3b3b3b3b!2sPrayagraj%2C%20Uttar%20Pradesh%2C%20India!5e0!3m2!1sen!2sin!4v1691320136571!5m2!1sen!2sin"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <!-- Form Section -->
        <div class="form">
            <h2>Contact Me</h2>
            <form method="POST" action="message_logic.php">
                <label style="color: #333;" for="name">Enter Name</label>
                <input type="text" name="name" placeholder="Your Name" required>

                <label style="color: #333;" for="email">Enter email</label>
                <input type="email" name="email" placeholder="Your Email" required>

                <label style="color: #333;" for="messages">Enter Message</label>
                <textarea name="messages" rows="5" placeholder="Your Message" required></textarea>
                <button type="submit">Send Message</button>
            </form>
            <div style="color: green; font-weight: bold; display: none;" class="message"></div>
        </div>
    </div>
    <footer style=" padding: 10px 0; text-align: center;  bottom: 0; width: 100%; z-index: 1000; box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);">
        <?php
        include 'partials/footer.php';
        ?>
    </footer>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('form').on('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting the traditional way

            // Clear existing messages
            $('.message').removeClass('success error').hide().text('');

            $.ajax({
                url: 'message_logic.php',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('.message').addClass('success').text(response).fadeIn();
                    $('form')[0].reset(); // Clear all text inputs
                },
                error: function(xhr) {
                    $('.message').addClass('error').text(xhr.responseText).fadeIn();
                }
            });
        });
    });
</script>

</html>