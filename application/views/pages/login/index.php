<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3">
            <h4 class="page-title"> <i class="fa fa-upload"></i> Bauba document uploader</h4>
            <hr>

            <div class="panel panel-default panel-login">
                <div class="panel-heading">
                    <div class="panel-title">
                        Please login to continue
                    </div>
                </div>
                <div class="panel-body">
                    <form action="<?php echo site_url('login/login'); ?>" method="post">
                        <div class="form-group">
                            <label for="login-pin">Login pincode</label>
                            <input class="form-control" id="login-pin" name="pincode" type="password" placeholder="Please enter your login pin code">

                        </div>

                            <button class="btn btn-primary" id="btn-login" type="submit">Login</button>

                    </form>
                </div>
            </div>

            <?php if ($this->session->flashdata('login_message')): ?>
                <div class="alert alert-danger">
                    <p><?php echo $this->session->flashdata('login_message'); ?></p>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>