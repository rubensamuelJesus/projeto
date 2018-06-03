
<?php $__env->startSection('content'); ?>
<div class="tabs-x tabs-above">
    <ul id="myTab-kv-1" class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#administrador" role="tab" data-toggle="tab"><i
                class="glyphicon glyphicon-home"></i>Administrador</a></li>
        <li>
            <a href="#blocked_users" role="tab-kv" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>
            Blocked users</a>
        </li>
        <li>
            <a href="#associate_members" role="tab-kv" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>
            Associate Members</a>
        </li>
        <li>
            <a href="#associate_members_I_belong_to" role="tab-kv" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>
            Associate members I belong to</a>
        </li>
        <li>
            <a href="#all" role="tab-kv" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>
            All</a>
        </li>
        <li>
            <nav class="navbar navbar-light bg-light right">
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </nav>
        </li>
    </ul>
    <div id="myTabContent-kv-1" class="tab-content">
        <div class="tab-pane fade in active" id="administrador">
            <table class="table table-striped">
                <?php if(!$users_all == null): ?>
                    <?php echo $__env->make('thead', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>    
                <tbody>
                    <?php if(!$users_all == null): ?>
                        <?php $__currentLoopData = $users_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if (\Illuminate\Support\Facades\Blade::check('isAdmin', $user)): ?>
                            <tr>
                                <th><img class="avatar border-white" src="<?php echo asset("../storage/profiles/$user->profile_photo")?>"></th>
                                <th><?php echo e($user->name); ?></th>
                                <th>Administrador</th>
                            </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                       <p>Nenhum Registo</p>
                    <?php endif; ?>
                </tbody>
            </table>  
        </div>
        <div class="tab-pane fade" id="blocked_users">
            <table class="table table-striped">
                <?php if(!$users_all == null): ?>
                    <?php echo $__env->make('thead', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>
                <tbody>
                    <?php if(!$users_all == null): ?>    
                        <?php $__currentLoopData = $users_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if (\Illuminate\Support\Facades\Blade::check('isBlocked', $user)): ?>
                            <tr>
                                <th><img class="avatar border-white" src="<?php echo asset("storage/profiles/$user->profile_photo")?>"></th>
                                <th><?php echo e($user->name); ?></th>
                                <th>Blocked users</th>
                            </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                       <p>Nenhum Registo</p>
                    <?php endif; ?>
                </tbody>
            </table>     
        </div>
        <div class="tab-pane fade" id="associate_members">
            <table class="table table-striped">
                <?php if(!$associated_members == null): ?>
                    <?php echo $__env->make('thead', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>
                <tbody>
                    <?php if(!$associated_members == null): ?>
                        <?php $__currentLoopData = $associated_members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $associated_member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th><img class="avatar border-white" src="<?php echo asset("storage/profiles/$user->profile_photo")?>"></th>
                                <th><?php echo e($associated_member->name); ?></th>
                                <th>Associated members</th>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                       <p>Nenhum Registo</p>
                    <?php endif; ?>
                </tbody>
            </table>     
        </div>
        <div class="tab-pane fade" id="associate_members_I_belong_to">
            <table class="table table-striped">
                <?php if(!$associated_members_belong == null): ?>
                    <?php echo $__env->make('thead', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>
                <tbody>
                        <?php if(!$associated_members_belong == null): ?>
                            <?php $__currentLoopData = $associated_members_belong; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $associated_member_belong): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th><img class="avatar border-white" src="<?php echo asset("storage/profiles/$user->profile_photo")?>"></th>
                                    <th><?php echo e($associated_member_belong->name); ?></th>
                                    <th>Associate members I belong to</th>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                           <p>Nenhum Registo</p>
                        <?php endif; ?>
                </tbody>
            </table>     
        </div>
        <div class="tab-pane fade" id="all">
            <table class="table table-striped">
                <?php if(!$users_all == null): ?>
                    <?php echo $__env->make('thead', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>
                <tbody>
                        <?php if(!$users_all == null): ?>
                            <?php $__currentLoopData = $users_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th><img class="avatar border-white" src="<?php echo asset("storage/profiles/$user->profile_photo")?>"></th>
                                    <th><?php echo e($user->name); ?></th>
                                    <th>All</th>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                           <p>Nenhum Registo</p>
                        <?php endif; ?>
                </tbody>
            </table>     
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>