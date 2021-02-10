<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><?php echo e($jobOp->name); ?></div>

                <div class="card-body">                  
                    <div class="container">
                    <h2>Details....</h2>            
                    <table class="table table borderless">
                        <thead>
                        <tr>
                            
                            <th>Position</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                      
                        <tr>
                            
                            <td><?php echo e($jobOp->name); ?></td>
                            
                            
                            <?php if(!is_null($allredyApply)): ?>
                            <td>
                                <form id="edit" action="<?php echo e(url('/applicant/edit/' . $allredyApply->apply_id)); ?>" method="POST" class="form-inline">
                                    
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo e(method_field('POST')); ?>

                                    <input type="submit" value="Edit" class="btn btn-success btn-xl pull-right check-apply btn-block">
                                </form>
                            </td> <td>
                                <form id="apply" action="<?php echo e(url('/application/delete/' . $allredyApply->apply_id)); ?>" method="POST" class="form-inline">
                                    
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo e(method_field('POST')); ?>

                                    <input type="submit" value="Delete" class="btn btn-danger btn-xl pull-right check-apply btn-block">
                                </form>
                            </td>  
                            <?php else: ?>   
                            <td>
                                <form id="apply" action="<?php echo e(url('/application/job/'. $jobOp->id)); ?>" method="POST" class="form-inline">
                                    
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo e(method_field('POST')); ?>

                                    <input type="submit" value="Apply" class="btn btn-success btn-xl pull-right check-apply btn-block">
                                </form>
                            </td>  
                            <td></td>
                            <?php endif; ?>                       
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\open_uni\resources\views/application/view.blade.php ENDPATH**/ ?>