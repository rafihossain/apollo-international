<!-- Footer Start -->
<footer class="footer">
    <div class="container-fluid"> 
               Copyright &copy;  <script>
                    document.write(new Date().getFullYear())
                </script> Apollo International by <a href="">therssoftware</a> 
    </div>
</footer>
<!-- end Footer -->

</div>
<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>


<script src="{{ asset('admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/feather-icons/feather.min.js') }}"></script>

<!-- knob plugin -->
<script src="{{ asset('admin/assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>

<!--Morris Chart-->
<script src="{{ asset('admin/assets/libs/morris.js06/morris.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/raphael/raphael.min.js') }}"></script>

<<script src="{{ asset('admin/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/pages/form-fileuploads.init.js') }}"></script>
<!-- Dashboar init js-->
<script src="{{ asset('admin/assets/js/pages/dashboard.init.js') }}"></script>
<!-- Datatables init -->
<script src="{{ asset('admin/assets/js/pages/datatables.init.js') }}"></script>

<!-- App js-->
<script src="{{ asset('admin/assets/js/app.min.js') }}"></script>
<!-- js validation -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="{{ asset('admin/assets/js/jsvalidation.js') }}"></script>
<!-- js validation -->
<script type="text/javascript">
	 $('.imageupload').dropify();
     //Select2 plugin--------------------------
     $('[data-toggle="select2"]').select2();

      //delete sweetalert
       $(document).on('click', '#delete', function(e) {
        e.preventDefault();
        var Id = $(this).attr('href');

        swal({
              title: "Are you sure?",
              text: "You want to delete!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                  swal("Successfully deleted!", {
                     icon: "success",
                  });

                  window.location.href=Id;
                  
              } else {
                  swal("safe!");
              }

            });
        });
</script>

</body>

</html>