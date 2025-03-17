     <!-- ======= Footer ======= -->
     <footer id="footer" class="footer">

     </footer><!-- End Footer -->

     <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

     <!-- Vendor JS Files -->
     <!-- jQuery UI 1.11.4 -->
     <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
     <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
     <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
     <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
     <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
     <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
     <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
     <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
     <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
     <script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>

     <!-- Template Main JS File -->
     <script src="{{ asset('assets/js/main.js') }}"></script>
     <!-- CDN example (jsDelivr) -->
     <script src="https://cdn.jsdelivr.net/npm/dayjs@1/dayjs.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.13/plugin/relativeTime.min.js"></script>
     <script defer>
         jQuery(function($) {
             dayjs.extend(dayjs_plugin_relativeTime);
         });
     </script>


     <script type="text/javascript">
         /* Resolve conflict in jQuery UI tooltip with Bootstrap tooltip */
         $.widget.bridge('uibutton', $.ui.button);

         $(function() {
             var route = "{{ url()->current() }}";
             $('ul.sidebar-menu a').filter(function() {
                 return this.href == route;
             }).parent().addClass('active');

             /** Set treeview parent active */
             $('ul.treeview-menu a').filter(function() {
                 return this.href == route;
             }).parentsUntil(".sidebar-menu > .treeview-menu ").addClass('active');

             $(".datefield").datepicker({
                 format: 'yyyy-mm-dd'
             });
         });

         @stack('script')
     </script>
     </body>

     </html>