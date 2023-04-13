const creat_admin = document.querySelector(".create-admin");
const create_admin_modal = document.querySelector(".create-admin-modal");
const cancel_create_admin = document.querySelector(".cancel-create-admin");
const main_user_content = document.querySelector(".main-user-content");
const admin_modal = document.querySelector("body");

creat_admin.addEventListener("click", function () {
  if (create_admin_modal.style.display === "none") {
    create_admin_modal.style.display = "block";
    main_user_content.style.opacity = "0.3";
    admin_modal.style.overflow = "hidden";
  } else {
    create_admin_modal.style.display = "none";
  }
});

cancel_create_admin.addEventListener("click", function () {
  create_admin_modal.style.display = "none";
  main_user_content.style.opacity = "1";
  admin_modal.style.overflow = "auto";
});
