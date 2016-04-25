<?php include '../subweb/header.php'; ?>

<body>

	<!-- START CONTAINER -->
	<div class="page-container">

		<?php include '../subweb/leftMenu.php' ?>

		<!-- START CONTENT -->
		<div class="page-content">
			
			<?php include '../subweb/headerMenu.php' ?>

			<!-- START BREADCRUMB -->
			<ul class="breadcrumb">
				<li><a href="<?php echo BASE_URL.'admin/' ?>">Home</a></li>
				<li class="active">Payment</li>
			</ul>
			<!-- END BREADCRUMB -->

			<!-- PAGE CONTENT WRAPPER -->
			<div class="page-content-wrap">
				
				<div class="row">
					<div class="col-md-12">
						<!-- START DEFAULT DATATABLE -->
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Payment</h3>
								<ul class="panel-controls">
									<li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
								</ul>
							</div>
							<div class="panel-body">

								<form method="post" action="<?php echo BASE_URL.'admin/payment/store.php' ?>">
								<table class="table datatable">
									<thead>
										<tr>
											<th><input type="checkbox" onchange="checkall(this)" id="cek"/></th>
											<th>NIK</th>
											<th>Fullname</th>
											<th>Loan Date</th>
											<th>Tenor</th>
											<th>Payment Date</th>
											<th>Payment Value</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$getData = $query->query("SELECT * FROM tblpayment WHERE PaymentDate='0000-00-00' GROUP BY Nik");
										$i=0;
										while ($listData = $query->mfArray($getData)) {
											$i++;
											$wherePerson = $query->query('SELECT * FROM tblperson WHERE Nik = '.$listData['Nik'].'');

											echo "<tr>";
												echo "<td>
														<input type='checkbox' name='check".$i."' id='check".$i."'/>
														<input type='hidden' name='Nik".$i."' value='".$listData['Nik']."'/>
														<input type='hidden' name='LoanDate".$i."' value='".$listData['LoanDate']."' />
														<input type='hidden' name='PaymentValue".$i."' value='".$listData['PaymentValue']."' />
													</td>";
												echo "<td>".$listData['Nik']."</td>";

												while ($dataPerson = mysql_fetch_array($wherePerson)) {
													echo "<td>".$dataPerson['FullName']."</td>";
												}

												echo "<td>".$listData['LoanDate']."</td>";
												echo "<td>".$listData['Tenor']."</td>";
												echo "<td>".$listData['PaymentDate']."</td>";
												echo "<td>".$listData['PaymentValue']."</td>";
											echo "</tr>";
										}
										echo "<input type='hidden' name='num' id='num' value='$i'/>";
										?>
									</tbody>

								</table>

								<table width="100%">
									<tr height="50px">
										<td><input type="submit" name="proses" class="btn btn-success" value="Process"/></td>
									</tr>
								</table>
								</form>
							</div>
						</div>
						<!-- END DEFAULT DATATABLE -->
					</div>
				</div>
				
			</div>
			<!-- PAGE CONTENT WRAPPER -->

		</div>
		<!-- END CONTENT -->
	
	</div>
	<!-- END CONTAINER -->

<!-- MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
	<div class="mb-container">
		<div class="mb-middle">
			<div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
			<div class="mb-content">
				<p>Are you sure you want to log out?</p>
				<p>Press No if youwant to continue work. Press Yes to logout current user.</p>
			</div>
			<div class="mb-footer">
				<div class="pull-right">
					<a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
					<button class="btn btn-default btn-lg mb-control-close">No</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END MESSAGE BOX-->

<!-- START SCRIPTS -->
<!-- START PLUGINS -->
<?php
echo $helper->linkJs(BASE_URL.'plugin/js/plugins/jquery/jquery.min.js');
echo $helper->linkJs(BASE_URL.'plugin/js/plugins/jquery/jquery-ui.min.js');
echo $helper->linkJs(BASE_URL.'plugin/js/plugins/bootstrap/bootstrap.min.js');
?>
<!-- END PLUGINS -->
<!-- START THIS PAGE PLUGINS-->
<?php
echo $helper->linkJs(BASE_URL.'plugin/js/plugins/icheck/icheck.min.js');
echo $helper->linkJs(BASE_URL.'plugin/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js');

echo $helper->linkJs(BASE_URL.'plugin/js/plugins/datatables/jquery.dataTables.min.js');
?>
<!-- END THIS PAGE PLUGINS-->
<!-- START TEMPLATE -->
<?php
echo $helper->linkJs(BASE_URL.'plugin/js/settings.js');
echo $helper->linkJs(BASE_URL.'plugin/js/plugins.js');
echo $helper->linkJs(BASE_URL.'plugin/js/actions.js');
?>
<!-- END TEMPLATE -->
<script type="text/javascript"> 
function checkall(ele){
	var checkboxes = document.getElementsByTagName('input');
     if (ele.checked) {
         for (var i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = true;
             }
         }
     } else {
         for (var i = 0; i < checkboxes.length; i++) {
             console.log(i)
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = false;
             }
         }
     }
}
</script>
<!-- END SCRIPTS -->

</body>
</html>