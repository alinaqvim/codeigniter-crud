<?php
echo validation_errors();
echo form_open('users/login');
?>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1 class="text-center">
                <?php echo $title; ?>
            </h1>
            <div class="form-group p-3">
                <input type="text" name="username" class="form-control py-lg-5 m-2" placeholder="Username" required autofocus />
                <input type="password" name="password" class="form-control py-lg-5 m-2" placeholder="Password" required autofocus />
            </div>
            <button type="submit" class="btn btn-block btn-primary">Login</button>
        </div>
    </div>
<?php echo form_close(); ?>
