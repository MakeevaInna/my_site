<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title><?php $title ?></title>
    <link rel="stylesheet" href="styles/style.css"/>
</head>
<body>
<div class="wrapper">
    <div class="content">
        <header class="header">
            <div class="header-logo">
                <img src="images/images-main/logo.png" alt="Logo"/>
                <h2>VitaWorld</h2>
            </div>
            <div class="header-search">
                <form class="search" action="search" method="get">
                    <label class="search-label">
                        <input class="search-input" type="text" name="id" placeholder=" Пошук"/>
                        <button class="search-button" type="submit"><img class="search-icon" src="images/images-main/search.png" alt="Search"/></button>
                        <!---<a href="search"><img class="search-icon" src="images/images-main/search.png" alt="Search"/></a>-->
                    </label>
                </form>
            </div>
            <div class="header-links">
                <nav class="nav-header">
                    <a href="#">063-663-33-33</a>
                    <a href="#">Оплата</a>
                    <a href="#">Доставка</a>
                    <a href="#">Контакти</a>
                    <a href="login"><img id="user" src="images/images-main/user.png"
                                                     alt="user-profile"/></a>
                    <a href="shopping-cart.php"><img id="cart" src="images/images-main/shopping-cart.png"
                                                     alt="shopping-cart"/></a>
                </nav>
            </div>
        </header>

<?=$content?>

    </div>
    <div class="footer">
        <hr class="footer-hr"/>
        <footer>
            <div class="footer-info">
                <p>©2022 VitaWorld. Авторські права зареєстровані і охороняються законом!</p>
                <div class="networks">
                    <p>Ми у соціальних мережах:</p>
                    <a href="#"><img class="networks-img1" src="images/images-main/instagram.png" alt="instagram"/></a>
                    <a href="#"><img class="networks-img2" src="images/images-main/telegram.png" alt="telegram"/></a>
                    <a href="#"><img class="networks-img3" src="images/images-main/viber.png" alt="viber"/></a>
                </div>
            </div>
        </footer>
        <hr class="footer-hr"/>
        <div class="footer-logo">
            <img class="footer-img" src="images/images-main/f.png" alt="logo"/>
        </div>
    </div>
</div>
</body>
</html>

