<?php include('includes/header.php') ?>

<div id="authors_page_details">
    <div id="authors_page_head">
        <div id="authors_page_profile">
            <img src="<?php echo BASE_URI; ?>images/author/<?php echo $author->image; ?>" alt="">
            <p style="margin-top: .5rem;"><strong><?php echo $author->name; ?></strong></p>
        </div>
        <div class="about_author row">
            <div style="margin-left: 4rem;">
                <p style="font-size: 1.2rem;letter-spacing: 1px;">In<strong style="color:brown">side</strong></p>
                <p style=" letter-spacing: 2px;"><?php echo $author->inside; ?></p>
                <p style="font-size: 0.99rem;"><em><?php echo $author->email; ?></em></p>
                <p style="font-size: 0.99rem;"><em><?php echo $author->phone_number; ?></em></p>
            </div>
            <div class="col-12 ">
                <div class="ml-4">
                    <div class="form-group">
                        <form>
                            <input required id="blog_title" type="text" placeholder="blog title" class="form-control mb-2" name="blog_title">
                            <textarea required id="blog_body" class="form-control"></textarea>
                        </form>
                    </div>
                    <button class="btn btn-secondary" id="submit_blog" name="submit_blog" class="" value="POST">POST</button>
                </div>
            </div>
        </div>
    </div>

    <div class="book_by_author">
        <h5>Books By Author</h5>

        <div class="books_by_author_pic">
            <div id="books_by_author_pic_wrapper">
                <div class="book_by_author_single">
                    <img src="" alt="">
                    <p>Book title</p>
                </div>
                <div class="book_by_author_single">
                    <img src="" alt="">
                    <p>Book title</p>
                </div>
                <div class="book_by_author_single">
                    <img src="" alt="">
                    <p>Book title</p>
                </div>
                <div class="book_by_author_single">
                    <img src="" alt="">
                    <p>Book title</p>
                </div>
            </div>
        </div>
    </div>

    <div class="blogs">
        <h4>Recent Blogs</h4>
        <div class="blogs_wrapper">
            <?php if (isset($blogs)) : ?>
                <?php foreach ($blogs as $blog) : ?>
                    <div class="blog_single">
                        <h6><?php echo $blog->title; ?></h6>
                        <p>Posted :<?php echo $blog->created; ?></p>
                        <p><?php echo $blog->body; ?></p>
                        <p><i id="yes" data-id="<?php echo $blog->id; ?>" class="fa fa-hand-peace fa-2x">&nbsp;<?php echo $blog->yes; ?></i>&nbsp;&nbsp;&nbsp;&nbsp;
                            <i id="no" data-id="<?php echo $blog->id; ?>" class="fa fa-hand-point-down fa-2x"></i>&nbsp;<?php echo $blog->yes; ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>