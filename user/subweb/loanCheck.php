<?php
require_once '../system/function.php';
$con=new Connection();
$crudKopkar=new CrudKopkar();
$loanValue=$_POST['loanValue'];
$tenorValue=$_POST['tenorValue'];
   
?>
<div class="panel panel-default">
    <ul class="panel-controls" style="margin-top: 2px;">
        <li class="dropdown">
            <ul class="dropdown-menu">
                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
            </ul>
        </li>
    </ul>
    <div class="panel-body panel-body-table">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="30%">Loan Value</th>
                        <th width="30%">Payment</th>
                        <th width="15%">Tenor</th>
                        <th width="25%">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Rp. 1.000.000</strong></td>
                        <td><strong>Rp. 101.000</strong></td>
                        <td><span class="label label-danger">10</span></td>
                        <td>
                            <i class="fa fa-check"></i>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right">
                            <input type="submit" name="kirim" class="btn btn-primary" value="Send" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>