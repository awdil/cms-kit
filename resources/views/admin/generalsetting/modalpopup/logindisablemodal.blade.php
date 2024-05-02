            <!-- Login Disable Modal Popup-->
            <div class="modal fade"  id="addlogindisable" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" ></h5>
                            <button  class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form method="POST" enctype="multipart/form-data" id="logindisable_form" name="logindisable_form">
                            <input type="hidden" name="logindisable_id" id="logindisable_id">
                            @csrf
                            @honeypot
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="form-label">{{lang('Name')}} <span class="text-red">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" >
                                    <span id="nameError" class="text-danger alert-message"></span>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="#" class="btn btn-outline-danger" data-bs-dismiss="modal">{{lang('Close')}}</a>
                                <button type="submit" class="btn btn-secondary" id="sprukologin" >{{lang('Save')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End  Login Disable Modal Popup  -->