<!-- START PAGE SIDEBAR -->
<div class="page-sidebar">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="index.html">ATLANT</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="#" class="profile-mini">
                <img src="<?php echo BASE_URL.'plugin/assets/images/users/avatar.jpg' ?>" alt="John Doe"/>
            </a>
            <div class="profile">
                <div class="profile-image">
                    <img src="<?php echo BASE_URL.'plugin/assets/images/users/avatar.jpg' ?>" alt="John Doe"/>
                </div>
                <div class="profile-data">
                    <div class="profile-data-name">John Doe</div>
                    <div class="profile-data-title">Web Developer/Designer</div>
                </div>
                <div class="profile-controls">
                    <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                    <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                </div>
            </div>
        </li>
        <li class="xn-title">Navigation</li>
        <li>
            <a href="<?php echo BASE_URL.'admin/' ?>"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="glyphicon glyphicon-book"></span> <span class="xn-text">Data</span></a>
            <ul>
                <li><a href="<?php echo BASE_URL.'admin/person/' ?>"><span class="fa fa-group"></span> Person</a></li>
                <li><a href="<?php echo BASE_URL.'admin/loan/' ?>"><span class="fa fa-credit-card"></span> Loan</a></li>
                <li><a href="<?php echo BASE_URL.'admin/payment/' ?>"><span class="fa fa-book"></span> Payment</a></li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="glyphicon glyphicon-book"></span> <span class="xn-text">Report</span></a>
            <ul>
                <li><a href="<?php echo BASE_URL.'admin/loan/report.php' ?>"><span class="fa fa-credit-card"></span> Loan</a></li>
                <li><a href="<?php echo BASE_URL.'admin/payment/report.php' ?>"><span class="fa fa-book"></span> Payment</a></li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-gear"></span> <span class="xn-text">Setting</span></a>
            <ul>
                <li><a href="<?php echo BASE_URL.'admin/account/' ?>"><span class="fa fa-user"></span> Account</a></li>
            </ul>
        </li>
        
    </ul>
    <!-- END X-NAVIGATION -->
</div>
<!-- END PAGE SIDEBAR -->