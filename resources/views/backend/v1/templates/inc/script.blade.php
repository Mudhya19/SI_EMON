<script src="{{ url('templates/backend')}}/vendor/jquery/jquery.min.js"></script>
  <script src="{{ url('templates/backend')}}//vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ url('templates/backend')}}//vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="{{ url('templates/backend')}}//js/ruang-admin.min.js"></script>
  <script src="{{ url('templates/backend')}}//vendor/chart.js/Chart.min.js"></script>
  <script src="{{ url('templates/backend')}}//js/demo/chart-area-demo.js"></script> 

  <!-- Page level plugins -->
<script src="{{ url('templates/backend') }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('templates/backend') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
</script>