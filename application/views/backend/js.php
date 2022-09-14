<script src="<?php echo base_url()?>assets/backend/jquery/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/backend/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url()?>assets/backend/js/adminlte.min.js"></script>
<script src="<?php echo base_url()?>assets/backend/js/dashboard.js"></script>
<script src="<?php echo base_url()?>assets/backend/js/demo.js"></script>
<script src="<?php echo base_url()?>assets/backend/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url()?>assets/backend/js/jquery.knob.min.js"></script>
<script src="<?php echo base_url()?>assets/backend/js/moment.min.js"></script>
<script src="<?php echo base_url()?>assets/backend/js/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo base_url()?>assets/backend/js/sparkline.js"></script>
<script src="<?php echo base_url()?>assets/backend/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?php echo base_url()?>assets/backend/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="<?php echo base_url()?>assets/backend/js/daterangepicker.js"></script>
<script src="<?php echo base_url()?>assets/backend/js/bs-custom-file-input.min.js"></script>
<script src="<?php echo base_url()?>assets/backend/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url()?>assets/backend/js/dataTables.bootstrap4.js"></script>
<script src="<?php echo base_url()?>assets/backend/summernote/summernote-bs4.min.js"></script>
<script src="<?php echo base_url()?>assets/backend/tag/js/tag-it.min.js"></script>
<script type="text/javascript">
  $(function () {
    $('#textarea').summernote()

    $('.my-colorpicker2').colorpicker()
    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })
  });
</script>
<script type="text/javascript">
  $(function () {
    $('.textareas').summernote()
  });
</script>
<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
</script>
<script type="text/javascript">
  $(function () {
    $("#example1").DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    });

    $("#bank_table1").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    });

      $("#log_history").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,

      });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": true,
    });
  });
</script>

<script type="text/javascript">
  var text_max = 2000;
  $('#text').keyup(function() {
    var text_length = $('#text').val().length;
    var text_remaining = text_max - text_length;
    $('#count_message').html(text_length + ' / ' + text_max);
  });
</script>
