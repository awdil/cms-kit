		<?php $__env->startSection('styles'); ?>

		<!-- INTERNAL Data table css -->
		<link href="<?php echo e(asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />
		<link href="<?php echo e(asset('assets/plugins/datatable/responsive.bootstrap5.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />

		<?php $__env->stopSection(); ?>

							<?php $__env->startSection('content'); ?>

							<!--Page header-->
							<div class="page-header d-xl-flex d-block">
								<div class="page-leftheader">
									<h4 class="page-title"><span class="font-weight-normal text-muted ms-2"><?php echo e(lang('Email Templates', 'menu')); ?></span></h4>
								</div>
							</div>
							<!--End Page header-->

							<!-- Email Template List -->
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="card ">
									<div class="card-header border-0">
										<h4 class="card-title"><?php echo e(lang('Email Templates', 'menu')); ?></h4>
									</div>
									<div class="card-body" >
										<div class="table-responsive">
											<table class="table table-bordered border-bottom text-nowrap w-100" id="support-articlelists">
												<thead  >
													<tr>
														<th  width="10"><?php echo e(lang('Sl.No')); ?></th>
														<th ><?php echo e(lang('Title')); ?></th>
														<th ><?php echo e(lang('Last Updated on')); ?></th>
														<th ><?php echo e(lang('Action')); ?></th>
													</tr>
												</thead>
												<tbody>
													<?php $i = 1; ?>
												<?php $__currentLoopData = $emailtemplates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emailtemplate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

													<tr id="row_<?php echo e($emailtemplate->id); ?>">
														<td><?php echo e($i++); ?></td>
														<td><?php echo e($emailtemplate->title); ?></td>
														<td><?php echo e($emailtemplate->updated_at); ?></td>
														<td>
															<div class = "d-flex">
																<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Email Template Edit')): ?>

																<a href="<?php echo e(route('settings.email.edit', $emailtemplate->id)); ?>"  class="action-btns1">
																	<i class="feather feather-edit text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Edit')); ?>"></i>
																</a>
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
							<!-- End Email Template List -->
							<?php $__env->stopSection(); ?>
		<?php $__env->startSection('scripts'); ?>

		<!-- INTERNAL Data tables -->
		<script src="<?php echo e(asset('assets/plugins/datatable/js/jquery.dataTables.min.js')); ?>?v=<?php echo time(); ?>"></script>
		<script src="<?php echo e(asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')); ?>?v=<?php echo time(); ?>"></script>
		<script src="<?php echo e(asset('assets/plugins/datatable/dataTables.responsive.min.js')); ?>?v=<?php echo time(); ?>"></script>
		<script src="<?php echo e(asset('assets/plugins/datatable/responsive.bootstrap5.min.js')); ?>?v=<?php echo time(); ?>"></script>

		<!-- INTERNAL Index js-->
		<script src="<?php echo e(asset('assets/js/support/support-sidemenu.js')); ?>?v=<?php echo time(); ?>"></script>

		<script type="text/javascript">

			"use strict";

			// Datatable
			// $('#support-articlelists').dataTable({
			// 	order:[],
			// 	responsive: true,
			// });

            let prev = <?php echo json_encode(lang("Previous")); ?>;
            let next = <?php echo json_encode(lang("Next")); ?>;
            let nodata = <?php echo json_encode(lang("No data available in table")); ?>;
            let noentries = <?php echo json_encode(lang("No entries to show")); ?>;
            let showing = <?php echo json_encode(lang("showing page")); ?>;
            let ofval = <?php echo json_encode(lang("of")); ?>;
            let maxRecordfilter = <?php echo json_encode(lang("- filtered from ")); ?>;
            let maxRecords = <?php echo json_encode(lang("records")); ?>;
            let entries = <?php echo json_encode(lang("entries")); ?>;
            let show = <?php echo json_encode(lang("Show")); ?>;
            let search = <?php echo json_encode(lang("Search...")); ?>;
            // Datatable
            $('#support-articlelists').dataTable({
                order:[],
				responsive: true,
                language: {
                    searchPlaceholder: search,
                    scrollX: "100%",
                    sSearch: '',
                    paginate: {
                    previous: prev,
                    next: next
                    },
                    emptyTable : nodata,
                    infoFiltered: `${maxRecordfilter} _MAX_ ${maxRecords}`,
                    info: `${showing} _PAGE_ ${ofval} _PAGES_`,
                    infoEmpty: noentries,
                    lengthMenu: `${show} _MENU_ ${entries} `,
                },
                // order:[],
                // columnDefs: [
                //     { "orderable": false, "targets":[ 0,1,4] }
                // ],
            });

			// select2 js in datatable
			$('.form-select').select2({
				minimumResultsForSearch: Infinity,
				width: '100%'
			});
		</script>

		<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\complaint-ticketing-system\resources\views/admin/email/index.blade.php ENDPATH**/ ?>