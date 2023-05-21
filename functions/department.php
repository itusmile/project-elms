<?php

require_once '../classes/Department.php';
require_once '../classes/Util.php';

$dep = new Department();
$util = new Util();

if (isset($_POST['add'])) {
    $full_name = $util->testInput($_POST['full_name']);
    $sort_name = $util->testInput($_POST['sort_name']);

    if ($dep->insert($full_name,$sort_name)) {
        echo $util->showMessage("success", "Department inserted successfully!");
    } else {
        echo $util->showMessage("danger", "Something went wrong.");
    }
}

if (isset($_GET['read'])) {
    $deps = $dep->read();
    $output = '';
    if ($deps) {
        foreach ($deps as $row) {
            $output .= "<tr>
            <td>" . $row['id'] . "</td>
            <td>" . $row['department_name'] . "</td>
            <td>" . $row['dep_name'] . "</td>
            <td>
                <a href='#' id='" . $row['id'] . "' class='btn btn-success btn-sm rounded py-0 editlink' data-bs-toggle='modal' data-bs-target='#editDepartmentModal'>Edit</a>
                <a href='#' id='" . $row['id'] . "' class='btn btn-danger btn-sm rounded py-0 deletelink'>Delete</a>
            </td>
            </tr>";
        }
        echo $output;
    } else {
        echo "<tr>
            <td colspan='6'>No Department found in the Database</td>
        </tr>";
    }
}

if (isset($_GET['set'])) {
    $deps = $dep->read();
    $output = '';
    if ($deps) {
        foreach ($deps as $row) {
            $output .= "<option value=" . $row['department_id'] . ">" . $row['department_name'] . "</option>";
        }
        echo $output;
    } else {
        echo "<tr>
            <td colspan='6'>No Database</td>
        </tr>";
    }
}
