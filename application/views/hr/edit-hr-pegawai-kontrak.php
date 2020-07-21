<div class="row">
    <div class="col-md-6 col-12">
        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p  class="hidden-sm fz-14 hitam">Status </p>
                <p  class="d-sm-none fz-14 hitam">Status </p>
            </div>
            <div class="col-md-6 col-12">
                <div class="input-group mb-3">
                    <select name="status_karyawan" class="form-control select2 fcheight" >
                        <option selected disabled>-- Pilih Status --</option>
                        <option value="1" <?php echo $dataKaryawannya->stskar=='1'?'selected':''; ?>>Permanent</option>
                        <option value="2" <?php echo $dataKaryawannya->stskar=='2'?'selected':''; ?>>Contract</option>
                        <option value="3" <?php echo $dataKaryawannya->stskar=='3'?'selected':''; ?>>Probation</option>
                        <option value="4" <?php echo $dataKaryawannya->stskar=='4'?'selected':''; ?>>PKWTT</option>
                        <option value="5" <?php echo $dataKaryawannya->stskar=='5'?'selected':''; ?>>Resign</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p  class="hidden-sm fz-14 hitam">Tanggal Kontrak </p>
                <p  class="d-sm-none fz-14 hitam">Tanggal Kontrak </p>
            </div>
            <div class="col-md-6 col-12">
                <div class="input-group mb-3">
                    <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-calendar"></i></span>
                            </div>
                            <input type="text" class="input-sm form-control datepicker2 fcheight" id="startkontrak" name="" data-date-format="yyyy-mm-dd"  readonly value="<?php echo $dataKaryawannya->tglmasuk ?>" data-id="startdate">
                        </div>
                        
                        <span class="input-group-addon text-center mb-3" style="width: 40px;">s/d</span>
                        
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-calendar"></i></span>
                            </div>
                            <input type="text" class="input-sm form-control datepicker2 fcheight" id="endkontrak" name="" data-id="endtdate" data-date-format="yyyy-mm-dd"  readonly value="<?php echo $dataKaryawannya->tglkeluar!="0000-00-00"?$dataKaryawannya->tglkeluar:"-" ?>">
                        </div>
                        <input type="hidden" name="tanggal_masuk" id="startdate" value="<?php echo $dataKaryawannya->tglmasuk ?>">
                        <input type="hidden" name="tanggal_keluar" id="endtdate" value="<?php echo $dataKaryawannya->tglkeluar ?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p  class="hidden-sm fz-14 hitam">Masa Kerja </p>
                <p  class="d-sm-none fz-14 hitam">Masa Kerja </p>
            </div>
            <div class="col-md-6 col-12">
                <input type="text" class="form-control fcheight" id="masa_kerja"  readonly value="<?php
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
                    echo $dataKaryawannya->tglkeluar!="0000-00-00"?$days."Hari":"-";
                ?>">
            </div>
        </div>

    </div>
</div>
