<?php include('includes/header.php'); ?>

<div id="po">
    <div class="pop_up">
        <div class="inner_popup">
            <h5 class="mb-3">You Want to delete this item?</h5>
            <div>
                <button id="delete_no" class="btn btn-success mr-5">No</button>
                <button id="delete_yes" class="btn btn-danger">Yes</button>
            </div>
        </div>
    </div>
</div>

<div id="dashboad_seller">
    <div class="filters" id="dashboad_seller_filter">
        <p>
            <a href="edit_seller.php" class="btn btn-outline-success">Edit Profile</a>
        </p>

        <ul id="dashboard_ul">
            <li>
                <a href="#" class="btn btn-outline-success">All Books</a>
            </li>
            <li>
                <a href="#" class="btn btn-outline-success">Sold Books</a>
            </li>
            <li>
                <a href="#" class="btn btn-outline-success">Statistics</a>
            </li>
            <li>
                <a href="#" class="btn btn-outline-success">Sold Books</a>
            </li>
        </ul>

    </div>

    <div>

        <div>
            <div id='book_items_seller' class="bis">

                <?php if (!empty($books)) : ?>
                    <?php foreach ($books as $book) : ?>
                        <div class="book-item-seller">
                            <img class="dash_image" src="<?php echo BASE_URI; ?>/images/book/<?php echo $book->book_image; ?>" />
                            <div class="book-item-seller-inner">
                                <h6 style="font-weight: bold;"><?php echo $book->book_title; ?></h6>
                                <p><span style="color:blueviolet">Review </span>- <?php echo !empty($book->review) ? $book->review : "0"; ?></p>
                                <p><span style="color:blueviolet">Rating </span>- <?php echo !empty($book->rating) ? $book->rating : "0"; ?></p>
                                <p><span style="color:blueviolet">Sold </span> - <?php echo !empty($book->sold) ? $book->sold : "0"; ?></p>
                                <p><span style="color:blueviolet">Old Book Price</span> - <input data-id="<?php echo $book->id; ?>" id="dashboard_obp" style="width: 50px; margin-bottom: 5px;" type="number" value="<?php echo $book->old_book_price; ?>">
                                    <br> <span style="color:blueviolet">New Book Price</span> - <input data-id="<?php echo $book->id; ?>" id="dashboard_nbp" style="width: 50px; margin-bottom: 5px;" type="number" value="<?php echo $book->new_book_price; ?>">
                                    <br><span style="color:blueviolet">E-book Price</span> - <input data-id="<?php echo $book->id; ?>" id="dashboard_ebp" style="width: 50px" type="number" value="<?php echo $book->e_book_price; ?>">
                                </p>
                                <p><span style="color:blueviolet">Remaining - <?php echo (int)($book->old_book_price) + (int)($book->new_book_price); ?></span></p>
                            </div>

                            <div class="book-item-seller-inner">
                                <a href="edit_book.php?id=<?php echo $book->id; ?>" class='btn btn-outline-success'>Edit</a>
                                <p class="delete_book btn btn-outline-danger mt-3" data-id="<?php echo $book->id; ?>">Delete</p>
                                <br>
                                <p class="authors_page btn btn-outline-success" data-id="<?php echo $book->id; ?>">Authors page</p>
                            </div>
                        </div>
                    <?php endforeach; ?>
            </div>
        <?php else : ?>
            <div class=" alert alert-danger" style="margin-bottom: 9.34rem;">No Book Selled yet.
            </div>
        <?php endif; ?>
        </div>

    </div>
</div>

<?php include('includes/footer.php'); ?>