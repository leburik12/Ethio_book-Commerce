<?php include('includes/header.php'); ?>

<div>
    <h3>You have purchased</h3>
    <?php if (isset($carts)) : ?>
        <?php foreach ($carts as $cart) : ?>
            <div>
                <p><strong><?php echo $cart['book_title'] ?></strong></p>
                <ul>
                    <li>New Book $<?php echo "$cart[nbp]*$cart[nbq]"; ?></li>
                    <li>Used Book $<?php echo "$cart[ubp]*$cart[ubq]"; ?></li>
                    <li>E Book $<?php echo "$cart[ebp]*$cart[ebq]"; ?></li>
                </ul>
            </div>
            <h6>Total Price <?php echo  $total_price; ?></h6>
        <?php endforeach; ?>
    <?php endif; ?>

    <p class="btn btn-primary">Click here to download the Book file</p>
</div>