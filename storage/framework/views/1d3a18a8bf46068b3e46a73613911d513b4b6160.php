<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Available Career Opurtunities</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                     
                    <div class="form-group row">
                    
                    </div>
                    <table class="table table borderless">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Position</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $jobOp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($key + 1); ?></td>
                            <td><?php echo e($job->name); ?></td>
                                <td></td>
                                <td>
                                    <form id="apply" action="<?php echo e(url('view/' . $job->id)); ?>" method="POST" class="form-inline">
                                        
                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field('POST')); ?>

                                        <input type="submit" value="Details" class="btn btn-success btn-xl pull-right check-apply btn-block">
                                    </form>
                                </td>   
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\open_uni\resources\views/home.blade.php ENDPATH**/ ?>