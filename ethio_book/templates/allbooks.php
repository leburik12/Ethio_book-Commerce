<?php include('includes/header.php'); ?>

<div class="row">
    <?php if (isset($ctg_book) && $ctg_book == "empty"):?>
        <div style="width: 80%; height:50px; margin-left: 3rem;">
       <p style="color: red; font-size:1.2rem;"> <strong>No book found</strong></p>
    </div>
    <?endif;?>
    <div class="col-10 book_card_container" style="margin:2rem 0rem 1rem 7rem;">
    
          <?php if(isset($ctg_book) && $ctg_book != "empty"):?>
            <?php foreach($ctg_book as $book):?>
           <div class="single-book">
            <a href="#" data-id="1">
                <div class="card-b">
                    <img src="<?php echo BASE_URI;?>images/book/<?php echo $book->book_image;?>">
                    <div style="margin: 1.5rem 0rem 1rem -8rem;">
                        <p style="font-size: 1.1rem; color:black;"><strong><?php echo $book->book_title;?></strong></p>
                        <p>Author : <strong><?php echo $book->author;?></strong></p>
                        <p class="price item-light">New Book Qty - <?php echo $book->new_book_qty;?> &nbsp; - Price $<?php echo $book->new_book_price;?></p>
                       <p class="price item-light">Used Book Qty - <?php echo $book->old_book_qty;?> &nbsp; - Price $<?php echo $book->old_book_price;?></p>
                       <p class="price item-light">E-Book Qty - <?php echo $book->e_book_qty;?> &nbsp; - Price $<?php echo $book->e_book_price;?></p>
                        <a href="<?php echo BASE_URI;?>mybook.php?t=<?php echo $book->book_title;?>&id=<?php echo $book->id;?>?>" class="btn btn-outline-primary">View Book</a>
                    </div>
                </div>
            </a>
        </div>
            <?php endforeach;?>
          <?php endif;?>
    </div>
</div>