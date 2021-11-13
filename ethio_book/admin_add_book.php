<?php include('includes/header.php'); ?>
<div class="sell_form " style="margin: 3rem 5rem 5rem 5rem">
    <h5 class="mb-4">Sell Your Product here</h5>
    <form method="post" action="sell.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Book Category</label>
            <select class="form-control" required name="book_catg">
                <option value="" disabled selected>Book Category</option>
                <option value="art_and_philosophy">Arts and Philosophy</option>
                <option value="biographies_and_memories">Biographies & Memories</option>
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

        <div class="form-group">
            <label for="">Select Language</label>
            <select name="language" required class="form-control">
                <option value="English">English</option>
                <option value="France">France</option>
                <option value="deutch">Deutch</option>
                <option value="chiness">Chiness</option>
                <option value="korea">Korea</option>
                <option value="amharic">Amharic</option>
            </select>
        </div>

        <div class="form-group">
            <label for="">Book Format</label>
            <select name="format" id="" required class="form-control">
                <option value="#" selected disabled>Select Book Format</option>
                <option value="hard_cover">Hard Cover</option>
                <option value="e_book">E-Book</option>
                <option value="paper_back">Paper-Back</option>
            </select>
        </div>

        <div class="form-group">
            <label for="">Book Title</label>
            <input class="form-control" type="text" name="book_title" placeholder="book title">
        </div>

        <div class="form-group">
            <label for="">Book Author</label>
            <input class="form-control" type="text" name="book_author" placeholder="book author">
        </div>

        <div class="form-group">
            <label for="">Book Page</label>
            <input class="form-control" type="number" name="book_page" placeholder="book pages">
        </div>

        <div class="form-group">
            <label for="">Used Book Quantity</label>
            <input class="form-control" type="number" name="old_book_qty" placeholder="used book quantity" min=0>
            <label for="">Price (used book)</label>
            <input type="number" name="old_book_price">
            <small class="form-text text-muted">only if the books are used </small>
        </div>

        <div class="form-group">
            <label for="">New Book Quantity</label>
            <input class="form-control" type="number" name="old_book_qty" placeholder="new book quantity">
            <label for="">Price (New book)</label>
            <input type="number" name="new_book_price">
            <small class="form-text text-muted">new books quantity only</small>
        </div>

        <div class="form-group">
            <label for="">E-book Quantity</label>
            <input class="form-control" type="number" name="ebook_qty" placeholder="new book quantity">
            <label for="">Price (E_book)</label>
            <input type="number" name="e_book_price">
            <small class="form-text text-muted">e_book quantity only</small>
        </div>

        <div class="form-group">
            <label for="">Book Image</label>
            <input type="file" name="book_profile" class="form-control">
            <small class="form-text text-muted">If you have an image of the book or you can edit it later</small>
        </div>

        <div class="form-group">
            <label for="">Book Description</label>
            <textarea class="form-control" name="book_des" rounded-0></textarea>
            <small class="form-text text-muted">Providing a book description will make your book more rated</small>
        </div>

        <div class="form-group">
            <label for="">Book Coupon</label>
            <input type="text" name="coupon" class="ml-2" style="outline: none;" />
        </div>

        <div class="form-group">
            <label for="">E-Book File</label>
            <input type="file" name="book_file" class="ml-2">
            <small class="form-text text-muted">Only fill this form if your book format is ebook(pdf,epub,mobi)</small>
        </div>

        <?php if (isset($_SESSION['is_admin']) && !empty($_SESSION['is_admin'])) : ?>
            <div class="form-group">
                <label for="">Best Seller</label>
                <input type="checkbox" name="bs">
            </div>
        <?php endif; ?>

        <input type="text" hidden value="<?php echo $_SESSION['user_id']; ?>" name="seller_id">
        <input type="submit" name="sell" value="Sell Book" class="btn btn-primary">
    </form>
</div>