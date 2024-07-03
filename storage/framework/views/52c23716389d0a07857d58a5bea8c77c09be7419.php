



							<?php $__env->startSection('content'); ?>

							<!--Page header-->
							<div class="page-header d-xl-flex d-block">
								<div class="page-leftheader">
									<h4 class="page-title"><span class="font-weight-normal text-muted ms-2"><?php echo e(lang('Under Maintenance Page', 'menu')); ?></span></h4>
								</div>
							</div>
							<!--End Page header-->

							<!-- Edit Maintanance Page -->
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="card ">
									<div class="card-header border-0">
										<h4 class="card-title"><?php echo e(lang('Under Maintenance Page', 'menu')); ?></h4>
									</div>
									<form method="POST" action="<?php echo e(url('/admin/maintenancepage')); ?>" enctype="multipart/form-data">
										<?php echo csrf_field(); ?>

										<?php echo view('honeypot::honeypotFormFields'); ?>
										<div class="card-body">
											<div class="form-group">
												<label class="form-label"><?php echo e(lang('Main Title')); ?> <span class="text-red">*</span></label>
												<input type="text" class="form-control <?php $__errorArgs = ['503title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(settingpages('503title')); ?>" name="503title">
												<?php $__errorArgs = ['503title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

													<span class="invalid-feedback" role="alert">
														<strong><?php echo e(lang($message)); ?></strong>
													</span>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

											</div>
										<div class="form-group">
											<label class="form-label"><?php echo e(lang('Title')); ?> <span class="text-red">*</span></label>
											<input type="text" class="form-control <?php $__errorArgs = ['503subtitle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(settingpages('503subtitle')); ?>" name="503subtitle">
											<?php $__errorArgs = ['503subtitle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

												<span class="invalid-feedback" role="alert">
													<strong><?php echo e(lang($message)); ?></strong>
												</span>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

										</div>
										<div class="form-group">
											<label class="form-label"><?php echo e(lang('Subtitle')); ?></label>
											<textarea class="form-control <?php $__errorArgs = ['503description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="4" name="503description" aria-multiline="true"><?php echo e(settingpages('503description')); ?></textarea>
											<?php $__errorArgs = ['503description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

												<span class="invalid-feedback" role="alert">
													<strong><?php echo e(lang($message)); ?></strong>
												</span>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

										</div>
									</div>
										<div class="card-footer">
											<div class="form-group float-end ">
												<input type="submit" class="btn btn-secondary" value="<?php echo e(lang('Save Changes')); ?> " onclick="this.disabled=true;this.form.submit();">
											</div>
										</div>
									</form>
								</div>
							</div>
							<!-- End Edit Maintanance Page -->

							<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\cms-kit\resources\views/admin/errorpages/undermaintenance.blade.php ENDPATH**/ ?>