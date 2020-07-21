
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                         <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Master / Master Modul / Form Ubah</h6>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                     <div class="card ">
                         <div class="body">
                            <h6 class="tittle-box">Form Ubah</h6>
                            <form method="post" class="form-ubah">
                                <input type="hidden" name="id_modul"  value="<?php echo $dataMstModul->id_modul; ?>">
                                <div class="row">
                                    <div class="col-lg-2 form-group" align="right">
                                        <label>Nama Modul :</label>    
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="nama_modul" class="form-control" required="" value="<?php echo $dataMstModul->nama_modul; ?>">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-2 form-group" align="right">
                                        <label>Link Modul :</label>    
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" id="validasi" name="link" class="form-control" required="" value="<?php echo $dataMstModul->link; ?>">
                                        <span id="pesan"></span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-2 form-group" align="right">
                                        <label>Parent Modul :</label>    
                                    </div>
                                    <div class="col-lg-6">
                                        <select name="parent" class="form-control select2"  aria-describedby="sizing-addon2">
                                            <option value="0">Parent Modul</option>
                                          <?php
                                          foreach ($dataMstParentModul->result() as $modul) {
                                            ?>
                                            <option value="<?php echo $modul->id_modul; ?>" <?php if($modul->parent == $dataMstModul->parent){echo "selected='selected'";} ?>><?php echo $modul->nama_modul; ?></option>
                                            <?php
                                            }
                                          ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-2 form-group" align="right">
                                        <label>Status Modul :</label>    
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="radio" name="status" value="0" <?php if($dataMstModul->status == 0) echo 'checked="checked"'; ?>>Aktif

                                        <input type="radio" name="status" value="1" <?php if($dataMstModul->status == 1) echo 'checked="checked"'; ?>>Tidak Aktif
                                    </div>
                                </div>

                                <!-- Sort -->
                                <div class="row">
                                    <div class="col-lg-2 form-group" align="right">
                                        <label>Sort Modul :</label>    
                                    </div>
                                    <div class="col-lg-6">
                                        <input value="<?php echo $dataMstModul->sort ?>" type="number" name="sort" class="form-control" required="">
                                    </div>
                                </div>

                                <!-- Icon -->
                                <div class="row">
                                    <div class="col-lg-2 form-group" align="right">
                                        <label>Icon Modul :</label>    
                                    </div>
                                    <div class="col-lg-6">
                                        <input value="<?php echo $dataMstModul->icon ?>" type="text" name="icon" class="form-control" >
                                    </div>
                                </div>

                                <br>
                                <div class="row" >
                                    <div class="col-lg-2">
                                    </div>
                                    <div class="col-lg-6">
                                        <button type="button" class="btn btn-primary tombol-ubah">Simpan</button>
                                        <a href="<?php echo base_url()?>Admin/mstModul"><button type="button" class="btn btn-danger">Batal</button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
              $(document).ready(function(){
              $('#validasi').keyup(function() {
                  if (this.value.match(/[^a-z-A-Z-0-9_//]/g)) {
                      this.value = this.value.replace(/[^a-z-A-Z-0-9_//]/g, '');
                  }
                    link(this.value);
                    // console.log(this.value);
                    
                });
              });
            </script>
            <script type="text/javascript">

          function link(linkprogram){
            
            $.ajax({
              method: "POST",
              url: "<?php echo base_url('Admin/prosesCek'); ?>",
              data: {

                alias_url: linkprogram
              } 
              
            })
            
            .done(function(data) {
              $('#pesan').html(data);
              
              if (data == "Link sudah ada yang menggunakan") {
                document.getElementById("pesan").value = "Link sudah ada yang menggunakan";
                document.getElementById("pesan").style.color = "red";
              }else{
                document.getElementById("pesan").value = "Link belum ada yang menggunakan";
                document.getElementById("pesan").style.color = "blue";
              }
            })
            
          }

        </script>
            <?php $this->load->view("Admin/mst_Modul/proses_MstModul") ;?>