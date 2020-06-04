 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
 <div id="login-page">
     <div class="container">
         <form class="form-login" method="post" action="<?= base_url('auth'); ?>">
             <h2 class="form-login-heading">Log in now</h2>
             <?= $this->session->flashdata('message'); ?>
             <div class="login-wrap">
                 <input type="text" class="form-control" name="email" placeholder="email" autocomplete="off" autofocus>
                 <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                 <br>
                 <input type="password" class="form-control" placeholder="Password" name="password">
                 <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                 <br>
                 <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> Log IN</button>
                 <hr>
             </div>

         </form>
     </div>
 </div>

 </body>

 </html>