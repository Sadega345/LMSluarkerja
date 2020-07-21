            <!-- <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h6 class="tittle-menu"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Keuangan / Payroll Creator / Detail Gaji Pegawai</h6>
                    </div>
                </div>
            </div> -->

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="Rectangle-35">
                                <div class="container padd-top-20">
                                    <div class="row">
                                        <div class="col-md-2 col-12" >
                                            <p class="fz-14 putih">NIK</p>
                                        </div>
                                        <div class="col-md-3 col-12" >
                                            <p class="fz-14 abuputih"><?php echo $datapegawai->nik; ?></p>
                                        </div>
                                        <div class="col-md-3 col-12" >
                                            <p class="fz-14 putih">Departemen</p>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <p class="fz-14 abuputih"><?php echo $datapegawai->desDepartemen; ?></p>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 col-12">
                                            <p class="fz-14 putih">Periode</p>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <p class="fz-14 abuputih"><?php echo strftime('%B %Y'); ?></p>
                                        </div>
                                        <div class="col-md-3 col-12" >
                                            <p class="fz-14 putih">Nama Pegawai</p>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <p class="fz-14 abuputih"><?php echo $datapegawai->nama_lengkap; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 col-12" >
                                            <p class="fz-14 putih">Jabatan</p>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <p class="fz-14 abuputih"><?php echo $datapegawai->jenis_project; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <!-- <form method="post" enctype="multipart/form-data" action="<?php echo base_url()?>HR/ProsesEditHRPayrollCreator"> -->
                        <input type="hidden" name="nik" value="<?php echo $datapegawai->nik ?>">
                        <div class="body">
                            <div class="row clearfix">
                                <!-- <div class="col-12" align="left"> -->
                                    <!-- Informasi Penggajian -->
                                    <div class="col-md-6 col-12">
                                        <label class="fz-18">Informasi Penggajian</label>
                                        <div class="row form-group">
                                            <div class="col-md-6 col-12">
                                                <p class=" hidden-sm">Gaji Pokok </p>
                                                <p class="d-sm-none">Gaji Pokok </p>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <p class="fz-14 hitamsemu">Rp. 
                                                    <?php echo number_format($datapegawai->gaji,3,',','.')?>
                                                </p>
                                            </div>
                                        </div>
                                        <?php 
                                            $array = json_decode(file_get_contents("https://raw.githubusercontent.com/guangrei/Json-Indonesia-holidays/master/calendar.json"),true);
                                            $hari_ini = date("Ymd",strtotime(date("Y-m-d")));
                                            $where = array('nik'=>$datapegawai->nik,
                                                            'month(tanggal)'=>$datapegawai->bulan,
                                                            'year(tanggal)'=>$datapegawai->tahun,
                                                            'status'=>'1')
                                                            ;
                                            $overtime = $this->Nata_hris_hr_model->dataLemburOvertime($where);
                                            $tmplemburan=0;
                                            if ($overtime->num_rows() > 0) {
                                                foreach ($overtime->result() as $lembur) {
                                                $tanggal = strftime("%A",strtotime($lembur->tanggal));
                                                
                                                if ($tanggal == "Saturday"  || $tanggal == "Sunday") {
                                                    
                                                    $jam=($lembur->total_menit*60) / 3600;
                                                    if ($jam > 1 && $jam <= 5 ) {
                                                        $tmplemburan=50000*$jam;

                                                    }else if ($jam > 5) {
                                                        $tmplemburan2=75000*($jam-5);
                                                        $tmplemburan=(50000*5)+$tmplemburan2;
                                                        // echo "string".$tmplemburan;
                                                        //$tmplemburan=$tmplemburan2;
                                                    }
                                                    
                                                }
                                                elseif (isset($array[$hari_ini]) ) {
                                                    // echo "hari libur nasional";
                                                    $jam=($lembur->total_menit*60) / 3600;
                                                    if ($jam > 1 && $jam <= 5 ) {
                                                        $tmplemburan=50000*$jam;
            
                                                    }else if ($jam > 5) {
                                                        $tmplemburan2=75000*($jam-5);
                                                        $tmplemburan=(50000*5)+$tmplemburan2;
                                                        // echo "string".$tmplemburan;
                                                        //$tmplemburan=$tmplemburan2;
                                                    }
                                                }
                                                elseif ($tanggal == "Monday" || $tanggal == "Tuesday" || $tanggal == "Wednesday" || $tanggal == "Thursday" || $tanggal == "Friday" ) {
                                                    // echo "hari biasa";
                                                    $jam=($lembur->total_menit*60) / 3600;
                                                    if ($jam > 1 && $jam < 2 ) {
                                                        $tmplemburan=15000*$jam;
            
                                                    }else if ($jam >= 2) {
                                                        $tmplemburan2=35000*($jam-2);
                                                        $tmplemburan=(15000*2)+$tmplemburan2;
                                                        // echo "string".$tmplemburan;
                                                        //$tmplemburan=$tmplemburan2;
                                                    }
                                                }
                                                else{
                                                    // echo "masuk";
                                                    // echo $tanggal;
                                                    $jam=($lembur->total_menit*60) / 3600;
                                                    $tmplemburan=$tmplemburan+($dataViewPayslip->lemburan*$jam);
                                                    // $tmplemburan=$dataViewPayslip->lemburan*$jam;
                                                }
                                            }
                                            
                                        ?>
                                        <div class="row form-group">
                                            <div class="col-md-6 col-12">
                                                <p class="hidden-sm fz-14">Lemburan </p>
                                                <p class="d-sm-none fz-14">Lemburan </p>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <p class="fz-14 hitamsemu">Rp. <?php echo number_format($tmplemburan,0,'.','.')?></p>
                                            </div>
                                        </div>
                                        <?php }else{
                                            $tmplemburan=0;
                                        } ?>
                                        <?php if($datapegawai->nilai_tunj_koefisien > 0){ ?>
                                        <div class="row form-group">
                                            <div class="col-md-6 col-12">
                                                <p class=" hidden-sm">Koefisien</p>
                                                <p class="d-sm-none">Koefisien</p>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <p class="fz-14 hitamsemu">Rp. <?php echo number_format($datapegawai->nilai_tunj_koefisien,3,',','.')?></p>                           
                                            </div>
                                        </div>
                                        <?php }  ?>

                                        <?php if($datapegawai->nilai_tunj_tmk > 0){ ?>
                                        <div class="row form-group">
                                            <div class="col-md-6 col-12">
                                                <p class=" hidden-sm">TMK</p>
                                                <p class="d-sm-none">TMK</p>
                                                
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <p class="fz-14 hitamsemu">Rp. <?php echo number_format($datapegawai->nilai_tunj_tmk,3,',','.')?></p>
                                            </div>
                                        </div>
                                        <?php } ?>

                                        <?php if($datapegawai->nilai_tunj_jabatan > 0){ ?>
                                        <div class="row form-group">
                                            <div class="col-md-6 col-12">
                                                <p class=" hidden-sm">Tunjangan Jabatan</p>
                                                <p class="d-sm-none">Tunjangan Jabatan</p>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <p class="fz-14 hitamsemu">Rp. <?php echo number_format($datapegawai->nilai_tunj_jabatan,3,',','.')?></p>
                                            </div>
                                        </div>
                                        <?php } ?>

                                        <?php if($datapegawai->tunj_lainnya > 0){ ?>
                                        <?php  
                                            $explodeTunjanganLainnya = explode(',', $datapegawai->tunj_lainnya);
                                            
                                            foreach ($explodeTunjanganLainnya as $lainnya) { 
                                                $NikLainnya=array('l.nik'=>$datapegawai->nik,'l.id_jenis_tunjangan'=>$lainnya);
                                                $tunjanganLainnya = $this->Nata_hris_hr_model->gajiLainnya($NikLainnya)->row(); ?>
                                                <div class="row form-group">
                                                    <div class="col-md-6 col-12">
                                                        <p class=" hidden-sm">Tunjangan <?php echo $tunjanganLainnya->jenis_tunjangan?></p>
                                                        <p class="d-sm-none">Tunjangan <?php echo $tunjanganLainnya->jenis_tunjangan?></p>
                                                    </div>
                                                    <div class="col-md-6 col-6">
                                                        <p class="fz-14 hitamsemu">Rp. <?php echo number_format($tunjanganLainnya->nilai,3,',','.')?></p>
                                                    </div>
                                                </div>
                                        <?php } ?>
                                    <?php } ?>

                                    </div>
                                    <!-- End Informasi Penggajian -->

                                    <!-- Rekening Bank -->
                                    <div class="col-md-6 col-12">
                                        <label class="fz-18">Rekening Bank</label>
                                        <div class="row form-group">
                                            <div class="col-md-6 col-12">
                                                <p class=" hidden-sm">Nomor Rekening </p>
                                                <p class="d-sm-none">Nomor Rekening </p>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <p class="fz-14 hitamsemu">
                                                    <?php echo $datapegawai->nomor_rek?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-md-6 col-12">
                                                <p class=" hidden-sm">Nama Bank </p>
                                                <p class="d-sm-none">Nama Bank </p>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <p class="fz-14 hitamsemu">
                                                    <?php echo $datapegawai->nama_bank?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-md-6 col-12">
                                                <p class=" hidden-sm">Nama Pemilik Rekening </p>
                                                <p class="d-sm-none">Nama Pemilik Rekening </p>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <p class="fz-14 hitamsemu">
                                                    <?php echo $datapegawai->atas_nama_rek?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Rekening Bank -->
                                    
                                    <!-- Pajak Dan Kesehatan -->
                                    <div class="col-md-6 col-12">
                                        <label class="fz-18">Pajak dan Kesehatan</label>
                                        <div class="row form-group">
                                            <div class="col-md-6 col-12">
                                                <p class=" hidden-sm">NPWP </p>
                                                <p class="d-sm-none">NPWP </p>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <p class="fz-14 hitamsemu">
                                                    <?php echo $datapegawai->kode_npwp?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-md-6 col-12">
                                                <p class=" hidden-sm">BPJS Kesehatan </p>
                                                <p class="d-sm-none">BPJS Kesehatan </p>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <p class="fz-14 hitamsemu">
                                                    Rp. <?php echo $datapegawai->nilai_bpjs_kes!=""?(number_format($datapegawai->nilai_bpjs_kes,3,',','.')):'-'; ?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-md-6 col-12">
                                                <p class=" hidden-sm">BPJS Kesehatan </p>
                                                <p class="d-sm-none">BPJS Kesehatan </p>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <p class="fz-14 hitamsemu">
                                                    Rp. <?php echo $datapegawai->nilai_bpjs_kes!=""?(number_format($datapegawai->nilai_bpjs_kes,3,',','.')):'-'; ?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-md-6 col-12">
                                                <p class=" hidden-sm">BPJS Ketenagakerjaan </p>
                                                <p class="d-sm-none">BPJS Ketenagakerjaan </p>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <p class="fz-14 hitamsemu">
                                                    Rp. <?php echo $datapegawai->nilai_bpjs_kes!=""?(number_format($datapegawai->nilai_bpjs_tk  ,3,',','.')):'-'; ?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-md-6 col-12">
                                                <p class=" hidden-sm">PPH </p>
                                                <p class="d-sm-none">PPH </p>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <p class="fz-14 hitamsemu">
                                                    Rp. <?php echo $datapegawai->nilai_pph!=""?(number_format($datapegawai->nilai_pph  ,3,',','.')):'-'; ?>
                                                </p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!-- End Pajak Dan Kesehatan -->

                                    <!-- Keterangan Perusahaan -->
                                    <div class="col-md-6 col-12">
                                        <label class="fz-18">Keterangan Perusahaan</label>
                                        <div class="row form-group">
                                            <div class="col-md-6 col-12">
                                                <p class=" hidden-sm">Keterangan </p>
                                                <p class="d-sm-none">Keterangan </p>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <textarea cols="20" rows="5" class="form-control" name="keterangan"><?php echo $datapegawai->keterangan ?></textarea>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-md-6 col-12">
                                                <p class=" hidden-sm">Gaji </p>
                                                <p class="d-sm-none">Gaji </p>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <input type="text"  value="<?php echo $datapegawai->nominal ?>"  class="form-control fcheight" readonly id="nom" >
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-md-6 col-12">
                                                <p class=" hidden-sm">Biaya Admin </p>
                                                <p class="d-sm-none">Biaya Admin </p>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <input type="number" min="0" value="<?php echo $datapegawai->biaya ?>" name="biaya" class="form-control fcheight" id="by">
                                            </div>
                                        </div>

                                        <!-- <div class="row form-group">
                                            <div class="col-md-6 col-12">
                                                <p class=" hidden-sm">Biaya Admin </p>
                                                <p class="d-sm-none">Biaya Admin </p>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <input type="number" min="0" value="<?php //echo $datapegawai->biaya ?>" name="biaya" class="form-control fcheight" id="by">
                                            </div>
                                        </div> -->

                                        <?php 

                                            $disetorkan=$datapegawai->disetorkan;
                                            $totdisetorkan=$tmplemburan+$disetorkan;
                                            foreach ($datapotongan->result() as $dt) { 
                                           // $disetorkan=$disetorkan-$dt->nominal;
                                        } ?>

                                        <div class="row form-group">
                                            <div class="col-md-6 col-12">
                                                <p class=" hidden-sm">Disetorkan </p>
                                                <p class="d-sm-none">Disetorkan </p>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <input type="number" min="0" value="<?php echo $totdisetorkan ?>" name="disetorkan" class="form-control fcheight" readonly id="tot">
                                            </div>
                                        </div>

                                    </div>
                                    <!-- End Keterangan Perusahaan -->

                                    <!-- Potongan Gaji Dan Button -->
                                    <div class="col-md-6 col-12">
                                        <label class="fz-18">Potongan Penggajian</label>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <button type="button" name="add" id="add" class="btn Rectangle-diterima">
                                        <img src="<?php echo base_url() ?>assets/img/plustambah1x.png" class="pad-right-5">
                                        Tambah Potongan</button>
                                    </div>
                                    <!-- End Potongan Gaji Dan Button -->

                                    <input type="hidden" value="<?php echo $datapegawai->nik ?>" name="nik2" class="form-control">
                                    <input type="hidden" name="tanggal" value="<?php echo $datapegawai->tanggal?>">
                                    <?php foreach ($datapotongan->result() as $dt) { ?>
                                        <input type="hidden" name="id[]" class="form-control" value="<?php echo $dt->id_payrol_potongan ?>">
                                        <div class="row m-t-10">
                                           <div class="col-md-2 col-12 ">
                                                 <label class="float-right hidden-sm">Deskripsi </label>
                                            <label class="d-sm-none">Deskripsi</label>
                                            </div>
                                            <div class="col-md-3 col-9">
                                                <input type="text" name="deskripsilama[]" class="form-control fcheight" value="<?php echo $dt->deskripsi ?>">
                                            </div>
                                            <div class="col-md-2 col-12 ">
                                                 <label class="float-right hidden-sm">Nominal </label>
                                            <label class="d-sm-none">Nominal</label>
                                            </div>
                                            <div class="col-md-3 col-12">
                                                <input type="text" name="nominallama[]" class="form-control pot fcheight" value="<?php echo $dt->nominal ?>"  onkeypress="return hanyaAngka(event)">
                                            </div>
                                            <div class="col-md-2 col-3">
                                                 <a href="<?php echo base_url()?>HR/HapusPotongan/<?php echo $dt->id_payrol_potongan ?>/<?php echo $dt->nik ?>" onClick='return confirm("Anda yakin ingin menghapus data ini? ")' title="Hapus" class="btn btn-danger btn_remove">X</a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div id="dynamic_field">
                                    </div>

                                <!-- </div> -->
                            </div>

                        </div>
                    
                    <!-- </form> -->
                </div>
            </div>

            <script>  
            $(document).ready(function(){  
              var i=1;  
                $('#add').click(function(){  
                   i++;  
                   $('#dynamic_field').append('<div class="" id="row'+i+'">'+
                    '<div class="row m-t-10">'+
                    '<div class="col-md-2 col-12 m-t-10"  >'+
                        '<label class="float-right hidden-sm">Deskripsi </label>'+
                                    '<label class="d-sm-none">Deskripsi </label>'+
                    '</div>'+
                    '<div class="col-md-3 col-12">'+
                        '<input type="text" name="deskripsi[]" class="form-control fcheight">'+
                    '</div>'+
                   '<div class="col-md-2 col-12 m-t-10"  >'+
                        '<label class="float-right hidden-sm">Nominal </label>'+
                                    '<label class="d-sm-none">Nominal </label>'+
                    '</div>'+
                    '<div class="col-md-3 col-12">'+
                        '<input type="text" name="nominal[]" id="pot'+i+'" class="form-control pot fcheight"  onkeypress="return hanyaAngka(event)">'+
                    '</div>'+

                    '<div class="col-sm-1">'+
                      '<button type="button" name="remove" id="'+i+'" class="btn btn-aksi btn_remove"><img src="<?php echo base_url() ?>assets/img/Delete.svg"></button>'+
                    '</div>'+
                    '</div>'+
                    '</div>');  
                   $('#by,.pot').keyup(function(){
                        var jumby=parseInt($('#by').val()) || 0;
                        var jumnom=parseInt($('#nom').val()) || 0;
                        // var jumpl=parseInt($('#pl').val()) || 0;
                        // $('#agt').val((jumpl+jumpr)-jumkr);
                        var tot=(jumby+jumnom);
                        $( ".pot" ).each(function() {
                            tot=tot-$(this).val();
                        });
                        $('#tot').val(tot);
                    });
                   $('.datepicker2').datepicker({
                            showButtonPanel: true,
                            changeMonth: true,
                            changeYear: true,
                            dateFormat : 'dd/mm/yy'
                        }).on( "change", function() {
                            var datanya = $(this).data("id");
                        var date = $(this).datepicker("getDate");
                        //console.log("end->"+$.datepicker.formatDate("yy-mm-dd", date));
                        //$("#"+datanya).val($.datepicker.formatDate("yy-mm-dd", date));
                    //from.datepicker( "option", "maxDate", getDate( this ) );
                    });
                });  
                $(document).on('click', '.btn_remove', function(){  
                   var button_id = $(this).attr("id");
                    var t=parseInt($('#tot').val()) || 0;
                    var p=parseInt($('#pot'+button_id).val()) || 0;
                   $('#tot').val(t+p);   
                   $('#row'+button_id+'').remove();  
                });
            }); 
            $('#by,.pot').keyup(function(){
                var jumby=parseInt($('#by').val()) || 0;
                var jumnom=parseInt($('#nom').val()) || 0;
                // var jumpl=parseInt($('#pl').val()) || 0;
                // $('#agt').val((jumpl+jumpr)-jumkr);
                var tot=(jumby+jumnom);
                $( ".pot" ).each(function() {
                    tot=tot-$(this).val();
                });
                $('#tot').val(tot);
            }); 
         </script>