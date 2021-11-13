<?php include('includes/header.php'); ?>
<?php displayMessage(); ?>
<div class=" mx-5">
    <h5 class="my-4">Sign Up Form</h5>
    <form method="post" action="signup.php">
        <div>

        </div>
        <div class="form-group">
            <label for="">User Name</label>
            <input type="text" name="user_name" placeholder="First Name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="">Email</label>
            <input type="Email" name="email" placeholder="First Name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="">Phone Number</label>
            <input type="text" required placeholder="Enter Phone Number" name="phone_number" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Password</label>
            <input required type="password" name="password" placeholder="Password" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Repeat Password</label>
            <input type="password" name="password2" class="form-control" required>
        </div>
        <input type="submit" name="sign_up" class="btn btn-primary">
    </form>
</div>