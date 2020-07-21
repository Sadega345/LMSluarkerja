

                <div class="row m-t-10">
                        <div class="col-md-2" >
                        </div>
                        <div class="col-md-3" >
                            <p class="fz-14-judul">Judul Pengumuman </p>
                        </div>
                        <div class="col-md-7" >
                            <p class="fz-14-isi"><?php echo $dataPengumumanPerusahaan->judul ?></p>
                        </div>             
                </div>
                <div class="row m-t-10">
                        <div class="col-md-2" >
                        </div>
                        <div class="col-md-3" >
                            <p class="fz-14-judul">Tanggal Mulai  </p>
                        </div>
                        <div class="col-md-7" >
                            <p class="fz-14-isi"><?php echo strftime("%A, %d %B %Y",strtotime($dataPengumumanPerusahaan->tanggal_mulai)); ?></p>
                        </div>          
                </div>
                <div class="row m-t-10">
                        <div class="col-md-2" >
                        </div>
                        <div class="col-md-3" >
                            <p class="fz-14-judul">Tanggal Akhir  </p>
                        </div>
                        <div class="col-md-7" >
                            <p class="fz-14-isi"> <?php echo strftime("%A,%d %B %Y",strtotime($dataPengumumanPerusahaan->tanggal_selesai)); ?></p>
                        </div>              
                </div>
                <div class="row m-t-10">
                        <div class="col-md-2" >
                        </div>
                        <div class="col-md-3" >
                            <p class="fz-14-judul">Isi Pengumuman</p>
                        </div>
                        <div class="col-md-7" >
                            <p class="fz-14-isi"><?php echo $dataPengumumanPerusahaan->deskripsi; ?></p>
                        </div>            
                </div>
                <div class="row m-t-10">
                        <div class="col-md-2" >
                        </div>
                        <div class="col-md-3" >
                            <p class="fz-14-judul">Attachment</p>
                        </div>
                        <div class="col-md-7" >
                            <p class="fz-14-isi"><?php 
                                    if($dataPengumumanPerusahaan->lampiran==""){
                                        echo "-";
                                    }else{
                                        echo ' <form action="'.base_url().'HR/dokumenCuti" method="post">
                                    <input type="hidden" name="path" value="assets/pengumuman/'.$dataPengumumanPerusahaan->lampiran.'">
                                    <input type="hidden" name="dokumen" value="'.$dataPengumumanPerusahaan->lampiran.'">
                                    <input type="submit" class="btn btn-blue col-4" name="download" value="Download">
                        </form>';
                            }; 
                            ?></p>
                        </div>             
                </div>
