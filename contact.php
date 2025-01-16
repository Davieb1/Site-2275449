<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"
        integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="style.css">
    <title>#</title>
    <meta name="description"
        content="Contact details for TrainSync  - Main Street, Fife, ky85bd. Phone 123 4567890">

    <style>
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            color: white;
            text-align: center;
        }

        form {
            background-color: #205db7;
            border: 1px solid white;
            border-radius: 12px;
            box-shadow: 5px 5px 5px black;
            color: white;
            margin-top: 30px;
            margin-bottom: 15px;
            padding: 10px 15px;
            width: 50%;
        }

        label {
            color: black;
        }

        .mybutton {
            background-color: #205db7;
            border: 1px solid white;
            border-radius: 12px;
            color: white;
            cursor: pointer;
            margin: 5px;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header & Navigation -->
        <header>
            <a href="index.php">
                <div class="logo">
                    <img src="images/TrainSync.png" alt="TrainSync Logo">
                </div>
            </a>

            <nav>
                <div class="navbutton">
                    <div class="navbutton"><a href="about.php">About</a></div>
                    <div class="navbutton"><a href="services.php">Services</a></div>
                    <div class="navbutton"><a href="portfolio.php">Portfolio</a></div>
                    <div class="navbutton"><a href="contact.php">Contact</a></div>
                </div>
            </nav>
        </header>

        <!-- Hero Section -->
        <main>
            <div class="herobox2">
                <img src="images/Me.png" alt="Business Logo">
            </div>


            <div class="herobox1">
                <h1>Contact Us</h1>

                <form action="sendemail.php" method="POST">
                    <label for="name">Name:</label><br>
                    <input type="text" id="name" name="name" required placeholder="Enter Name" class="form-control"><br><br>

                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email" required placeholder="Enter Email" class="form-control"><br><br>

                    <label for="message">Message:</label><br>
                    <textarea id="message" name="message" required cols="30" rows="10" placeholder="Enter your Message" class="form-control"></textarea><br><br>

                    <!-- <input type="submit" value="Submit" class="mysubmit"> -->
                    <button type="submit" name="submitContact" class="mybutton">Send Mail</button>
                </form>
            </div>
        </main>

    </div>
    <footer class="footer">
        <p>&copy; 2025 TrainSync. All Rights Reserved.</p>
    </footer>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        var messageText = "<?= $_SESSION['status'] ?? ''; ?>";
        if(messageText != '') {


        Swal.fire({
            title: "Thank you!",
            text: messageText,
            icon: "success"
        });
        
        <?php unset($_SESSION['status']); ?>

    }    
    </script>


</body>

</html>