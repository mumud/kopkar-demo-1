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
				<li><a href="<?php echo BASE_URL.'admin/payment/' ?>">Payment</a></li>
				<li class="active">Report</li>
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

								<form class="form-horizontal" action="http://localhost/kopkardemo/admin/payment/reportPdf.php" name="kopkar" method="GET" target="_blank">

									<div class="form-group">
										<label class="col-md-1 control-label">NIK:</label>
										<div class="col-md-2">
											<select class="form-control" id="Nik" name="Nik">
												<option value="">- Choose Nik -</option>
												<?php 
												$getData = $query->query("SELECT * FROM tblpayment GROUP BY Nik");
												while ($listData = $query->mfArray($getData)) {
													echo "<option value='".$listData['Nik']."'>".$listData['Nik']."</option>";
												}
												?>
											</select>
										</div>
										<label class="col-md-1 control-label">Loan Date:</label>
										<div class="col-md-2">
											<select class="form-control" id="LoanDate" name="LoanDate">
												<option value="">- Choose Loan Date -</option>
											</select>
										</div>
										<label class="col-md-2 control-label">Payment Value:</label>
										<div class="col-md-2">
											<input type="text" class="form-control" id="PaymentValue" value="" readonly="readonly" />
										</div>
										<div class="col-md-2">
											<input type="submit" name="ProcessReport" value="Process" class="btn btn-primary" />
											<button type="button" name="GetAllData" class="btn btn-info" onClick="window.open('reportPdfAll.php')">Get All</button>
										</div>
									</div>

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
$(document).ready(function() {

	$('#Nik').change(function() {
		var result = $(this).val();

		$.ajax({
			url: '<?php echo BASE_URL."admin/payment/ajaxLoanDate.php" ?>',
			type: 'GET',
			cache: false,
			data: {Nik: result},
			success: function(data) {
				$('#LoanDate').html(data);
			}
		});
		
	});

	$('#LoanDate').change(function() {
		var Nik = $('#Nik').val();
		var result = $(this).val();

		$.ajax({
			url: '<?php echo BASE_URL."admin/payment/ajaxPaymentValue.php" ?>',
			type: 'GET',
			cache: false,
			data: {Nik: Nik, LoanDate: result},
			success: function(data) {
				$('#PaymentValue').val(data);
			}
		});
		
	});

});
</script>
<!-- END SCRIPTS -->

</body>
</html>