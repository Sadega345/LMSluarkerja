<script type="text/javascript">
    $(function(){
        setTimeout(function(){
            $("#email").inputmask('email');
            $('#kodepos').mask('99999');
            $('#thn_masuk_didik,#thn_lulus_didik,#thn_masuk_kerja,#thn_lulus_kerja').mask('9999');
            $('#nomor_telepon').mask('999999999?999');
            $('#ktppegawai').mask('9999999999999999');
            $('#npwppegawai').mask('99.999.999.9-999.999');
            $('.input-daterange input').each(function() {
              //  $(this).datepicker('clearDates');
                // $(this).datepicker({
                //     format:'yyyy-mm-dd'
                // });
                $(this).change(function(){
                    var name=$(this).attr('name');
                    var startdate=$('#start').datepicker("getDate");
                    var enddate=$('#end').datepicker("getDate");
                    var stad=moment(startdate);
                    var endd=moment(enddate);
                    
                    var diffalls = stad.diff(endd);
                    var duration = moment.duration(diffalls);
                    var years = Math.abs(duration.years()),
                        months=Math.abs(duration.months()),
                        days = Math.abs(duration.days()),
                        hrs = Math.abs(duration.hours()),
                      mins = Math.abs(duration.minutes()),
                      secs = Math.abs(duration.seconds());
                    var tahun = years>0?years+' tahun ':'';
                    var bulan = months>0?months+' bulan ':'';
                    var tanggal = days>0?days+' hari ':''; 
                    var diffall=tahun+bulan+tanggal;
                    $("#masa_kerja").val(diffall);
                });
            });
            
            $("#lokasi").change(function(){
                //pilihClient(this.value);
            });
            $("#selclient").change(function(){
                pilihDept(this.value);
                pilihLokasi(this.value);
                pilihpo(this.value);
            });
            $("#saldoklaim").keyup( function(e){
    			$(this).val(addRibuan($(this).val()));
    		}); 
            $("#bpjs_kes").keyup( function(e){
                $(this).val(addRibuan($(this).val()));
            }); 
            $("#bpjs_tk").keyup( function(e){
                $(this).val(addRibuan($(this).val()));
            }); 
            $("#pph").keyup( function(e){
                $(this).val(addRibuan($(this).val()));
            });
            $("#lemburan").keyup( function(e){
                $(this).val(addRibuan($(this).val()));
            }); 
            $("#seldept").change( function(e){
    			$("#rowsumber").show();
                var sumber = $('#sumber').val();
                if(sumber!=0){
                    $("#rowloker").show();
                }else{
                    $("#rowjabatan").show();
                }
    		});
            
            $("#departemen").change(function(){
                //alert(this.value);
                $("#divisi").hide();
                $("#loading").show();
                $("#divisi").removeClass("select2");
                $.ajax({
                  type: "POST",
                  url: "<?php echo base_url(); ?>HR/ambilDivisi", 
                  data: {departemen : this.value}, 
                  dataType: "json",
                  beforeSend: function(e) {
                    if(e && e.overrideMimeType) {
                      e.overrideMimeType("application/json;charset=UTF-8");
                    }
                  },
                  success: function(response){
                    $("#rowdivisi").show();
                    $("#loading").hide(); 
                    $("#divisi").html(response.data_divisi).show();
                    $("#divisi").select2();
                  },
                  error: function (xhr, ajaxOptions, thrownError) { 
                    alert(thrownError); 
                  }
                }); 
            });
            
            formatAngka();
            

            $("#nik").keyup(function(){
                $("#loadingnik").show();
                 $.ajax({
                  type: "POST",
                  url: "<?php echo base_url(); ?>HR/checkNik", 
                  data: {nik : this.value}, 
                  dataType: "json",
                  beforeSend: function(e) {
                    if(e && e.overrideMimeType) {
                      e.overrideMimeType("application/json;charset=UTF-8");
                    }
                  },
                  success: function(response){
                    $("#loadingnik").hide();
                    if(response.hasil=="invalid"){
                        alert("nik sudah terpakai");
                        $("#nik").val("");
                    } else {
                        return true;
                    } 
                  },
                  error: function (xhr, ajaxOptions, thrownError) { 
                    alert(thrownError); 
                  }
                }); 
            });
            <?php 
                if($form=="edit"){ ?>
                    <?php   if($dataKaryawannya->id_pelamar!=0){ ?>
                        $("#rowjabatan").hide();
                    <?php }else{ ?>
                        $("#rowloker").hide();
                    <?php } ?>
                    
            <?php }?>
        },1000);
    });
    $(document).ready(function(){
        
        $("#selepegawai").hide();
        var lastday = function(m,y){
            return  new Date(y, m +1, 0).getDate();
        }
        
        
        $("#loading").hide();
        $("#loadingnik").hide();
        $("#rowdivisi").hide();
        $("#rowtunjangan").hide();
        $("#isitunjangan").hide();
        <?php if($form=="tambah"){ ?>
        //$("#rowclient").hide();
        $("#rowlokasi").hide();
        $("#rowdept").hide();
        $("#rowsumber").hide();
        $("#rowloker").hide();
        $("#rowjabatan").hide();
        $("#rowgaji").hide();
        $("#rowkab").hide();
        $("#rowkec").hide();
        $("#btntamtunj").hide();
        <?php } ?>
        <?php if($form=="edit"){
            ?>
            $("#rowgaji").show();
            $('.id_tunjubah').each(function() {
                $(".seltunjangan option[value='"+$(this).val()+"']").remove();
            });
            <?php
            if($dataKaryawannya->id_pelamar!=0){
                ?>
                $("#rowjabatan").hide();
                <?php
            } else {
                ?>
                $("#rowloker").hide();
                <?php
            }
            ?>
        
        <?php } ?>
        
        
        
        
        
        
    });
    function pilihClient(idlokasi){
        if(idlokasi!=""){
            $("#rowdept").hide();
            $("#rowsumber").hide();
            $("#rowjabatan").hide();
            $("#rowloker").hide();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>HR/ambilClient", 
                data: {id_lokasi : idlokasi}, 
                dataType: "json",
                beforeSend: function(e) {
                    if(e && e.overrideMimeType) {
                      e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response){ 
                    $("#rowclient").show();
                    $("#selclient").html(response.data_client).show();
                    $("#selclient").select2();
                },
                error: function (xhr, ajaxOptions, thrownError) { 
                    alert(thrownError); 
                }
            }); 
        } else {
            $("#rowclient").hide();
            $("#rowdept").hide();
        }
    }
    function pilihLokasi(idclient){
        if(idclient!=""){
            $("#rowsumber").hide();
            $("#rowjabatan").hide();
            $("#rowloker").hide();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>HR/ambilLokasi", 
                data: {id_client : idclient}, 
                dataType: "json",
                beforeSend: function(e) {
                    if(e && e.overrideMimeType) {
                      e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response){ 
                    $("#rowlokasi").show();
                    $("#lokasi").html(response.data_lokasi).show();
                    $("#lokasi").select2();
                },
                error: function (xhr, ajaxOptions, thrownError) { 
                    alert(thrownError); 
                }
            }); 
        } else {
            $("#rowlokasi").hide();
        }
    }
    function pilihDept(idclient){
        if(idclient!=""){
            $("#rowsumber").hide();
            $("#rowjabatan").hide();
            $("#rowloker").hide();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>HR/ambilDept", 
                data: {id_client : idclient}, 
                dataType: "json",
                beforeSend: function(e) {
                    if(e && e.overrideMimeType) {
                      e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response){ 
                    $("#rowdept").show();
                    $("#seldept").html(response.data_dept).show();
                    $("#seldept").select2();
                },
                error: function (xhr, ajaxOptions, thrownError) { 
                    alert(thrownError); 
                }
            }); 
        } else {
            $("#rowdept").hide();
        }
    }
    function pilihpo(idclient){
        if(idclient!=""){
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>HR/ambilPO", 
                data: {id_client : idclient}, 
                dataType: "json",
                beforeSend: function(e) {
                    if(e && e.overrideMimeType) {
                      e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response){ 
                    $("#rowpo").show();
                    $("#selpo").html(response.data_po).show();
                    $("#selpo").select2();
                },
                error: function (xhr, ajaxOptions, thrownError) { 
                    alert(thrownError); 
                }
            }); 
        } else {
           // $("#rowdept").hide();
        }
    }
    
    function formatAngka(){
        var rupiah = document.getElementById('gapok');
		rupiah.addEventListener('keyup', function(e){
			this.value = formatRupiah(this.value);
		});
        
		
    }
    function formatRupiah(angka){
        var max_chars = 15;
        if(angka.length > max_chars) {
            return angka.substr(0, max_chars);
        } else {
    		
            var rupiah = addRibuan(angka);
            var number_string = angka.toString().replace(/[^,\d]/g, ''); 
            var gapok=number_string;
            //console.log("gapok "+gapok);
            var total=parseInt(gapok);
            $('.inptunj').each(function(i, obj) {
                var thisval=$(this).val();
                var intval = thisval.split(".").join("");
                if(intval==""){intval=0;}
                //console.log("inptunj"+intval);
                total=parseInt(total)+parseInt(intval);
            });
            var totalribu=addRibuan(total);
            $("#total_gaji").val(totalribu);
            console.log("totalnya"+total);
            if(total>0){
                if(total!=""){
                    $("#btntamtunj").show();
                    $("#rowgaji").show();
                } else {
                    $("#btntamtunj").hide();
                    $("#rowgaji").hide();
                }
            } else {
                $("#btntamtunj").hide();
                $("#rowgaji").hide();
            }
            return (rupiah ? rupiah : '');
        }
	}
    
    function createButton(text, cb) {
      return $('<button>' + text + '</button>').on('click', cb);
    }
    function showTunjangan(){
        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-blue1',
            cancelButton: 'btn btn-red1'
          },
          buttonsStyling: false,
        });
        $rowtunjangan=$('<div id="poptunj">'+$("#rowtunjangan").html()+'</div>');
        swalWithBootstrapButtons.fire({
          title: 'Tambah Tunjangan',
          html: $rowtunjangan,
          //type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Tambah',
          cancelButtonText: 'Batal',
          /* reverseButtons: true, */
          allowOutsideClick: false
        }).then((result) => {
          if (result.value) {
            /* swalWithBootstrapButtons.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            ) */
            //console.log("Add");
            var txttunj=$("#poptunj").find("#seltunjangan option:selected").text();
            var valtunj=$("#poptunj").find("#seltunjangan option:selected").val();
            var besartunj=$("#poptunj").find("#bestunjinp").val();
            var besartunjint = besartunj.split(".").join("");
            $isi = $(
                '<div id="removerow'+valtunj+'">'+$("#isitunjangan").html()+'</div>');
            
            $isi.find("#txttunj").html(txttunj);
            $isi.find("#idtunj").val(valtunj);
            var totaltunj=addRibuan(besartunj);
            $isi.find("#bestunj").val(totaltunj);
            $isi.find("#remove").attr('data-id',valtunj);
            $isi.find("#remove").attr('data-txt',txttunj);
            //console.log(besartunj);
            //console.log(totaltunj);
            if(valtunj!="" && besartunjint!="" && besartunjint>0){
                $(".seltunjangan option[value='"+valtunj+"']").remove();
                var lentunj=$("#poptunj").find("#seltunjangan option").length;
                $("#contenttunjangan").append($isi);
                countGaji();
                if(lentunj<=1){
                    $("#btntamtunj").hide();
                }
            }
               $(".removex").click(function(){
                var  id=$(this).data('id');
                var  txt=$(this).data('txt');
                
                $("#removerow"+id).remove();
                countGaji();    
                $(".seltunjangan").append('<option value="'+id+'">'+txt+'</option>');
                });
               $(".inptunj").keyup(function(){
                this.value = formatRupiah(this.value);
                countGaji();    
                });
            
            //$(".seltunjangan").select2("destroy");
            //$("#isitunjangan").clone().insertAfter("div.contenttunjangan:last");
          } else if (
            // Read more about handling dismissals
            result.dismiss === Swal.DismissReason.cancel
          ) {
            //$(".seltunjangan").select2("destroy");
            /* swalWithBootstrapButtons.fire(
              'Cancelled',
              'Your imaginary file is safe :)',
              'error'
            ) */
          }
        });
        $(".seltunjangan").select2({
            dropdownCssClass: "increasedzindexclass"
        });
        //var rupiah = document.getElementById('bestunjinp');
        /* $("#poptunj").find("#bestunjinp").keyup( function(e){
			$(this).val(addRibuan($(this).val()));
		}); */
		$(".besarantunjangan").keyup( function(e){
			$(this).val(addRibuan($(this).val()));
		}); 
    }
    
    
    function pelamarDtl(idnya){
        if(idnya!=""){
            $("#simpan").parsley().validate();
            /* $("#alamat").attr("readonly",true);
            $("#nomor_telepon").attr("readonly",true); */
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>HR/ambilPelamarDtl", 
                data: {id_pelamar : idnya}, 
                dataType: "json",
                beforeSend: function(e) {
                    if(e && e.overrideMimeType) {
                      e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response){ 
                    $("#rowcv").hide();
                    $("#inppegawai2").val(response.data_pelamar.nama_panggilan);
                    $("#email").val(response.data_pelamar.email);
                    $("#alamat").val(response.data_pelamar.alamat);
                    $("#nomor_telepon").val(response.data_pelamar.nomor_telepon);
                    $("#tempat_lahir").val(response.data_pelamar.tempat_lahir);
                    $("#tanggal_lahir").val(response.data_pelamar.tanggal_lahir);
                    var $radios = $('input:radio[name=jenis_kelamin]');
                    $radios.filter('[value='+response.data_pelamar.jenis_kelamin+']').prop('checked', true);
                    $('#selagama option[value='+response.data_pelamar.id_agama+']').attr('selected','selected');
                    $('#selstsnikah option[value='+response.data_pelamar.id_sts_nikah+']').attr('selected','selected');
                    $('#selgoldar option[value='+response.data_pelamar.golongan_darah+']').attr('selected','selected');
                    $('#selpendidikan option[value='+response.data_pelamar.id_pendidikan+']').attr('selected','selected');
                    $('#selprov option[value='+response.data_pelamar.id_provinsi+']').attr('selected','selected');
                    $("#selagama").select2("destroy").select2();
                    $("#selstsnikah").select2("destroy").select2();
                    $("#selgoldar").select2("destroy").select2();
                    $("#selpendidikan").select2("destroy").select2();
                    $("#selprov").select2("destroy").select2();
                    if(response.data_pelamar.id_kabupaten!=""){
                        pilihKab(response.data_pelamar.id_provinsi,response.data_pelamar.id_kabupaten);
                    }
                    if(response.data_pelamar.id_kecamatan!=""){
                        pilihKec(response.data_pelamar.id_kabupaten,response.data_pelamar.id_kecamatan);
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) { 
                    alert(thrownError); 
                }
            }); 
        } else {
            $("#rowcv").show();
            $("#rowkab").hide();
            $("#rowkec").hide();
            /* $("#alamat").attr("readonly",false);
            $("#nomor_telepon").attr("readonly",false); */
        }
    }
    function pilihSumber(valuenya){
        $("#idjablok").html("");
        $("#rowidjenpro").html("");
        if(valuenya==1){
            $("#seljab").removeAttr('name');
            $("#rowcv").hide();
            $("#rowloker").show();
            var idlok = $("#lokasi").val();
            refreshLoker(idlok);
            $("#rowjabatan").hide();
            $("#inppegawai").hide();
            $("#selepegawai").show();
            $("#email").inputmask('remove');
            $("#email").attr('readonly',true);
            $("#rowpass").hide();
            //alert(idlok);
            
           // $("#sellok").val(null).trigger("change");
        } else {
            //$("#seljab").attr('name','id_jabatan');
            $("#seljab").attr('name','id_master_jenis_project');
            $("#rowcv").show();
            $("#rowloker").hide();
            $("#rowjabatan").show();
            var pers =$("#selclient").val();
            var dept =$("#seldept").val();
            seljab(pers,dept);
            $("#inppegawai").show();
            $("#selepegawai").hide();
            $("#email").inputmask('email');
            $("#email").attr('readonly',false);
            $("#rowpass").show();
            //$("#seljab").val(null).trigger("change");
        }
    }
    function pilihPelamar(idloker){
        if(idloker!=""){
            $("#inppegawai").hide();
            //$("#rowjabatan").hide();
            $("#selepegawai").show();
            $("#selpegawai").html("");
            /* $("#alamat").attr("readonly",true);
            $("#nomor_telepon").attr("readonly",true); */
            $.ajax({
                  type: "POST",
              url: "<?php echo base_url(); ?>HR/ambilPelamar", 
              data: {id_loker : idloker}, 
              dataType: "json",
              beforeSend: function(e) {
                if(e && e.overrideMimeType) {
                  e.overrideMimeType("application/json;charset=UTF-8");
                }
              },
              success: function(response){ 
                //$("#selpegawai").select2("destroy");
                $("#selpegawai").html(response.data_pelamar).show();
                //$("#selpegawai").select2();
                $("#idjablok").html('<input type="hidden" id="id_jab_loker" name="id_jabatan" />');
                $("#id_jab_loker").val(response.id_jab_loker);
                $("#rowidjenpro").html('<input type="hidden" id="id_jab_loker" name="id_master_jenis_project" />');
                $("#id_jab_loker").val(response.id_master_jenis_project);
              },
              error: function (xhr, ajaxOptions, thrownError) { 
                alert(thrownError); 
              }
            }); 
        } else {
            $("#idjablok").html("");
            $("#rowidjenpro").html("");
            $("#inppegawai").show();
            //$("#rowjabatan").show();
            $("#selepegawai").hide();
            /* $("#alamat").attr("readonly",false);
            $("#nomor_telepon").attr("readonly",false); */
        }
    }
    function countGaji(){
        var gapok=$("#gapok").val();
        var number_string = gapok.toString().replace(/[^,\d]/g, ''); 
        var gapok=number_string;
        //console.log("gapok "+gapok);
        var total=parseInt(gapok);
        $('.inptunj').each(function(i, obj) {
            var thisval=$(this).val();
            var intval = thisval.split(".").join("");
            if(intval==""){intval=0};
            total=parseInt(total)+parseInt(intval);
        });
        var totalribu=addRibuan(total);
        $("#total_gaji").val(totalribu);
        
        /* var gapok=$("#gapok").val();
        gapok = gapok.replace(".", "");
        var total=parseInt(gapok,10);
        $('.inptunj').each(function(i, obj) {
            var thisval=$(this).val();
            var intval = thisval.replace(".", "");
            total=parseInt(total)+parseInt(intval);
        });
        var totalribu=addRibuan(parseInt(total));
        $("#total_gaji").val(total); */
    }
    function seljab(idperusahaan,iddepartemen){
        $.ajax({
                type: "POST",
              url: "<?php echo base_url(); ?>HR/ambilJabatan", 
              data: {idperusahaan : idperusahaan,iddepartemen :iddepartemen}, 
              dataType: "json",
              beforeSend: function(e) {
                if(e && e.overrideMimeType) {
                  e.overrideMimeType("application/json;charset=UTF-8");
                }
              },
              success: function(response){ 
                $("#rowjabatan").show();
                $("#seljab").html(response.data_jp).show();
              },
              error: function (xhr, ajaxOptions, thrownError) { 
                alert(thrownError); 
              }
            }); 
    }
    function refreshLoker(idlok){
        if(idlok!=""){
            $.ajax({
                type: "POST",
              url: "<?php echo base_url(); ?>HR/ambilLoker", 
              data: {id_lokasi_kantor : idlok}, 
              dataType: "json",
              beforeSend: function(e) {
                if(e && e.overrideMimeType) {
                  e.overrideMimeType("application/json;charset=UTF-8");
                }
              },
              success: function(response){ 
                $("#rowloker").show();
                $("#sellok").html(response.data_loker).show();
              },
              error: function (xhr, ajaxOptions, thrownError) { 
                alert(thrownError); 
              }
            }); 
        } else {
            $("#rowloker").hide();
        }
    }
    
    
</script>
