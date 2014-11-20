<?php
use app\library\Funky;

extract($data);
include $head;

?>
<div class="container">

    <div class="row top-buffer">
        <div class="col-sm-12 col-lg-12 text-center">
            <h1 class="well"><span class="orange fa fa-gears">&nbsp;&nbsp;&nbsp;</span>Tiny to-do manager&nbsp;&nbsp;&nbsp;<span class="orange fa fa-calendar"></span></h1>
            <p class="lead"><?php //echo $pageTitle;?>Plan your day or plan your life!</p>
        </div>
      
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-2">
            <?php// include 'sidebar.html';?>
        </div>
        <div class="col-lg-10 text-left">
           <div class="row">
            <?php if(isset($_GET['msg'])):?>
              <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <?php  echo $_GET['msg']; ?></div>
<?php endif;?>
  <?php unset($_GET['msg']); ?>
               <div class="col-md-4 col-md-offset-3">
                   <a href="register/create" class="btn btn-primary btn-lg">Log in and start planning</a>
            
               </div>
           </div>
                        <div class="row">
               <div class="col-md-6 col-md-offset-4">
                  <span class=" move-left-35 top-buffer text-center fa fa-level-up orange  fa-5x"></span>
           
            
               </div>
           </div>
             <h4 class="top-buffer move-left-150">You don't have any tasks pending. Add something here!</h4>
        </div>
    </div>
</div>
<!-- /.container -->


<!-- jQuery Version 1.11.0 -->
<script src="http://cdn.jsdelivr.net/jquery/2.1.1/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="http://cdn.jsdelivr.net/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
    $('input.complete').on('click', function (e) {
        if (this.checked) {

            $(this).parent().siblings('td').slice(0, 3).addClass("strike-thru");
        } else {

            $(this).parent().siblings('td').removeClass("strike-thru");
        }
    });
</script>
</body>

</html>