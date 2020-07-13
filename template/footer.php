<?php 

if (!isset($_SESSION["login_admin"]))
{
	header("location: ../login.php");
	exit();
}

$data = mysqli_query($conn, "SELECT * FROM tb_transaksi WHERE status = 'waiting'");

foreach ($data as $dta) {
    $id = $dta["id"];
    $nama = $dta["nama"];
    $get_tanggal = $dta["tgl_tr"];
    $get_jumlah = $dta["jumlah"];
    $tanggal_tr = strtotime($get_tanggal)+86400;
    $tanggal_sekarang = time();
        // $tanggal = date('d-m-Y',strtotime('+1 days',strtotime($get_tanggal)));
    if ($tanggal_sekarang > $tanggal_tr) {
        mysqli_query($conn, "UPDATE tb_transaksi SET status='cancel' WHERE id=$id");
        $data_apotik = mysqli_query($conn, "SELECT * FROM apotik WHERE nama_obat = '$nama' ");
        if (mysqli_num_rows($data_apotik) == 1){
            $datax = mysqli_fetch_assoc($data_apotik);
            $id = $datax["id"];
            $stok = $datax["stok"];
            $stok_fix = $get_jumlah + $stok;

            mysqli_query($conn, "UPDATE apotik SET stok = '$stok_fix' WHERE id=$id");
        }

        $data_alkes = mysqli_query($conn, "SELECT * FROM alkes WHERE nama = '$nama' ");
        if (mysqli_num_rows($data_alkes) == 1){
            $datay = mysqli_fetch_assoc($data_alkes);
            $id = $datay["id"];
            $stok = $datay["stok"];
            $stok_fix = $get_jumlah + $stok;
            
            mysqli_query($conn, "UPDATE alkes SET stok = '$stok_fix' WHERE id=$id");
        }


    }
}

?>


</div> <!-- container -->

</div> <!-- content -->

<footer class="footer text-right">
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Apotik Madani Farma</a>

</footer>

</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->



<!-- jQuery  -->
<script src="https://myproject-apotek.herokuapp.com/asset/js/jquery.min.js"></script>
<script src="https://myproject-apotek.herokuapp.com/asset/js/popper.min.js"></script>
<script src="https://myproject-apotek.herokuapp.com/asset/js/bootstrap.min.js"></script>
<script src="https://myproject-apotek.herokuapp.com/asset/js/metisMenu.min.js"></script>
<script src="https://myproject-apotek.herokuapp.com/asset/js/waves.js"></script>
<script src="https://myproject-apotek.herokuapp.com/asset/js/jquery.slimscroll.js"></script>
<script src="https://myproject-apotek.herokuapp.com/oplugins/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="https://myproject-apotek.herokuapp.com/oplugins/counterup/jquery.counterup.min.js"></script>

<!-- Required datatable js -->
<script src="https://myproject-apotek.herokuapp.com/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="https://myproject-apotek.herokuapp.com/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="https://myproject-apotek.herokuapp.com/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="https://myproject-apotek.herokuapp.com/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="https://myproject-apotek.herokuapp.com/plugins/datatables/jszip.min.js"></script>
<script src="https://myproject-apotek.herokuapp.com/plugins/datatables/pdfmake.min.js"></script>
<script src="https://myproject-apotek.herokuapp.com/plugins/datatables/vfs_fonts.js"></script>
<script src="https://myproject-apotek.herokuapp.com/plugins/datatables/buttons.html5.min.js"></script>
<script src="https://myproject-apotek.herokuapp.com/plugins/datatables/buttons.print.min.js"></script>
<!-- Responsive examples -->
<script src="https://myproject-apotek.herokuapp.com/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="https://myproject-apotek.herokuapp.com/plugins/datatables/responsive.bootstrap4.min.js"></script>

<script src="https://myproject-apotek.herokuapp.com/plugins/tinymce/tinymce.min.js"></script>
<!-- Chart JS -->
<script src="https://myproject-apotek.herokuapp.com/oplugins/chart.js/chart.bundle.js"></script>

<!-- init dashboard -->
<script src="https://myproject-apotek.herokuapp.com/asset/pages/jquery.dashboard.init.js"></script>

<!-- App js -->
<script src="https://myproject-apotek.herokuapp.com/asset/js/jquery.core.js"></script>
<script src="https://myproject-apotek.herokuapp.com/asset/js/jquery.app.js"></script>


<script type="text/javascript">
	$(document).ready(function() {
		$('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                	lengthChange: false,
                	buttons: ['copy', 'excel', 'pdf', 'print']
                });

                table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');


                $('#pilihan').change(function() {
                  var pilihan = $('#pilihan').val();
                  if (pilihan == 'day') {
                    $('#day').removeAttr('hidden', '');
                    $('#mon').attr('hidden', '');
                }
                else if (pilihan == 'mon') {
                    $('#mon').removeAttr('hidden', '');
                    $('#day').attr('hidden', '');
                }
                else {
                    $('#day').attr('hidden', '');
                    $('#mon').attr('hidden', '');
                    document.location.href="datalaporan.php";
                }
            });

                $('#tanggal').change(function() {
                  var tanggal = $('#tanggal').val();
                  document.location.href="datalaporan.php?value="+tanggal;
              });

                $('#bulan').change(function() {
                  var bulan = $('#bulan').val()+'-';
                  document.location.href="datalaporan.php?value="+bulan;
              });

            } );


</script>
<?php
$all = ''; $day = ''; $mon = '';
if (isset($_GET['value'])) {
    $value = $_GET['value'];

    if (strlen($value) > 3) {
        echo "<script>$(document).ready(function() { $('#day').removeAttr('hidden', ''); $('#tanggal').val('".$value."')})</script>";
    }
    else if (strlen($value) == 3) {
        echo "<script>$(document).ready(function() { $('#mon').removeAttr('hidden', ''); $('#bulan').val('".substr($value, 0,2)."')})</script>";
    }

}
?>



<script type="text/javascript">
    $(document).ready(function () {
        if($("#elm1").length > 0){
            tinymce.init({
                selector: "textarea#elm1",
                theme: "modern",
                height:300,
                plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                style_formats: [
                {title: 'Bold text', inline: 'b'},
                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                {title: 'Example 1', inline: 'span', classes: 'example1'},
                {title: 'Example 2', inline: 'span', classes: 'example2'},
                {title: 'Table styles'},
                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                ]
            });
}
});

</script>



</body>
</html>
