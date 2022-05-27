    <script src="../../systemcontrol/assets/js/jquery-3.3.1.min.js"></script>
    <script src="../../systemcontrol/assets/js/popper.min.js"></script>
    <script src="../../systemcontrol/assets/js/bootstrap.min.js"></script>
	
    <script src="../../systemcontrol/assets/js/plugins/selectize/dist/js/standalone/selectize.js"></script>
    
	<script src="../../systemcontrol/assets/js/plugins/datatable/datatables.js"></script>
    <script src="../../systemcontrol/assets/js/plugins/datatable/dataTables.bootstrap4.js"></script>
    
	<script src="../../systemcontrol/assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../../systemcontrol/assets/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script>
        $(function () {
            $(".singleSelect").selectize({
            create: false,
            sortField: "text",
            maxOptions: 3,
            });

            $(".multipleSelect").selectize({
            create: false,
            sortField: "text",
            maxOptions: 3,
            });
        });

        $(document).ready( function () {
            $('#sampleTable').DataTable();
        } );

        $(document).ready( function () {
            $('#educationTable').DataTable({
                "ordering": false
            });
        } );

        $(document).ready( function () {
            $('#clientTable').DataTable({
                "ordering": false
            });
        } );
    </script>
    