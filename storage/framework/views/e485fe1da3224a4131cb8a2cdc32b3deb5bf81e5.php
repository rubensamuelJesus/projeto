
<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">All Users</h4>
                        <p class="category">Users that are registered</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                                <th>ID</th>
                            	<th>Name</th>
                            	<th>Email</th>
                            	<th>Phone</th>
                            	<th>Photo</th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                    <td><?php echo e($user->id); ?></td>
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td><?php echo e($user->phone); ?></td>
                                    <td><img src="<?php echo e(asset('/storage/app/profiles/'.$user->profile_photo)); ?>" alt="Logo" height="75px"></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="header">
                        <h4 class="title">Table on Plain Background</h4>
                        <p class="category">Here is a subtitle for this table</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover">
                            <thead>
                                <th>ID</th>
                            	<th>Name</th>
                            	<th>Salary</th>
                            	<th>Country</th>
                            	<th>City</th>
                            </thead>
                            <tbody>
                                <tr>
                                	<td>1</td>
                                	<td>Dakota Rice</td>
                                	<td>$36,738</td>
                                	<td>Niger</td>
                                	<td>Oud-Turnhout</td>
                                </tr>
                                <tr>
                                	<td>2</td>
                                	<td>Minerva Hooper</td>
                                	<td>$23,789</td>
                                	<td>Curaçao</td>
                                	<td>Sinaai-Waas</td>
                                </tr>
                                <tr>
                                	<td>3</td>
                                	<td>Sage Rodriguez</td>
                                	<td>$56,142</td>
                                	<td>Netherlands</td>
                                	<td>Baileux</td>
                                </tr>
                                <tr>
                                	<td>4</td>
                                	<td>Philip Chaney</td>
                                	<td>$38,735</td>
                                	<td>Korea, South</td>
                                	<td>Overland Park</td>
                                </tr>
                                <tr>
                                	<td>5</td>
                                	<td>Doris Greene</td>
                                	<td>$63,542</td>
                                	<td>Malawi</td>
                                	<td>Feldkirchen in Kärnten</td>
                                </tr>
                                <tr>
                                	<td>6</td>
                                	<td>Mason Porter</td>
                                	<td>$78,615</td>
                                	<td>Chile</td>
                                	<td>Gloucester</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>