<html lang="en">
<head>
  <title><?php echo e(config('app.name')); ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="<?php echo e(asset('css/login.css')); ?>" rel="stylesheet">
</head>
 
<div id="login" class="container">
  <div class="cloud-intro row">
    <div class="col-md-12">
      <div class="login well well-sm">
        <div class="center">
          <?php $url = asset('/images/logo.png');  ?>
          <image img src="<?php echo  $url; ?>" alt="logo"  style="width:230px;height:80px;"> </image >
        </div>
        <form action="<?php echo e(route('login')); ?>" style="" class="login-form" id="UserLoginForm" method="post" accept-charset="utf-8">
        <?php echo e(csrf_field()); ?>

          <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input name="email" required="required" class="form-control" placeholder="Username" maxlength="255" type="text" id="UserUsername">
            </div>
            <?php if($errors->has('email')): ?>
              <span class="help-block">
               <strong><?php echo e($errors->first('email')); ?></strong>
               </span>
               <?php endif; ?>
          </div>
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input name="password" required="required" class="form-control" placeholder="Password" type="password" id="password">
            </div>
            <?php if($errors->has('password')): ?>
              <span class="help-block">
              <strong><?php echo e($errors->first('password')); ?></strong>
              </span>
              <?php endif; ?>
          </div>
          <div class="form-group">
            <input class="btn btn-primary btn-lg btn-block" type="submit" value="Login">
          </div>
        </form>
      </div><!--/.login-->
    </div><!--/.span12-->
  </div><!--/.row-fluid-->
</div><!--/.container-->

<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
               
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
