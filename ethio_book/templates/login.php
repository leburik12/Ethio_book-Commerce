<?php include('includes/header.php'); ?>
<?php displayMessage(); ?>
<div class="login" style="margin: 5rem 0rem 1rem 3rem;">
    <h4 style="margin: 5rem 0rem 1rem 0rem;">Login</h4>
    <form action="login.php" method="post">
        <div class="form-group">
            <label for="">User Name</label>
            <input type="text" class="form-control" placeholder="Enter User name" name="user_name">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" placeholder="Enter Password" name="password" value="">
        </div>
        <button type="submit" class="btn btn-primary" name="login">Login</button>
    </form>
</div>