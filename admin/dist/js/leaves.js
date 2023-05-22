// const addBtn = document.getElementById("btnAddNewEmployee");
const addBtn = document.getElementById("btnAddNewLeave");

const table = document.getElementById("table-leave");
const tbody = table.getElementsByTagName("tbody")[0];

const formId = document.getElementById("leave-form");
const hiddenId = formId.getElementsByClassName("hidden-id")[0];
const btnSubmitForm = document.getElementById("form-submit-btn");

const formModalId = document.getElementById("formLeaveModal");
const formModal = new bootstrap.Modal(formModalId);
const formModalTitle = formModalId.getElementsByClassName("modal-title")[0];

// const selectDepartment = document.getElementById("department_id");

// const showAlert = document.getElementById("showAlert");

// const addForm = document.getElementById("add-leave-form");
// const showAlert = document.getElementById("showAlert");
// const addModal = new bootstrap.Modal(
//   document.getElementById("addNewLeaveModal")
// );
// const tbody = document.querySelector("tbody");
// const updateForm = document.getElementById("edit-user-form");
// const editModal = new bootstrap.Modal(document.getElementById("editUserModal"));
const selectUser = document.getElementById("user_id");

addEventListener("DOMContentLoaded", async () => {
  const data = await fetch("../functions/employee.php?set=1", {
    method: "GET",
  });
  const response = await data.text();
  selectUser.innerHTML = response;
});

formId.addEventListener("submit", async (e) => {
  e.preventDefault();

  const formData = new FormData(formId);

  if (hiddenId.value == "") {
    formData.append("add", 1);
    action = "add";
  } else {
    formData.append("update", 1);
  }

  // alert(addForm.checkValidity());

  if (formId.checkValidity() === false) {
    e.preventDefault();
    e.stopPropagation();
    formId.classList.add("was-validated");
    return false;
  } else {
    btnSubmitForm.value = "Please Wait...";

    const data = await fetch("../functions/leave.php", {
      method: "POST",
      body: formData,
    });
    const response = await data.text();
    showAlert.innerHTML = response;
    formId.reset();
    formId.classList.remove("was-validated");
    formModal.hide();
    fetchAllLeaves();
  }
});

const fetchAllLeaves = async () => {
  const data = await fetch("../functions/leave.php?read=1", {
    method: "GET",
  });
  const response = await data.text();
  tbody.innerHTML = response;
};

fetchAllLeaves();

tbody.addEventListener("click", (e) => {
  if (e.target && e.target.matches("a.editlink")) {
    e.preventDefault();
    let id = e.target.getAttribute("id");
    editLeave(id);
  }
});

const editLeave = async (id) => {
  const data = await fetch(`../functions/leave.php?edit=1&id=${id}`, {
    method: "GET",
  });
  const response = await data.json();
  // alert(response.leave_id);
  document.getElementById("leave_id").value = response.leave_id;
  document.getElementById("user_id").value = response.employee_id;
  document.getElementById("request").value = response.request;
  document.getElementById("count").value = response.count;
  document.getElementById("unit").value = response.unit;
  // alert(response.start_date);
  document.getElementById("start_date").value = response.start_date;
  document.getElementById("end_date").value = response.end_date;
  document.getElementById("note").value = response.note;
};

// tbody.addEventListener("click", (e) => {
//   if (e.target && e.target.matches("a.deletelink")) {
//     e.preventDefault();
//     let id = e.target.getAttribute("id");
//     deleteUser(id);
//   }
// });

// const deleteUser = async (id) => {
//   const data = await fetch(`../functions/employee.php?delete=1&id=${id}`, {
//     method: "GET",
//   });
//   const response = await data.text();
//   showAlert.innerHTML = response;
//   fetchAllUsers();
// };

formModalId.addEventListener("hidden.bs.modal", () => {
  formModalTitle.innerHTML = "";
  formId.reset();
  btnSubmitForm.value = "";
});
