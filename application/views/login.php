<section class="section-content bg padding-y border-top">
    <div class="container">

    <div class="card login-box">
    <article class="card-body">
        <a href="<?php echo base_url('userauth/register');?>" class="float-right btn btn-outline-primary">Sign up</a>
        <h4 class="card-title mb-4 mt-1">Sign in</h4>
        <hr>

        <?php echo validation_errors(); ?>

        <?php if(!empty($errors)) {
            echo $errors;
        } ?>

        <form action="<?php echo base_url('userauth/login') ?>" method="POST">
            <div class="form-group input-icon">
                <i class="fa fa-user"></i>
                <input name="email" id="email" class="form-control" placeholder="Email or login" type="email">
            </div> <!-- form-group// -->
            <div class="form-group input-icon">
                <i class="fa fa-lock"></i>
                <input name="password" id="password" class="form-control" placeholder="******" type="password">
            </div> <!-- form-group// -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"> Login  </button>
                    </div> <!-- form-group// -->
                </div>
                <div class="col-md-6 text-right">
                    <a class="small" href="#">Forgot password?</a>
                </div>
            </div> <!-- .row// -->
        </form>
    </article>
        <div class="border-top card-body text-center">Don't have an account? <a href="<?php echo base_url('auth/userregister');?>">Register</a></div>

    </div> <!-- card.// -->
    </div>
</section>