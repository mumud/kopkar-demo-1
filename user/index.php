<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Kopkar Demo</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="../plugin/css/theme-user.css"/>
        <!-- EOF CSS INCLUDE -->                                     
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <?php require_once('subweb/navbar.php');?>                                                  
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <div class="row">
                        
                        <?php require_once('subweb/sidebar.php');?>

                        <div class="col-md-9">                        
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Filling Loan</h3>                           
                                </div>                            
                                <div class="panel-body">
                                    <div class="row stacked">
                                        <div class="col-md-12">
                                            <div class="block">
                                                <div class="panel-body">
                                                    <div class="col-md-6">
                                                        <form id="jvalidate" role="form" class="form-horizontal" action="#">                                    
                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label text-left">Loan Values </label>  
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control" size="20" id="loanValue"/>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-4 control-label text-left">Loan Tenor </label>
                                                                <div class="col-md-3">
                                                                    <input type="text" class="form-control" size="10" id="tenorValue" />
                                                                </div>
                                                            </div>
                                                            <div class="btn-group pull-right">
                                                                <button class="btn btn-primary" id="validasi">Validation</button>
                                                            </div>
                                                        </form>                         
                                                    </div>                                        
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="validasiResult">
                                        <?php require_once 'subweb/loanCheck.php';?>
                                        </div>
                                    </div> 
                                    </div>                                    
                                </div>
                                </div>
                            </div>                              
                        </div>
                    </div>
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                                 
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>
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

        <!-- BLUEIMP GALLERY -->
        <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
            <div class="slides"></div>
            <h3 class="title"></h3>
            <a class="prev">‹</a>
            <a class="next">›</a>
            <a class="close">×</a>
            <a class="play-pause"></a>
            <ol class="indicator"></ol>
        </div>      
        <!-- END BLUEIMP GALLERY -->   
        <div class="modal fade bs-example-modal-sm" id="myPleaseWait" tabindex="-1"
            role="dialog" aria-hidden="false" data-backdrop="static">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <span class="fa fa-time">
                            </span>Please Wait
                         </h4>
                    </div>
                    <div class="modal-body">
                        <div class="progress">
                            <div class="progress-bar progress-bar-info progress-bar-striped active" style="width: 100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>     
        
        <!-- START PRELOADS -->
        <audio id="audio-alert" src="../plugin/audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="../plugin/audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->          
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="../plugin/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="../plugin/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="../plugin/js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='../plugin/js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="../plugin/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
        <script type="text/javascript" src="../plugin/js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>        
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <!--<script type="text/javascript" src="../plugin/js/settings.js"></script>-->
        
        <script type="text/javascript" src="../plugin/js/plugins.js"></script>        
        <script type="text/javascript" src="../plugin/js/actions.js"></script>        
        <!-- END TEMPLATE -->

        <script type="text/javascript"> 
            $("#validasi").click(function() {
            var loanValue = $("#loanValue").val();
            var tenorValue= $("#tenorValue").val();
            //$("#myPleaseWait").modal('show'); 
                $.ajax({  
                type: "POST",
                data: "loanValue="+ loanValue,  
                url : 'subweb/loanCheck.php',
                success: function(msg){  
                    //$("#myPleaseWait").modal('hide');
                    $("#validasiResult").ajaxComplete(function(event, request, settings){ 
                        if(msg != 0){ 
                            $(this).html(msg);
                        }else  
                        {  
                            $(this).html("gagal...");
                        }  
                   });
                } 
              });
            });      
            document.getElementById('links').onclick = function (event) {
                event = event || window.event;
                var target = event.target || event.srcElement,
                    link = target.src ? target.parentNode : target,
                    options = {index: link, event: event,onclosed: function(){
                        setTimeout(function(){
                            $("body").css("overflow","");
                        },200);                        
                    }},
                    links = this.getElementsByTagName('a');
                blueimp.Gallery(links, options);
            };
        </script>        
        
    <!-- END SCRIPTS -->         
    </body>
</html>






