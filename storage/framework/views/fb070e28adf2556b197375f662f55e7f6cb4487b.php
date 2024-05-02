				<!-- Assigned Tickets-->
				<div class="modal fade sprukosearch"  id="customfieldopen" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" ></h5>
								<button  class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
							<form method="POST" enctype="multipart/form-data" id="customfieldopen_form" name="customfieldopen_form">
								<?php echo csrf_field(); ?>
								<?php echo view('honeypot::honeypotFormFields'); ?>

								<input type="hidden" name="customfieldopen_id" id="customfieldopen_id">
								<div class="modal-body pb-0">

									<div class="form-group ">
                                        <label for="" class="form-label"><?php echo e(lang('Label field name')); ?> <span class="text-red">*</span></label>
                                        <input type="text" class="form-control" id="sprukofieldname">
                                        <span id="sprukofieldnameError" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label"> <?php echo e(lang('Field label type')); ?></label>
                                        <select class="form-control select2_modalcustomfield" name="fieldtype" id="sprukofieldtype">

                                          </select>
                                    </div>
                                    <div class="form-group sprukofieldopen">
                                        <label for="" class="form-label mb-0"><?php echo e(lang('Field options')); ?> <span class="text-red">*</span> </label>
                                        <small class="text-muted mb-2 d-block">( <?php echo e(lang('You have to add the comma-separated values.')); ?>)</small>
                                        <textarea name="fieldoptions" class="form-control" id="optionsfields" cols="30" rows="5" placeholder="<?php echo e(lang('a,k,n')); ?>"></textarea>
                                        <span id="sprukooptionsfieldsError" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-3">
                                                <label class="form-label"><?php echo e(lang('View On')); ?><span class="text-red">*</span></label>
                                            </div>
                                            <div class="col-xl-10 col-lg-10 col-md-9 col-sm-9 col-9 custom-controls-stacked d-md-flex  d-md-max-block">
                                                <label class="custom-control form-radio success me-4">
                                                    <input type="radio" class="custom-control-input display" id="display" name="display" value="both">
                                                    <span class="custom-control-label"><?php echo e(lang('Both')); ?></span>
                                                </label>
                                                <label class="custom-control form-radio success me-4">
                                                    <input type="radio" class="custom-control-input display" id="display1" name="display" value="createticket">
                                                    <span class="custom-control-label"><?php echo e(lang('Create Tickets')); ?></span>
                                                </label>
                                                <label class="custom-control form-radio success me-4">
                                                    <input type="radio" class="custom-control-input display" id="display2" name="display" value="registerform">
                                                    <span class="custom-control-label"><?php echo e(lang('Register')); ?></span>
                                                </label>

                                                 <span id="displayError" class="text-danger alert-message"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="switch_section">
                                            <div class="d-flex mt-3">
                                                <a class="onoffswitch2">
                                                    <input type="checkbox"  name="requiredfields" id="requiredfields" class=" toggle-class onoffswitch2-checkbox">
                                                    <label for="requiredfields" class="toggle-class onoffswitch2-label" ></label>
                                                </a>
                                                <label class="form-label ps-2"><?php echo e(lang('Required field')); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group sprukoprivacyfield">
                                        <div class="switch_section">
                                            <div class="d-flex mt-3">
                                                <a class="onoffswitch2">
                                                    <input type="checkbox"  name="privacyfields" id="privacyfields" class=" toggle-class onoffswitch2-checkbox">
                                                    <label for="privacyfields" class="toggle-class onoffswitch2-label" ></label>
                                                </a>
                                                <label class="form-label ps-2"><?php echo e(lang('Privacy')); ?>

                                                    <small class="text-muted">(<?php echo e(lang('If you select this option, the content in the field will be encrypted.')); ?>)
                                                    </small>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="switch_section">
                                            <div class="d-flex mt-2">
                                                <a class="onoffswitch2">
                                                    <input type="checkbox"  name="status" id="status" class=" toggle-class onoffswitch2-checkbox">
                                                    <label for="status" class="toggle-class onoffswitch2-label" ></label>
                                                </a>
                                                <label class="form-label ps-2"><?php echo e(lang('Status')); ?></label>
                                            </div>
                                        </div>
                                    </div>

								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-secondary" id="btnsave"  ><?php echo e(lang('Save')); ?></button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- End Assigned Tickets  -->


<?php /**PATH D:\xampp\htdocs\complaint-ticketing-system\resources\views/admin/customfield/customfieldmodal.blade.php ENDPATH**/ ?>