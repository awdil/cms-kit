		<?php $__env->startSection('styles'); ?>

		<!-- INTERNAl Summernote css -->
		<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/summernote/summernote.css')); ?>">

		<link href="<?php echo e(asset('assets/plugins/dropzone/dropzone.css')); ?>" rel="stylesheet" />

		<?php $__env->stopSection(); ?>

				<?php $__env->startSection('content'); ?>

				<!-- Section -->
                <section>
                    <div class="bannerimg cover-image" data-bs-image-src="<?php echo e(asset('assets/images/photos/banner1.jpg')); ?>">
                        <div class="header-text mb-0">
                            <div class="container">
                                <div class="row text-white">
                                    <div class="col">
                                        <h1 class="mb-0"><?php echo e(lang('Guest Ticket')); ?></h1>
                                    </div>
                                    <div class="col col-auto">
                                        <ol class="breadcrumb text-center">
                                            <li class="breadcrumb-item">
                                                <a href="<?php echo e(url('/')); ?>" class="text-white-50"><?php echo e(lang('Home', 'menu')); ?></a>
                                            </li>
                                            <li class="breadcrumb-item active">
                                                <a href="#" class="text-white"><?php echo e(lang('Guest Ticket')); ?></a>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Section -->

                <!--Section-->
                <section>
                    <div class="cover-image sptb">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-xl-9">
                                    <div class="card">
                                        <div class="card-header  border-0">
                                            <h4 class="card-title"><?php echo e(lang('Guest Ticket')); ?></h4>
                                        </div>
                                        <form  method="post" id="guest_form" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <?php echo view('honeypot::honeypotFormFields'); ?>
                                            <div class="card-body pb-0">

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label mb-0 mt-2"><?php echo e(lang('Email')); ?> <span class="text-red">*</span></label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(lang('Email')); ?>" name="email" >
                                                            <span id="EmailError" class="text-danger alert-message" ></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php if(setting('cc_email') == 'on'): ?>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <label class="form-label mb-0 mt-2"><?php echo e(lang('CC')); ?> </label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input type="email" class="form-control <?php $__errorArgs = ['ccmail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(lang('CC Email')); ?>" value="<?php echo e(old('ccmail')); ?>" name="ccmail" id="ccmail">
                                                                <div><small class="text-muted"> <?php echo e(lang('You are allowed to send only a single CC.')); ?></small></div>
                                                                <span id="ccEmailError" class="text-danger alert-message" ></span>
                                                                <?php $__errorArgs = ['ccmail'];
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
                                                    </div>
                                                <?php endif; ?>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label mb-0 mt-2"><?php echo e(lang('Subject')); ?> <span class="text-red">*</span></label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" id="subject" maxlength="<?php echo e(setting('TICKET_CHARACTER')); ?>" class="form-control <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(lang('Subject')); ?>" name="subject" value="<?php echo e(old('subject')); ?>">
                                                            <small class="text-muted float-end mt-1" id="subjectmaxtext"><?php echo e(lang('Maximum')); ?> <b><?php echo e(setting('TICKET_CHARACTER')); ?></b> <?php echo e(lang('Characters')); ?></small>
                                                            <div>
                                                                <span id="SubjectError" class="text-danger alert-message"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label mb-0 mt-2"><?php echo e(lang('Category')); ?> <span class="text-red">*</span></label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <select  class="form-control select2-show-search  select2 <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  data-placeholder="<?php echo e(lang('Select Category')); ?>" name="category" id="category">
                                                                <option label="<?php echo e(lang('Select Category')); ?>"></option>
                                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                            <span id="CategoryError" class="text-danger alert-message"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group" id="selectssSubCategory" style="display: none;">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label mb-0 mt-2"><?php echo e(lang('Sub-Category')); ?></label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <select  class="form-control select2-show-search select2 asdf"  data-placeholder="<?php echo e(lang('Select SubCategory')); ?>" name="subscategory" id="subscategory" >

                                                            </select>
                                                            <span id="subsCategoryError" class="text-danger alert-message"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group" id="selectSubCategory">
                                                </div>
                                                <div class="form-group" id="envatopurchase">
                                                </div>
                                                <?php if($customfields->isNotEmpty()): ?>
                                                    <?php $__currentLoopData = $customfields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customfield): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <label class="form-label mb-0 mt-2"><?php echo e($customfield->fieldnames); ?>

                                                                    <?php if($customfield->fieldrequired == '1'): ?>

                                                                    <span class="text-red">*</span>
                                                                    <?php endif; ?>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-9">

                                                                <?php if($customfield->fieldtypes == 'text'): ?>

                                                                    <input type="<?php echo e($customfield->fieldtypes); ?>" maxlength="255" class="form-control" name="custom_<?php echo e($customfield->id); ?>" id="" <?php echo e($customfield->fieldrequired == '1' ? 'required' : ''); ?>>
                                                                <?php endif; ?>
                                                                <?php if($customfield->fieldtypes == 'email'): ?>

                                                                    <input type="<?php echo e($customfield->fieldtypes); ?>" class="form-control" name="custom_<?php echo e($customfield->id); ?>" id="" <?php echo e($customfield->fieldrequired == '1' ? 'required' : ''); ?>>
                                                                <?php endif; ?>
                                                                <?php if($customfield->fieldtypes == 'textarea'): ?>

                                                                    <textarea name="custom_<?php echo e($customfield->id); ?>" maxlength="255" class="form-control" id="" cols="30" rows="4" <?php echo e($customfield->fieldrequired == '1' ? 'required' : ''); ?>></textarea>
                                                                <?php endif; ?>
                                                                <?php if($customfield->fieldtypes == 'checkbox'): ?>

                                                                    <?php
                                                                        $coptions = explode(',', $customfield->fieldoptions)
                                                                    ?>
                                                                    <?php $__currentLoopData = $coptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $coption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <label class="custom-control custom-checkbox d-inline-block me-3">
                                                                        <input type="<?php echo e($customfield->fieldtypes); ?>" class="custom-control-input <?php echo e($customfield->fieldrequired == '1' ? 'required' : ''); ?>"  name="custom_<?php echo e($customfield->id); ?>[]" value="<?php echo e($coption); ?>" id="" >

                                                                        <span class="custom-control-label"><?php echo e($coption); ?></span>
                                                                    </label>

                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                                                <?php endif; ?>
                                                                <?php if($customfield->fieldtypes == 'select'): ?>
                                                                    <select name="custom_<?php echo e($customfield->id); ?>" id="" class="form-control select2-show-search" data-placeholder="<?php echo e(lang('Select')); ?>" <?php echo e($customfield->fieldrequired == '1' ? 'required' : ''); ?>>
                                                                        <?php
                                                                            $seoptions = explode(',', $customfield->fieldoptions)
                                                                        ?>
                                                                        <option></option>
                                                                        <?php $__currentLoopData = $seoptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seoption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                                        <option value="<?php echo e($seoption); ?>"><?php echo e($seoption); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                <?php endif; ?>
                                                                <?php if($customfield->fieldtypes == 'radio'): ?>
                                                                <?php
                                                                    $roptions = explode(',', $customfield->fieldoptions)
                                                                ?>
                                                                <?php $__currentLoopData = $roptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <label class="custom-control custom-radio d-inline-block me-3">
                                                                    <input type="<?php echo e($customfield->fieldtypes); ?>" class="custom-control-input" name="custom_<?php echo e($customfield->id); ?>" value="<?php echo e($roption); ?>" <?php echo e($customfield->fieldrequired == '1' ? 'required' : ''); ?>>
                                                                    <span class="custom-control-label"><?php echo e($roption); ?></span>
                                                                </label>


                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                <?php endif; ?>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                                <div class="form-group ticket-summernote ">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label mb-0 mt-2"><?php echo e(lang('Description')); ?> <span class="text-red">*</span></label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <textarea class=" form-control summernote <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="message"></textarea>

                                                            <span id="MessageError" class="text-danger alert-message"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php if(setting('GUEST_FILE_UPLOAD_ENABLE') == 'yes'): ?>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label mb-0 mt-2"><?php echo e(lang('Upload File', 'filesetting')); ?></label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="form-group mb-0">
                                                                <div class="needsclick dropzone" id="document-dropzone"></div>
                                                            </div>
                                                            <small class="text-muted"><i><?php echo e(lang('The file size should not be more than', 'filesetting')); ?> <?php echo e(setting('FILE_UPLOAD_MAX')); ?><?php echo e(lang('MB', 'filesetting')); ?></i></small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endif; ?>

                                                <?php if(setting('CAPTCHATYPE')=='manual'): ?>
                                                    <?php if(setting('RECAPTCH_ENABLE_GUEST')=='yes'): ?>
                                                    <div class="form-group mt-4">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <label class="form-label mb-0 mt-2"><?php echo e(lang('Enter Captcha')); ?> <span class="text-red">*</span></label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="form-group row">
                                                                    <div class="col-md-3">
                                                                        <input type="text" id="captcha" class="form-control <?php $__errorArgs = ['captcha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(lang('Enter Captcha')); ?>" name="captcha">
                                                                        <?php $__errorArgs = ['captcha'];
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
                                                                    <div class="col-md-3">
                                                                        <div class="captcha">
                                                                            <span><?php echo captcha_img(''); ?></span>
                                                                            <button type="button" class="btn btn-outline-info btn-sm captchabtn"><i class="fe fe-refresh-cw"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                                <!--- if Enable the Google ReCaptcha --->
                                                <?php if(setting('CAPTCHATYPE')=='google'): ?>
                                                    <?php if(setting('RECAPTCH_ENABLE_GUEST')=='yes'): ?>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="form-group mb-0 mt-4">
                                                                    <div class="g-recaptcha" data-sitekey="<?php echo e(setting('GOOGLE_RECAPTCHA_KEY')); ?>"></div>
                                                                    <?php if($errors->has('g-recaptcha-response')): ?>
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong><?php echo e($errors->first('g-recaptcha-response')); ?></strong>
                                                                        </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <?php endif; ?>
                                                <?php endif; ?>

                                                <div class="form-group <?php $__errorArgs = ['agree_terms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                    <label class="custom-control form-checkbox">
                                                        <input type="checkbox" class="custom-control-input " value="agreed" name="agree_terms">
                                                        <span class="custom-control-label"><?php echo e(lang('I agree with')); ?><a href="<?php echo e(setting('terms_url')); ?>" class="text-primary"><?php echo e(lang('Terms & Services')); ?></a></span>
                                                    </label>
                                                    <span class="text-red" id="agreetermsError"></span>
                                                </div>

                                            </div>

                                            <div class="card-footer">
                                                <div class="form-group float-end">
                                                    <button  type="submit"  class="btn btn-secondary btn-lg purchasecode" id="createticketbtn"> <?php echo e(lang('Create Ticket', 'menu')); ?> </button>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--Section-->

				<?php $__env->stopSection(); ?>

		<?php $__env->startSection('scripts'); ?>

		<!-- INTERNAL Vertical-scroll js-->
		<script src="<?php echo e(asset('assets/plugins/vertical-scroll/jquery.bootstrap.newsbox.js')); ?>"></script>


		<!-- INTERNAL Summernote js  -->
		<script src="<?php echo e(asset('assets/plugins/summernote/summernote.js')); ?>"></script>

		<!-- INTERNAL Index js-->
		<script src="<?php echo e(asset('assets/js/support/support-sidemenu.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/support/support-createticket.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/select2.js')); ?>"></script>

		<!-- INTERNAL Dropzone js-->
		<script src="<?php echo e(asset('assets/plugins/dropzone/dropzone.js')); ?>"></script>

		<!-- INTERNAL Bootstrap-MaxLength js-->
		<script src="<?php echo e(asset('assets/plugins/bootstrapmaxlength/bootstrap-maxlength.min.js')); ?>?v=<?php echo time(); ?>">
		</script>



		<script type="text/javascript">
			'use strict';

            var licensekey;

					$.ajaxSetup({
						headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});

					// when category change its get the subcat list
					$('#category').on('change',function(e) {
						var cat_id = e.target.value;
						$('#selectssSubCategory').hide();
						$.ajax({
							url:"<?php echo e(route('guest.subcategorylist')); ?>",
							type:"POST",
								data: {
								cat_id: cat_id
								},
								cache : false,
								async: true,
							success:function (data) {
								if(data.subcategoriess){
									$('#subscategory').html(data.subcategoriess)
									$('#selectssSubCategory').show()
								}
								else{
									$('#selectssSubCategory').hide();
									$('#subscategory').html('')
								}
								//projectlist
								if(data.subcategories.length >= 1){

									$('#subcategory')?.empty();
									$('#selectSubCategory .row')?.remove();
									let selectDiv = document.querySelector('#selectSubCategory');
									let Divrow = document.createElement('div');
									Divrow.setAttribute('class','row mt-4');
									let Divcol3 = document.createElement('div');
									Divcol3.setAttribute('class','col-md-3');
									let selectlabel =  document.createElement('label');
									selectlabel.setAttribute('class','form-label mb-0 mt-2')
									selectlabel.innerText = "<?php echo e(lang('Project')); ?>";
									let divcol9 = document.createElement('div');
									divcol9.setAttribute('class', 'col-md-9');
									let selecthSelectTag =  document.createElement('select');
									selecthSelectTag.setAttribute('class','form-control select2-show-search');
									selecthSelectTag.setAttribute('id', 'subcategory');
									selecthSelectTag.setAttribute('name', 'project');
									selecthSelectTag.setAttribute('data-placeholder','Select Projects');
									let selectoption = document.createElement('option');
									selectoption.setAttribute('label','Select Projects')
									selectDiv.append(Divrow);
									Divrow.append(Divcol3);
									Divcol3.append(selectlabel);
									divcol9.append(selecthSelectTag);
									selecthSelectTag.append(selectoption);
									Divrow.append(divcol9);
									$('.select2-show-search').select2();
									$.each(data.subcategories,function(index,subcategory){
									$('#subcategory').append('<option value="'+subcategory.name+'">'+subcategory.name+'</option>');
									})
								}
								else{
									$('#subcategory')?.empty();
									$('#selectSubCategory .row')?.remove();
								}
								<?php if(setting('ENVATO_ON') == 'on'): ?>
								//Envato Access
								if(data.envatosuccess.length >= 1){
									$('#envato_id')?.empty();
									$('#envatopurchase .row')?.remove();
									let selectDiv = document.querySelector('#envatopurchase');
									let Divrow = document.createElement('div');
									Divrow.setAttribute('class','row mt-4');
									let Divcol3 = document.createElement('div');
									Divcol3.setAttribute('class','col-md-3');
									let selectlabel =  document.createElement('label');
									selectlabel.setAttribute('class','form-label mb-0 mt-2')
									selectlabel.innerHTML = "Envato Purchase Code <span class='text-red'>*</span>";
									let divcol9 = document.createElement('div');
									divcol9.setAttribute('class', 'col-md-9');
									let selecthSelectTag =  document.createElement('input');
									selecthSelectTag.setAttribute('class','form-control');
									selecthSelectTag.setAttribute('type','search');
									selecthSelectTag.setAttribute('id', 'envato_id');
									selecthSelectTag.setAttribute('name', 'envato_id');
									selecthSelectTag.setAttribute('placeholder', 'Enter Your Purchase Code');
									let selecthSelectInput =  document.createElement('input');
									selecthSelectInput.setAttribute('type','hidden');
									selecthSelectInput.setAttribute('id', 'envato_support');
									selecthSelectInput.setAttribute('name', 'envato_support');
									selectDiv.append(Divrow);
									Divrow.append(Divcol3);
									Divcol3.append(selectlabel);
									divcol9.append(selecthSelectTag);
									divcol9.append(selecthSelectInput);
									Divrow.append(divcol9);
									$('.purchasecode').attr('disabled', true);

								}else{
									$('#envato_id')?.empty();
									$('#envatopurchase .row')?.remove();
									$('.purchasecode').removeAttr('disabled');
								}
								<?php endif; ?>
							},
							error:(data)=>{

							}
						});
					});

					$(".captchabtn").click(function(e){
						e.preventDefault();
						$.ajax({
							type:'GET',
							url:'<?php echo e(route('captcha.reload')); ?>',
							success: function(res){
								$(".captcha span").html(res.captcha);
							}
						});
					});

					$('body').on('submit', '#guest_form', function (e) {
						e.preventDefault();
						$('#SubjectError').html('');
						$('#MessageError').html('');
						$('#EmailError').html('');
						$('#CategoryError').html('');
						$('#verifyotpError').html('');
                        $('#agreetermsError').html('');
						$('#createticketbtn').html(`Loading.. <i class="fa fa-spinner fa-spin"></i>`);
						$('#createticketbtn').prop('disabled', true);

						var formData = new FormData(this);
                        formData.set('envato_id', licensekey);

						let checked  = document.querySelectorAll('.required:checked').length;
						var isValid = checked > 0;
						if(document.querySelectorAll('.required').length == '0'){
							ajax(formData);
						}else{

							if(isValid){
								ajax(formData);
							}else{
								$('#createticketbtn').prop('disabled', false);
								$('#createticketbtn').html(`<?php echo e(lang('Create Ticket', 'menu')); ?>`);
								toastr.error('<?php echo e(lang('Check the all field(*) required', 'alerts')); ?>')
							}
						}
					});


					function ajax(formData){

						$.ajax({
							type:'POST',
							dataType: "json",
							url: SITEURL + "/guest/openticketnootp",
							data: formData,
							cache:false,
							contentType: false,
							processData: false,

							success: (data) => {


								if(data.guest == 'pass'){
									$('#SubjectError').html('');
									$('#MessageError').html('');
									$('#EmailError').html('');
									$('#CategoryError').html('');
									$('#verifyotpError').html('');
                                    $('#agreetermsError').html('');
									toastr.success(data.success);
									if(localStorage.getItem('guestsubject') || localStorage.getItem('guestmessage') || localStorage.getItem('guestemail')){
										localStorage.removeItem("guestsubject");
										localStorage.removeItem("guestmessage");
										localStorage.removeItem("guestemail");

									}
									window.location.replace('<?php echo e(url('guest/ticketdetails/')); ?>' + '/' + data.data.id)
								}

								if(data.email == 'already')
								{
									$('#createticketbtn').prop('disabled', false);
									$('#createticketbtn').html(`<?php echo e(lang('Create Ticket', 'menu')); ?>`);
									toastr.error(data.error);
								}
								if(data.message	== "domainblock"){
									$('#createticketbtn').prop('disabled', false);
									$('#createticketbtn').html(`<?php echo e(lang('Create Ticket', 'menu')); ?>`);
									$('#EmailError').html(data.error);
								}

                                if(data.message == 'envatoerror')
                                {
                                    toastr.error(data.error);
                                    window.location.reload();
                                }

							},
							error: function(data){
                                if(data.responseJSON.message !== "Server Error"){
                                    if(data.responseJSON.message === 'accessdenied'){
                                        document.write(
                                            `<div class="page error-bg">
                                                <div class="page-content m-0">
                                                    <div class="container text-center">
                                                        <div class="display-1 text-danger mb-5 font-weight-bold"><i class="fa fa-ban" aria-hidden="true"></i></div>
                                                        <h1 class="h3  mb-3 font-weight-semibold"><?php echo e(lang('Access Denied', 'errorpages')); ?></h1>
                                                        <p class="h5 font-weight-normal mb-7 leading-normal"><?php echo e(lang('It Seems Like You Are Not Authorized To Access This Page', 'errorpages')); ?></p>
                                                    </div>
                                                </div>
                                            </div>`
                                        );
                                    }

                                    toastr.error(data.responseJSON.message);
                                    $('#SubjectError').html(data.responseJSON.errors.subject);
                                    $('#MessageError').html(data.responseJSON.errors.message);
                                    $('#EmailError').html(data.responseJSON.errors.email);
                                    $('#CategoryError').html(data.responseJSON.errors.category);
                                    $('#verifyotpError').html(data.responseJSON.errors.verifyotp);
                                    $('#agreetermsError').html(data.responseJSON.errors.agree_terms);
                                    if(data.responseJSON.errors.agree_terms) {
                                        $('#createticketbtn').html('Create Ticket');
                                        $('#createticketbtn').prop('disabled', false);
                                    }
                                }
                                else{
                                    toastr.error('Ticket Creation Failed, Please Create new Ticket');
                                    setTimeout(()=>{
                                        window.location.reload();
                                    }, 500)
                                }
							}
						});
					}

					// summernote
					$('.note-editable').on('keyup', function(e){

						localStorage.setItem('guestmessage', e.target.innerHTML)
					})

					$('#subject').on('keyup', function(e){
						if(e.target.value.length == <?php echo e(setting('TICKET_CHARACTER')); ?>){
							$('#subjectmaxtext').removeClass('text-muted')
							$('#subjectmaxtext').addClass('text-red');
						}else{
							$('#subjectmaxtext').removeClass('text-red')
							$('#subjectmaxtext').addClass('text-muted');
						}
						localStorage.setItem('guestsubject', e.target.value)
					})

					$(window).on('load', function(){
						if(localStorage.getItem('guestsubject') || localStorage.getItem('guestmessage')){

							document.querySelector('#subject').value = localStorage.getItem('guestsubject');
							document.querySelector('.summernote').innerHTML = localStorage.getItem('guestmessage');
							document.querySelector('.note-editable').innerHTML = localStorage.getItem('guestmessage');
						}
					});


					<?php if(setting('GUEST_FILE_UPLOAD_ENABLE') == 'yes'): ?>

					var uploadedDocumentMap = {}

					Dropzone.options.documentDropzone = {
					url: '<?php echo e(route('guest.imageupload')); ?>',
					maxFilesize: '<?php echo e(setting('FILE_UPLOAD_MAX')); ?>', // MB
					addRemoveLinks: true,
					acceptedFiles: '<?php echo e(setting('FILE_UPLOAD_TYPES')); ?>',
					headers: {
						'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
					},
					success: function (file, response) {
						$('form').append('<input type="hidden" name="ticket[]" value="' + response.name + '">')
						uploadedDocumentMap[file.name] = response.name
					},
					removedfile: function (file) {
						file.previewElement.remove()
						var name = ''
						if (typeof file.file_name !== 'undefined') {
						name = file.file_name
						} else {
						name = uploadedDocumentMap[file.name]
						}
						$('form').find('input[name="ticket[]"][value="' + name + '"]').remove()
					},
					init: function () {
						<?php if(isset($project) && $project->document): ?>
						var files =
							<?php echo json_encode($project->document); ?>

						for (var i in files) {
							var file = files[i]
							this.options.addedfile.call(this, file)
							file.previewElement.classList.add('dz-complete')
							$('form').append('<input type="hidden" name="ticket[]" value="' + file.file_name + '">')
						}
						<?php endif; ?>
					}
					}

					<?php endif; ?>


					<?php $module = Module::all(); ?>

					<?php if(in_array('Uhelpupdate', $module)): ?>

					// Purchase Code Validation
					$("body").on('keyup', '#envato_id', function() {
						let value = $(this).val();
						if (value != '') {
							if(value.length == '36'){
								var _token = $('input[name="_token"]').val();
							$.ajax({
								url: "<?php echo e(route('guest.envatoverify')); ?>",
								method: "POST",
								data: {data: value, _token: _token},

								dataType:"json",

								success: function (data) {
									if(data.valid == 'true'){
										$('#envato_id').addClass('is-valid');
										$('#envato_id').attr('readonly', true);
										$('.purchasecode').removeAttr('disabled');
										$('#envato_id').css('border', '1px solid #02f577');
										$('#envato_support').val('Supported');
                                        licensekey = data.key
										toastr.success(data.message);
									}
									if(data.valid == 'expried'){
										<?php if(setting('ENVATO_EXPIRED_BLOCK') == 'on'): ?>

										$('.purchasecode').attr('disabled', true);
										$('#envato_id').css('border', '1px solid #e13a3a');
										$('#envato_support').val('Expired');
										toastr.error(data.message);
										<?php endif; ?>
										<?php if(setting('ENVATO_EXPIRED_BLOCK') == 'off'): ?>
										$('#envato_id').addClass('is-valid');
										$('#envato_id').attr('readonly', true);
										$('.purchasecode').removeAttr('disabled');
										$('#envato_id').css('border', '1px solid #02f577');
										$('#envato_support').val('Expired');
                                        licensekey = data.key
										toastr.warning(data.message);
										<?php endif; ?>

									}
									if(data.valid == 'false'){
										$('.purchasecode').attr('disabled', true);
										$('#envato_id').css('border', '1px solid #e13a3a');
										toastr.error(data.message);
									}


								},
								error: function (data) {

								}
							});
							}
						}else{
							toastr.error('Purchase Code field is Required');
							$('.purchasecode').attr('disabled', true);
							$('#envato_id').css('border', '1px solid #e13a3a');
						}
					});

					<?php endif; ?>

		</script>
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>


		<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.usermaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\cms-kit\resources\views/guestticket/guestticketnootp.blade.php ENDPATH**/ ?>