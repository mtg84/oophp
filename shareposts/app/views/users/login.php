<?php require APPROOT . '/views/inc/header.php';?>

<div class="row">
    <div class="col-md-6 mx-auto mt-5 ">
        <div class="card card-body bg-light mt-5">
            <h2 class="text-center">Login</h2>
            <p>Fill in your credentials to log in</p>
            <form action="<?php echo URLROOT;?>/users/login" method="post">
               
                <div class="form-group">
                    <label for="email">Email <sup>*</sup></label>
                    <input type="email" name="email" id="email" 
                    class="form-control form-control-lg 
                    <?php echo (!empty($data['email_error'])) ? 'is-invalid': '' ;?>"
                    value="<?php $data['email'];?>" >
                    <span class="invalid-feedback">
                    <?php echo $data['email_error'];?>
                    </span>
                </div>

                <div class="form-group">
                    <label for="password">Password <sup>*</sup></label>
                    <input type="password" name="password" id="password" 
                    class="form-control form-control-lg 
                    <?php echo (!empty($data['password_error'])) ? 'is-invalid': '' ;?>"
                    value="<?php $data['password'];?>" >
                    <span class="invalid-feedback">
                    <?php echo $data['password_error'];?>
                    </span>
                </div>


                <div class="row">
                    <div class="col">
                        <input type="submit" value="Login" class="btn btn-primary btn-block">   
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT;?>/users/register" class="btn btn-success btn-block">
                       Register
                        </a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>