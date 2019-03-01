        <?php
          $session_data = $this->session->userdata('logged');
        ?>  
        <section class="content">
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Selamat Datang</h3>
              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="">
              


           
              <div class="clearfix"></div>

              <div class="alert alert-info">Selamat Datang <b><?php echo $session_data['firstName']?>&nbsp;<?php echo $session_data['lastName']?></b></div>
      </div>
      </section>

              
        <!-- /page content -->

