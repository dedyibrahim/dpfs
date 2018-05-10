<?php 
 $data_sesi =  $this->session->all_userdata();
?>

<div class="row bs-wizard" style="border-bottom:0;">
                
                <div class="col-xs-4 bs-wizard-step  complete"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Langkah 1</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Metode Pembayaran & Alamat pengiriman</div>
                </div>
                
                <div class="col-xs-4 bs-wizard-step <?php if(!empty($data_sesi['metode_pembayaran'])?$data_sesi['metode_pembayaran']:'' != NULL) { echo "complete"; } else { echo "disabled"; } ?>"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Langkah 2</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Metode pengiriman</div>
                </div>
                
                <div class="col-xs-4 bs-wizard-step <?php if(!empty($data_sesi['ongkos_terpilih'])?$data_sesi['ongkos_terpilih']:'' != NULL) { echo "complete"; } else { echo "disabled"; } ?>"><!-- active -->
                  <div class="text-center bs-wizard-stepnum">Langkah 3</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Konfirmasi pesanan</div>
                </div>
            </div>