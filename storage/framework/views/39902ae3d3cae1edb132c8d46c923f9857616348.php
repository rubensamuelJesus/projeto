<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                     <span class="login100-form-logo">
                        <i class="zmdi zmdi-landscape"></i>
                     </span>

                    <form method="POST" action="<?php echo e(route('password.request')); ?>">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="token" value="<?php echo e($token); ?>">

                        <span class="login100-form-title p-b-34 p-t-27">New Password</span>
                        <div class="wrap-input100 validate-input" data-validate = "Enter email">
                            <input id="email" type="email" class="input100 name="email" value="<?php echo e(old('email')); ?>" placeholder="Email">
                            <span class="focus-input100" data-placeholder="&#xf15a;"></span>
                        </div> 

                        <div class="col-md-6">
                            <?php if($errors->has('email')): ?>
                                <span class="invalid-feedback">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        </div>
                        
                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <input  id="password" class="input100" type="password" name="password" placeholder="Password">
                            <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        </div>

                        <div class="col-md-6">
                            <?php if($errors->has('password')): ?>
                                <span class="invalid-feedback">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="wrap-input100 validate-input">
                            <input id="password-confirm" class="input100" type="password" name="password_confirmation" placeholder="Confirm password">
                            <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        </div>

                        <?php if(session('status')): ?>
                         <div class="input100">
                            <?php echo e(session('status')); ?>

                        </div>
                        <?php endif; ?>

                        <div class="container-login100-form-btn">
                            <button type="submit" class="login100-form-btn">
                                <?php echo e(__('Reset Password')); ?>

                            </button>
                            <a class="login100-form-btn" href="/login"><?php echo e(__('Back')); ?></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>