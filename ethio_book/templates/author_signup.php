<?php include('includes/header.php'); ?>

<?php displayMessage(); ?>
<div class="row">
    <div class="col-7 mt-5 ml-5">
        <h5 class="mb-4">Author Registration Page</h5>
        <form action="author_signup.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Name</label>
                <input required class="form-control" type="text" name="name" placeholder="name">
            </div>
            <div>
                <label for="">Email</label>
                <input required class="form-control" type="email" name="email" placeholder="email">
            </div>
            <div>
                <label for="">User Name</label>
                <input required class="form-control" type="text" name="user_name" placeholder="username">
            </div>
            <div>
                <label for="">Password</label>
                <input required class="form-control" type="passwod" name="p1">
            </div>
            <div>
                <label for="">Retype Password</label>
                <input required class="form-control" type="password" name="p2" placeholder="Retype password">
            </div>

            <div>
                <label for="">Phone Number</label>
                <input required class="form-control" type="text" name="phone" placeholder="phone">
            </div>
            <div>
                <label for="">Profile Picture</label>
                <input class="form-control" type="file" name="book_profile">
            </div>
            <div>
                <label for="">Write about anything</label>
                <textarea class="form-control" name="inside" placeholder="write anything u want"></textarea>
                <small class="form-text text-muted">You can edit this later </small>
            </div>
            <div class="mt-3">
                <input type="submit" name="author_signup_submit" value=" register " class="btn btn-secondary">
                <input type="reset" value=" reset " class="btn btn-primary">
            </div>
        </form>
    </div>
</div>