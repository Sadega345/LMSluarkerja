
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                         <h6 class="tittle-menu"> Absensi / Informasi Absensi</h6>
                    </div>
                </div>
            </div>
           <!--  <div class="row clearfix m-t--40 m-b-20">
                <div class="col-12"> -->
                    <!--Google map-->
                   <!--  <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 10px;width:100%;
                    overflow:hidden;padding-bottom:15%;position:relative;height:0;">
                      <iframe style="left:0;top:0;height:100%;width:100%;position:absolute;" src="https://maps.google.com/maps?q=PT. Semanggi 3&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                        style="border:0" allowfullscreen></iframe>
                    </div> -->
                    
                    <!--Google Maps-->
                <!-- </div>
            </div> -->
            <div class="row clearfix">
                <!-- <div class="col-md-4 col-sm-6">
                    <div class="card text-center ">
                        <div class="p-15 ">
                            <h3 class="Timer" id="timerValue"><?php// echo date('H:i:s'); ?></h3>
                            <p class="content-box">
                                //<?php// if ($dataAbsensiMasuk > 0) {
                                    
                                 ?>
                                You Signed Today at <?php //echo $dataAbsensi->tanggal_mulai ?> am!
                            <?php //} ?>
                            </p>
                            <div class="show d-none">
                            <div class="row clearfix">
                                <div class="col-6">
                                    <button type="button" class="btn-blue" id="lunch" onclick="lunch('lunch')">Out for lunch</button>
                                </div>
                                <div class="col-6">
                                    <button type="button" class="btn-blue" onclick="signout('signout')" id="signout">Sign Out</button>
                                </div>
                                
                            </div>
                            <div class="row clearfix">
                                <div class="col-12">
                                    <button type="button" class="btn-black mt-2" id="break" onclick="lunch('break')">Out for break</button>
                                </div>
                                <div class="col-12">
                                    <button type="button" class="btn-black mt-2" id="extrabreak" onclick="lunch('extrabreak')">Out for extra break</button>
                                </div>
                            </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-12">
                                    <button type="button" class="btn-black mt-2" id="signin" onclick="absen('signin')">Sign In</button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div> -->
                
                
            </div>
            <?php 
                $jum_hadir = $dataAbsensiEmployee->num_rows();
                $jum_cuti = $dataAbsensiLeaveRow->num_rows();
                $jum_sakit = $dataAbsensiEmployeeSakit->num_rows();
                $jum_bolos = $dataAbsensiEmployeeBolos->num_rows();
             ?>

            <h6 class="mb-3">Absensi Bulan <span id=bulan><?php echo strftime('%B %Y'); ?></span></h6>
            
            <div class="row mb-2">
                <div class="col-md-3 col-12 mb-2">
                    <div class="Rectangle5 ">
                        <div class="col-md-12 col-12 ">
                            <label class="angka5"><?php echo $jum_hadir; ?></label>
                        </div>
                        <div class="col-md-12 col-12 ">
                            <div class="row ">
                                <div class="col-md-3 col-3 ">
                                     <img src="<?php echo base_url() ?>assets/img/Hadir.svg" style="padding:0 0 0 10px;">
                                </div>
                                <div class="col-md-4 col-4 ">
                                    <label class="color3" style="padding-top: 5px">Hadir</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-12 mb-2">
                    <div class="Rectangle5 ">
                        <div class="col-md-12 col-12 ">
                            <label class="angka5"><?php echo $jum_cuti; ?></label>
                        </div>
                        <div class="col-md-12 col-12 ">
                            <div class="row ">
                                <div class="col-md-3 col-3 ">
                                     <img src="<?php echo base_url() ?>assets/img/Cuti.svg" style="padding:0 0 0 10px;">
                                </div>
                                <div class="col-md-4 col-4 ">
                                    <label class="color3" style="padding-top: 5px">Cuti</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-12 mb-2">
                    <div class="Rectangle5 ">
                        <div class="col-md-12 col-12 ">
                            <label class="angka5"><?php echo $jum_sakit; ?></label>
                        </div>
                        <div class="col-md-12 col-12 ">
                            <div class="row ">
                                <div class="col-md-3 col-3 ">
                                     <img src="<?php echo base_url() ?>assets/img/Sakit.svg" style="padding:0 0 0 10px;">
                                </div>
                                <div class="col-md-4 col-4 ">
                                    <label class="color3" style="padding-top: 5px">Sakit</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-12 mb-2">
                    <div class="Rectangle5 ">
                        <div class="col-md-12 col-12 ">
                            <label class="angka5"><?php echo $jum_bolos; ?></label>
                        </div>
                        <div class="col-md-12 col-12 ">
                            <div class="row ">
                                <div class="col-md-3 col-3 ">
                                     <img src="<?php echo base_url() ?>assets/img/TanpaKeterangan.svg" style="padding:0 0 0 10px;">
                                </div>
                                <div class="col-md-9 col-9 ">
                                    <label class="color3" style="padding-top: 5px">Tanpa Keterangan</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                     <div class="card ">
                        <div class="body">
                            <div class="row mb-3">
                               <div class="col-md-6 col-12">
                                   <h5 class="fz-aktivitasabsensi">Absensi <?php echo $dataEmployee->nama_lengkap; ?></h5>
                               </div>                         
                            </div>
                            <div class="table-responsive">
                                <table id="list-data-absensi"  class="table table-hover dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                                    <thead class="thead-dark">
                                        <tr>
                                            <!-- <th>Employee</th> -->
                                            <th>Date</th>
                                            <th>Sign In Time</th>
                                            <th>Sign Out Time</th>
                                            <th>Status</th>
                                            <!-- <th>Approval Status</th>
                                            <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php //foreach ($dataTabelAbsensiEmployee->result() as $absen) { ?>
                                        <tr>
                                            <!-- <td><?php //echo $dataAbsensiEmployee->nama_lengkap; ?></td> -->
                                            <td><?php //echo $absen->date; ?></td>
                                            <td><?php //echo $absen->time_mulai; ?></td>
                                            <td><?php //echo $absen->time_selesai; ?></td>
                                            <?php //if ($absen->status == '1'){ ?>
                                            	<!-- <td>Masuk</td> -->
                                            <?php //}elseif ($absen->status == '0') { ?>
                                            	<!-- <td>Sakit</td> -->
                                            <?php //}else if($absen->status == '3'){ ?>
                                            	<!-- <td>Tanpa Keterangan</td> -->
                                            <?php //} ?>
                                          <!--   <td>Approved</td> -->
                                            <!-- <td style=""><a href="javascript:;" onclick=""><i class="icon-eye"></i></a></td> -->
                                           <!--  <td>
                                                <?php 
                                                    
                                                   // echo '<a href="javascript:;" onclick="viewAttendanceActivity(\''.$dataAbsensiEmployee->id_absensi.'\',\''.$dataAbsensiEmployee->nik.'\')"><button type="button" class="btn btn-green2">Lihat</button></a>';
                                                    
                                                ?>
                                            </td> -->
                                        </tr>
                                        <?php //} ?>
                                        
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
                </div>          
            </div>


<script type="text/javascript">
    var base_url = '<?php echo base_url() ?>';
    var statusabsen = <?php echo $dataAbsensiMasuk; ?>;
    var loginabsen = '';
    var logoutabsen = '';
    var jamabsen = '';
    var jamlunch = '';
    var jambreak = '';
    var jamextra = '';
    <?php if ($dataAbsensiMasuk > 0) {
                                    
     ?>
     logoutabsen = '<?php echo $dataAbsensi->tanggal_selesai; ?>';
     loginabsen = '<?php echo $dataAbsensi->tanggal_mulai; ?>';
     jamabsen = '<?php echo $dataAbsensi->jam; ?>';
     jamlunch = '<?php echo $dataAbsensi->setelah_lunch ?>';
     jambreak = '<?php echo $dataAbsensi->setelah_break ?>';
     jamextra = '<?php echo $dataAbsensi->setelah_extra_break ?>';

 	<?php } ?>
    
</script>
<!-- <script src="<?php //echo base_url()?>assets/js/absen.js"></script>  -->
 <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
    function initialize() {
        var loc = {};
        var geocoder = new google.maps.Geocoder();
        if(google.loader.ClientLocation) {
            loc.lat = google.loader.ClientLocation.latitude;
            loc.lng = google.loader.ClientLocation.longitude;

            var latlng = new google.maps.LatLng(loc.lat, loc.lng);
            geocoder.geocode({'latLng': latlng}, function(results, status) {
                if(status == google.maps.GeocoderStatus.OK) {
                    alert(results[0]['formatted_address']);
                };
            });
        }
    }

    google.load("maps", "3.x", {other_params: "sensor=false", callback:initialize});

    </script>

<script type="text/javascript">
    function viewAttendanceActivity(id,nik){
        $.post( "<?php echo base_url()?>Employee/viewAttendanceActivity", { id_absensi: id,nik: nik })
          .done(function( data ) {
            $( ".view").html(data);
          });
    }
</script>

<script type="text/javascript">
    $(document).ready(function(){
        absensi(0);
    })
</script>
