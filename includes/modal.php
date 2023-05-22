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
                <input type="hidden" class="hidden-id" id="leave_id" name="leave_id">
                    <div class="row mb-3 gx-3">
                        <div class="col">
                            <select type="text" name="user_id" id="user_id" class="form-select form-control-lg">

                            </select>
                        </div>
                    </div>
                    <div class="row mb-3 gx-3">
                        <div class="col">
                            <select type="text" name="request" id="request" class="form-select form-control-lg">
                                <option>Leave</option>
                                <option>Sick</option>
                                <option>Vacation</option>
                            </select>
                        </div>
                        <div class="col">
                            <input type="text" name="count" id="count" class="form-control form-control-lg" placeholder="Enter Count" required>
                            <div class="invalid-feedback">Sort Name is required!</div>
                        </div>
                        <div class="col">
                            <select type="text" name="unit" id="unit" class="form-select form-control-lg">
                                <option>Day</option>
                                <option>AM</option>
                                <option>PM</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3 gx-3">
                        <div class="col">
                            <input type="date" name="start_date" id="start_date" class="form-control form-control-lg" placeholder="Enter Start Date" required>
                            </select>
                            <div class="invalid-feedback">Department Name is required!</div>
                        </div>
                        <div class="col">
                            <input type="date" name="end_date" id="end_date" class="form-control form-control-lg" placeholder="Enter End Date" required>
                            <div class="invalid-feedback">Sort Name is required!</div>
                        </div>
                    </div>
                    <input type="text" name="note" id="note" class="form-control form-control-lg mb-3" placeholder="Enter Note">
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Add Leave" class="btn btn-primary" id="form-submit-btn">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add New User Modal End -->