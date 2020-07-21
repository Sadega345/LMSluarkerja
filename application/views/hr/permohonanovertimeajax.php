<?php foreach ($dataOvertime->result() as $over) {?>
	<tr>
        <td><?php echo $over->nik ?></td>
        <td><?php echo $over->nama_lengkap ?></td>
        <td> <?php echo $over->keterangan ?></td>
        <td><?php echo strftime("%d %B %Y",strtotime($over->tanggal)); ?></td>
        <td>
            <?php 
                if($over->status=='0'){
                    echo'<label class="btn Rectangle-probation">Pengajuan</label>';
                }if ($over->status=='1') {
                    echo'<label class="btn Rectangle-permanent">Diterima</label>';
                }if ($over->status=='2') {
                    echo'<label class="btn Rectangle-resign">Ditolak</label>';
                }
                
            ?>
        </td>
        <td>
            <?php 
                
                echo '<a href="javascript:;" onclick="view(\''.$over->id_overtime.'\')">
                <button type="button"class="btn btn-aksi"><img src="'.base_url().'assets/img/View.svg" class="padd-right-5">Lihat </button>
                </a>';
                
            ?>
        </td>
    </tr>
    <?php } ?>