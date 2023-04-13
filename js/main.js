"use strict";

window.onscroll = function () {
  myFunction();
};

var header = document.getElementById("myHeader");
var header_btn = document.getElementById("btn-sticky");
var sticky = header.offsetTop;
function changeimage() {
  if (window.pageYOffset) {
    document.getElementById("image").src = "./img/nukdigital_logowhite2.png";
  } else {
    document.getElementById("image").src = "./img/NDA Logo 1 3.png";
  }
}

function myFunction() {
  changeimage();
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
    header_btn.classList.add("button-sticky");
  } else {
    header.classList.remove("sticky");
    header_btn.classList.remove("button-sticky");
  }
}

// -------------- IMAGE CROPPER -------------------

// var bs_modal = $('#modal');
//     var image = document.getElementById('image1');

//     var img2 = document.getElementById('pimage2');
//     var cropper,reader,file;

//     $("body").on("change", ".image", function(e) {
//         var files = e.target.files;
//         var done = function(url) {
//             image.src = url;
//             bs_modal.modal('show');
//         };

//         if (files && files.length > 0) {
//             file = files[0];

//             if (URL) {
//                 done(URL.createObjectURL(file));
//             } else if (FileReader) {
//                 reader = new FileReader();
//                 reader.onload = function(e) {
//                     done(reader.result);
//                 };
//                 reader.readAsDataURL(file);
//             }
//         }
//     });

//     bs_modal.on('shown.bs.modal', function() {
//         cropper = new Cropper(image, {
//             aspectRatio: 1,
//             viewMode: 3,
//             preview: '.preview'
//         });
//     }).on('hidden.bs.modal', function() {
//         cropper.destroy();
//         cropper = null;
//     });

//     crop.addEventListener('click', function(){
//       console.log('clicked');
//       canvas = cropper.getCroppedCanvas({
//           width: 160,
//           height: 160,
//       })
//         var croppedCanvas = cropper.getCroppedCanvas();
//       var imageData = croppedCanvas.toDataURL();

//       img2.src = imageData;
//       bs_modal.modal('hide');
//       // Get the cropped canvas

//   });
