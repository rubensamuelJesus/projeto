<?php $__env->startSection('content'); ?>
<form method="POST" action= "<?php echo e(route('login')); ?>" class="login100-form validate-form">
  <?php echo e(csrf_field()); ?>

  <span class="login100-form-logo">
    <i class="zmdi zmdi-landscape"></i>
  </span>

  <span class="login100-form-title p-b-34 p-t-27">Log in</span>
  <div class="wrap-input100 validate-input" data-validate = "Enter email">
    <input class="input100" type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="Email">
    <span class="focus-input100" data-placeholder="&#xf15a;"></span>
  </div>

  <div class="wrap-input100 validate-input" data-validate="Enter password">
    <input class="input100" type="password" name="password" placeholder="Password">
    <span class="focus-input100" data-placeholder="&#xf191;"></span>
  </div>

  <?php if($errors->all()): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <span class="input100"><?php echo e($error); ?></span>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endif; ?>

  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="remember" name="remember"></input>
      <span class="txt2" for="remember">Remember me</span>
  </div>

  <div class="container-login100-form-btn">
    <a class="login100-form-btn" href="/">Back</a>
    <button class="login100-form-btn">Login</button>
  </div>

  <div class="text-center p-t-40">
    <span class="txt2">Not a member?</span>
    <a class="txt1" href="/register">Sign up now</a>
  </div>

  <div class="text-center p-t-15">
    <a class="txt1" href="password/reset">Reset Password</a>
  </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>