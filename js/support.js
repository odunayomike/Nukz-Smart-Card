"use strict";

const buttons = document.querySelectorAll(".bi");
const answers = document.querySelectorAll(".answer");

for (let i = 0; i < buttons.length; i++) {
  buttons[i].addEventListener("click", function () {
    answers[i].classList.toggle("ansdisplay");
  });
}

const month_button = document.querySelector(".month-btn");
const year_button = document.querySelector(".year-btn");
const month = document.querySelector(".month");
const year = document.querySelector(".year");

const month_plan = document.querySelector(".normal-monthly-plan");
const year_plan = document.querySelector(".yearly-plan");

year_button.addEventListener("click", function () {
  month.classList.remove("active-price");
  year_plan.classList.add("mobile");
  month_plan.classList.remove("mobile");
  month_plan.style.display = "none";
  year.classList.add("active-price");
  if (year_plan.style.display === "none") {
    year_plan.style.display = "flex";
  }
});

month_button.addEventListener("click", function () {
  month.classList.add("active-price");
  month_plan.classList.add("mobile");
  year_plan.classList.remove("mobile");
  year.classList.remove("active-price");
  year_plan.style.display = "none";
  if (month_plan.style.display === "none") {
    month_plan.style.display = "flex";
  }
});

// const month_button = document.querySelector(".month-btn");
// const year_button = document.querySelector(".year-btn");
// const month = document.querySelector(".month");
// const year = document.querySelector(".year");
// const month_plan = document.querySelector(".normal-monthly-plan");
// const year_plan = document.querySelector(".yearly-plan");

// year_button.addEventListener("click", function () {
//   month.classList.toggle("active-price");
//   month_plan.style.display = "none";
//   year.classList.toggle("active-price ");

//   year_plan.style.display =
//     year_plan.style.display === "none" ? "flex" : "none";
// });

// month_button.addEventListener("click", function () {
//   month.classList.toggle("active-price");
//   year.classList.toggle("active-price");
//   year_plan.style.display = "none";

//   month_plan.style.display =
//     month_plan.style.display === "none" ? "flex" : "none";
// });
