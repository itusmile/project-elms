<!-- Form Modal Start -->
<div class="modal fade" tabindex="-1" id="formDepartmentModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title fs-4"></div>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="department-form" class="p-2" novalidate>
                <div class="modal-body">
                    <input type="hidden" class="hidden-id" name="department_id">
                    <div class="row mb-3 gx-3">
                        <div class="col-lg mb-lg-0 mb-3">
                            <label for="department_name" class="form-label">Full Name</label>
                            <input type="text" name="department_name" id="department_name" class="form-control" placeholder="Enter Department Name" required>
                            <div class="invalid-feedback">Department is required!</div>
                        </div>
                        <div class="col-lg">
                            <label for="department_name" class="form-label">Sort Name</label>
                            <input type="text" name="sort_name" id="sort_name" class="form-control" placeholder="Enter Sort Name" required>
                            <div class="invalid-feedback">Sort Name is required!</div>
                        </div>
                    </div>
                    <!-- <div class="mb-3">
                        </div> -->
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" id="form-submit-btn">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Form Modal End -->

<!-- View Modal Start -->
<div class="modal fade" tabindex="-1" id="viewDepartmentModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title"></div>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <input type="hidden" class="hidden-id">
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
<!-- View Modal End -->