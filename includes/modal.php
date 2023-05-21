<!-- Add New User Modal Start -->
<div class="modal fade" tabindex="-1" id="addNewUserModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Add New User</h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add-user-form" class="p-2" novalidate>
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
                    <div class="mb-3">
                        <input type="submit" value="Add User" class="btn btn-primary btn-block btn-lg" id="add-user-btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add New User Modal End -->

<!-- Edit User Modal Start -->
<div class="modal fade" tabindex="-1" id="editUserModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Edit This User</h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-user-form" class="p-2" novalidate>
                    <input type="hidden" name="id" id="id">
                    <div class="row mb-3 gx3">
                        <div class="col">
                            <input type="text" name="fname" id="fname" class="form-control form-control-lg" placeholder="Enter First Name" required>
                            <div class="invalid-feedback">First name is required!</div>
                        </div>
                        <div class="col">
                            <input type="text" name="lname" id="lname" class="form-control form-control-lg" placeholder="Enter Last Name" required>
                            <div class="invalid-feedback">Last name is required!</div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="email" id="email" class="form-control form-control-lg" placeholder="Enter E-Mail" required>
                        <div class="invalid-feedback">E-Mail is required!</div>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="phone" id="phone" class="form-control form-control-lg" placeholder="Enter Phone" required>
                        <div class="invalid-feedback">Phone is required!</div>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Edit User" class="btn btn-primary btn-block btn-lg" id="edit-user-btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Edit User Modal End -->

<!-- Add New Department Modal Start -->
<div class="modal fade" tabindex="-1" id="addNewDepartmentModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Add New Department</h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add-department-form" class="p-2" novalidate>
                    <div class="row mb-3 gx-3">
                        <div class="col">
                            <input type="text" name="full_name" class="form-control form-control-lg" placeholder="Enter Department Name" required>
                            <div class="invalid-feedback">Department Name is required!</div>
                        </div>
                        <div class="col">
                            <input type="text" name="sort_name" class="form-control form-control-lg" placeholder="Enter Sort Name" required>
                            <div class="invalid-feedback">Sort Name is required!</div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Add Department" class="btn btn-primary btn-block btn-lg" id="add-department-btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add New Department Modal End -->

<!-- Edit Department Modal Start -->
<!-- <div class="modal fade" tabindex="-1" id="editUserModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Edit This User</h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-user-form" class="p-2" novalidate>
                    <input type="hidden" name="id" id="id">
                    <div class="row mb-3 gx3">
                        <div class="col">
                            <input type="text" name="fname" id="fname" class="form-control form-control-lg" placeholder="Enter First Name" required>
                            <div class="invalid-feedback">First name is required!</div>
                        </div>
                        <div class="col">
                            <input type="text" name="lname" id="lname" class="form-control form-control-lg" placeholder="Enter Last Name" required>
                            <div class="invalid-feedback">Last name is required!</div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="email" id="email" class="form-control form-control-lg" placeholder="Enter E-Mail" required>
                        <div class="invalid-feedback">E-Mail is required!</div>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="phone" id="phone" class="form-control form-control-lg" placeholder="Enter Phone" required>
                        <div class="invalid-feedback">Phone is required!</div>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Edit User" class="btn btn-primary btn-block btn-lg" id="edit-user-btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->
<!-- Edit Department Modal End -->

<!-- Add New Leave Modal Start -->
<div class="modal fade" tabindex="-1" id="addNewLeaveModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Add New Leave</h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add-leave-form" class="p-2" novalidate>
                    <div class="row mb-3 gx-3">
                        <div class="col">
                            <select type="text" name="user_id" id="user_id" class="form-select form-control-lg">

                            </select>
                        </div>
                    </div>
                    <div class="row mb-3 gx-3">
                        <div class="col">
                            <select type="text" name="request" class="form-select form-control-lg">
                                <option>Leave</option>
                                <option>Sick</option>
                                <option>Vacation</option>
                            </select>
                        </div>
                        <div class="col">
                            <input type="text" name="count" class="form-control form-control-lg" placeholder="Enter Count" required>
                            <div class="invalid-feedback">Sort Name is required!</div>
                        </div>
                        <div class="col">
                            <select type="text" name="unit" class="form-select form-control-lg">
                                <option>Day</option>
                                <option>AM</option>
                                <option>PM</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3 gx-3">
                        <div class="col">
                            <input type="date" name="start_date" class="form-control form-control-lg" placeholder="Enter Start Date" required>
                            </select>
                            <div class="invalid-feedback">Department Name is required!</div>
                        </div>
                        <div class="col">
                            <input type="date" name="end_date" class="form-control form-control-lg" placeholder="Enter End Date" required>
                            <div class="invalid-feedback">Sort Name is required!</div>
                        </div>
                    </div>
                    <input type="text" name="note" class="form-control form-control-lg mb-3" placeholder="Enter Note">
                    <div class="mb-3">
                        <input type="submit" value="Add Leave" class="btn btn-primary btn-block btn-lg" id="add-leave-btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add New Leave Modal End -->