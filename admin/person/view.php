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
				<li><a href="<?php echo BASE_URL.'admin/person/' ?>">Person</a></li>
				<li class="active">View</li>
			</ul>
			<!-- END BREADCRUMB -->

			<!-- PAGE CONTENT  -->
			<div class="page-content-wrap">
				
				<div class="row">
					<div class="col-md-12">
						<!-- START DEFAULT DATATABLE -->
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Person</h3>
								<ul class="panel-controls">
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>
										<ul class="dropdown-menu">
											<li><a href="<?php echo BASE_URL.'admin/person/add.php' ?>"><span class="glyphicon glyphicon-pencil"></span> New</a></li>
											<li><a href="<?php echo BASE_URL.'admin/person/' ?>"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="panel-body">

								<?php $data = $query->getOne('tblperson', 'Nik', $_GET['id']) ?>
								<div class="form-horizontal">
									<div class="form-group">
										<label class="col-md-1 control-label">NIK:</label>
										<div class="col-md-5">
											<?php echo $data->Nik ?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-1 control-label">Fullname:</label>
										<div class="col-md-5">
											<?php echo $data->FullName ?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-1 control-label">Gender:</label>
										<div class="col-md-5">
											<?php echo $data->Gender ?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-1 control-label">Salary:</label>
										<div class="col-md-5">
											<?php echo $data->Salary ?>
										</div>
									</div>
								</div>
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
?>
<!-- END THIS PAGE PLUGINS-->
<!-- START TEMPLATE -->
<?php
echo $helper->linkJs(BASE_URL.'plugin/js/settings.js');
echo $helper->linkJs(BASE_URL.'plugin/js/plugins.js');
echo $helper->linkJs(BASE_URL.'plugin/js/actions.js');
?>
<!-- END TEMPLATE -->
<!-- END SCRIPTS -->

</body>
</html>