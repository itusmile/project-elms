<?php

require_once '../classes/Leave.php';
require_once '../classes/Util.php';

$req = new Leave();
$util = new Util();

if (isset($_POST['add'])) {
    $request = $util->testInput($_POST['request']);
    $start_date = $util->testInput($_POST['start_date']);
    $end_date = $util->testInput($_POST['end_date']);
    $count = $util->testInput($_POST['count']);
    $unit = $util->testInput($_POST['unit']);
    $user_id = $util->testInput($_POST['user_id']);
    $note = $util->testInput($_POST['note']);

    if ($req->insert($request, $start_date, $end_date, $count, $unit, $user_id, $note)) {
        echo $util->showMessage("success", "User inserted successfully!");
    } else {
        echo $util->showMessage("danger", "Something went wrong.");
    }
}

if (isset($_GET['read'])) {
    $reqs = $req->read();
    $output = '';
    if ($reqs) {
        foreach ($reqs as $row) {
            $output .= "<tr>
            <td>" . $row['leave_id'] . "</td>
            <td>" . $row['first_name'] . ' ' . $row['last_name'] . ' '  . $row['request'] . "</td>
            <td>" . $row['start_date'] . ' - ' . $row['end_date'] . ' ' . $row['count'] . ' ' . $row['unit'] . "</td>
            <td>" . $row['status'] . "</td>
            <td>
                <a href='#' id='" . $row['leave_id'] . "' class='btn btn-success btn-sm rounded py-0 editlink' data-bs-toggle='modal' data-bs-target='#editUserModal'>Edit</a>
                <a href='#' id='" . $row['leave_id'] . "' class='btn btn-danger btn-sm rounded py-0 deletelink'>Delete</a>
            </td>
            </tr>";
        }
        echo $output;
    } else {
        echo "<tr>
            <td colspan='6'>No Users found in the Database</td>
        </tr>";
    }
}

// if (isset($_GET['edit'])) {
//     $id = $_GET['id'];
//     $user = $emp->readOne($id);
//     echo json_encode($user);
// }

// if (isset($_POST['update'])) {
//     $id = $util->testInput($_POST['id']);
//     $fname = $util->testInput($_POST['fname']);
//     $lname = $util->testInput($_POST['lname']);
//     $email = $util->testInput($_POST['email']);
//     $phone = $util->testInput($_POST['phone']);

//     if ($emp->update($id, $fname, $lname, $email, $phone)) {
//         echo $util->showMessage("success", "User updated successfully!");
//     } else {
//         echo $util->showMessage("danger", "Something went wrong!");
//     }
// }

// if (isset($_GET['delete'])) {
//     $id = $_GET['id'];
//     if ($emp->delete($id)) {
//         echo $util->showMessage("success", "User Delete successfully!");
//     } else {
//         echo $util->showMessage("danger", "Something went wrong!");
//     }
// }
