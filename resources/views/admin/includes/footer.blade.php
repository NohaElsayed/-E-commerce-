
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('adminassets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminassets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminassets/dist/js/adminlte.min.js')}}"></script>
<!--DataTable-->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

<!--My Js file-->
<script src="{{asset('adminassets/dist/js/custom.js')}}"></script>
<script src="{{asset('adminassets/dist/js/toastr.min.js')}}"></script>

@if(Session()->has('success'))

<script>
toastr.success("{{Session()->get('success')}}")

</script>
@endif

</body>
</html>
