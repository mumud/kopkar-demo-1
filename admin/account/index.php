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
				<li class="active">Account</li>
			</ul>
			<!-- END BREADCRUMB -->

			<!-- PAGE CONTENT WRAPPER -->
			<div class="page-content-wrap">
				
				<div class="row">
					<div class="col-md-12">
						<!-- START DEFAULT DATATABLE -->
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Account</h3>
								<ul class="panel-controls">
									<li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>
										<ul class="dropdown-menu">
											<li><a href="<?php echo BASE_URL.'admin/account/add.php' ?>"><span class="glyphicon glyphicon-pencil"></span> Add</a></li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="panel-body">
								<table class="table datatable">
									<thead>
										<tr>
											<th>NIK</th>
											<th>Level</th>
											<th>Email</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$getData = $query->getAll('tbluser');
										while ($listData = $query->mfArray($getData)) {
											echo "<tr>";
												echo "<td>".$listData['Nik']."</td>";
												echo "<td>".$listData['UserLevel']."</td>";
												echo "<td>".$listData['UserEmail']."</td>";
												echo "<td width='200px'>";
												echo "<div class='btn-group' role='group'>";
													echo "<a href='".BASE_URL."admin/account/view.php?id=".$listData['Nik']."' class='btn btn-info btn-sm'>View</a>";
													echo "<a href='".BASE_URL."admin/account/edit.php?id=".$listData['Nik']."' class='btn btn-info btn-sm'>Edit</a>";
													echo '<a href="'.BASE_URL.'admin/account/store.php?id='.$listData['Nik'].'" class="btn btn-info btn-sm" onClick="return confirm(\'Are you sure delete this data?\')">Delete</a>';
												echo "</div>";
												echo "</td>";
											echo "</tr>";
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
<!-- END SCRIPTS -->

</body>
</html>