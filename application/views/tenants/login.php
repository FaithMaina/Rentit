
/**
 * Created by faithmaina71@gmail.com.
 * User: USER
 * Date: 1/28/2016
 * Time: 13:00
 */ <div class="container tpad">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo form_open('tenants/validate_credentials'); ?>
                        <fieldset>
                            <div class="form-group">
                                <?php $email_attr = array('name'=>'email', 'class'=>'form-control', 'placeholder'=>'text@text.com'); ?>
                                <?php echo form_input($email_attr); ?>
                            </div>
                            <div class="form-group">
                                <?php $pass_attr = array('name'=>'pwd', 'type'=>'password', 'class'=>'form-control', 'placeholder'=> 'Password'); ?>
                                <?php echo form_input($pass_attr); ?>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <input type="submit" value="Login"class="btn btn-default btn-info btn-block">
                        </fieldset>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
</div>