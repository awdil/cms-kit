@extends('layouts.adminmaster')

@section('styles')

<!-- INTERNAL Data table css -->
<link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}?v=<?php echo time(); ?>" rel="stylesheet" />
<link href="{{asset('assets/plugins/datatable/responsive.bootstrap5.css')}}?v=<?php echo time(); ?>" rel="stylesheet" />

<!-- INTERNAL Sweet-Alert css -->
<link href="{{asset('assets/plugins/sweet-alert/sweetalert.css')}}?v=<?php echo time(); ?>" rel="stylesheet" />

@endsection

@section('content')

<!--Page header-->
<div class="page-header d-xl-flex d-block">
	<div class="page-leftheader">
		<h4 class="page-title"><span class="font-weight-normal text-muted ms-2">{{lang('Category')}}</span></h4>
	</div>
</div>
<!--End Page header-->

<!--Category List -->
<div class="col-xl-12 col-lg-12 col-md-12">
	<div class="card ">
		<div class="card-header border-0 d-sm-flex d-block">
			<h4 class="card-title">{{lang('Category List')}}</h4>
			<div class="card-options mt-sm-max-2 d-sm-flex d-block">
				@can('Category Create')

				<a href="javascript:void(0)" class="btn btn-secondary me-3 mb-sm-0 mb-2" id="create-category">{{lang('Add Category')}}</a>
				@endcan

				

			</div>
		</div>
		<div class="card-body" >
			<div class="table-responsive spruko-delete">
				@can('Category Delete')

				<button id="massdelete" class="btn btn-outline-light btn-sm mb-4 data-table-btn"><i class="fe fe-trash"></i> {{lang('Delete')}}</button>
				@endcan
				<table class="table table-bordered border-bottom text-nowrap w-100" id="support-category">
					<thead>
						<tr>
							<th >{{lang('Sl.No')}}</th>
							@can('Category Delete')

							<th width="10" >
								<input type="checkbox"  id="customCheckAll">
								<label  for="customCheckAll"></label>
							</th>
							@endcan
							@cannot('Category Delete')

							<th width="10" >
								<input type="checkbox"  id="customCheckAll" disabled>
								<label  for="customCheckAll"></label>
							</th>
							@endcannot
							<th >{{lang('Category Name')}}</th>
							<th >{{lang('Ticket/Knowledge')}}</th>
							<th >{{lang('Assign To Groups')}}</th>
							<th >{{lang('Assigned Priority')}}</th>
							<th >{{lang('Status')}}</th>
							<th >{{lang('Actions')}}</th>
						</tr>
					</thead>
					<tbody>
						@php $i = 1; @endphp
						@foreach($categories as $category)
							<tr>
								<td>{{$i++}}</td>
								<td>
									@if(Auth::user()->can('Category Delete'))
										<input type="checkbox" name="student_checkbox[]" class="checkall" value="{{$category->id}}" />
									@else
										<input type="checkbox" name="student_checkbox[]" class="checkall" value="{{$category->id}}" disabled />
									@endif
								</td>
								<td>{{$category->name}}</td>
								<td>{{$category->display}}</td>
								<td>
									@if(Auth::user()->can('Category Assign To Groups'))

										@if($category->display == 'ticket' || $category->display == 'both')
											<a href="javascript:void(0)" data-id="{{$category->id}}" id="assigneds" class="badge badge-pill badge-info mt-2" data-bs-toggle="tooltip" data-bs-placement="top" title="{{lang('Assign to group')}}">
												{{$category->groupscategoryc()->count()}}
											</a>
										@endif

									@else
										~
									@endif
								</td>
								<td>
									@if($category->priority != null)

										@if($category->priority == "Low")

										<span class="badge badge-success-light" >{{$category->priority}}</span>


										@elseif($category->priority == "High")

										<span class="badge badge-danger-light">{{$category->priority}}</span>

										@elseif($category->priority == "Critical")

										<span class="badge badge-danger-dark">{{$category->priority}}</span>

										@else

										<span class="badge badge-warning-light">{{$category->priority}}</span>

										@endif

									@else
										~
									@endif
								</td>
								<td>
									@if(Auth::user()->can('Category Edit'))
										@if($category->status == '1')
											<label class="custom-switch form-switch mb-0">
												<input type="checkbox" name="status" data-id="{{$category->id}}" id="myonoffswitch{{$category->id}}" value="1" class="custom-switch-input tswitch" checked>
												<span class="custom-switch-indicator"></span>
											</label>
										@else
											<label class="custom-switch form-switch mb-0">
												<input type="checkbox" name="status" data-id="{{$category->id}}" id="myonoffswitch{{$category->id}}" value="1" class="custom-switch-input tswitch">
												<span class="custom-switch-indicator"></span>
											</label>
										@endif
									@else
										~
									@endif
								</td>
								<td>
									<div class = "d-flex">
									@if(Auth::user()->can('Category Edit'))

										<a href="javascript:void(0)" data-id="{{$category->id}}" class="action-btns1 edit-testimonial">
											<i class="feather feather-edit text-primary" data-id="{{$category->id}}"data-bs-toggle="tooltip" data-bs-placement="top" title="{{lang('Edit')}}"></i>
										</a>

									@else
										~
									@endif
									@if(Auth::user()->can('Category Delete'))

										<a href="javascript:void(0)" data-id="{{$category->id}}" class="action-btns1 delete-category">
											<i class="feather feather-trash-2 text-danger" data-id="{{$category->id}}"data-bs-toggle="tooltip" data-bs-placement="top" title="{{lang('Delete')}}"></i>
										</a>

									@else
										~
									@endif
									</div>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		</div>
	</div>
</div>
<!-- List Category List -->

@endsection


@section('scripts')

<!-- INTERNAL Vertical-scroll js-->
<script src="{{asset('assets/plugins/vertical-scroll/jquery.bootstrap.newsbox.js')}}?v=<?php echo time(); ?>"></script>

<!-- INTERNAL Data tables -->
<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}?v=<?php echo time(); ?>"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}?v=<?php echo time(); ?>"></script>
<script src="{{asset('assets/plugins/datatable/dataTables.responsive.min.js')}}?v=<?php echo time(); ?>"></script>
<script src="{{asset('assets/plugins/datatable/responsive.bootstrap5.min.js')}}?v=<?php echo time(); ?>"></script>

<!-- INTERNAL Index js-->
<script src="{{asset('assets/js/support/support-sidemenu.js')}}?v=<?php echo time(); ?>"></script>

<!--File BROWSER -->
<script src="{{asset('assets/js/form-browser.js')}}?v=<?php echo time(); ?>"></script>

<!-- INTERNAL Sweet-Alert js-->
<script src="{{asset('assets/plugins/sweet-alert/sweetalert.min.js')}}?v=<?php echo time(); ?>"></script>

@endsection


@section('modal')

@include('admin.category.modal')
		@include('admin.category.groupmodal')
@endsection
