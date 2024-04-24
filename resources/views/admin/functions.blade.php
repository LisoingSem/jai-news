<script>
      function imgViewer(evt, src) {
            $('#img_viewer').attr('src', src);
            $('#imgViewerModal').modal('show');
      }

      function doAfterSelect(input) {
            console.log(input);
            readCreateURL(input);
      }

      function readCreateURL(input) {
            if (input.files && input.files[0]) {
                  var reader = new FileReader();
                  reader.onload = function(e) {
                        $('.changeImage').attr('src', e.target.result);
                  }
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
                  reader.onload = function(e) {
                        $('.echangeImage').attr('src', e.target.result);
                  }
                  reader.readAsDataURL(input.files[0]);
            }
      }
</script>