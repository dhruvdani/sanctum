    
    
    
    <!-- up will be the content of main body part i.e. dashboard and other pages -->
    
    </div>

    
    <footer class="sticky-footer" style="color:#0f1225;font-weight:bold;background-color:none;">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Sanctum 2021</span>
            </div>
        </div>
    </footer>

    <!-- footer with php -->
    </div>
    </div>

    <!-- Scroll back to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color:black">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-info" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-warning" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    
	<script type="text/javascript" src="js/jquery.js"></script>  
	<script type="text/javascript" src="js/jquery.dataTables.min.js" ></script>  
	<script type="text/javascript" src="js/dataTables.buttons.min.js"></script>  
	<script type="text/javascript" src="js/buttons.print.min.js"></script>  
	
    <script type="text/javascript" src="js/jszip.min.js"></script>
    <script type="text/javascript" src="js/pdfmake.min.js"></script>
    <script type="text/javascript" src="js/vfs_fonts.js"></script>
    <script type="text/javascript" src="js/buttons.html5.min.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins 
    <script src="vendor/chart.js/Chart.min.js"></script>-->

    <!-- Page level custom scripts -->
    
      <!-- Page level plugins -->
    
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script>
    $(document).ready(function() {
        $("ul.navbar-nav > li").click(function (e) {
                $(this).addClass("active");
                $("ul.navbar-nav > li").not(this).removeClass("active");
        });
        $('#dataTable').DataTable({
            dom: 'Bfrtip',
            
            buttons: [
                {extend: "pdf", className: "btn btn-light"},
                {extend: "excel", className: "btn btn-danger"},
                {extend: "print", className: "btn btn-primary"}
            ]
        });
       
    });
    
    </script>
    </body>
    </html>