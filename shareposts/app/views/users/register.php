<?php require APPROOT . '/views/inc/header.php';?>

<div class="row">
    <div class="col-md-6 mx-auto mt-5 ">
        <div class="card card-body bg-light mt-5">
            <h2 class="text-center">Create an Account</h2>
            <p>Fill out this form to register with us</p>
            <form action="<?php echo URLROOT;?>/users/register" method="post">
                <div class="form-group">
                    <label for="name">Name <sup>*</sup></label>
                    <input type="text" name="name" id="name" 
                    value="<?php echo $data['name'];?>"
                    class="form-control form-control-lg 
                    <?php echo (!empty($data['name_error'])) ? 'is-invalid': '' ;?>"
                     >
                    <span class="invalid-feedback">
                    <?php echo $data['name_error'];?>
                    </span>
                </div>

                <div class="form-group">
                    <label for="email">Email <sup>*</sup></label>
                    <input type="email" name="email" id="email"  
                    value="<?php echo $data['email'];?>"
                    class="form-control form-control-lg 
                    <?php echo (!empty($data['email_error'])) ? 'is-invalid': '' ;?>"
                    >
                    <span class="invalid-feedback">
                    <?php echo $data['email_error'];?>
                    </span>
                </div>

                <div class="form-group">
                    <label for="password">Password <sup>*</sup></label>
                    <input type="password" name="password" id="password" 
                    value="<?php echo $data['password'];?>"
                    class="form-control form-control-lg 
                    <?php echo (!empty($data['password_error'])) ? 'is-invalid': '' ;?>"
                     >
                    <span class="invalid-feedback">
                    <?php echo $data['password_error'];?>
                    </span>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm password<sup>*</sup></label>
                    <input type="password" name="confirm_password" id="confirm_password" 
                    class="form-control form-control-lg 
                    <?php echo (!empty($data['confirm_password_error'])) ? 'is-invalid': '' ;?>"
                    value="<?php echo $data['confirm_password'];?>" >
                    <span class="invalid-feedback">
                    <?php echo $data['confirm_password_error'];?>
                    </span>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Register" class="btn btn-primary btn-block">   
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT;?>/users/login" class="btn btn-secondary btn-block">
                        Login
                        </a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>