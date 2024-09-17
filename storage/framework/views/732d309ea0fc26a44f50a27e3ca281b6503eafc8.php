<?php $__env->startSection('styles'); ?>

<!-- INTERNAL Data table css -->
<link href="<?php echo e(asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('assets/plugins/datatable/responsive.bootstrap5.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />

<!-- INTERNAL Sweet-Alert css -->
<link href="<?php echo e(asset('assets/plugins/sweet-alert/sweetalert.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!--Page header-->
<div class="page-header d-xl-flex d-block">
	<div class="page-leftheader">
		<h4 class="page-title"><span class="font-weight-normal text-muted ms-2"><?php echo e(lang('Category')); ?></span></h4>
	</div>
</div>
<!--End Page header-->

<!--Category List -->
<div class="col-xl-12 col-lg-12 col-md-12">
	<div class="card ">
		<div class="card-header border-0 d-sm-flex d-block">
			<h4 class="card-title"><?php echo e(lang('Category List')); ?></h4>
			<div class="card-options mt-sm-max-2 d-sm-flex d-block">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Category Create')): ?>

				<a href="javascript:void(0)" class="btn btn-secondary me-3 mb-sm-0 mb-2" id="create-category"><?php echo e(lang('Add Category')); ?></a>
				<?php endif; ?>

				

			</div>
		</div>
		<div class="card-body" >
			<div class="table-responsive spruko-delete">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Category Delete')): ?>

				<button id="massdelete" class="btn btn-outline-light btn-sm mb-4 data-table-btn"><i class="fe fe-trash"></i> <?php echo e(lang('Delete')); ?></button>
				<?php endif; ?>
				<table class="table table-bordered border-bottom text-nowrap w-100" id="support-category">
					<thead>
						<tr>
							<th ><?php echo e(lang('Sl.No')); ?></th>
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Category Delete')): ?>

							<th width="10" >
								<input type="checkbox"  id="customCheckAll">
								<label  for="customCheckAll"></label>
							</th>
							<?php endif; ?>
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('Category Delete')): ?>

							<th width="10" >
								<input type="checkbox"  id="customCheckAll" disabled>
								<label  for="customCheckAll"></label>
							</th>
							<?php endif; ?>
							<th ><?php echo e(lang('Category Name')); ?></th>
							<th ><?php echo e(lang('Ticket/Knowledge')); ?></th>
							<th ><?php echo e(lang('Assign To Groups')); ?></th>
							<th ><?php echo e(lang('Assigned Priority')); ?></th>
							<th ><?php echo e(lang('Status')); ?></th>
							<th ><?php echo e(lang('Actions')); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($i++); ?></td>
								<td>
									<?php if(Auth::user()->can('Category Delete')): ?>
										<input type="checkbox" name="student_checkbox[]" class="checkall" value="<?php echo e($category->id); ?>" />
									<?php else: ?>
										<input type="checkbox" name="student_checkbox[]" class="checkall" value="<?php echo e($category->id); ?>" disabled />
									<?php endif; ?>
								</td>
								<td><?php echo e($category->name); ?></td>
								<td><?php echo e($category->display); ?></td>
								<td>
									<?php if(Auth::user()->can('Category Assign To Groups')): ?>

										<?php if($category->display == 'ticket' || $category->display == 'both'): ?>
											<a href="javascript:void(0)" data-id="<?php echo e($category->id); ?>" id="assigneds" class="badge badge-pill badge-info mt-2" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Assign to group')); ?>">
												<?php echo e($category->groupscategoryc()->count()); ?>

											</a>
										<?php endif; ?>

									<?php else: ?>
										~
									<?php endif; ?>
								</td>
								<td>
									<?php if($category->priority != null): ?>

										<?php if($category->priority == "Low"): ?>

										<span class="badge badge-success-light" ><?php echo e($category->priority); ?></span>


										<?php elseif($category->priority == "High"): ?>

										<span class="badge badge-danger-light"><?php echo e($category->priority); ?></span>

										<?php elseif($category->priority == "Critical"): ?>

										<span class="badge badge-danger-dark"><?php echo e($category->priority); ?></span>

										<?php else: ?>

										<span class="badge badge-warning-light"><?php echo e($category->priority); ?></span>

										<?php endif; ?>

									<?php else: ?>
										~
									<?php endif; ?>
								</td>
								<td>
									<?php if(Auth::user()->can('Category Edit')): ?>
										<?php if($category->status == '1'): ?>
											<label class="custom-switch form-switch mb-0">
												<input type="checkbox" name="status" data-id="<?php echo e($category->id); ?>" id="myonoffswitch<?php echo e($category->id); ?>" value="1" class="custom-switch-input tswitch" checked>
												<span class="custom-switch-indicator"></span>
											</label>
										<?php else: ?>
											<label class="custom-switch form-switch mb-0">
												<input type="checkbox" name="status" data-id="<?php echo e($category->id); ?>" id="myonoffswitch<?php echo e($category->id); ?>" value="1" class="custom-switch-input tswitch">
												<span class="custom-switch-indicator"></span>
											</label>
										<?php endif; ?>
									<?php else: ?>
										~
									<?php endif; ?>
								</td>
								<td>
									<div class = "d-flex">
									<?php if(Auth::user()->can('Category Edit')): ?>

										<a href="javascript:void(0)" data-id="<?php echo e($category->id); ?>" class="action-btns1 edit-testimonial">
											<i class="feather feather-edit text-primary" data-id="<?php echo e($category->id); ?>"data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Edit')); ?>"></i>
										</a>

									<?php else: ?>
										~
									<?php endif; ?>
									<?php if(Auth::user()->can('Category Delete')): ?>

										<a href="javascript:void(0)" data-id="<?php echo e($category->id); ?>" class="action-btns1 delete-category">
											<i class="feather feather-trash-2 text-danger" data-id="<?php echo e($category->id); ?>"data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Delete')); ?>"></i>
										</a>

									<?php else: ?>
										~
									<?php endif; ?>
									</div>
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
<!-- List Category List -->

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

<!-- INTERNAL Vertical-scroll js-->
<script src="<?php echo e(asset('assets/plugins/vertical-scroll/jquery.bootstrap.newsbox.js')); ?>?v=<?php echo time(); ?>"></script>

<!-- INTERNAL Data tables -->
<script src="<?php echo e(asset('assets/plugins/datatable/js/jquery.dataTables.min.js')); ?>?v=<?php echo time(); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')); ?>?v=<?php echo time(); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/dataTables.responsive.min.js')); ?>?v=<?php echo time(); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/responsive.bootstrap5.min.js')); ?>?v=<?php echo time(); ?>"></script>

<!-- INTERNAL Index js-->
<script src="<?php echo e(asset('assets/js/support/support-sidemenu.js')); ?>?v=<?php echo time(); ?>"></script>

<!--File BROWSER -->
<script src="<?php echo e(asset('assets/js/form-browser.js')); ?>?v=<?php echo time(); ?>"></script>

<!-- INTERNAL Sweet-Alert js-->
<script src="<?php echo e(asset('assets/plugins/sweet-alert/sweetalert.min.js')); ?>?v=<?php echo time(); ?>"></script>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('modal'); ?>

<?php echo $__env->make('admin.category.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php echo $__env->make('admin.category.groupmodal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\cms-kit\resources\views/admin/category/index.blade.php ENDPATH**/ ?>