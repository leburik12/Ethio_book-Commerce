<?php include('includes/header.php'); ?>
<?php displayMessage(); ?>

<section id="cart_form_and_button" class="ml-5 mb-4">
    <table class="table table-striped table-hover">
        <thead class="table-inverse">
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Remove</th>
                <th>Unit Price</th>
                <th>Price</th>
            </tr>
        </thead>

        <tbody>
            <?php if (isset($_SESSION['cart'])) : ?>
                <?php foreach ($_SESSION['cart'] as $key) : ?>
                    <tr class="my_cart_table">
                        <td>
                            <a href="#">
                                <img src="<?php echo BASE_URI; ?>/images/book/<?php echo $key['book_image']; ?>" style="width: 100px; height: 90px;">
                            </a>
                        </td>
                        <td><strong><?php echo $key['book_title']; ?></strong></td>
                        <td><strong><?php echo $key['total_qty'] ?></strong></td>
                        <td>
                            <form method="post">
                                <button id='remove_from_cart_btn' class="btn btn-secondary" data-id="<?php echo $key['id']; ?>">Remove</button>
                            </form>
                        </td>
                        <td><?php echo "$key[nbp](new)&nbsp;&nbsp;$key[obp](used)&nbsp;&nbsp;$key[ebp](e-bk)"; ?></td>
                        <td><strong><?php echo $key['total_price'] ?></strong></td>
                    </tr>
                    <tr>
                        <div class="d-none alert alert-danger" id="remove_item_error">
                            Abebe
                        </div>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
        <tfoot>
            <tr class="table-inverse">
                <td colspan="5">Total - Price</td>
                <td id="cart_total_price"><strong><?php echo $_SESSION['total_price'] ?></strong></td>
            </tr>
        </tfoot>
    </table>
    <a href="<?php echo BASE_URI; ?>index.php"><button class="btn btn-outline-primary" name="continue_shopping">Continue Shoping</button></a>
    <a href="<?php echo BASE_URI; ?>checkout.php"><button class="btn btn-outline-secondary" name="checkout">Checkout</button></a>
    <a href="#"><button class="btn btn-outline-danger" name="clear_cart">Clear Cart</button></a>
</section>
<?php include('includes/footer.php'); ?>