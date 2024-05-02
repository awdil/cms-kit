<?php $__env->startSection('styles'); ?>


<!-- INTERNAl Summernote css -->
<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/summernote/summernote.css')); ?>?v=<?php echo time(); ?>">

<!-- INTERNAl color css -->
<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/colorpickr/themes/nano.min.css')); ?>?v=<?php echo time(); ?>">

<!-- INTERNAL Sweet-Alert css -->
<link href="<?php echo e(asset('assets/plugins/sweet-alert/sweetalert.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<!--Page header-->
<div class="page-header d-xl-flex d-block">
<div class="page-leftheader">
    <h4 class="page-title"><span class="font-weight-normal text-muted ms-2"><?php echo e(lang('Envato Setting', 'menu')); ?></span></h4>
</div>
</div>
<!--End Page header-->

<div class="row">

<!-- Envato Expires follow this url -->
<div class="col-xl-12 col-lg-12 col-md-12">
    <div class="card ">
        <div class="card-header border-bottom">
            <h4 class="card-title"><?php echo e(lang('Envato Setting', 'setting')); ?></h4>
        </div>
        <form action="<?php echo e(route('settings.expiredsupport')); ?>" method="POST">
        <?php echo csrf_field(); ?>
            <div class="card-body pt-2 pb-2" >
                <div class="row">

                    <!--- Enable purchase code to employees --->
                    <div class="border-bottom">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group <?php echo e($errors->has('purchasecode_on') ? ' has-danger' : ''); ?>">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex">
                                        <a class="onoffswitch2">
                                            <input type="checkbox" id="purchasecode_on" name="purchasecode_on" value="on"  class="toggle-class onoffswitch2-checkbox"  <?php if(setting('purchasecode_on') == 'on'): ?> checked="" <?php endif; ?>>
                                            <label for="purchasecode_on" class="toggle-class onoffswitch2-label" ></label>
                                        </a>
                                        <div class="ps-3">
                                            <label class="form-label d-inline"><?php echo e(lang('Enable purchase code to employees', 'setting')); ?></label>
                                            <small class="text-muted"><i>(<?php echo e(lang('If you enable this, employees can see the purchase code submitted by customer’s.', 'setting')); ?>)</i></small>
                                        </div>
                                    </div>
                                </div>
                                <?php if($errors->has('purchasecode_on')): ?>

                                <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('purchasecode_on')); ?></strong>
                                </span>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                    <!--- END Enable purchase code to employees --->

                    <!--- Envato Expired On --->
                    <div class="border-bottom">
                        <div class="col-sm-12 col-md-12 pt-2">
                            <div class="form-group <?php echo e($errors->has('ENVATO_EXPIRED_BLOCK') ? ' has-danger' : ''); ?>">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex mt-4">
                                        <a class="onoffswitch2">
                                            <input type="checkbox" id="envato_expired_on" name="ENVATO_EXPIRED_BLOCK" value="on"  class="toggle-class onoffswitch2-checkbox"  <?php if(setting('ENVATO_EXPIRED_BLOCK') == 'on'): ?> checked="" <?php endif; ?>>
                                            <label for="envato_expired_on" class="toggle-class onoffswitch2-label" ></label>
                                        </a>
                                        <div class="ps-3">
                                            <label class="form-label d-inline"><?php echo e(lang('Envato Expired On', 'setting')); ?></label>
                                            <small class="text-muted"><i>(<?php echo e(lang('If you enable this Envato Expired switch, customer’s and guest’s cannot create ticket with an expired license.', 'setting')); ?>)</i></small>
                                        </div>
                                    </div>
                                </div>
                                <?php if($errors->has('ENVATO_EXPIRED_BLOCK')): ?>

                                <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('ENVATO_EXPIRED_BLOCK')); ?></strong>
                                </span>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                    <!--- END Envato Expired On --->

                    <div class="col-xl-12 col-lg-12 col-md-12 mt-4 ms-5">
                        <div class="form-group ">
                            <label for="" class="form-label d-inline"><?php echo e(lang('Support policy URL', 'setting')); ?> <span class="text-red">*</span></label>
                            <small class="text-muted"><i>(<?php echo e(lang('If you enable this Envato Expired switch, customer’s and guest’s cannot create ticket with an expired license.', 'setting')); ?>)</i></small>
                            <input class="form-control col-md-6 mt-3 pb-1 <?php echo e($errors->has('SUPPORT_POLICY_URL') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(lang('https://example.com')); ?>" name="SUPPORT_POLICY_URL" type="text" value="<?php echo e(old('SUPPORT_POLICY_URL', setting('SUPPORT_POLICY_URL'))); ?>" >

                            <?php if($errors->has('SUPPORT_POLICY_URL')): ?>

                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('SUPPORT_POLICY_URL')); ?></strong>
                            </span>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 card-footer ">
                <div class="form-group float-end ">
                    <input type="submit" class="btn btn-secondary" value="<?php echo e(lang('Save Changes')); ?>" onclick="this.disabled=true;this.form.submit();">
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Envato Expires follow this url  -->


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>


<!-- INTERNAL Summernote js  -->
<script src="<?php echo e(asset('assets/plugins/summernote/summernote.js')); ?>?v=<?php echo time(); ?>"></script>

<!-- INTERNAL Index js-->
<script src="<?php echo e(asset('assets/js/support/support-sidemenu.js')); ?>?v=<?php echo time(); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2.js')); ?>?v=<?php echo time(); ?>"></script>

<!-- INTERNAL color pickr -->
<script src="<?php echo e(asset('assets/plugins/colorpickr/pickr.min.js')); ?>?v=<?php echo time(); ?>"></script>

<!-- INTERNAL Sweet-Alert js-->
<script src="<?php echo e(asset('assets/plugins/sweet-alert/sweetalert.min.js')); ?>?v=<?php echo time(); ?>"></script>



<script type="text/javascript">

    "use strict";


</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\complaint-ticketing-system\resources\views/admin/envato/envatosetting.blade.php ENDPATH**/ ?>