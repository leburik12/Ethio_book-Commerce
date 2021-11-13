<?php header("Access-Control-Allow-Origin: *"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="<?php echo BASE_URI . '/templates/css/custome_2.css'; ?>" rel="stylesheet">
    <link href="<?php echo BASE_URI . '/templates/css/style.css'; ?>" rel="stylesheet">
    <link href="<?php echo BASE_URI . '/templates/css/bootstrap.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo BASE_URI . '/templates/css/custom.css'; ?>" rel="stylesheet">
    <link href="<?php echo BASE_URI . '/templates/css/fontawesome-free-5.12.0-web/css/all.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo BASE_URI . '/templates/css/fontawesome-free-5.12.0-web/css/fontawesome.min.css'; ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URI . '/templates/css/detail_book_style.css'; ?>">
    <script src="<?php echo BASE_URI . '/templates/js/jquery-3.4.1.min.js'; ?>"></script>

    <style>
        .nav_t {
            font-size: 1rem;
        }

        a:hover {
            text-decoration: none;
        }

        .me_sending {
            margin: .2rem;
            position: relative;
            left: 180px;
            border: 1px solid rgb(205, 219, 219);
            border-radius: 4px;
        }

        .income_m {
            margin: .2rem;
            border: 1px solid rgb(205, 219, 219);
        }
    </style>
</head>

<body>
    <!-- Nav bar   -->
    <div id="nav-bar">
        <nav class="main-nav-bar">
            <a href="index.php">
                <p class="logo">
                    <span id="text-logo"><strong style="font-size:1.5rem;"><span style="color: #3AFFC3; ">ET</span>HIO<span style="color: #3AFFC3;"></span> BOOKS</strong></span>
                </p>
            </a>
            <div class="search_wrapper">
                <div id="main-search">
                    <!--                  <i class="fa fa-angle-down"></i>-->
                    <select id="header_search_catg">
                        <option value="" selected disabled>categories</option>
                        <option value="art_and_philosophy"> Arts and Philosophy</option>
                        <option value="biographies_and_memories">Biographies & Memories </p>
                        <option value="buisness_and_money"> Buisness & Money </option>
                        <option value="calendar">Calendar</option>
                        <option value="children_books"> Children's Books </option>
                        <option value="christian_book_and_bibles"> Christian Books & Bibles </option>
                        <option value="comics_and_graphicnovels">Comics & Graphic Novels </option>
                        <option value="computer_and_technology">Computer & Technology</option>
                        <option value="Cookbooks, Food & Wine">Cookbooks, Food & Wine</option>
                        <option value="history"> History</option>
                        <option value="law"> Law </option>
                        <option value="literature_and_fiction">Literature & Fiction</option>
                        <option value="medical_and_book">Medical Books</option>
                        <option value="romance">Romance </option>
                        <option value="science_and_math">Science & Math</option>
                        <!--           <option value="test">Test preparation</option>-->
                    </select>
                    <input type="search" id="search_books" placeholder="search">
                    <span class="yellow"></span>
                </div>
            </div>

            <p class="cart">
                <a href="cart.php">
                    <i class="fa fa-cart-plus">
                        <span class="item-quantity">
                            <?php if (isset($_SESSION['total_qty'])) {
                                echo $_SESSION['total_qty'];
                            } else {
                                echo 0;
                            } ?>
                        </span>
                    </i>
                </a>
            </p>

        </nav>

        <div class="nav-bar">
            <ul>
                <li>
                    <?php if (isset($_SESSION['logged_in'])) : ?>
                        <a style="color: white;" class="nav_t">Hello <span style="font-style: italic;"><?php echo $_SESSION['user_name']; ?></span>&nbsp;&nbsp;&nbsp;</a>
                        <a href="logout.php" class="nav_t">Logout</a>
                    <?php else : ?>
                        <a href="login.php" class="nav_t">Log-In</a>
                        <a href="signup.php" class="nav_t">Sign Up</a>
                    <?php endif; ?>

                </li>

                <li>
                    <?php if (isset($_SESSION['is_seller'])) : ?>
                        <a href="dashboard.php" class="nav_t">DashBoard</a> &nbsp;&nbsp;&nbsp;
                        <a href="sell.php" class="nav_t">Post Product</a>
                    <?php elseif (isset($_SESSION['is_admin']) && !empty($_SESSION['is_admin']) && $_SESSION['is_admin'] == 't') : ?>
                        <a class="nav_t" href="admin.php">Admin</a>&nbsp;&nbsp;
                        <a class="nav_t" href="dashboard.php">DashBoard</a>&nbsp;&nbsp;
                        <a class="nav_t" href="sell.php">Sell</a>
                    <?php else : ?>
                        <a class="nav_t" href="seller_login.php">Seller Login | </a>
                        <a class="nav_t" href="seller_form.php">SignUp</a>
                    <?php endif; ?>
                </li>

                <li>
                    <a href="#" class="nav_t">New Releases</a>
                </li>
                <li>
                    <a href="#" class="nav_t"> Customer Service</a>
                </li>
                <li>
                    <?php if (isset($_SESSION['is_author']) && ($_SESSION['is_author'] == 1)) : ?>
                        <a href="authors.php?un=<?php echo $_SESSION['user_name']; ?>" class="nav_t">Author Profile</a>
                    <?php else : ?>
                        <a href="author_signup.php" class="nav_t"> Author Signup</a>
                    <?php endif; ?>

                </li>
                <li>
                    <a href="#" class="nav_t">Contact</a>
                </li>
            </ul>
        </div>
    </div>