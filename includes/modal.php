<!-- Add New User Modal Start -->
<div class="modal fade" tabindex="-1" id="formLeaveModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title fs-4"></div>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="leave-form" class="p-2" novalidate>
                <div class="modal-body">
                    <div class="row mb-3 gx-3">
                        <div class="col">
                            <input type="text" name="username" class="form-control form-control-lg" placeholder="Enter Username" required>
                            <div class="invalid-feedback">Username is required!</div>
                        </div>
                        <div class="col">
                            <input type="text" name="password" class="form-control form-control-lg" placeholder="Enter Password" required>
                            <div class="invalid-feedback">Password is required!</div>
                        </div>
                    </div>
                    <div class="row mb-3 gx-3">
                        <div class="col">
                            <input type="text" name="fname" class="form-control form-control-lg" placeholder="Enter First Name" required>
                            <div class="invalid-feedback">First name is required!</div>
                        </div>
                        <div class="col">
                            <input type="text" name="lname" class="form-control form-control-lg" placeholder="Enter Last Name" required>
                            <div class="invalid-feedback">Last name is required!</div>
                        </div>
                        <div class="col">
                            <input type="text" name="nname" class="form-control form-control-lg" placeholder="Enter Nick Name" required>
                            <div class="invalid-feedback">Nick name is required!</div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control form-control-lg" placeholder="Enter E-Mail">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="phone" class="form-control form-control-lg" placeholder="Enter Phone" required>
                        <div class="invalid-feedback">Phone is required!</div>
                    </div>
                    <div class="row mb-3 gx-3">
                        <div class="col">
                            <select type="text" name="department_id" id="department_id" class="form-select form-control-lg">
                                <!-- Department Read Function -->
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3 gx-3">
                        <div class="col">
                            <input type="text" name="leave" value="5" class="form-control form-control-lg" placeholder="Enter Leave" required>
                            <div class="invalid-feedback">Leave is required!</div>
                        </div>
                        <div class="col">
                            <input type="text" name="sick" value="6" class="form-control form-control-lg" placeholder="Enter Sick" required>
                            <div class="invalid-feedback">Sick is required!</div>
                        </div>
                        <div class="col">
                            <input type="text" name="vacation" value="7" class="form-control form-control-lg" placeholder="Enter Vacation" required>
                            <div class="invalid-feedback">Vacation is required!</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Add User" class="btn btn-primary btn-block btn-lg" id="add-user-btn">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add New User Modal End -->
