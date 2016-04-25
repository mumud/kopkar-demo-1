<?php include '../subweb/header.php' ?>

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
				<li class="active">Loan</li>
			</ul>
			<!-- END BREADCRUMB -->

			<!-- PAGE CONTENT WRAPPER -->
			<div class="page-content-wrap">
				
				<div class="row">
					<div class="col-md-12">
						<!-- START DEFAULT DATATABLE -->
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Loan</h3>
								<ul class="panel-controls">
									<li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
								</ul>
							</div>
							<div class="panel-body">
								<table class="table datatable">
									<thead>
										<tr>
											<th>NIK</th>
											<th>Loan Date</th>
											<th>Loan Tenor</th>
											<th>Loan Installment</th>
											<th>Loan Rate</th>
											<th>Loan Value</th>
											<th>Loan Status</th>
											<th>Result</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$getData = $query->getAll('tblloan');
										while ($listData = $query->mfArray($getData)) {
											$whereResultGroup = mysql_query('SELECT * FROM tblresultgroup WHERE ResultGroupId = "'.$listData['LoanStatus'].'"');
											$whereResult = mysql_query('SELECT * FROM tblresult WHERE ResultId = "'.$listData['ResultName'].'"');

											if ($listData['LoanStatus'] != '2'):
												$selectRow = "class='selectRow'";
											else:
												$selectRow = '';
											endif;

											echo "<tr id='".$listData['Nik']."' $selectRow>";
												echo "<td>".$listData['Nik']."</td>";
												echo "<td>".$listData['LoanDate']."</td>";
												echo "<td>".$listData['LoanTenor']."</td>";
												echo "<td>".$listData['LoanInstallment']."</td>";
												echo "<td>".$listData['LoanRate']."</td>";
												echo "<td>".$listData['LoanValue']."</td>";
												
												while ($listResultGroup = mysql_fetch_array($whereResultGroup)) {
													echo "<td>".$listResultGroup['ResultGroupName']."</td>";

												while ($listResult = mysql_fetch_array($whereResult)) {
													echo "<td>".$listResult['ResultName']."</td>";

											echo "</tr>";
										?>

<div class="modal fade" id="modal_<?php echo $listData['Nik'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

	<form action="<?php echo BASE_URL.'admin/loan/store.php' ?>" method="POST" class="form-horizontal">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">

			<div class="row">
				<div class="form-group">
					<label class="col-md-3 control-label">NIK:</label>
					<div class="col-md-5">
						<input type="text" class="form-control" name="Nik" value="<?php echo $listData['Nik'] ?>" readonly="readonly" />
					</div>
				</div>
			</div>

			<div class="clearfix"><br></div>

			<div class="row">
				<div class="form-group">
					<label class="col-md-3 control-label">Loan Date:</label>
					<div class="col-md-5">
						<input type="text" class="form-control" name="LoanDate" value="<?php echo $listData['LoanDate'] ?>" readonly="readonly" />
					</div>
				</div>
			</div>

			<div class="clearfix"><br></div>

			<div class="row">
				<div class="form-group">
					<label class="col-md-3 control-label">Loan Tenor:</label>
					<div class="col-md-5">
						<input type="text" class="form-control" name="LoanTenor" value="<?php echo $listData['LoanTenor'] ?>" readonly="readonly" />
					</div>
				</div>
			</div>

			<div class="clearfix"><br></div>

			<div class="row">
				<div class="form-group">
					<label class="col-md-3 control-label">Loan Installment:</label>
					<div class="col-md-5">
						<input type="text" class="form-control" name="LoanInstallment" value="<?php echo $listData['LoanInstallment'] ?>" readonly="readonly" />
					</div>
				</div>
			</div>

			<div class="clearfix"><br></div>

			<div class="row">
				<div class="form-group">
					<label class="col-md-3 control-label">Loan Rate:</label>
					<div class="col-md-5">
						<input type="text" class="form-control" name="LoanRate" value="<?php echo $listData['LoanRate'] ?>" disabled />
					</div>
				</div>
			</div>

			<div class="clearfix"><br></div>

			<div class="row">
				<div class="form-group">
					<label class="col-md-3 control-label">Loan Value:</label>
					<div class="col-md-5">
						<input type="text" class="form-control" name="LoanValue" value="<?php echo $listData['LoanValue'] ?>" readonly="readonly" />
					</div>
				</div>
			</div>

			<div class="clearfix"><br></div>

			<div class="row">
				<div class="form-group">
					<label class="col-md-3 control-label">Loan Status:</label>
					<div class="col-md-5">
						<select class="form-control selectStatus" name="LoanStatus">
							<option value="">- Choose Status -</option>
							<option value="1">Pending</option>
							<option value="2">Approve</option>
							<option value="3">Reject</option>
						</select>
					</div>
				</div>
			</div>

			<div class="clearfix"><br></div>

			<div class="row">
				<div class="form-group">
					<label class="col-md-3 control-label">Reason:</label>
					<div class="col-md-5">
						<select class="form-control reason" name="ResultName">
							<option value="">- Choose Reason -</option>
						</select>
					</div>
				</div>
			</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" name="submit" value="Save" class="btn btn-primary" />
      </div>

    </form>

    </div>
  </div>
</div>

										<?php
												}
											}
										}
										?>
									</tbody>
								</table>
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

	$('.selectRow').click(function() {
		$(this).addClass('info').dblclick(function(event) {
			var id = $(event.target).closest('tr').attr('id');
			
			$('#modal_'+id).modal({
				backdrop: 'static',
				keyboard: false
			});
		});

		$(this).siblings().removeClass('info');
	});

	$('.selectStatus').change(function() {
		var result = $(this).val();

		$.ajax({
			url: '<?php echo BASE_URL."admin/loan/ajaxReason.php" ?>',
			type: 'GET',
			cache: false,
			data: {ResultGroupId: result},
			success: function(data) {
				$('.reason').html(data);
			}
		});
		
	});

});
</script>
<!-- END SCRIPTS -->

</body>
</html>