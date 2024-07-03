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

				<a href="javascript:void(0)" class="btn btn-secondary me-3 mb-sm-0 mb-2" id="create-new-testimonial"><?php echo e(lang('Add Category')); ?></a>
				<?php endif; ?>

				<?php $module = Module::all(); ?>

				<?php if(in_array('Uhelpupdate', $module)): ?>
				
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

<script type="text/javascript">

	"use strict";

	(function($)  {

		// Variables
		var SITEURL = '<?php echo e(url('')); ?>';

		// select2 js
		$('.select2').select2({
			minimumResultsForSearch: Infinity
		});

		// Csrf field
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		// Datatable
		// $('#support-category').dataTable({
		// 	responsive: true,
		// 	language: {
		// 		searchPlaceholder: search,
		// 		scrollX: "100%",
		// 		sSearch: '',
		// 	},
		// 	order:[],
		// 	columnDefs: [
		// 		{ "orderable": false, "targets":[0,1] }
		// 	],

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
		$('#support-category').dataTable({
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
			order:[],
			columnDefs: [
				{ "orderable": false, "targets":[ 0,1,4] }
			],
		});

		/*  When user click add category button */
		$('#create-new-testimonial').on('click', function () {
			$('#btnsave').val("create-product");
			$('#testimonial_id').val('');
			$('#testimonial_form').trigger("reset");
			$('.modal-title').html("<?php echo e(lang('Add New Category')); ?>");

			$.post('category/all', function(data){
				$('.categorysub').html(data);
				$('.categorysub').select2({
					dropdownParent: ".sprukosubcat",
					minimumResultsForSearch: '',
					width: '100%',
				});

			});
			$('#addtestimonial').modal('show');

			checkPro()
		});

		function checkPro(){
			let displayOpt = document.querySelectorAll('.display');
			displayOpt.forEach((ele, index)=>{
				ele.addEventListener('click', function(){
					let subCat = document.querySelector('#priority_hide');
					if(ele.value === 'knowledge'){
						subCat.style.display = "none";
						}
						else{

							subCat.style.display = "block";
					}
				})
			});
		}

		/* When click edit category */
		$('body').on('click', '.edit-testimonial', function () {
			var testimonial_id = $(this).data('id');
			$.get('categories/' + testimonial_id  + '/edit', function (data) {
				$('#nameError').html('');
				$('#displayError').html('');
				$('#priorityError').html('');
				$('.modal-title').html("<?php echo e(lang('Edit Category')); ?>");
				$('#btnsave').val("edit-testimonial");
				$('#addtestimonial').modal('show');
				$('#testimonial_id').val(data.post.id);
				$('#name').val(data.post.name);
				if (data.post.display == "both")
				{
					$('#display').prop('checked', true);
				}
				if (data.post.display == "ticket")
				{
					$('#display1').prop('checked', true);
				}
				if (data.post.display == "knowledge")
				{
					$('#display2').prop('checked', true);
				}
				if (data.post.priority == "Low")
				{
					$('#priority').prop('checked', true);
				}
				if (data.post.priority == "Medium")
				{
					$('#priority1').prop('checked', true);
				}
				if (data.post.priority == "High")
				{
					$('#priority2').prop('checked', true);
				}
				if (data.post.status == "1")
				{
					$('#myonoffswitch18').prop('checked', true);
				}
				$('.categorysub').select2({
					dropdownParent: ".sprukosubcat",
					minimumResultsForSearch: '',
					width: '100%',

				});
				$('.categorysub').html(data.output);

				let displayOpt = document.querySelectorAll('.display');
				displayOpt.forEach((ele, index)=>{
					if(ele.checked){
						let subCat = document.querySelector('#priority_hide');
						if(ele.value === 'knowledge'){
							subCat.style.display = "none";
							}
							else{

								subCat.style.display = "block";
						}
					}
				})
				checkPro();


			})
		});

		/* When click delete category */
		$('body').on('click', '.delete-category', function () {
			var _id = $(this).data("id");
				swal({
					title: `<?php echo e(lang('Are you sure you want to continue?', 'alerts')); ?>`,
					text: "<?php echo e(lang('This might erase your records permanently', 'alerts')); ?>",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						$.ajax({
							type: "get",
							url: SITEURL + "/admin/categories/"+_id,
							success: function (data) {
								toastr.success(data.success);
								location.reload();
							},
							error: function (data) {
							console.log('Error:', data);
							}
						});
					}
				});
		});

		// Category status change
		$('body').on('click', '.tswitch', function () {
			var _id = $(this).data("id");
			var status = $(this).prop('checked') == true ? '1' : '0';
			$.ajax({
				type: "get",
				url: SITEURL + "/admin/categories/status"+_id,
				data: {'status': status},
				success: function (data) {
					toastr.success(data.success);
					location.reload();
				},
				error: function (data) {
					console.log('Error:', data);
				}
			});
		});

		// Category group assign js
		$('body').on('click', '#assigneds', function () {
			var assigned_group = $(this).data('id');
			$('.select2_modalcategory').select2({
				minimumResultsForSearch: '',
				placeholder: "Search",
				width: '100%'
			});

			$.get('groupassigned/' + assigned_group , function (data) {
				$('#category_id').val(data.assign_data.id);
				$('#category_name').val(data.assign_data.name);
				$(".modal-title").text('<?php echo e(lang('Assign To Groups')); ?>');
				$('#groupname').html('');
				$('#groupname').html(data.table_data);
				$('#addassigneds').modal('show');

			});
		});

		// Category form submit
		// $('body').on('submit', '#testimonial_form', function (e) {
		// 	e.preventDefault();
		// 	var actionType = $('#btnsave').val();
		// 	var fewSeconds = 2;
		// 	$('#btnsave').html('Sending..');
		// 	$('#btnsave').prop('disabled', true);
		// 		setTimeout(function(){
		// 			$('#btnsave').prop('disabled', false);
		// 		}, fewSeconds*1000);
		// 	var formData = new FormData(this);
		// 	$.ajax({
		// 		type:'POST',
		// 		url: SITEURL + "/admin/categories/store",
		// 		data: formData,
		// 		cache:false,
		// 		contentType: false,
		// 		processData: false,
		// 		success: (data) => {
		// 			if(data.errors){
		// 				$('#nameError').html('');
		// 				$('#displayError').html('');
		// 				$('#nameError').html(data.errors.name);
		// 				$('#displayError').html(data.errors.display);
		// 				$('#btnsave').html('<?php echo e(lang('Save Changes')); ?>');

		// 			}
		// 			if(data.success)
		// 			{
		// 				$('#nameError').html('');
		// 				$('#displayError').html('');
		// 				$('#testimonial_form').trigger("reset");
		// 				$('#addtestimonial').modal('hide');
		// 				$('#btnsave').html('<?php echo e(lang('Save Changes')); ?>');
		// 				toastr.success(data.success);
		// 				location.reload();
		// 			}

		// 		},
		// 		error: function(data){
		// 			console.log(data);
		// 			toastr.error('<?php echo e(lang('Category name already exists', 'alerts')); ?>');
		// 			$('#btnsave').html('<?php echo e(lang('Save Changes')); ?>');
		// 		}
		// 	});
		// });

		$('body').on('submit', '#testimonial_form', function (e) {
		e.preventDefault(); // Prevent default form submission

		// Disable the button during the request
		$('#btnsave').prop('disabled', true);
		$('#btnsave').html('Sending...');

		// Create a FormData object from the form
		var formData = new FormData(this);

		// Make an AJAX POST request
		$.ajax({
			type: 'POST',
			url: SITEURL + "/admin/categories/store",
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			success: function (data) {
				// Handle success response
				if (data.errors) {
					// Handle validation errors
					$('#nameError').html(data.errors.name);
					$('#displayError').html(data.errors.display);
				} else if (data.success) {
					// Clear any previous error messages
					$('#nameError').html('');
					$('#displayError').html('');

					// Reset the form and close the modal
					$('#testimonial_form').trigger("reset");
					$('#addtestimonial').modal('hide');

					// Show success message
					toastr.success(data.success);

					// Reload the page
					location.reload();
				}
			},
			error: function (data) {
				// Handle server-side error
				console.log(data);
				toastr.error('An error occurred. Please try again later.');
			},
			complete: function () {
				// Re-enable the button after the request completes
				$('#btnsave').prop('disabled', false);
				$('#btnsave').html('<?php echo e(lang('Save Changes')); ?>');
			}
		});
	});


		// Assign group submit
		$('body').on('submit', '#group_form', function (e) {
			e.preventDefault();
			var assigned_id = $(this).data('id');
			var actionType = $('#btngroup').val();
			var fewSeconds = 2;
			$('#btngroup').html('Sending..');
			$('#btngroup').prop('disabled', true);
				setTimeout(function(){
					$('#btngroup').prop('disabled', false);
				}, fewSeconds*1000);
			var formData = new FormData(this);
			$.ajax({
				type:'POST',
				url: SITEURL + "/admin/groupcategory/group",
				data: formData,
				cache:false,
				contentType: false,
				processData: false,
				success: (data) => {
					$('#group_form').trigger("reset");
					$('#addassigneds').modal('hide');
					$('#btngroup').html('<?php echo e(lang('Save Changes')); ?>');
					toastr.success(data.success);
					window.location.reload();
				},
				error: function(data){
					console.log('Error:', data);
					$('#btnsave').html('<?php echo e(lang('Save Changes')); ?>');
				}
			});
		});


		//Mass Delete
		$('body').on('click', '#massdelete', function () {
			var id = [];
			$('.checkall:checked').each(function(){
				id.push($(this).val());
			});
			if(id.length > 0){
				swal({
					title: `<?php echo e(lang('Are you sure you want to continue?', 'alerts')); ?>`,
					text: "<?php echo e(lang('This might erase your records permanently', 'alerts')); ?>",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						$.ajax({
							url:"<?php echo e(route('category.deleteall')); ?>",
							method:"GET",
							data:{id:id},
							success:function(data)
							{
								toastr.success(data.success);
								location.reload();

							},
							error:function(data){

							}
						});
					}
				});
			}else{
				toastr.error('<?php echo e(lang('Please select at least one check box.', 'alerts')); ?>');
			}
		});

		// Checkbox checkall
		$('#customCheckAll').on('click', function() {
			$('.checkall').prop('checked', this.checked);
		});

		$('.form-select').select2({
			minimumResultsForSearch: Infinity,
			width: '100%'
		});
		$('#customCheckAll').prop('checked', false);

		$('.checkall').on('click', function(){
			if($('.checkall:checked').length == $('.checkall').length){
				$('#customCheckAll').prop('checked', true);
			}else{
				$('#customCheckAll').prop('checked', false);
			}
		});

	})(jQuery);
</script>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('modal'); ?>

<?php echo $__env->make('admin.category.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php echo $__env->make('admin.category.groupmodal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.adminmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\cms-kit\resources\views/admin/category/index.blade.php ENDPATH**/ ?>