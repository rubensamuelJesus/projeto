<?php $__env->startSection('content'); ?>
<form method="POST" action= "<?php echo e(route('register')); ?>" class="login100-form validate-form">
  <?php echo e(csrf_field()); ?>

  <span class="login100-form-logo">
    <i class="zmdi zmdi-landscape"></i>
  </span>

  <span class="login100-form-title p-b-34 p-t-27">Sign Up</span>

  <div class="wrap-input100 validate-input" data-validate = "Enter name">
    <input class="input100" type="text" name="name" value="<?php echo e(old('name')); ?>" placeholder="Name">
    <span class="focus-input100" data-placeholder="&#xf207;"></span>
  </div>

  <div class="wrap-input100 validate-input">
    <input class="input100" type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="Email">
    <span class="focus-input100" data-placeholder="&#xf15a;"></span>
  </div>
  

  <div class="wrap-input100 validate-input">
    <input class="input100" type="password" name="password" placeholder="Password">
    <span class="focus-input100" data-placeholder="&#xf191;"></span>
  </div>

  <div class="wrap-input100 validate-input">
    <input class="input100" type="password" name="password_confirmation" placeholder="Confirm password">
    <span class="focus-input100" data-placeholder="&#xf191;"></span>
  </div>

  
  <div class="wrap-input100 validate-input">
    <input class="input100" type="text" name="phone" value="<?php echo e(old('phone')); ?>" placeholder="Phone number">
    <span class="focus-input100" data-placeholder="&#xf2b6;"></span>
  </div>

  <div class="wrap-input100 validate-input">
    <input class="input100" id="tessssss" type="file" value="<?php echo e(old('profile_photo')); ?>" name="profile_photo" placeholder="Photo">
    <span class="focus-input100" data-placeholder="&#xf223;"></span>
  </div>
  <?php if($errors->all()): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <span class="input100"><?php echo e($error); ?></span>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endif; ?>
  
  <div class="container-login100-form-btn">
    <a class="login100-form-btn" href="/">Back</a>
    <button class="login100-form-btn">Regist</button>
  </div>

</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>