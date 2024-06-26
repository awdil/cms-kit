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
        <h4 class="page-title"><span class="font-weight-normal text-muted ms-2"><?php echo e(lang('Custom Field')); ?></span></h4>
    </div>
</div>
<!--End Page header-->

<div class="col-xl-12 col-lg-12 col-md-12">
    <div class="card">
        <div class="card-header border-0 d-sm-max-flex">
            <h4 class="card-title"><?php echo e(lang('Custom Field Lists')); ?></h4>
            <div class="card-options mt-sm-max-2">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('CustomField Access')): ?>
                <button id="addcustomfield" class="btn btn-success me-3"><i class="feather feather-user-plus"></i> <?php echo e(lang('Add Custom Field')); ?></button>
                <?php endif; ?>
            </div>

        </div>
        <div class="card-body">
            <button id="massdelete" class="btn btn-outline-light btn-sm mb-4 data-table-btn"><i class="fe fe-trash"></i> <?php echo e(lang('Delete')); ?></button>
            <div class="table-responsive spruko-delete">
                <table class="table table-bordered border-bottom text-nowrap ticketdeleterow w-100" id="support-customerlist">
                    <thead>
                        <tr>
                            <th  width="10"><?php echo e(lang('Sl.No')); ?></th>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('CustomField Delete')): ?>

                            <th width="10" >
                                <input type="checkbox"  id="customCheckAll">
                                <label  for="customCheckAll"></label>
                            </th>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('CustomField Delete')): ?>

                            <th width="10" >
                                <input type="checkbox"  id="customCheckAll" disabled>
                                <label  for="customCheckAll"></label>
                            </th>
                            <?php endif; ?>

                            <th ><?php echo e(lang('Field Name')); ?></th>
                            <th ><?php echo e(lang('Field Type')); ?></th>
                            <th ><?php echo e(lang('Status')); ?></th>
                            <th ><?php echo e(lang('Actions')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php $__currentLoopData = $customfields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customfield): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i++); ?></td>
                                <td>
                                    <?php if(Auth::user()->can('CustomField Delete')): ?>

                                        <input type="checkbox" name="customer_checkbox[]" class="checkall" value="<?php echo e($customfield->id); ?>" />
                                    <?php else: ?>

                                        <input type="checkbox" name="customer_checkbox[]" class="checkall" value="<?php echo e($customfield->id); ?>" disabled />
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo e($customfield->fieldnames); ?>

                                </td>
                                <td>
                                    <?php echo e($customfield->fieldtypes); ?>

                                </td>
                                <td>
                                    <?php if($customfield->status == '1'): ?>

                                        <label class="custom-switch form-switch mb-0">
                                            <input type="checkbox" name="status" data-id="<?php echo e($customfield->id); ?>" id="myonoffswitch<?php echo e($customfield->id); ?>" value="1" class="custom-switch-input tswitch" checked>
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    <?php else: ?>

                                        <label class="custom-switch form-switch mb-0">
                                            <input type="checkbox" name="status" data-id="<?php echo e($customfield->id); ?>" id="myonoffswitch<?php echo e($customfield->id); ?>" value="1" class="custom-switch-input tswitch">
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class = "d-flex">
                                    <?php if(Auth::user()->can('CustomField Edit')): ?>

                                        <a href="javascript:void(0)" data-id="<?php echo e($customfield->id); ?>" class="action-btns1 edit-customfield" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Edit')); ?>">
                                            <i class="feather feather-edit text-primary" ></i>
                                        </a>
                                    <?php else: ?>
                                        ~
                                    <?php endif; ?>
                                    <?php if(Auth::user()->can('CustomField Delete')): ?>

                                        <a href="javascript:void(0)" class="action-btns1 delete-customfield" data-id="<?php echo e($customfield->id); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(lang('Delete')); ?>">
                                            <i class="feather feather-trash-2 text-danger"></i>
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>

    <?php echo $__env->make('admin.customfield.customfieldmodal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<!-- INTERNAL Vertical-scroll js-->
<script src="<?php echo e(asset('assets/plugins/vertical-scroll/jquery.bootstrap.newsbox.js')); ?>"></script>

<!-- INTERNAL Data tables -->
<script src="<?php echo e(asset('assets/plugins/datatable/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/responsive.bootstrap5.min.js')); ?>"></script>

<!-- INTERNAL Sweet-Alert js-->
<script src="<?php echo e(asset('assets/plugins/sweet-alert/sweetalert.min.js')); ?>"></script>


<script type="text/javascript">

    "use strict";

    (function($)  {

        let option = ['text','email','textarea','checkbox','select','radio',]

        // Csrf Field
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Datatable
        // $('#support-customerlist').DataTable({
        //     responsive: true,
        //     language: {
        //         searchPlaceholder: search,
        //         scrollX: "100%",
        //         sSearch: '',
        //     },
        //     order:[],
        //     columnDefs: [
        //         { "orderable": false, "targets":[ 0,1,3] }
        //     ],
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
        $('#support-customerlist').dataTable({
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

        /*  When user click add testimonial button */
        $('#addcustomfield').on('click', function () {


            $('#customfieldopen_id').val('');
            $('#sprukofieldtype').empty();
            $('#customfieldopen_form').trigger("reset");
            $('.modal-title').html("<?php echo e(lang('New Custom Field')); ?>");

            $.map( option, function( val, i ) {

                // Do something
                $('#sprukofieldtype').append('<option value="'+val+'">'+val+'</option>')
            });
            $('.select2_modalcustomfield').select2({

                dropdownParent: ".sprukosearch",
                minimumResultsForSearch: '',
                placeholder: "Search",
                width: '100%'
            });
            $('.sprukofieldopen').hide();
            $('#customfieldopen').modal('show');
        });

        $('body').on('change click', '#sprukofieldtype', function(e){


            if(e.target.value == 'checkbox' || e.target.value == 'select' || e.target.value == 'radio')
            {
                $('.sprukofieldopen').show();
                $('.sprukoprivacyfield').hide();
            }else{
                $('.sprukofieldopen').hide();
                $('.sprukoprivacyfield').show();

            }
        })

        $('body').on('submit', '#customfieldopen_form', function(e){

            e.preventDefault();

            let privacyfields = $('#privacyfields').prop('checked') == true ? '1': '0',
                requiredfields = $('#requiredfields').prop('checked') == true ? '1': '0',
                statuscheck = $('#status').prop('checked') == true ? '1': '0',

                sprukofieldtype = $('#sprukofieldtype').val(),
                customfieldopen_id = $('#customfieldopen_id').val(),
                optionsfields = $('#optionsfields').val(),
                sprukofieldname = $('#sprukofieldname').val(),

                display = null;
                if(document.querySelector('input[name="display"]:checked') != null){
                    display = document.querySelector('input[name="display"]:checked').checked == true ? document.querySelector('input[name="display"]:checked').value : null;
                }
                else{
                    toastr.error('<?php echo e(lang('Please select required fields.', 'alerts')); ?>')
                }

                $('#sprukofieldnameError').html('');
                $('#displayError').html('');
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: '<?php echo e(route('admin.customfield.storeupdate')); ?>',
                    data: {
                        'privacyfields': privacyfields,
                        'requiredfields' : requiredfields,
                        'sprukofieldtype' : sprukofieldtype,
                        'sprukofieldname' : sprukofieldname,
                        'customfieldopen_id' : customfieldopen_id,
                        'optionsfields' : optionsfields,
                        'display' : display,
                        'status' : statuscheck,

                    },
                    success: function(data){
                        toastr.success('<?php echo e(lang('Updated successfully', 'alerts')); ?>')
                        window.location.reload();
                    },
                    error: function(data){
                        if(data.responseJSON.errors.sprukofieldname[0]){
                            $('#sprukofieldnameError').html(data.responseJSON.errors.sprukofieldname[0]);
                        }
                        if(data.responseJSON.errors.display[0]){
                            $('#displayError').html(data.responseJSON.errors.display[0]);
                        }

                    }
                })


        });

        $('body').on('click', '.edit-customfield', function () {
            var customfield_id = $(this).data('id');
            $.get('customfield/edit/' + customfield_id , function (data) {

                $('.select2_modalcustomfield').select2({

                    dropdownParent: ".sprukosearch",
                    minimumResultsForSearch: '',
                    placeholder: "Search",
                    width: '100%'
                });
                $('#sprukofieldtype').empty();
                $('#sprukofieldnameError').html('');
                $('.modal-title').html("<?php echo e(lang('Edit Custom Field')); ?>");
                $('#customfieldopen_id').val(data.id);
                $('#sprukofieldname').val(data.fieldnames);
                $.map( option, function( val, i ) {

                    // Do something
                    if(val == data.fieldtypes){
                        $('#sprukofieldtype').append('<option value="'+val+'" selected>'+val+'</option>')
                    }
                    else{
                        $('#sprukofieldtype').append('<option value="'+val+'">'+val+'</option>')
                    }
                });

                if(data.fieldtypes == 'checkbox' || data.fieldtypes == 'select' || data.fieldtypes == 'radio')
                {
                    $('.sprukofieldopen').show();
                    $('.sprukoprivacyfield').hide();
                    $('#optionsfields').val(data.fieldoptions);

                }else{
                    $('.sprukofieldopen').hide();
                    $('.sprukoprivacyfield').show();
                    $('#optionsfields').val(data.fieldoptions);

                }
                if(data.fieldrequired == '1'){
                    $('#requiredfields').prop('checked', true);
                }
                if(data.fieldprivacy == '1'){
                    $('#privacyfields').prop('checked', true);
                }

                if (data.displaytypes == null || data.displaytypes == '' )
                {
                    $('#display').prop('checked', false);
                    $('#display1').prop('checked', false);
                    $('#display2').prop('checked', false);
                }
                if (data.displaytypes == "both")
                {
                    $('#display').prop('checked', true);
                }
                if (data.displaytypes == "createticket")
                {
                    $('#display1').prop('checked', true);
                }
                if (data.displaytypes == "registerform")
                {
                    $('#display2').prop('checked', true);
                }

                if (data.status == "1")
                {
                    $('#status').prop('checked', true);
                }

                $('#customfieldopen').modal('show');
            })
        });

        $('body').on('click', '.delete-customfield', function () {
            var _id = $(this).data("id");
            swal({
                title: `<?php echo e(lang('Are you sure you want to continue?')); ?>`,
                text: "<?php echo e(lang('This might erase your records permanently')); ?>",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "post",
                        url: '<?php echo e(url('/')); ?>' + "/admin/customfield/delete/"+_id,
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


        // Mass Delete Testimonial
        $('body').on('click', '#massdelete', function () {
            var id = [];
            $('.checkall:checked').each(function(){
                id.push($(this).val());
            });
            if(id.length > 0){
                swal({
                    title: `<?php echo e(lang('Are you sure you want to continue?')); ?>`,
                    text: "<?php echo e(lang('This might erase your records permanently')); ?>",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url:"<?php echo e(route('admin.customfield.deleteall')); ?>",
                            method:"post",
                            data:{id:id},
                            success:function(data)
                            {
                                toastr.success(data.success);
                                location.reload();

                            },
                            error:function(data){
                                console.log(data);
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


        // Status change customfield
        $('body').on('click', '.tswitch', function () {
            var _id = $(this).data("id");
            var status = $(this).prop('checked') == true ? '1' : '0';

            $.ajax({
                type: "post",
                url: '<?php echo e(url('/')); ?>' + "/admin/customfield/status/"+_id,
                data: {'status': status},

                success: function (data) {
                    toastr.success(data.success);
                },
                    error: function (data) {
                    console.log('Error:', data);
                }
            });
        });

    })(jQuery);
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\complaint-ticketing-system\resources\views/admin/customfield/index.blade.php ENDPATH**/ ?>