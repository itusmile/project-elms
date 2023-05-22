<?php

include_once 'includes/header.php'
?>

<title>MANAGEMENT - EMPLOYEE</title>

</head>

<body>

    <?php include_once 'includes/navbar.php' ?>
    <?php include_once '../includes/modals/employee/modal.php' ?>

    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <div class="">
                    <h4 class="text-primary">All employees in the database</h4>
                </div>
                <div class="">
                    <button class="btn btn-primary" type="button" id="btnAddNewEmployee" data-bs-toggle="modal" data-bs-target="#formEmployeeModal">Add New Employee</button>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg12">
                <div id="showAlert"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-spriped table-boredered text-center" id="table-employee">
                        <thead>
                            <tr>
                                <th>Leave Count</th>
                                <th>Full Name</th>
                                <th>Department</th>
                                <th>Quota</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Employee Read Function -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'includes/footer.php' ?>
    <script src="dist/js/employees.js"></script>
</body>

</html>