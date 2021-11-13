<?php include('includes/header.php'); ?>
<?php displayMessage(); ?>
<div class=" mx-5 mb-5">
    <h3 class="my-5">Sellers Account Sign Up Form</h3>
    <form style="margin-bottom: 8rem;" method="post" action="seller_form.php">
        <div class="form-group">
            <label for="">First Name</label>
            <input type="text" name="first_name" placeholder="First Name" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Last Name</label>
            <input type="text" name="last_name" placeholder="Last Name" class="form-control">
        </div>

        <div class="form-group">
            <label for="">User Name</label>
            <input type="text" name="user_name" placeholder="User Name" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Email</label>
            <input type="Email" name="email" placeholder="First Name" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Phone Number</label>
            <input type="text" placeholder="Enter Phone Number" name="phone_number" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" placeholder="Password" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Repeat Password</label>
            <input type="password" name="password2" class="form-control">
        </div>
        <input type="submit" name="seller_sign_up" class="btn btn-primary">
    </form>
</div>