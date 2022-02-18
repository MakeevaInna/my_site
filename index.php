<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>VitaWorld</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<div class="wrapper">
    <div class="content">
        <header class="header">
            <div class="header-logo">
                <img src="images/logo.png" alt="Logo"/>
                <h2>VitaWorld</h2>
            </div>
            <div class="header-search">
                <form class="search">
                    <label class="search-label">
                        <input class="search-input" type="text" placeholder=" Пошук"/>
                        <img class="search-icon" src="images/search.png" alt="Search"/>
                    </label>
                </form>
            </div>
            <div class="header-links">
                <nav class="nav-header">
                    <a href="#">063-663-33-33</a>
                    <a href="#">Оплата</a>
                    <a href="#">Доставка</a>
                    <a href="#">Контакти</a>
                    <a href="authorization.php"><img id="user" src="images/user.png" alt="user-profile"/></a>
                    <a href="shopping-cart.php"><img id="cart" src="images/shopping-cart.png" alt="shopping-cart"/></a>
                </nav>
            </div>
        </header>
        <div class="sale">
            <a href="#"><img src="images/sale.png" alt="Sale"/></a>
        </div>
        <div class="products">
            <div class="vitamins">
                <a href="#"><img src="images/vitamins.jpeg" alt="Vitamins"/></a>
                <a href="#"><h2>Вітаміни</h2></a>
                <ul>
                    <li><a href="products/vitaminA.php">Вітамін A</a></li>
                    <li><a href="products/vitaminE.php">Вітамін Є</a></li>
                    <li><a href="products/vitaminD.php">Вітамін D</a></li>
                </ul>
            </div>
            <div class="minerals">
                <a href="#"><img src="images/minerals.jpeg" alt="Minerals"/></a>
                <a href="#"><h2>Mінерали</h2></a>
                <ul>
                    <li><a href="#">Магній</a></li>
                    <li><a href="#">Селен</a></li>
                    <li><a href="#">Цинк</a></li>
                </ul>
            </div>
            <div class="other">
                <a href="#"><img src="images/other.png" alt="Other"/></a>
                <a href="#"><h2>Інші добавки</h2></a>
                <ul>
                    <li><a href="#">Ашваганда</a></li>
                    <li><a href="#">Колаген</a></li>
                    <li><a href="#">Риб'ячий жир</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer"></div>
    <hr class="footer-hr"/>
    <footer>
        <div class="footer-info">
            <p>©2022 VitaWorld. Авторські права зареєстровані і охороняються законом!</p>
            <div class="networks">
                <p>Ми у соціальних мережах:</p>
                <a href="#"><img class="networks-img1" src="images/instagram.png" alt="instagram"/></a>
                <a href="#"><img class="networks-img2" src="images/telegram.png" alt="telegram"/></a>
                <a href="#"><img class="networks-img3" src="images/viber.png" alt="viber"/></a>
            </div>
        </div>
    </footer>
    <hr class="footer-hr"/>
    <div class="footer-logo">
        <img class="footer-img" src="images/f.png" alt="logo"/>
    </div>
</div>
</body>
</html>
