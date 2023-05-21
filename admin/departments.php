<?php

include_once 'includes/header.php'
?>

<title>MANAGEMENT - DEPARTMENT</title>

</head>

<body>

    <?php include_once 'includes/navbar.php' ?>
    <?php include_once '../includes/modal.php' ?>

    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <div class="">
                    <h4 class="text-primary">All department in the database</h4>
                </div>
                <div class="">
                    <button class="btn btn-primary" type="button" id="btnAddNewDepartment" data-bs-toggle="modal" data-bs-target="#addNewDepartmentModal">Add New Department</button>
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
                    <table class="table table-spriped table-boredered text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Department Name</th>
                                <th>Sort Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Department Read Function -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'includes/footer.php' ?>
    <script src="dist/js/departments.js"></script>
</body>

</html>