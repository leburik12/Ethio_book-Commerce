<?php include 'includes/header.php'; ?>

<main class="row mt-4" id="main-rw">
    <section class="side-bar col-md-2">
        <div class="books">
            <h4>Categories</h4>
        </div>
        <p> <a href="allbooks.php?ct=art_and_philosophy">Arts and Philosophy</a> </p>
        <p><a href="allbooks.php?ct=biographies_and_memories">Biographies & Memories</a> </p>
        <p> <a href="allbooks.php?ct=buisness_and_money">Buisness & Money</a> </p>
        <p><a href="allbooks.php?ct=calendar">Calendar</a> </p>
        <p> <a href="allbooks.php?ct=children_books">Children's Books</a> </p>
        <p> <a href="allbooks.php?ct=christian_book_and_bibles">Christian Books & Bibles</a> </p>
        <p><a href="allbooks.php?ct=comics_and_graphicnovels">Comics & Graphic Novels</a> </p>
        <p><a href="allbooks.php?ct=computer_and_technology">Computer & Technology</a> </p>
        <p> <a href="allbooks.php?ct=history">History</a> </p>
        <p> <a href="allbooks.php?ct=law">Law</a> </p>
        <p><a href="allbooks.php?ct=literature_and_fiction">Literature & Fiction</a> </p>
        <p><a href="allbooks.php?ct=medical_and_book">Medical Books</a> </p>
        <p><a href="allbooks.php?ct=romance">Romance</a> </p>
        <p><a href="allbooks.php?ct=science_and_math">Science & Math</a> </p>
        <p><a href="allbooks.php?ct=test_and_preparation">Test and Preparation</a> </p>
        <!--                       <p> <a href="#">Test preparation</a> </p>-->
        <div>
        </div>
        <div class="condition">
            <h4>Conditions</h4>
            <div>
                <p> <a href="allbooks.php?con=new">New</a> </p>
                <p> <a href="allbooks.php?con=used">Used</a> </p>
            </div>
        </div>
        <div class="language">
            <h4>Languages</h4>
            <div>
                <p><input type="checkbox" value="english" name="lang"><span>English</span> </p>
                <p><input type="checkbox" value="amharic" name="lang"><span>Amharic</span> </p>
                <p><input type="checkbox" value="german" name="lang"><span>German</span> </p>
                <p><input type="checkbox" value="french" name="lang"><span>French</span> </p>
                <p><input type="checkbox" value="spanish" name="lang"><span>Spanish</span> </p>
                <p> <input type="checkbox" value="chinese" name="lang"><span>Chinese</span> </p>
                <p> <input type="checkbox" value="africans" name="lang"><span>Africaans</span> </p>
                <p> <input type="checkbox" value="jananese" name="lang"><span>Janpanese</span> </p>
                <p> <input type="checkbox" value="other" name="lang"><span>Other</span> </p>
            </div>
        </div>

        <!-- <div class="customer-reviews">
            <h2>Average Customer Reviews</h2>
            <p>
                <a href="#">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>&up
                </a>
            </p>
            <p>
                <a href="#">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>&up
                </a>
            </p>
            <p>
                <a href="#">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>&up
                </a>
            </p>
            <p>
                <a href="#">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>&up
                </a>
            </p>
        </div> -->
    </section>
    <section class="not-side-bar col-md-10" id="not_side_bar">
        <div id="ad_front_banner" class="m-auto">
            <h5 class="ml-3"><em>The best is for You</em></h5>
            <div class="ad_detail">
                <img src="images/book/<?php echo $premium->book_image; ?>" style="margin-left: 1rem;">
                <div class="ml-5">
                    <h5><strong><?php echo $premium->book_title; ?></strong></h5>
                    <p>By <strong><?php echo $premium->author; ?></strong></p>
                    <a href="mybook.php?t=<?php echo $premium->book_title; ?>&id=<?php echo $premium->id; ?>" class="btn btn-outline-success">View Book</a>
                </div>
            </div>
        </div>

        <div class="content ml-4">
            <div class="books_you_may_have_missed">
                <div class="d-flex">
                    <h5 class="mb-3 mr-auto item-bt">Best Rated Book</h5><span class="item-bt ">
                        <!-- <a href="#" style="color: blue;">See more </a> -->
                    </span>
                </div>
                <div class="book_card_container mb-5">
                    <?php foreach ($best_rated as $br) : ?>
                        <div class="single-book">
                            <a href="#" data-id="1">
                                <div class="card-b">
                                    <img src="images/book/<?php echo $br->book_image; ?>" style="text-align:center;">
                                    <p><strong><?php echo $br->book_title; ?></strong></p>
                                    <p><?php echo $br->author; ?></p>
                                    <p class="price item-light"> <?php if ($br->new_book_qty) {
                                                                        echo "$$br->new_book_price <span> Used</span>";
                                                                    } ?> </p>
                                    <p class="price item-light">
                                        <?php if (!empty($br->old_book_qty)) {
                                            echo "$$br->old_book_price <span> Used</span>";
                                        } ?>
                                    </p>
                                    <p class="ml-auto quantity items-left">(<?php echo $br->new_book_qty + $br->old_book_qty + $br->e_book_qty; ?>)</p>
                                    <a href="mybook.php?t=<?php echo $br->book_title; ?>&id=<?php echo $br->id; ?>" class="btn btn-outline-success">View Book</a>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!--   Hot new Releases    -->
        <div class="hot-new-releases">
            <h5 class="mb-3">Hot new Releases</h5><span><a class="href"></a></span>
            <div class="book_card_container">

                <?php if (isset($hot_new_releases) && !empty($hot_new_releases)) : ?>
                    <?php foreach ($hot_new_releases as $book) : ?>

                        <div class="single-book">
                            <a href="#" data-id="1">
                                <div class="card-b">
                                    <img src="images/book/<?php echo $book->book_image; ?>" style="text-align:center;">
                                    <div class="single-book-details" style=" background-color: white;padding: .4rem;margin-top:1rem;">
                                        <p><strong><?php echo $book->book_title; ?></strong></p>
                                        <p class="type item-light">Package Cover</p>
                                        <p class="price item-light"> <?php if ($book->new_book_qty) {
                                                                            echo "$$book->new_book_price <span> Used</span>";
                                                                        } ?> </p>
                                        <p class="price item-light">
                                            <?php if (!empty($book->old_book_qty)) {
                                                echo "$$book->old_book_price <span> Used</span>";
                                            } ?>
                                        </p>
                                        <p class="ml-auto quantity items-left">(<?php echo $book->new_book_qty + $book->old_book_qty; ?>)</p>
                                        <a href="mybook.php?t=<?php echo $book->book_title; ?>&id=<?php echo $book->id; ?>" class="btn btn-outline-success">View Book</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        </div>

        <div class="hot-new-releases">
            <h5 class="mb-3"></h5><span><a class="href"></a></span>
            <div class="book_card_container">

                <?php if (!empty($best_sellers)) : ?>
                    <?php foreach ($best_sellers as $book) : ?>
                        <div class="single-book">
                            <a href="#" data-id="1">
                                <div class="card-b">
                                    <img src="images/book/<?php echo $book->book_image; ?>" style="text-align:center;">
                                    <div class="single-book-details" style=" background-color: white;padding: .4rem;margin-top:1rem;">
                                        <p><strong><?php echo $book->book_title; ?></strong></p>
                                        <p class="type item-light">Package Cover</p>
                                        <p class="price item-light"> <?php if ($book->new_book_qty) {
                                                                            echo "$$book->new_book_price <span> Used</span>";
                                                                        } ?> </p>
                                        <p class="price item-light">
                                            <?php if (!empty($book->old_book_qty)) {
                                                echo "$$book->old_book_price <span> Used</span>";
                                            } ?>
                                        </p>
                                        <p class="ml-auto quantity items-left">(<?php echo $book->new_book_qty + $book->old_book_qty; ?>)</p>
                                        <a href="mybook.php" class="btn btn-outline-success">View Book</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
        </div>
        </div>

    </section>
</main>
<?php include 'includes/footer.php'; ?>