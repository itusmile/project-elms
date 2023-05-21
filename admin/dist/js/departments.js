const addForm = document.getElementById("add-department-form");
const showAlert = document.getElementById("showAlert");
const addBtn = document.getElementById("btnAddNewDepartment");
const addModal = new bootstrap.Modal(
  document.getElementById("addNewDepartmentModal")
);
const tbody = document.querySelector("tbody");
// const updateForm = document.getElementById("edit-department-form");
// const editModal = new bootstrap.Modal(document.getElementById("editUserModal"));
// const selectDepartment = document.getElementById("department_id");

const fetchAllDepartments = async () => {
  const data = await fetch("../functions/department.php?read=1", {
    method: "GET",
  });
  const response = await data.text();
  tbody.innerHTML = response;
};

fetchAllDepartments();

addForm.addEventListener("submit", async (e) => {
  e.preventDefault();

  const formData = new FormData(addForm);
  formData.append("add", 1);

  // alert(addForm.checkValidity());

  if (addForm.checkValidity() === false) {
    e.preventDefault();
    e.stopPropagation();
    addForm.classList.add("was-validated");
    return false;
  } else {
    document.getElementById("add-department-btn").value = "Please Wait...";

    const data = await fetch("../functions/department.php", {
      method: "POST",
      body: formData,
    });
    const response = await data.text();
    showAlert.innerHTML = response;
    document.getElementById("add-department-btn").value = "Add Department";
    addForm.reset();
    addForm.classList.remove("was-validated");
    addModal.hide();
    fetchAllDepartments();
  }
});

// const fetchAllUsers = async () => {
//   const data = await fetch("../functions/employee.php?read=1", {
//     method: "GET",
//   });
//   const response = await data.text();
//   tbody.innerHTML = response;
// };

// fetchAllUsers();

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
