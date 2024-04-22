<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership Area</title>
    <style>
        /* CSS styles go here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        main {
            padding: 20px;
        }
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome To The Membership Page! </h1>
    </header>

    <main>
        <section id="delivery">
            <h2>Delivery Option</h2>
            <p>Would you like your rental car delivered to your location?</p>
            <form action="#" method="post">
                <label for="delivery_option">Select Delivery Option:</label>
                <select name="delivery_option" id="delivery_option">
                    <option value="yes">Yes, I want delivery</option>
                    <option value="no">No, I'll pick it up myself</option>
                </select>
                <input type="submit" value="Submit">
            </form>
        </section>

        <section id="offers_coupons">
            <h2>Offers and Coupons</h2>
            <p>Check out our latest offers and coupons for exclusive discounts!</p>
        </section>

        <section id="specialized_advisor">
            <h2>Connect with a Specialized Advisor</h2>
            <p>Need assistance or have special requirements? Connect with our specialized advisors for personalized service.</p>
        </section>
    </main>

    <footer>
        <p>Contact Information</p>
        <p>Email: info@tmrsrentcars.com</p>
        <p>Phone: +123-456-7890</p>
    </footer>
</body>
</html>
