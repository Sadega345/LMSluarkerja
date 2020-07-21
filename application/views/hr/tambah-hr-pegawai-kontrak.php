<div class="row">
    <div class="col-md-6 col-12">
        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p  class="hidden-sm fz-14 hitam">Status </p>
                <p  class="d-sm-none fz-14 hitam">Status </p>
            </div>
            <div class="col-md-6 col-12">
                <select name="status_karyawan" class="form-control select2 fcheight" >
                    <option selected disabled>-- Pilih Status --</option>
                    <option value="1">Permanent</option>
                    <option value="2">Contract</option>
                    <option value="3">Probation</option>
                    <option value="4">PKWTT</option>
                </select>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p  class="hidden-sm fz-14 hitam">Tanggal Kontrak </p>
                <p  class="d-sm-none fz-14 hitam">Tanggal Kontrak </p>
            </div>
            <div class="col-md-6 col-12">
                <div class="input-daterange input-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>
                        <input type="text" class="input-sm form-control fcheight datepicker2" id="#startkontrak"  data-id="startdate" name="" data-date-format="yyyy-mm-dd"  readonly>
                    </div>
                    
                    <span class="input-group-addon text-center" style="width: 40px;">s/d</span>
                    
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>
                        <input type="text" class="input-sm form-control fcheight datepicker2" id="endkontrak"  data-id="enddate" name="" data-date-format="yyyy-mm-dd"  readonly>
                    </div>
                    <input type="hidden" name="tanggal_masuk" id="startdate">
                    <input type="hidden" name="tanggal_keluar" id="enddate">
                </div>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6 col-12">
                <p  class="hidden-sm fz-14 hitam">Masa Kerja </p>
                <p  class="d-sm-none fz-14 hitam">Masa Kerja </p>
            </div>
            <div class="col-md-6 col-12">
                <input type="text" class="form-control fcheight" id="masa_kerja"  readonly>
            </div>
        </div>

    </div>
</div>
<!-- End New -->
