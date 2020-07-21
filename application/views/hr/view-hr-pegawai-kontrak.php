<div class="row">
    <div class="col-md-6 col-12">
        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class="hidden-sm fz-14 hitam">Status </p>
                <p class="d-sm-none fz-14 hitam">Status </p>
            </div>
            <div class="col-md-6 col-12">
                <?php 
                    if($dataKaryawannya->stskar=='1'){
                        echo "<p class='fz-14 hitamsemu'>Permanent</p>";
                    }else if($dataKaryawannya->stskar=='2'){
                        echo "<p class='fz-14 hitamsemu'>Contract</p>";
                    }else if($dataKaryawannya->stskar=='3'){
                        echo "<p class='fz-14 hitamsemu'>Probation</p>";
                    }
                ?>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class="hidden-sm fz-14 hitam">Tanggal Kontrak </p>
                <p class="d-sm-none fz-14 hitam">Tanggal Kontrak </p>
            </div>
            <div class="col-md-6 col-12">
                <p class="fz-14 hitamsemu">
                    <?php echo strftime(" %d %B %Y",strtotime($dataKaryawannya->tglmasuk)); ?> s/d
                <?php echo ($dataKaryawannya->tglkeluar!="0000-00-00"?strftime(" %d %B %Y",strtotime($dataKaryawannya->tglkeluar)):'-'); ?></p>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p class="hidden-sm fz-14 hitam">Masa Kerja </p>
                <p class="d-sm-none fz-14 hitam">Masa Kerja </p>
            </div>
            <div class="col-md-6 col-12">
                <p class="fz-14 hitamsemu">
                    <?php
                        //Our "then" date.
                        $then = "2009-02-04";
                         
                        //Convert it into a timestamp.
                        $then = strtotime($dataKaryawannya->tglmasuk);
                         
                        //Get the current timestamp.
                        $now = strtotime($dataKaryawannya->tglkeluar);
                         
                        //Calculate the difference.
                        $difference = $now - $then;
                         
                        //Convert seconds into days.
                        $days = floor($difference / (60*60*24) );
                    ?>
                    <?php echo $dataKaryawannya->tglkeluar!="0000-00-00"?$days."Hari":"-" ?>
                    
                </p>
            </div>
        </div>
    </div>
</div>