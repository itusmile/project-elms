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
        echo $util->showMessage("success", "Leave inserted successfully!");
    } else {
        echo $util->showMessage("danger", "Something went wrong.");
    }
}

if (isset($_GET['read'])) {
    $reqs = $req->read();
    $output = '';
    if ($reqs) {
        // print_r($reqs);
        foreach ($reqs as $row) {
            $output .= "<tr>
            <td>" . $row['leave_id'] . "</td>
            <td>" . $row['first_name'] . ' ' . $row['last_name'] . ' '  . $row['request'] . "</td>
            <td>" . $row['start_date'] . ' - ' . $row['end_date'] . ' ' . $row['count'] . ' ' . $row['unit'] . "</td>
            <td>" . $row['leave_status'] . "</td>
            <td>
                <a href='#' id='" . $row['leave_id'] . "' class='btn btn-success btn-sm rounded py-0 editlink' data-bs-toggle='modal' data-bs-target='#formLeaveModal'>Edit</a>
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

if (isset($_GET['edit'])) {
    $id = $_GET['id'];
    $data = $req->readOne($id);
    echo json_encode($data);
}

if (isset($_POST['update'])) {
    $request = $util->testInput($_POST['request']);
    $start_date = $util->testInput($_POST['start_date']);
    $end_date = $util->testInput($_POST['end_date']);
    $count = $util->testInput($_POST['count']);
    $unit = $util->testInput($_POST['unit']);
    $note = $util->testInput($_POST['note']);
    $id = $util->testInput($_POST['leave_id']);

    if ($req->update($id, $request, $start_date, $end_date, $count, $unit, $note)) {
        echo $util->showMessage("success", "User updated successfully!");
    } else {
        echo $util->showMessage("danger", "Something went wrong!");
    }
}

// if (isset($_GET['delete'])) {
//     $id = $_GET['id'];
//     if ($emp->delete($id)) {
//         echo $util->showMessage("success", "User Delete successfully!");
//     } else {
//         echo $util->showMessage("danger", "Something went wrong!");
//     }
// }
