        <?php $__env->startSection('styles'); ?>

        <!-- galleryopen CSS -->
		<link href="<?php echo e(asset('assets/plugins/simplelightbox/simplelightbox.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet">

		<!-- INTERNAL Sweet-Alert css -->
		<link href="<?php echo e(asset('assets/plugins/sweet-alert/sweetalert.css')); ?>?v=<?php echo time(); ?>" rel="stylesheet" />

        <?php $__env->stopSection(); ?>


		<?php $__env->startSection('content'); ?>
		<!--Page header-->
		<div class="page-header d-xl-flex d-block">
			<div class="page-leftheader">
				<h4 class="page-title"><span class="font-weight-normal text-muted ms-2"><?php echo e(lang('Ticket Information')); ?></span></h4>
			</div>
			<div class="page-rightheader ms-md-auto">
				<a href="javascript:void(0)" data-id="<?php echo e($tickettrashedview->id); ?>" class="btn btn-sm btn-danger" id="show-delete">
					<span> Delete Ticket </span>
					<i class="feather feather-trash-2 text-white" data-id="<?php echo e($tickettrashedview->id); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Delete')); ?>"></i>
				</a>
				<a href="javascript:void(0)" data-id="<?php echo e($tickettrashedview->id); ?>" class="btn btn-sm btn-info" id="show-restore" >
					<span> Restore Ticket </span>
					<i class="feather feather-rotate-ccw text-white" data-id="<?php echo e($tickettrashedview->id); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Restore')); ?>"></i>
				</a>
			</div>
		</div>
		<!--End Page header-->


		<!--Row-->
		<div class="row">
			<div class="col-xl-12 col-md-12 col-lg-12">
				<div class="row">
					<div class="col-xl-7 col-lg-12 col-md-12">
						
						<div class="card">
							<div class="card-header border-0 mb-1 d-block">
								<div class="d-sm-flex d-block">
									<div>
										<h4 class="card-title mb-1 fs-22"><?php echo e($tickettrashedview->subject); ?> </h4>
									</div>
									<div class="card-options float-sm-end ticket-status">
										<?php if($tickettrashedview->status == "New"): ?>

										<span class="badge badge-burnt-orange"><?php echo e($tickettrashedview->status); ?></span>
										<?php elseif($tickettrashedview->status == "Re-Open"): ?>

										<span class="badge badge-teal"><?php echo e($tickettrashedview->status); ?></span>
										<?php elseif($tickettrashedview->status == "Inprogress"): ?>

										<span class="badge badge-info"><?php echo e($tickettrashedview->status); ?></span>
										<?php elseif($tickettrashedview->status == "On-Hold"): ?>

										<span class="badge badge-warning"><?php echo e($tickettrashedview->status); ?></span>
										<?php else: ?>

										<span class="badge badge-danger"><?php echo e($tickettrashedview->status); ?></span>
										<?php endif; ?>

									</div>
								</div>
								<small class="fs-13"><i class="feather feather-clock text-muted me-1"></i><?php echo e(lang('Created Date')); ?> <span class="text-muted"><?php echo e($tickettrashedview->created_at->diffForHumans()); ?></span></small>
							</div>
							<div class="card-body pt-2 readmores px-6 mx-1">
								<div>
									<span><?php echo $tickettrashedview->message; ?></span>

									<div class="row galleryopen">
										<?php $__currentLoopData = $tickettrashedview->getMedia('ticket'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tickettrashedviewss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

										<div class="file-image-1 removespruko<?php echo e($tickettrashedviewss->id); ?>" id="imageremove<?php echo e($tickettrashedviewss->id); ?>">
											<div class="product-image">
												<a href="<?php echo e($tickettrashedviewss->getFullUrl()); ?>" class="imageopen">
													<img src="<?php echo e($tickettrashedviewss->getFullUrl()); ?>" class="br-5" alt="<?php echo e($tickettrashedviewss->file_name); ?>">
												</a>

											</div>
										</div>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

									</div>
								</div>
							</div>

						</div>
						<?php

						$comments = $tickettrashedview->comments()->onlyTrashed()->get();

						?>
						<?php if($comments->isNotEmpty()): ?>
						<div class="card">
							<div class="card-header">
								<h4 class="card-title"><?php echo e(lang('conversations')); ?></h4>
							</div>

							<?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if($comment->user_id != null): ?>
									
									<?php if($loop->first): ?>

										<div class="card-body">
											<div class="d-sm-flex">
												<div class="d-flex me-3">
													<a href="#">
														<?php if($comment->user != null): ?>
														<?php if($comment->user->image == null): ?>

														<img src="<?php echo e(asset('uploads/profile/user-profile.png')); ?>"  class="media-object brround avatar-lg" alt="default">
														<?php else: ?>

														<img class="media-object brround avatar-lg" alt="<?php echo e($comment->user->image); ?>" src="<?php echo e(asset('uploads/profile/'. $comment->user->image)); ?>">
														<?php endif; ?>
														<?php else: ?>

														<img src="<?php echo e(asset('uploads/profile/user-profile.png')); ?>"  class="media-object brround avatar-lg" alt="default">
														<?php endif; ?>

													</a>
												</div>
												<div class="media-body">
													<?php if($comment->user != null): ?>

													<h5 class="mt-1 mb-1 font-weight-semibold"><?php echo e($comment->user->name); ?><?php if(!empty($comment->user->getRoleNames()[0])): ?><span class="badge badge-primary-light badge-md ms-2"><?php echo e($comment->user->getRoleNames()[0]); ?></span><?php endif; ?></h5>
													<?php else: ?>

													<h5 class="mt-1 mb-1 font-weight-semibold text-muted">~</h5>
													<?php endif; ?>

													<small class="text-muted"><i class="feather feather-clock"></i> <?php echo e($comment->created_at->diffForHumans()); ?></small>
													<div class="fs-13 mb-0 mt-1">
														<?php echo $comment->comment; ?>

													</div>
													<div class="editsupportnote-icon animated" id="supportnote-icon-<?php echo e($comment->id); ?>">
														<form action="<?php echo e(url('admin/ticket/editcomment/'.$comment->id)); ?>" method="POST">
															<?php echo csrf_field(); ?>

															<textarea class="editsummernote" name="editcomment"> <?php echo e($comment->comment); ?></textarea>
														<div class="btn-list mt-1">
															<input type="submit" class="btn btn-secondary" onclick="this.disabled=true;this.form.submit();" value="Update">
														</div>
														</form>
													</div>

													<?php if(Auth::id() == $comment->user_id): ?>

														<div class="row galleryopen">
															<?php $__currentLoopData = $comment->getMedia('comments'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commentss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

															<div class="file-image-1  removespruko<?php echo e($commentss->id); ?>" id="imageremove<?php echo e($commentss->id); ?>">
																<div class="product-image  ">
																	<a href="<?php echo e($commentss->getFullUrl()); ?>" class="imageopen">
																		<img src="<?php echo e($commentss->getFullUrl()); ?>" class="br-5" alt="<?php echo e($commentss->file_name); ?>">
																	</a>
																</div>
																<span class="file-name-1">
																	<?php echo e(Str::limit($commentss->file_name, 10, $end='.......')); ?>

																</span>
															</div>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

														</div>
													<?php else: ?>

														<div class="row galleryopen">
															<?php $__currentLoopData = $comment->getMedia('comments'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commentss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

															<div class="file-image-1  removespruko<?php echo e($commentss->id); ?>" id="imageremove<?php echo e($commentss->id); ?>">
																<div class="product-image  ">
																	<a href="<?php echo e($commentss->getFullUrl()); ?>" class="imageopen">
																		<img src="<?php echo e($commentss->getFullUrl()); ?>" class="br-5" alt="<?php echo e($commentss->file_name); ?>">
																	</a>
																</div>
																<span class="file-name-1">
																	<?php echo e(Str::limit($commentss->file_name, 10, $end='.......')); ?>

																</span>
															</div>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

														</div>
													<?php endif; ?>

												</div>


											</div>
										</div>
									<?php else: ?>

										<div class="card-body">
											<div class="d-sm-flex">
												<div class="d-flex me-3">
													<a href="#">
														<?php if($comment->user != null): ?>
														<?php if($comment->user->image == null): ?>

														<img src="<?php echo e(asset('uploads/profile/user-profile.png')); ?>"  class="media-object brround avatar-lg" alt="default">
														<?php else: ?>

														<img class="media-object brround avatar-lg" alt="<?php echo e($comment->user->image); ?>" src="<?php echo e(asset('uploads/profile/'. $comment->user->image)); ?>">
														<?php endif; ?>
														<?php else: ?>

														<img src="<?php echo e(asset('uploads/profile/user-profile.png')); ?>"  class="media-object brround avatar-lg" alt="default">
														<?php endif; ?>

													</a>
												</div>
												<div class="media-body">
													<?php if($comment->user != null): ?>

													<h5 class="mt-1 mb-1 font-weight-semibold"><?php echo e($comment->user->name); ?><?php if(!empty($comment->user->getRoleNames()[0])): ?><span class="badge badge-primary-light badge-md ms-2"><?php echo e($comment->user->getRoleNames()[0]); ?></span><?php endif; ?></h5>
													<?php else: ?>

													<h5 class="mt-1 mb-1 font-weight-semibold text-muted">~</h5>
													<?php endif; ?>

													<small class="text-muted"><i class="feather feather-clock"></i> <?php echo e($comment->created_at->diffForHumans()); ?></small>
													<div class="fs-13 mb-0 mt-1">
														<?php echo $comment->comment; ?>

													</div>
													<div class="row galleryopen">
														<?php $__currentLoopData = $comment->getMedia('comments'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commentss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

															<div class="file-image-1  removespruko<?php echo e($commentss->id); ?>" id="imageremove<?php echo e($commentss->id); ?>">
																<div class="product-image  ">
																	<a href="<?php echo e($commentss->getFullUrl()); ?>" class="imageopen">
																		<img src="<?php echo e($commentss->getFullUrl()); ?>" class="br-5" alt="<?php echo e($commentss->file_name); ?>">
																	</a>
																</div>
																<span class="file-name-1">
																	<?php echo e(Str::limit($commentss->file_name, 10, $end='.......')); ?>

																</span>
															</div>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

													</div>
												</div>
											</div>
										</div>
									<?php endif; ?>
									

								<?php else: ?>
									

									<div class="card-body">
										<div class="d-sm-flex">
											<div class="d-flex me-3">
												<a href="#">
													<?php if($comment->cust->image == null): ?>

													<img src="<?php echo e(asset('uploads/profile/user-profile.png')); ?>"  class="media-object brround avatar-lg" alt="default">
													<?php else: ?>

													<img class="media-object brround avatar-lg" alt="<?php echo e($comment->cust->image); ?>" src="<?php echo e(asset('uploads/profile/'. $comment->cust->image)); ?>">
													<?php endif; ?>

												</a>
											</div>
											<div class="media-body">
												<h5 class="mt-1 mb-1 font-weight-semibold"><?php echo e($comment->cust->username); ?><span class="badge badge-danger-light badge-md ms-2"><?php echo e($comment->cust->userType); ?></span></h5>
												<small class="text-muted"><i class="feather feather-clock"></i> <?php echo e($comment->created_at->diffForHumans()); ?></small>
												<div class="fs-13 mb-0 mt-1">
													<?php echo $comment->comment; ?>


												</div>
												<div class="row galleryopen">
													<?php $__currentLoopData = $comment->getMedia('comments'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commentss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

													<div class="file-image-1  removespruko<?php echo e($commentss->id); ?>" id="imageremove<?php echo e($commentss->id); ?>">
														<div class="product-image  ">
															<a href="<?php echo e($commentss->getFullUrl()); ?>" class="imageopen">
																<img src="<?php echo e($commentss->getFullUrl()); ?>" class="br-5" alt="<?php echo e($commentss->file_name); ?>">
															</a>
														</div>
														<span class="file-name-1">
															<?php echo e(Str::limit($commentss->file_name, 10, $end='.......')); ?>


														</span>
													</div>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

												</div>
											</div>
										</div>
									</div>

									
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
						<?php endif; ?>


					</div>

					<div class="col-xl-5 col-lg-12 col-md-12">
						<div class="card">
							<div class="card-header  border-0">
								<div class="card-title"><?php echo e(lang('Ticket Information')); ?></div>
							</div>
							<div class="card-body pt-2 ps-0 pe-0 pb-0">
								<div class="table-responsive tr-lastchild">
									<table class="table mb-0 table-information">
										<tbody>

											<tr>
												<td>
													<span class="w-50"><?php echo e(lang('Ticket ID')); ?></span>
												</td>
												<td>:</td>
												<td>
													<span class="font-weight-semibold">#<?php echo e($tickettrashedview->ticket_id); ?></span>
												</td>
											</tr>
											<tr>
												<td>
													<span class="w-50"><?php echo e(lang('Category')); ?></span>
												</td>
												<td>:</td>
												<td>
													<?php if($tickettrashedview->category_id != null): ?>
														<?php if($tickettrashedview->category != null): ?>

														<span class="font-weight-semibold"><?php echo e($tickettrashedview->category->name); ?></span>

														<?php else: ?>
														~
														<?php endif; ?>
													<?php else: ?>
														~
													<?php endif; ?>

												</td>
											</tr>
											<?php if($tickettrashedview->subcategory != null): ?>
											<tr>
												<td>
													<span class="w-50"><?php echo e(lang('SubCategory')); ?></span>
												</td>
												<td>:</td>
												<td>
													<span class="font-weight-semibold"><?php echo e($tickettrashedview->subcategoriess->subcategoryname); ?></span>

												</td>
											</tr>
											<?php endif; ?>

											<?php if($tickettrashedview->project != null): ?>

											<tr>
												<td>
													<span class="w-50"><?php echo e(lang('Project')); ?></span>
												</td>
												<td>:</td>
												<td>
													<span class="font-weight-semibold"><?php echo e($tickettrashedview->project); ?></span>
												</td>
											</tr>
											<?php endif; ?>
											<?php if($tickettrashedview->priority != null): ?>
											<tr>
												<td>
													<span class="w-50"><?php echo e(lang('Priority')); ?></span>
												</td>
												<td>:</td>
												<td id="priorityid">
													<?php if($tickettrashedview->priority == "Low"): ?>

														<span class="badge badge-success-light" ><?php echo e($tickettrashedview->priority); ?></span>

													<?php elseif($tickettrashedview->priority == "High"): ?>

														<span class="badge badge-danger-light"><?php echo e($tickettrashedview->priority); ?></span>

													<?php elseif($tickettrashedview->priority == "Critical"): ?>

														<span class="badge badge-danger-dark"><?php echo e($tickettrashedview->priority); ?></span>

													<?php else: ?>

														<span class="badge badge-warning-light"><?php echo e($tickettrashedview->priority); ?></span>

													<?php endif; ?>
												</td>
											</tr>
											<?php else: ?>

											<tr>
												<td>
													<span class="w-50"><?php echo e(lang('Priority')); ?></span>
												</td>
												<td>:</td>
												<td id="priorityid">
													~
												</td>
											</tr>
											<?php endif; ?>

											<tr>
												<td>
													<span class="w-50"><?php echo e(lang('Opened Date')); ?></span>
												</td>
												<td>:</td>
												<td>
													<span class="font-weight-semibold"><?php echo e($tickettrashedview->created_at->timezone(Auth::user()->timezone)->format(setting('date_format'))); ?></span>
												</td>
											</tr>
											<tr>
												<td>
													<span class="w-50"><?php echo e(lang('Status')); ?></span>
												</td>
												<td>:</td>
												<td>
													<?php if($tickettrashedview->status == "New"): ?>

													<span class="badge badge-burnt-orange"><?php echo e($tickettrashedview->status); ?></span>
													<?php elseif($tickettrashedview->status == "Re-Open"): ?>

													<span class="badge badge-teal"><?php echo e($tickettrashedview->status); ?></span>
													<?php elseif($tickettrashedview->status == "Inprogress"): ?>

													<span class="badge badge-info"><?php echo e($tickettrashedview->status); ?></span>
													<?php elseif($tickettrashedview->status == "On-Hold"): ?>

													<span class="badge badge-warning"><?php echo e($tickettrashedview->status); ?></span>
													<?php else: ?>

													<span class="badge badge-danger"><?php echo e($tickettrashedview->status); ?></span>
													<?php endif; ?>

												</td>
											</tr>
											<?php if($tickettrashedview->replystatus != null): ?>

											<tr>
												<td>
													<span class="w-50"><?php echo e(lang('Reply Status')); ?></span>
												</td>
												<td>:</td>
												<td>
													<?php if($tickettrashedview->replystatus == "Solved"): ?>

													<span class="badge badge-success"><?php echo e($tickettrashedview->replystatus); ?></span>
													<?php elseif($tickettrashedview->replystatus == "Unanswered"): ?>

													<span class="badge badge-danger-light"><?php echo e($tickettrashedview->replystatus); ?></span>
													<?php elseif($tickettrashedview->replystatus == "Waiting for response"): ?>

													<span class="badge badge-warning"><?php echo e($tickettrashedview->replystatus); ?></span>
													<?php else: ?>
													<?php endif; ?>

												</td>
											</tr>
											<?php endif; ?>

										</tbody>
									</table>
								</div>
							</div>
						</div>

						<!-- Customer Details -->
						<div class="card">
							<div class="card-header  border-0">
								<div class="card-title"><?php echo e(lang('Customer Details')); ?></div>
							</div>
							<div class="card-body text-center pt-2 px-0 pb-0 py-0">
								<div class="profile-pic">
									<div class="profile-pic-img mb-2">
										<span class="bg-success dots" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Online')); ?>"></span>
										<?php if($tickettrashedview->cust->image == null): ?>

											<img src="<?php echo e(asset('uploads/profile/user-profile.png')); ?>"  class="brround avatar-xxl" alt="default">
										<?php else: ?>

											<img class="brround avatar-xxl" alt="<?php echo e($tickettrashedview->cust->image); ?>" src="<?php echo e(asset('uploads/profile/'. $tickettrashedview->cust->image)); ?>">
										<?php endif; ?>

									</div>
									<div class="text-dark">
										<h5 class="mb-1 font-weight-semibold2"><?php echo e($tickettrashedview->cust->username); ?></h5>
										<small class="text-muted "><?php echo e($tickettrashedview->cust->email); ?>

										</small>
									</div>
								</div>
								<div class="table-responsive text-start tr-lastchild">
									<table class="table mb-0 table-information">
										<tbody>
											<tr>
												<td>
													<span class="w-50"><?php echo e(lang('IP')); ?></span>
												</td>
												<td>:</td>
												<td>
													<span class="font-weight-semibold"><?php echo e($tickettrashedview->cust->last_login_ip); ?></span>
												</td>
											</tr>
											<tr>
												<td>
													<span class="w-50"><?php echo e(lang('Mobile Number')); ?></span>
												</td>
												<td>:</td>
												<td>
													<span class="font-weight-semibold"><?php echo e($tickettrashedview->cust->phone); ?></span>
												</td>
											</tr>
											<tr>
												<td>
													<span class="w-50"><?php echo e(lang('Country')); ?></span>
												</td>
												<td>:</td>
												<td>
													<span class="font-weight-semibold"><?php echo e($tickettrashedview->cust->country); ?></span>
												</td>
											</tr>
											<tr>
												<td>
													<span class="w-50"><?php echo e(lang('Timezone')); ?></span>
												</td>
												<td>:</td>
												<td>
													<span class="font-weight-semibold"><?php echo e($tickettrashedview->cust->timezone); ?></span>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- End Customer Details -->
						<!--ticke note  -->
						<div class="card">
							<div class="card-header  border-0">
								<div class="card-title"><?php echo e(lang('Ticket Note')); ?></div>

							</div>
							<?php $emptynote = $tickettrashedview->ticketnote()->get() ?>
							<?php if($emptynote->isNOtEmpty()): ?>
							<div class="card-body  item-user">
								<div id="refresh">

									<?php $__currentLoopData = $tickettrashedview->ticketnote()->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

									<div class="alert alert-light-warning ticketnote" id="ticketnote_<?php echo e($note->id); ?>" role="alert">
										<?php if($note->user_id == Auth::id()): ?>


										<?php endif; ?>

										<p class="m-0"><?php echo e($note->ticketnotes); ?></p>
										<p class="text-end mb-0"><small><i><b><?php echo e($note->users->name); ?></b> <?php if(!empty($note->users->getRoleNames()[0])): ?> (<?php echo e($note->users->getRoleNames()[0]); ?>) <?php endif; ?></i></small></p>
									</div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

								</div>
							</div>
							<?php else: ?>
							<div class="card-body">
								<div class="text-center ">
									<div class="avatar avatar-xxl empty-block mb-4">
										<svg xmlns="http://www.w3.org/2000/svg" height="50" width="50" viewBox="0 0 48 48"><path fill="#CDD6E0" d="M12.8 4.6H38c1.1 0 2 .9 2 2V46c0 1.1-.9 2-2 2H6.7c-1.1 0-2-.9-2-2V12.7l8.1-8.1z"/><path fill="#ffffff" d="M.1 41.4V10.9L11 0h22.4c1.1 0 2 .9 2 2v39.4c0 1.1-.9 2-2 2H2.1c-1.1 0-2-.9-2-2z"/><path fill="#CDD6E0" d="M11 8.9c0 1.1-.9 2-2 2H.1L11 0v8.9z"/><path fill="#FFD05C" d="M15.5 8.6h13.8v2.5H15.5z"/><path fill="#dbe0ef" d="M6.3 31.4h9.8v2.5H6.3zM6.3 23.8h22.9v2.5H6.3zM6.3 16.2h22.9v2.5H6.3z"/><path fill="#FFD15C" d="M22.8 35.7l-2.6 6.4 6.4-2.6z"/><path fill="#334A5E" d="M21.4 39l-1.2 3.1 3.1-1.2z"/><path fill="#FF7058" d="M30.1 18h5.5v23h-5.5z" transform="rotate(-134.999 32.833 29.482)"/><path fill="#40596B" d="M46.2 15l1 1c.8.8.8 2 0 2.8l-2.7 2.7-3.9-3.9 2.7-2.7c.9-.6 2.2-.6 2.9.1z"/><path fill="#F2F2F2" d="M39.1 19.3h5.4v2.4h-5.4z" transform="rotate(-134.999 41.778 20.536)"/></svg>
									</div>
									<h4 class="mb-2"><?php echo e(lang('Don’t have any notes yet')); ?></h4>
									<span class="text-muted"><?php echo e(lang('Add your notes here')); ?></span>
								</div>
							</div>
							<?php endif; ?>
						</div>
						<!-- End ticket note  -->
					</div>
				</div>
			</div>
		</div>

		<?php $__env->stopSection(); ?>

        <?php $__env->startSection('scripts'); ?>
        <!-- galleryopen JS -->
		<script src="<?php echo e(asset('assets/plugins/simplelightbox/simplelightbox.js')); ?>?v=<?php echo time(); ?>"></script>
		<script src="<?php echo e(asset('assets/plugins/simplelightbox/light-box.js')); ?>?v=<?php echo time(); ?>"></script>


		<!-- INTERNAL Sweet-Alert js-->
		<script src="<?php echo e(asset('assets/plugins/sweet-alert/sweetalert.min.js')); ?>?v=<?php echo time(); ?>"></script>


        <script type="text/javascript">

			"use strict";

			(function($)  {

				// Variables
				var SITEURL = '<?php echo e(url('')); ?>';

				// Csrf Field
				$.ajaxSetup({
					headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

                $('body').on('click', '#purchasecodebtn', function()
                {
                    var envatopurchase_id = $(this).data('id');

                    <?php if(!empty(Auth::user()->getRoleNames()[0]) && Auth::user()->getRoleNames()[0] == 'superadmin'): ?>
                    var envatopurchase_i = envatopurchase_id;

                    <?php else: ?>
                        <?php if(setting('purchasecode_on') == 'on'): ?>
                        var envatopurchase_i = envatopurchase_id;
                        <?php else: ?>
                        var trailingCharsIntactCount = 4;

                        var envatopurchase_i = new Array(envatopurchase_id.length - trailingCharsIntactCount + 1).join('*') + envatopurchase_id.slice( -trailingCharsIntactCount);
                        <?php endif; ?>
                    <?php endif; ?>



                    $('.modal-title').html('Purchase Details');
                    $('.purchasecode').html(envatopurchase_i);
                    $('#addpurchasecode').modal('show');
                    $('#purchasedata').html('');

                    $.ajax({
                        url:"<?php echo e(route('admin.ticketlicenseverify')); ?>",
                        type:"POST",
                        data: {
                            envatopurchase_id: envatopurchase_id
                        },
                        success:function (data) {
                            $('#purchasedata').html(data);
                        },
                        error:function(data){
                            $('#purchasedata').html('');
                        }

                    });
                });

                // TICKET RESTORE SCRIPT
				$('body').on('click', '#show-restore', function () {
					var _id = $(this).data("id");
					swal({
						title: `<?php echo e(lang('Are you sure you want to reset this record?', 'alerts')); ?>`,
						icon: "warning",
						buttons: true,
						dangerMode: true,
					})
					.then((willDelete) => {
						if (willDelete) {
							$.ajax({
								type: "post",
								url: SITEURL + "/admin/tickettrashedrestore/"+_id,
								success: function (data) {
									toastr.success(data.success);
									location.replace('<?php echo e(route('admin.tickettrashed')); ?>');
								},
								error: function (data) {
									console.log('Error:', data);
								}
							});
						}
					});

				});
				// TICKET RESTORE SCRIPT END
				// TICKET DELETE SCRIPT
				$('body').on('click', '#show-delete', function () {
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
								type: "post",
								url: SITEURL + "/admin/tickettrasheddestroy/"+_id,
								success: function (data) {
									toastr.success(data.success);
									location.replace('<?php echo e(route('admin.tickettrashed')); ?>');
								},
								error: function (data) {
									console.log('Error:', data);
								}
							});
						}
					});

				});
				// TICKET DELETE SCRIPT END

            })(jQuery);
        </script>

        <?php $__env->stopSection(); ?>

        <?php $__env->startSection('modal'); ?>

        <!-- PurchaseCode Modals -->
			<div class="modal fade sprukopurchasecode"  id="addpurchasecode" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" ></h5>
							<button  class="close" data-bs-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<input type="hidden" name="purchasecode_id" id="purchasecode_id" value="">
						<div class="modal-body">
							<div class="mb-4">
								<!-- <strong><?php echo e(lang('Puchase Code')); ?> :</strong>
								<span class="purchasecode"></span> -->
							</div>
							<div id="purchasedata">

							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End PurchaseCode Modals   -->
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\cms-kit\resources\views/admin/assignedtickets/trashedticketview.blade.php ENDPATH**/ ?>