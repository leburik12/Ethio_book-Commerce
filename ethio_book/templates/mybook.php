<?php include('includes/header.php'); ?>
<?php displayMessage(); ?>
<div class="detail_wrapper row" id="detail_wrap">
    <div class="books_detail col-md-7 col-xs-12">
        <div class="image_reviews_detail">
            <div class="mr-3 ">
                <img src="images/book/<?php echo $book->book_image; ?>">
            </div>
            <div class=" book-title-so">
                <p style="font-size:1.3rem;font-weight: bold;"><?php echo $book->book_title; ?> </p>
                <p><span>Created : </span><span style="color:blueviolet"><?php echo $book->created; ?></span></p>
                <p> <span>Author : </span> <a href="#"><?php echo $book->author; ?></a></p>
                <p>
                    <span>rating:</span> &nbsp;&nbsp;<span> <?php echo $book->rating; ?> </span>
                </p>
                <p class="bg-light"><span></span>New Book Price&nbsp; : &nbsp;$<?php echo $book->new_book_price; ?> &nbsp; &nbsp; <?php echo $book->new_book_qty; ?></p>
                <p class="bg-light"><span></span>Used Book Price : &nbsp;$<?php echo $book->old_book_price; ?> &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $book->old_book_qty; ?></p>
                <p class="bg-light"><span></span>E-Book Price&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp;$<?php echo $book->e_book_price; ?> &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $book->e_book_qty; ?></p>
                <div class="review">
                    <h5>Review</h5>
                    <p class="book-description">
                        <?php echo $book->description; ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="pro_de">
            <h5 class="mb-3">Product Details</h5>
            <p><strong>Item Weight: </strong><span>45g</span></p>
            <p><strong>Hardcover : </strong><span>4342 pages</span></p>
            <p><strong>Language : </strong><span>English</span></p>
            <p><strong>Ratings : </strong>
                <span>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <span><span id="rating_real_value"><?php echo $book->rating; ?></span> rating</span>
                </span>
            </p>
            <?php if (isset($_SESSION['user_id'])) : ?>
                <div>
                    <p>Rate Book : </p>
                    5 <input type="radio" name="rt" class="rt" data-rt="5" data-id="<?php echo $book->id; ?>">&nbsp;&nbsp;
                    4 <input type="radio" name="rt" class="rt" data-rt="4" data-id="<?php echo $book->id; ?>">&nbsp;&nbsp;
                    3 <input type="radio" name="rt" class="rt" data-rt="3" data-id="<?php echo $book->id; ?>">&nbsp;&nbsp;
                    2 <input type="radio" name="rt" class="rt" data-rt="2" data-id="<?php echo $book->id; ?>">&nbsp;&nbsp;
                    1 <input type="radio" name="rt" class="rt" data-rt="1" data-id="<?php echo $book->id; ?>">&nbsp;&nbsp;
                </div>
            <?php endif; ?>
        </div>
        <?php if (isset($_SESSION['user_id'])) : ?>
            <?php if (!empty($reviews)) : ?>

                <div id="commenting" style="
          height: 400px;
          overflow: auto;
        ">
                    <div class="text_div_messages mt-4" id="msg_box">
                        <?php foreach ($reviews as $review) : ?>
                            <div <?php if ($review->user_name == $_SESSION['user_name']) : ?> class="income_m" <?php else : ?> class="me_sending" <?php endif; ?>>
                                <p>
                                    <?php echo $review->user_name; ?>
                                    &nbsp;&nbsp;<span style="color:brown"><?php echo $review->created; ?></span><br>
                                </p>
                                <p><?php echo $review->body; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="review_b">
                        <button class="btn btn-outline-primary" id="give_review" style=" margin: auto;text-align:center;">Send</button>
                    </div>
                </div>
            <?php else : ?>
                <h6 class="my-4">Be the first to give a review</h6>
                <div class="form-group">
                    <input type="text" class="form-control" id="review_b">
                    <button class="btn btn-outline-primary mt-2" id="give_review" style=" margin: auto;text-align:center;">Send</button>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <div class="buy_book col-md-5 col col-xs-12">
        <div>
            <form action="cart.php" method="POST">
                <div class="form-group">
                    <label>
                        Format :
                    </label>
                    <select name="book_format_choice" id="" class="form-control">
                        <option selected disabled>book format</option>
                        <?php if ($book->e_book_qty > 0) {
                            echo "<option value='e_book'>E-Book</option>";
                        } ?>
                        <?php if (($book->new_book_qty) > 0) {
                            echo "<option value='hardcover'>harcover</option>";
                        } ?>
                        <?php
                        if ($book->old_book_qty > 0) {
                            echo "<option value='used_book'>Used</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>
                        Add Coupon ( if ) :
                    </label>
                    <input class="form-control" type="text" name="coupon">
                    <input type="number" name="nbp" hidden value="<?php echo $book->new_book_price; ?>">
                    <input type="number" name="obp" hidden value="<?php echo $book->old_book_price; ?>">
                    <input type="number" name="ebp" hidden value="<?php echo $book->e_book_price; ?>">
                    <input type="text" name="book_image" hidden value="<?php echo $book->book_image; ?>">
                    <input type="text" name="book_title" hidden value="<?php echo $book->book_title; ?>">
                    <input type="text" name="file_name" hidden value="<?php echo $book->file_name; ?>">
                </div>
                <div>
                    <label>
                        Quantity
                    </label><br>
                    <input class="form-control" id="new_book_qty" <?php if ($book->new_book_qty == 0)
                                                                        echo "disabled"; ?> name="new_book_qty" placeholder="New Book Quantity" type="number" min="0" max="300"><br>
                    <input class="form-control" <?php if ($book->old_book_qty == 0)
                                                    echo "disabled"; ?> id="old_book_qty" name="used_book_qty" placeholder="Used Book Quantity" type="number" min="0" max="300"><br>
                    <input class="form-control" <?php if ($book->e_book_qty == 0)
                                                    echo "disabled"; ?> id="e_book_qty_q" name="e_book_qty" placeholder="e Book Quantity" type="number" min="0" max="300">
                </div>
                <p>Total : $
                    <span id="total_cost">0.0</span>
                </p>
                <p>Arrives : Nov 23 - 90</p>
                <input type="hidden" id="book_hidden_id" name="book_id" value="<?php echo $book->id; ?>">
                <button type="submit" class="btn btn-warning" name="add_to_cart">Add to Cart</button>
                <button type="submit" class="btn btn-success" name="add_buy_now">Buy Now</button>
            </form>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>