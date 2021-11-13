<?php include('includes/header.php'); ?>

<?php displayMessage(); ?>
<div class="edit_sellers_book">
    <div>
        <h5 class="ml-5"> Edit <span style="color:blueviolet"><?php echo $book->book_title; ?></span></h5>
        <div>
            <div class="row">
                <div class="col-md-5 mt-3 ml-5">
                    <div class="ml-4">
                        <h6>Edit Images</h6>
                        <div class="">
                            <img id="book_profile" src="images/book/<?php echo $book->book_image; ?>" class="mb-2"> <br>
                            <?php if ($book->book_image != 'no_image.jpeg') : ?>
                                <p class="btn btn-outline-danger " id="delete_image" data-id="<?php echo $book->id; ?>" class="mt-2">Delete Image</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <p>Ethio Books has come with several market Options</p>
                    <div>
                        <ol>
                            <li>
                                <ul>
                                    <li class="bold">Advertising option with different packages</li>
                                    <li class="bold">for 5 days 200birr</li>
                                    <li class="bold">for 7 days 30birr</li>
                                    <li class="bold">for 9 days 400birr</li>
                                    <li class="bold">for 12 days 500birr</li>
                                </ul>
                            </li>
                            <li>
                                Meet Other Suppliers for making your products international
                            </li>
                            <li>
                                Meet professional Marketing and sales persons
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="col-md-6 mt-5">
                    <h5>Edit Book information and submit</h5>
                    <form method="post" action="edit_book.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Change the profile picture of book</label>
                            <input type="file" class="form-control" name="book_profile" id="change_book_profile">
                        </div>
                        <div class="form-group">
                            <label>Post Image or Video</label>
                            <input type="file" class="from-control" multiple name="book_files">
                            <small class="form-text text-muted">The image or video can be multiple</small>
                        </div>
                        <div class="form-group">
                            <label for="">Book Category</label>
                            <select class="form-control" name="book_catg">
                                <option value="" disabled selected>Book Category</option>
                                <option value="art_and_philosophy">Arts and Philosophy</option>
                                <option value="biographies_and_memories">Biographies & Memories</option>
                                <option value="buisness_and_money">Buisness & Money</option>
                                <option value="calendar">Calendar</option>
                                <option value="children_books">Children's Books</option>
                                <option value="christian_book_and_bibles">Christian Books & Bibles</option>
                                <option value="comics_and_graphicnovels">Comics & Graphic Novels</option>
                                <option value="computer_and_technology">Computer & Technology</option>
                                <option value="history">History</option>
                                <option value="law">Law</option>
                                <option value="literature_and_fiction">Literature & Fiction</option>
                                <option value="medical_and_book">Medical Books</option>
                                <option value="romance">Romance</option>
                                <option value="science_and_math">Science & Math</option>
                                <option value="sport_and_outdoor">Sport & Outdoors</option>
                                <option value="test_and_preparation">Test preparation</option>
                            </select>
                            <small class="form-text text-muted">Categories must be selected</small>
                        </div>
                        <input type="text" hidden value="<?php echo $book->book_category; ?>" name="book_c">
                        <div class="form-group">
                            <label for="">Book Title</label>
                            <input class="form-control" type="text" name="book_title" placeholder="book title" value="<?php echo $book->book_title; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Book Author</label>
                            <input class="form-control" type="text" name="author" placeholder="book author" value="<?php echo $book->author; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Book Page</label>
                            <input class="form-control" type="number" name="book_page" placeholder="book pages" value="<?php echo $book->page; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Used Book Quantity</label>
                            <input class="form-control" type="number" name="old_book_qty" placeholder="used book quantity" min=0 max=30000 value="<?php echo $book->old_book_qty; ?>">
                            <label for="">Price (used book)</label>
                            <input type="number" name="old_book_price" value="<?php echo $book->old_book_price; ?>" max=30000 min=0>
                            <small class="form-text text-muted">only if the books are used </small>
                        </div>
                        <div class="form-group">
                            <label for="">New Book Quantity</label>
                            <input class="form-control" type="number" name="new_book_qty" placeholder="new book quantity" value="<?php echo $book->new_book_qty; ?>">
                            <label for="">Price (New book)</label>
                            <input type="number" name="new_book_price" value="<?php echo $book->new_book_price; ?>" max=30000 min=0>
                            <small class="form-text text-muted">new books quantity only</small>
                        </div>
                        <input type="text" name="id" hidden value="<?php echo $_GET['id']; ?>">
                        <div class="form-group">
                            <label for="">Coupon</label>
                            <input class="form-control" type="text" name="coupon" placeholder="Coupon" value="<?php echo $book->coupon; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Discount</label>
                            <input class="form-control" type="number" name="discount" placeholder="Discount in %" value="<?php echo $book->discount; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Book Description</label>
                            <textarea class="form-control" name="des" rounded-0><?php echo $book->description; ?></textarea>
                            <small class="form-text text-muted">Providing a book description will make your book more rated</small>
                        </div>
                        <input type="number" name="book_id" hidden value="<?php echo $book->id; ?>">
                        <input type="text" hidden value="<?php echo $_SESSION['user_id']; ?>" name="seller_id">
                        <input type="submit" name="edit_book" value="Change" class="btn btn-primary mb-4">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>