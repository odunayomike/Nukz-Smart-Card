"use strict";

if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
}

function display_image(file) {
  var img = document.querySelector(".profile-image");
  var prototype_img = document.querySelector(".pro-profile-image");
  img.src = URL.createObjectURL(file);
  prototype_img.src = URL.createObjectURL(file);
}

const facebook = document.querySelector(".facebook");
const facebook_input = document.querySelector(".facebook-input");
const instagram = document.querySelector(".instagram");
const instagram_input = document.querySelector(".instagram-input");
const whatsapp = document.querySelector(".whatsapp");
const whatsapp_input = document.querySelector(".whatsapp-input");
const linkedin = document.querySelector(".linkedin");
const linkedin_input = document.querySelector(".linkedin-input");
const twitter = document.querySelector(".twitter");
const twitter_input = document.querySelector(".twitter-input");
const pintrest = document.querySelector(".pintrest");
const pintrest_input = document.querySelector(".pintrest-input");
const youtube = document.querySelector(".youtube");
const youtube_input = document.querySelector(".youtube-input");

const close1 = document.querySelector(".close1");
const first_close = document.querySelector(".first-close");
const close2 = document.querySelector(".close2");
const second_close = document.querySelector(".second-close");
const close3 = document.querySelector(".close3");
const third_close = document.querySelector(".third-close");

facebook.addEventListener("click", function () {
  if (facebook_input.style.display === "none") {
    facebook_input.style.display = "block";
  } else {
    facebook_input.style.display = "none";
  }
});
instagram.addEventListener("click", function () {
  if (instagram_input.style.display === "none") {
    instagram_input.style.display = "block";
  } else {
    instagram_input.style.display = "none";
  }
});
whatsapp.addEventListener("click", function () {
  if (whatsapp_input.style.display === "none") {
    whatsapp_input.style.display = "block";
  } else {
    whatsapp_input.style.display = "none";
  }
});

linkedin.addEventListener("click", function () {
  if (linkedin_input.style.display === "none") {
    linkedin_input.style.display = "block";
  } else {
    linkedin_input.style.display = "none";
  }
});
twitter.addEventListener("click", function () {
  if (twitter_input.style.display === "none") {
    twitter_input.style.display = "block";
  } else {
    twitter_input.style.display = "none";
  }
});
pintrest.addEventListener("click", function () {
  if (pintrest_input.style.display === "none") {
    pintrest_input.style.display = "block";
  } else {
    pintrest_input.style.display = "none";
  }
});
youtube.addEventListener("click", function () {
  if (youtube_input.style.display === "none") {
    youtube_input.style.display = "block";
  } else {
    youtube_input.style.display = "none";
  }
});

close1.addEventListener("click", function () {
  if (first_close.style.display === "block") {
    first_close.style.display = "none";
  } else {
    first_close.style.display = "block";
  }
});

close2.addEventListener("click", function () {
  if (second_close.style.display === "flex") {
    second_close.style.display = "none";
  } else {
    second_close.style.display = "flex";
  }
});
close3.addEventListener("click", function () {
  if (third_close.style.display === "block") {
    third_close.style.display = "none";
  } else {
    third_close.style.display = "block";
  }
});

document.querySelector(".img-files").addEventListener("change", (e) => {
  if (window.File && window.FileReader && window.FileList && window.Blob) {
    const files = e.target.files;
    const output = document.querySelector("#result");

    for (let i = 0; i < files.length; i++) {
      if (!files[i].type.match("image")) continue;
      const picReader = new FileReader();
      picReader.addEventListener("load", function (event) {
        const picFile = event.target;
        const div = document.createElement("div");
        div.innerHTML = `<img class="thumbnail" src="${picFile.result}" title="${picFile.name}"/>`;
        output.appendChild(div);
      });
      picReader.readAsDataURL(files[i]);
    }
  } else {
    alert("Your brower does not support the File API");
  }
});

// Live preview for user information details
document.addEventListener("DOMContentLoaded", function () {
  const user_profile_form = document.querySelector(".info");
  const u_fname = document.querySelector(".u-fname");
  const u_lname = document.querySelector(".u-lname");
  const u_jobtitle = document.querySelector(".u-jobtitle");
  const u_company = document.querySelector(".company");
  const u_psmmary = document.querySelector(".u-psmmary");
  const u_phone = document.querySelector(".u-phone");
  const u_email = document.querySelector(".u-email");
  const u_address = document.querySelector(".u-address");
  const u_website = document.querySelector(".u-website");
  const proto_name = document.querySelector(".pro-name");
  const proto_lname = document.querySelector(".pro-lname");
  const proto_jobtitle = document.querySelector(".proto-jobtitle");
  const proto_company = document.querySelector(".proto-company");
  const proto_summary = document.querySelector(".proto-summary");
  const proto_phone = document.querySelector(".proto-phone");
  const proto_email = document.querySelector(".proto-email");
  const proto_address = document.querySelector(".proto-address");
  const proto_website = document.querySelector(".proto-website");

  //   color_picker.addEventListener("input", function () {
  //     console.log(u_fname.value);
  //     root.style.setProperty("--primary", color_picker.value);
  //   });

  u_fname.addEventListener("input", function () {
    proto_name.innerHTML = u_fname.value;
  });

  u_lname.addEventListener("input", function () {
    proto_lname.innerHTML = u_lname.value;
  });
  u_jobtitle.addEventListener("input", function () {
    proto_jobtitle.innerHTML = u_jobtitle.value;
  });
  u_company.addEventListener("input", function () {
    proto_company.innerHTML = u_company.value;
  });
  u_psmmary.addEventListener("input", function () {
    proto_summary.innerHTML = u_psmmary.value;
  });
  u_phone.addEventListener("input", function () {
    proto_phone.innerHTML = u_phone.value;
  });
  u_email.addEventListener("input", function () {
    proto_email.innerHTML = u_email.value;
  });
  u_address.addEventListener("input", function () {
    proto_address.innerHTML = u_address.value;
  });
  u_website.addEventListener("input", function () {
    proto_website.innerHTML = u_website.value;
  });
});

const color1 = document.querySelector(".color1");
const color2 = document.querySelector(".color2");
const color3 = document.querySelector(".color3");
const color4 = document.querySelector(".color4");
const color5 = document.querySelector(".color5");
const color6 = document.querySelector(".color6");
const color_body = document.querySelector(".color-body");
const color_body1 = document.querySelector(".color-body1");
const color_body2 = document.querySelector(".color-body2");
const color_body3 = document.querySelector(".color-body3");
const color_body4 = document.querySelector(".color-body4");
const color_body5 = document.querySelector(".color-body5");
const color_body6 = document.querySelector(".color-body6");
const color_input = document.querySelector(".color-input");
var root = document.querySelector(":root");

document.addEventListener("DOMContentLoaded", function () {
  const color_input = document.querySelector(".color-input");
  var root = document.querySelector(":root");

  color_input.addEventListener("input", function () {
    root.style.setProperty("--primary", color_input.value);
  });
});

color1.addEventListener("click", function () {
  console.log(color_input.value);
  root.style.setProperty("--primary", color_input.value);
  color_body1.classList.add("clicked");

  color_body2.classList.remove("clicked");
  color_body3.classList.remove("clicked");
  color_body4.classList.remove("clicked");
  color_body5.classList.remove("clicked");
  color_body6.classList.remove("clicked");

  color_input.value = "#608FFF";
});
color2.addEventListener("click", function () {
  root.style.setProperty("--primary", color_input.value);
  color_body2.classList.add("clicked");
  color_body1.classList.remove("clicked");
  color_body3.classList.remove("clicked");
  color_body4.classList.remove("clicked");
  color_body5.classList.remove("clicked");
  color_body6.classList.remove("clicked");

  color_input.value = "#D51A47";
});
color3.addEventListener("click", function () {
  root.style.setProperty("--primary", "#374793");
  color_body3.classList.add("clicked");
  color_body1.classList.remove("clicked");
  color_body2.classList.remove("clicked");
  color_body4.classList.remove("clicked");
  color_body5.classList.remove("clicked");
  color_body6.classList.remove("clicked");
  color_input.value = "#374793";
});
color4.addEventListener("click", function () {
  root.style.setProperty("--primary", "#FF8F03");
  color_body4.classList.add("clicked");
  color_body1.classList.remove("clicked");
  color_body3.classList.remove("clicked");
  color_body2.classList.remove("clicked");
  color_body5.classList.remove("clicked");
  color_body6.classList.remove("clicked");
  color_input.value = "#FF8F03";
});
color5.addEventListener("click", function () {
  root.style.setProperty("--primary", "#FF8B3B");
  color_body5.classList.add("clicked");
  color_body1.classList.remove("clicked");
  color_body3.classList.remove("clicked");
  color_body4.classList.remove("clicked");
  color_body2.classList.remove("clicked");
  color_body6.classList.remove("clicked");
  color_input.value = "#FF8B3B";
});

color6.addEventListener("click", function () {
  root.style.setProperty("--primary", "#E61313");
  color_body6.classList.add("clicked");
  color_body1.classList.remove("clicked");
  color_body3.classList.remove("clicked");
  color_body4.classList.remove("clicked");
  color_body5.classList.remove("clicked");
  color_body2.classList.remove("clicked");
  color_input.value = "#E61313";
});
