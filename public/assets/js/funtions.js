function doAfterSelect(input) {
      console.log(input);
      readCreateURL(input);
}

function readCreateURL(input) {
      if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                  $(".changeImage").attr("src", e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
      }
}

function editAfterSelect(input) {
      console.log(input);
      readEditURL(input);
}

function readEditURL(input) {
      if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                  $(".echangeImage").attr("src", e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
      }
}

function showNotifyMessage(type, message) {
      if (type === "success") {
            toastr.success(message);
      } else if (type === "warning") {
            toastr.warning(message);
      } else if (type === "error") {
            toastr.error(message);
      } else {
            toastr.info(message);
      }
}
