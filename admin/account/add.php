<?php 
// header html
include '../subweb/header.php';
?>

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
				<li><a href="<?php echo BASE_URL.'admin/account/' ?>">Account</a></li>
				<li class="active">Add</li>
			</ul>
			<!-- END BREADCRUMB -->

			<!-- PAGE CONTENT  -->
			<div class="page-content-wrap">
				
				<div class="row">
					<div class="col-md-12">
						<!-- START DEFAULT DATATABLE -->
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Account</h3>
								<ul class="panel-controls">
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>
										<ul class="dropdown-menu">
											<li><a href="<?php echo BASE_URL.'admin/account/' ?>"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="panel-body">

								<form id="jvalidate" role="form" class="form-horizontal" action="http://localhost/kopkardemo/admin/account/store.php" name="kopkar" method="POST">
									<div class="form-group">
										<label class="col-md-1 control-label">NIK:</label>
										<div class="col-md-5">
											<select class="form-control select" name="Nik">
												<option value="">- Choose Nik -</option>
												<?php 
												$getData = $query->getAll('tblperson');
												while ($listData = $query->mfArray($getData)) {
													echo "<option value='".$listData['Nik']."'>".$listData['Nik']."</option>";
												}
												?>
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-1 control-label">Password:</label>
										<div class="col-md-5">
											<input type="password" class="form-control" name="UserPassword"/>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-1 control-label">Level:</label>
										<div class="col-md-5">
											<select class="form-control select" name="UserLevel">
												<option value="">- Choose Level -</option>
												<option value="admin">Admin</option>
												<option value="user">User</option>
											</select>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-offset-1 col-sm-10">
											<input type="submit" name="submit" value="Save" class="btn btn-primary" />
											<button class="btn btn-default">Reset</button>
										</div>
									</div>
								</form>

							</div>
						</div>
						<!-- END DEFAULT DATATABLE -->
					</div>
				</div>
				
			</div>
			<!-- END PAGE CONTENT  -->

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

echo $helper->linkJs(BASE_URL.'plugin/js/plugins/bootstrap/bootstrap-datepicker.js');
echo $helper->linkJs(BASE_URL.'plugin/js/plugins/bootstrap/bootstrap-select.js');

echo $helper->linkJs(BASE_URL.'plugin/js/plugins/validationengine/languages/jquery.validationEngine-en.js');
echo $helper->linkJs(BASE_URL.'plugin/js/plugins/validationengine/jquery.validationEngine.js');

echo $helper->linkJs(BASE_URL.'plugin/js/plugins/jquery-validation/jquery.validate.js');
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
var jvalidate = $("#jvalidate").validate({
	ignore: [],
	rules: {
		Nik: {
			required: true
		},
		UserPassword: {
			required: true,
			minlength: 5,
			maxlength: 30
		},
		UserLevel: {
			required: true
		}
	}
});
</script>
<!-- END SCRIPTS -->

</body>
</html>