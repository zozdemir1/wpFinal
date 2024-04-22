<?php
    include 'function.php';

    $pdo = pdo_connect_mysql();

    $stmt = $pdo->prepare('SELECT * FROM tmrs_contacts');
    $stmt->execute();
    $tmrs_contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Do+Hyeon&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>TMRS</title>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar-1">
        <img src="pictures/contact.webp" alt="photo">
        <h1 class="Header-1">TMRS RENT CARS</h1>
    </div>
    <div class="navbar-2">
        <ul>
            <li><a href="index.php">HomePage  ></a></li>
            <li><a href="read.php">Contact Us ></a></li>
        </ul>
    </div>

    <!-- About Us --
    <div class="company-description container">
        <h1 style="color:white;">About Us</h1>
        <p style="color: white;" >Hi there! My name is Zeynep Ozdemir. I had a lot of fun in this web programming class. It taught me the essentials of html, php, and more skills in programmingThis is my Web Programming Final Project. TMRS (The Modern Rental Service) is a leading car rental company committed to providing high-quality rental services to customers around the globe. With a wide range of brands and models, we offer convenient and reliable transportation solutions to suit every need. Whether you're traveling for business or pleasure, TMRS is here to make your journey enjoyable and hassle-free.</p>
    </div>

    <!-- Contact -->
    <div class="contact container" style="color: white;">
        <h1>Contact Us</h1>
<!-- Membership -->
    <div class="about-section">
        <h2>About Us</h2>
        <div class="about-content">
            <p> Hi there! My name is Zeynep Ozdemir. This is my Web Programming Final Project. I had a lot of fun in this web programming class. It taught me the essentials of html, php, and more skills in programming. TMRS (The Modern Rental Service) is my project and it is basically a car rental website with a wide range of brands and models, this website shows and offers convenient and reliable transportation solutions to suit every need. I chose this project because it incorporates everything I have learned until now. It took much longer than I thought. But I think it tturned out great. I pulled  information from a custom database table, used javascript, have a premium membership area, and overall I think the theme goes well altogether.  </p>
        </div>
    </div>
    
    <!-- Membership -->
    <div class="membership-section">
        <h2>Membership</h2>
<p><a href="login.php">Login</a> to your account.</p>
        <div class="membership-content">
            <p>Become a member today and enjoy exclusive benefits and discounts on our car rental services.</p>
        </div>
    </div>

    <!-- Contact Information -->
    <div class="contact-info-section">
        <h2>Contact Information</h2>
        <div class="contact-info-content">
            <p>For inquiries or assistance, please contact us at:</p>
            <p>Email: info@tmrsrentcars.com</p>
            <p>Phone: +123-456-7890</p>
        </div>
    </div>

        <button type="button" class="btn btn-success btnedit" onclick="location.href='create.php';">Rent a Car</button>
        <!-- Contact Table -->
        <table class="table" style="color: black;">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>Surname</td>
                    <td>Brand</td>
                    <td>Model</td>
                    <td>Phone</td>
                    <td>Message</td>
                    <td>Date</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tmrs_contacts as $tmrs_contact): ?>
                    <tr>
                        <td><?= $tmrs_contact['id'] ?></td>
                        <td><?= $tmrs_contact['name'] ?></td>
                        <td><?= $tmrs_contact['surname'] ?></td>
                        <td><?= $tmrs_contact['brand'] ?></td>
                        <td><?= $tmrs_contact['model'] ?></td>
                        <td><?= $tmrs_contact['phone'] ?></td>
                        <td><?= $tmrs_contact['message'] ?></td>
                        <td><?= $tmrs_contact['date'] ?></td>
                        <td class="actions">
                            <a href="update.php?id=<?= $tmrs_contact['id'] ?>" class="edit"><i class="fas fa-pen"></i></a>
                            <a href="delete.php?id=<?= $tmrs_contact['id'] ?>" class="trash"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
