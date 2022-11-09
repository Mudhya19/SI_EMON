<script src="{{ url('templates/backend')}}/vendor/jquery/jquery.min.js"></script>
<script src="{{ url('templates/backend')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ url('templates/backend')}}/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="{{ url('templates/backend')}}/js/ruang-admin.min.js"></script>
<script src="{{ url('templates/backend')}}/vendor/chart.js/Chart.min.js"></script>
<script src="{{ url('templates/backend')}}/js/demo/chart-area-demo.js"></script>
<!-- Select2 -->
<script src="{{ url('templates/backend')}}/vendor/select2/dist/js/select2.min.js"></script>
<!-- Bootstrap DatePicker -->  
<link href="vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" >
<!-- Page level plugins -->
<script src="{{ url('templates/backend') }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('templates/backend') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script>
  $(document).ready(function () {
      // Select2 Single with Placeholder
      $('.select2-single-placeholder').select2({
      allowClear: true
      });
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
</script>