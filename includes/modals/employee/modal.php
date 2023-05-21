<!-- Form Modal Start -->
<div class="modal fade" tabindex="-1" id="formEmployeeModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title" id="modal-title"></div>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="employee-form" class="p-2" novalidate>
                    <input type="hidden" id="employee_id">
                    <div class="row mb-3 gx-3" id="user_password">
                        <div class="col">
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" required>
                            <div class="invalid-feedback">Username is required!</div>
                        </div>
                        <div class="col">
                            <input type="text" name="password" class="form-control" placeholder="Enter Password" required>
                            <div class="invalid-feedback">Password is required!</div>
                        </div>
                    </div>
                    <div class="row mb-3 gx-3">
                        <div class="col">
                            <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter First Name" required>
                            <div class="invalid-feedback">First name is required!</div>
                        </div>
                        <div class="col">
                            <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter Last Name" required>
                            <div class="invalid-feedback">Last name is required!</div>
                        </div>
                        <div class="col">
                            <input type="text" name="nname" id="nname" class="form-control" placeholder="Enter Nick Name" required>
                            <div class="invalid-feedback">Nick name is required!</div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter E-Mail">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Phone" required>
                        <div class="invalid-feedback">Phone is required!</div>
                    </div>
                    <div class="row mb-3 gx-3">
                        <div class="col">
                            <select type="text" name="department_id" id="department_id" class="form-select">
                                <!-- Department Set Function -->
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3 gx-3">
                        <div class="col">
                            <input type="text" name="leave" id="leave" value="5" class="form-control" placeholder="Enter Leave" required>
                            <div class="invalid-feedback">Leave is required!</div>
                        </div>
                        <div class="col">
                            <input type="text" name="sick" id="sick" value="6" class="form-control" placeholder="Enter Sick" required>
                            <div class="invalid-feedback">Sick is required!</div>
                        </div>
                        <div class="col">
                            <input type="text" name="vacation" id="vacation" value="7" class="form-control" placeholder="Enter Vacation" required>
                            <div class="invalid-feedback">Vacation is required!</div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary btn-block btn-lg" id="form-submit-btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Form Modal End -->