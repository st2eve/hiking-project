<?php
    declare(strict_types=1);
    error_reporting(-1);
    ini_set('display_errors', 'On');

    require 'includes/header.php';


    if (!empty($_POST)) {
        $mailAdmin = "houbart.steeve@gmail.com";
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $sujet = $_POST['sujet'];
        $message = $_POST['message'];
        $headers = 'From: '.$email."\r\n";

        mail($mailAdmin, $sujet, $message);

        if(mail($mailAdmin, $sujet, $message)){
            
                echo "Message accepted";
                header('location: https://one-more-hike.herokuapp.com/home');
            }
            else
            {
                echo "Error: Message not accepted";
            }
        

        

    }
    
?>

<div class="main-block">
        <form action="" method="POST" class="main-form">
            <div class="form-container">
                <h1>Contact</h1>
                <p>Please fill in this form to contact us.</p>
                <hr>

                <label for="firstname"><b>Firstname</b></label>
                <input type="text" placeholder="Enter Firstname" name="firstname" class="form-email" required>

                <label for="lastname"><b>LastName</b></label>
                <input type="text" placeholder="Enter LastName" name="lastname" class="form-email" required>

                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="email" class="form-email" required>

                <label for="sujet"><b>Sujet</b></label>
                <input type="text" placeholder="Enter your sujet" name="sujet" class="form-sujet" required>

                <label for="message"><b>Your message</b></label>
                <input type="textarea" placeholder="Enter your message" name="message" class="form-message" required>

                <button name="submit" type="submit" class="registerbtn">Submit</button>
            </div>
        </form>
    </div>

<?php
    require 'includes/footer.php';
?>