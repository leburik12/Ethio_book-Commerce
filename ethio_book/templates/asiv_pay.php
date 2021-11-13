<?php include('includes/header.php'); ?>
<div style="width: 100%; height: 5rem; background-color:black; margin-top:-1rem;">
    <h3 style="margin: 1rem 0rem 0rem 2rem;"><strong style="color: orange; margin: 1rem;">ASIV</strong>PaY</h3>
</div>
<div class="row">
    <div class="col-6 ml-5 mt-4">
        <h4 class="mb-2">Enter Card Information</h4>
        <form action="checkout.php" method="post">
            <div class="form-group">
                <label for="">Enter Card Number</label>
                <input type="number" name="card_number" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Enter CVV Number</label>
                <input type="number" name="cvv" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Enter Password</label>
                <input type="password" name="pd" class="form-control">
            </div>
            <div class="form-group">
                <label for=""></label>
                <input type="submit" name="card_process" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>