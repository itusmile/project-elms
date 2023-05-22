// const addBtn = document.getElementById("btnAddNewEmployee");
const addBtn = document.getElementById("btnAddNewLeave");

const table = document.getElementById("table-leave");
const tbody = table.getElementsByTagName("tbody")[0];

const formId = document.getElementById("leave-form");
const hiddenId = formId.getElementsByClassName("hidden-id")[0];
const btnSubmitForm = document.getElementById("form-submit-btn");

// const formModalId = document.getElementById("formEmployeeModal");
// const formModal = new bootstrap.Modal(formModalId);
// const formModalTitle = formModalId.getElementsByClassName("modal-title")[0];

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
  formData.append("add", 1);

  // alert(addForm.checkValidity());

  if (formId.checkValidity() === false) {
    e.preventDefault();
    e.stopPropagation();
    formId.classList.add("was-validated");
    return false;
  } else {
    document.getElementById("add-leave-btn").value = "Please Wait...";

    const data = await fetch("../functions/leave.php", {
      method: "POST",
      body: formData,
    });
    const response = await data.text();
    showAlert.innerHTML = response;
    document.getElementById("add-leave-btn").value = "Add Leave";
    formId.reset();
    formId.classList.remove("was-validated");
    addModal.hide();
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

// tbody.addEventListener("click", (e) => {
//   if (e.target && e.target.matches("a.editlink")) {
//     e.preventDefault();
//     let id = e.target.getAttribute("id");
//     editUser(id);
//   }
// });

// const editUser = async (id) => {
//   const data = await fetch(`../functions/employee.php?edit=1&id=${id}`, {
//     method: "GET",
//   });
//   const response = await data.json();
//   document.getElementById("id").value = response.id;
//   document.getElementById("fname").value = response.first_name;
//   document.getElementById("lname").value = response.last_name;
//   document.getElementById("email").value = response.email;
//   document.getElementById("phone").value = response.phone;
// };

// updateForm.addEventListener("submit", async (e) => {
//   e.preventDefault();

//   const formData = new FormData(updateForm);
//   formData.append("update", 1);

//   if (updateForm.checkValidity() === false) {
//     e.preventDefault();
//     e.stopPropagation();
//     updateForm.classList.add("was-validated");
//     return false;
//   } else {
//     document.getElementById("edit-user-btn").value = "Please Wait...";

//     const data = await fetch("../functions/employee.php", {
//       method: "POST",
//       body: formData,
//     });
//     const response = await data.text();
//     showAlert.innerHTML = response;
//     document.getElementById("edit-user-btn").value = "Edit User";
//     updateForm.reset();
//     updateForm.classList.remove("was-validated");
//     editModal.hide();
//     fetchAllUsers();
//   }
// });

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
