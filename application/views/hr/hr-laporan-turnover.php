
            <?php 
                $tahun = date('Y');
                    $selectedYear = $this->input->post('filter');
                    if ($selectedYear != '') {
                        $tahun = $selectedYear;
                    }
             ?>
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <p class="fz-36 barlow-bold"> Pelaporan / Laporan Turnover</p>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="body">
                        <div class="container">
                            <form action="<?php echo base_url() ?>HR/HRLaporanTurnover" method="post">
                                <div class="row m-b-20">
                                    <div class="col-md-2 m-t-10">   
                                        <h5 class="fz-aktivitasabsensi">Search Filter</h5>
                                    </div>
                                    <div class="col-md-10" align="right">
                                        <button type="submit" class="btn Rectangle-cari col-md-2">
                                        
                                            <i class="fa fa-search padd-right-5 putih" ></i>
                                           Cari
                                          
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2 m-t-20">
                                        <label>Tahun</label>        
                                    </div>
                                     <div class="col-md-4" align="left">
                                       <select id="year" class="form-control fcheight" name="filter" onchange="this.form.submit()"></select> 
                                    </div>
                                    <div class="col-md-2 m-t-20">
                                        <label>Departemen</label>        
                                    </div>
                                     <div class="col-md-4">
                                        <select name="id_departemen" class="form-control  fcheight" data-placeholder="Pilih Departemen" tabindex="2" id="dept">
                                                <option value="0">Pilih Semua</option>
                                        <?php
                                            foreach($dataDepartemen->result() as $dt){ ?>
                                                <option value="<?php echo $dt->id_departemen;?>" <?php echo $this->input->post('id_departemen')==$dt->id_departemen?'selected':'';  ?>><?php echo $dt->deskripsi;?></option>
                                        <?php
                                            }
                                        ?>  
                                        </select>
                                    </div>


                                    
                                </div>
                                <div class="row m-t-20">
                                    <div class="col-md-2 m-t-20">
                                        <label>Unit Bisnis</label>        
                                    </div>
                                    <div class="col-md-4" align="left">
                                        <select name="perusahaan" class="form-control  fcheight" data-placeholder="Pilih Klien" tabindex="2" onchange="pilihPerusahaan(this.value)" >
                                                <option value="0">Pilih Semua Unit Bisnis</option>
                                        <?php
                                            foreach($dataPerusahaan->result() as $dt){ ?>
                                                <option value="<?php echo $dt->id_master_perusahaan;?>" <?php echo $this->input->post('perusahaan')==$dt->id_master_perusahaan?'selected':'';  ?>><?php echo $dt->nama_perusahaan;?></option>
                                        <?php
                                            }
                                        ?>  
                                        </select>
                                    </div>
                                    <div class="col-md-2 m-t-20">
                                        <label> Lokasi</label>        
                                    </div>
                                     <div class="col-md-4" align="left">
                                        <input type="text" name="id_lokasi" id="idlokasi" class="form-control fcheight "  value="<?php echo $this->input->post('id_lokasi') ?>">
                                    </div>

                                   
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix m-t-20">
                <div class="col-lg-12 col-md-12 view">
                    <div class="card">
                        
                        <div class="header">
                            <div class=" text-center" >
                                <h6 class="tittle-box">Laporan Turnover Tahun <?php echo $tahun ?></h6>
                                
                                
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    
                                </div>
                                <div class="col-md-2">
                                    
                                    
                                </div>
                            </div>
                            
                        </div>
                        <div class="body">  
                                                    
                            <!-- <div id="m_area_chart" class="m-b-20 height-of-chart" ></div>
                            <canvas id="m_area_chart" width="600" height="400"></canvas> -->
                            <div id="line-chart" class="ct-chart" width="600" height="400"></div>
                        </div>
                    </div>
                </div>
            </div>
                

<script type="text/javascript">
    $(function() {
        year();
        var selectedYear = '<?php echo $this->input->post('filter') ?>';
        if (selectedYear != '') {
            document.getElementById('year').value=selectedYear;
        }
    var options;

    var data = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        series: [
            [
                <?php 
                $data = array();
                
                for ($i = 1; $i <= 12; $i++) {
                    $tahunbulan = $tahun.'-'.sprintf("%02d",$i);
                    $klien=$this->input->post('perusahaan');
                    $departemen=$this->input->post('id_departemen');
                    $whklien=array();
                    if($klien!=0){
                        $whklien['id_master_perusahaan']=$klien;
                    }
                    if($departemen!=0){
                        $whklien['id_departemen']=$departemen;
                    }

                    $count = $this->Nata_hris_hr_model->countover($tahunbulan,$whklien);
                    if ($count->num_rows() > 0 ) {
                        $data[] = intval($count->row()->jum_karyawan);
                    }else{
                        $data[] = 0;
                    }
                    
                } 
                echo implode(',', $data);
                ?>
            ],
        ]
    };

    // line chart
    options = {
        height: "300px",
        showPoint: true,
        axisX: {
            showGrid: false
        },
        // axisY: {
        //     type : Chartist.FixedScaleAxis,
        //     ticks: [0,1,2,3,4,5,6,7,8,9,10]
        // },
        lineSmooth: false,
        plugins: [
            Chartist.plugins.tooltip({
                appendToBody: true
            }),
        ]
    };
    new Chartist.Line('#line-chart', data, options);
});
</script>