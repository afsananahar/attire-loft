<?php
session_start();
include 'db.php';


if (!isset($_SESSION['user'])) {
    header("Location: login.html");
    exit();
}


$username = isset($_SESSION['user']['name']) ? $_SESSION['user']['name'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attire Loft - Homepage</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f9c7d9;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            background-color: #ff85a2;
            border-radius: 30px;
            margin: 20px;
        }

        .logo h1 {
            color: #ffea00;
            font-size: 36px;
            font-weight: bold;
        }

        .menu-bar {
            display: flex;
            gap: 15px;
            font-size: 18px;
            color: #fff;
        }

        .menu-bar a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }

        .menu-bar a:hover {
            color: #ffea00;
        }

        .search-bar {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-bar input {
            padding: 10px;
            border-radius: 15px;
            border: none;
            width: 200px;
        }

        .search-bar button {
            background-color: #fff;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            padding: 10px;
        }

        .cart-menu button {
            background-color: transparent;
            border: none;
            font-size: 24px;
            cursor: pointer;
            margin-left: 10px;
        }

        .cart-menu button:hover {
            color: #ff5b8d;
        }

        .categories {
            display: flex;
            justify-content: space-around;
            margin: 20px;
        }

        .category {
            text-align: center;
        }

        .category img {
            width: 200px;
            height: 250px;
            border-radius: 15px;
            object-fit: cover;
            cursor: pointer;
        }

        .category button {
            margin-top: 10px;
            background-color: #ff85a2;
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 15px;
            cursor: pointer;
            font-weight: bold;
        }

        .category button:hover {
            background-color: #ff5b8d;
        }

        .expandable-section {
            display: none;
            margin: 20px;
            text-align: center;
            background-color: #ffdde5;
            padding: 20px;
            border-radius: 15px;
        }

        .expandable-section img {
            width: 150px;
            height: 200px;
            margin: 10px;
            border-radius: 10px;
            object-fit: cover;
        }

        .expandable-section .item {
            display: inline-block;
            margin: 10px;
            text-align: center;
        }

        .expandable-section .item p {
            margin-top: 5px;
            font-size: 16px;
            font-weight: bold;
        }

        .close-btn {
            margin-top: 10px;
            background-color: #ff85a2;
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 15px;
            cursor: pointer;
            font-weight: bold;
        }

        .close-btn:hover {
            background-color: #ff5b8d;
        }

        .form-container {
            text-align: center;
            margin: 20px auto;
        }

        .form-container form {
            display: inline-block;
            text-align: left;
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-container input {
            display: block;
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container button {
            display: block;
            width: 100%;
            background-color: #ff85a2;
            border: none;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .form-container button:hover {
            background-color: #ff5b8d;
        }
        
    </style>
    <script>
        function toggleSection(sectionId) {
            const sections = document.querySelectorAll('.expandable-section');
            sections.forEach(section => {
                if (section.id === sectionId) {
                    section.style.display = section.style.display === 'block' ? 'none' : 'block';
                } else {
                    section.style.display = 'none';
                }
            });
        }
    </script>
</head>
<body>
    <div class="header">
        <div class="logo">
            <h1>ATTIRE LOFT</h1>
            <form action="homepage.php" method="post"></form>
        </div>
        
        <div class="cart-menu">
            <button onclick="toggleSection('cart-section')">🛒</button>
            <button onclick="toggleSection('profile-section')">👤</button>
            <button onclick="toggleSection('menu-section')">☰</button>
        </div>
    </div>

    <div id="categories" class="categories">
        <div class="category">
            <img src="women.jpg" alt="Women" onclick="toggleSection('women-section')">
            <button onclick="toggleSection('women-section')">WOMENS</button>
        </div>
        <div class="category">
            <img src="men.jpg" alt="Men" onclick="toggleSection('men-section')">
            <button onclick="toggleSection('men-section')">MEN</button>
        </div>
        <div class="category">
            <img src="kids.jpg" alt="Kids" onclick="toggleSection('kids-section')">
            <button onclick="toggleSection('kids-section')">KIDS</button>
        </div>
    </div>

    <div id="women-section" class="expandable-section">
        <h2>Women's Collection</h2>
        <div class="item">
            <img src="women1.jpg" alt="Women 1">
            <p>500</p>
        </div>
        <div class="item">
            <img src="women2.jpg" alt="Women 2">
            <p>600</p>
        </div>
        <div class="item">
            <img src="women3.jpg" alt="Women 3">
            <p>745</p>
        </div>
        <button class="close-btn" onclick="toggleSection('women-section')">Close</button>
    </div>

    <div id="men-section" class="expandable-section">
        <h2>Men's Collection</h2>
        <div class="item">
            <img src="men.jpg" alt="Men 1">
            <p>955</p>
        </div>
        <div class="item">
            <img src="men2.jpg" alt="Men 2">
            <p>665</p>
        </div>
        <div class="item">
            <img src="men3.jpg" alt="Men 3">
            <p>750</p>
        </div>
        <button class="close-btn" onclick="toggleSection('men-section')">Close</button>
    </div>

    <div id="kids-section" class="expandable-section">
        <h2>Kids' Collection</h2>
        <div class="item">
            <img src="kids1.jpg" alt="Kids 1">
            <p>830</p>
        </div>
        <div class="item">
            <img src="kids2.jpg" alt="Kids 2">
            <p>540</p>
        </div>
        <div class="item">
            <img src="kid3.jpg" alt="Kids 3">
            <p>935</p>
        </div>
        <button class="close-btn" onclick="toggleSection('kids-section')">Close</button>
    </div>

    <div id="profile-section" class="expandable-section">
        <h2>User Profile</h2>
        <p>Welcome, <?php echo htmlspecialchars($username); ?>!</p>
        <p><a href="logout.html">Logout</a></p>
        <button class="close-btn" onclick="toggleSection('profile-section')">Close</button>
    </div>

    <div id="cart-section" class="expandable-section">
        <h2>Shopping Cart</h2>
        <p>No items in the cart yet.</p>
        <button class="close-btn" onclick="toggleSection('cart-section')">Close</button>
    </div>

    <div id="menu-section" class="expandable-section">
        <h2>Menu</h2>
        <p><a href="homepage.html">Home</a></p>
        <p><a href="login.html">Login</a></p>
        <p><a href="signup.html">Sign Up</a></p>
        <p><a href="cart.html">Cart Menu</a></p>
        <p><a href="payment.html">Payment</a></p>
        <p><a href="logout.html">Logout</a></p>
        <button class="close-btn" onclick="toggleSection('menu-section')">Close</button>
    </div>
</body>
</html>
