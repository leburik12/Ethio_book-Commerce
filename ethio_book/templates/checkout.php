<?php include('includes/header.php'); ?>

<?php if (!empty($no_more)) : ?>
    <h4 class="" style="margin-left: 3rem; margin-bottom: 2rem;">CheckOut</h4>
    <div class="checkout_form row">
        <div class="my_form col-7" style="margin-left: 3rem; margin-bottom: 7rem;">
            <form action="checkout.php" method="post">
                <div class="form-group">
                    <label for="">First Name</label>
                    <input type="text" class="form-control" name="first_name">
                </div>

                <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" class="form-control" name="last_name" required>
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" required>
                </div>

                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" class="form-control" name="address" required>
                </div>

                <div class="form-group">
                    <label for="">Postal Code</label>
                    <input type="text" class="form-control" name="postal_code" required>
                </div>

                <div class="form-group">
                    <label for="">Phone Number</label>
                    <input type="text" class="form-control" name="phone_number" required>
                </div>

                <div class="form-group">
                    <label for="">City</label>
                    <input type="text" class="form-control" name="city" required>
                </div>
                <input type="hidden" value="<?php if (isset($_SESSION['total_price'])) {
                                                echo $_SESSION['total_price'];
                                            } ?>" name="checkout_total_price">
                <input type="hidden" value="<?php if (isset($_SESSION['user_id'])) {
                                                echo $_SESSION['user_id'];
                                            } else {
                                                echo 0;
                                            } ?>" name="user_id">

                <input type="submit" class="btn btn-success" name="submit_checkout">
                <input type="reset" class="btn btn-outline-success" name="reset">
            </form>
        </div>

        <div class="items_detail" style="background-color: #F8F6F6;">
            <div class="item_detail_wrapper">
                <h5>Your Order</h5>
                <ol>
                    <?php if (isset($_SESSION['cart'])) : ?>
                        <?php foreach ($_SESSION['cart'] as $key) : ?>
                            <li style="margin-bottom:.4rem;"><?php echo $key['book_title']; ?>
                                <?php if ($key['obq'] > 0) {
                                    echo "$key[obp] '*' $key[obq] (used_book)\t";
                                } ?>
                                <?php if ($key['nbq'] > 0) {
                                    echo "$key[nbp] '*' $key[nbq] (new_book)\t";
                                } ?>
                                <?php if ($key['ebq'] > 0) {
                                    echo "$key[ebp] '*' $key[ebq] (e_book)\t";
                                } ?>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                $<?php echo $key['obp'] * $key['obq'] + $key['nbp'] * $key['nbq'] + $key['ebp'] * $key['ebq'] ?>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ol>

                <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Total</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>$<?php
                                                                                                                if (isset($_SESSION['total_price'])) {
                                                                                                                    echo $_SESSION['total_price'];
                                                                                                                }
                                                                                                                ?></strong></p>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="ml-5">
        <h3>You have purchased</h3>
        <?php if (isset($carts)) : ?>
            <?php foreach ($carts as $cart) : ?>
                <div>
                    <p><strong><?php echo $cart['book_title'] ?></strong></p>
                    <ul>
                        <li>New Book $<?php echo "$cart[nbp]*$cart[nbq]"; ?></li>
                        <li>Used Book $<?php echo "$cart[obp]*$cart[obq]"; ?></li>
                        <li>E Book $<?php echo "$cart[ebp]*$cart[ebq]"; ?></li>
                    </ul>
                    <?php if ($cart['ebq'] > 0) : ?>
                        <form method="get" action='<?php echo "$BASE_URI.$cart[file_name]"; ?>'>
                            <p class="btn btn-primary">Click here to download the Book file</p>
                        </form>
                    <?php endif; ?>

                </div>
                <h6>Total Price $<?php echo  $total_price; ?></h6>
            <?php endforeach; ?>
        <?php endif; ?>
        <h4>Your product will arrive with 2 days<br>Thank You for choosing us.<br><strong>Reader will be leaders</strong></h4>

    </div>
<?php endif; ?>