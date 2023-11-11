<?php
include('../includes/header.php') ?>


<section class="contact">

    <img src="../assets/img/about.jpg" alt="" srcset="">
    <div class="form">
        <h2>Contact Us</h2>
        
        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];
        $headers = "From: $email";

        // Set up email
        $to = "emmaliss001@gmail.com"; 
        $subject = "New Contact Form Submission";

        // Send email
        if (mail($to, $subject, $message, $headers)) {
            echo "Thank you for contacting us! We will get back to you soon.";
        } else {
            echo "Oops! Something went wrong and we couldn't send your message.";
        }
    }
    ?>


            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Your Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>

                <button type="submit">Submit</button>
            </form>
    </div>

</section>

<?php include('../includes/footer.php')
?>