<script type="text/javascript">
    $(document).ready(function(){
        
        $("#selepegawai").show();
        var lastday = function(m,y){
            return  new Date(y, m +1, 0).getDate();
        }
        
        $("#rowsumber").show();
        $("#wizard_hr").show();
        $("#loading").show();
        $("#loadingnik").show();
        $("#rowdivisi").show();
        $("#rowtunjangan").hide();
        $("#isitunjangan").hide();
        $("#rowclient").show();
        $("#rowdept").show();
        $("#rowkab").show();
        $("#rowkec").show();
        $("#rowloker").hide();
        $("#rowjabatan").hide();
        $("#email").inputmask('email');
        $('#kodepos').mask('99999');
        $('#thn_masuk_didik,#thn_lulus_didik,#thn_masuk_kerja,#thn_lulus_kerja').mask('9999');
        $('#nomor_telepon').mask('999999999?999');
        $('#ktppegawai').mask('9999999999999999');
        $('#npwppegawai').mask('99.999.999.9-999.999');
        $("#btntamtunj").show();
        $("#rowgaji").show();
        pilihSumber(<?php echo $dataKaryawannya->id_pelamar!=0?'1':'0'; ?>);
        $("#lokasi").change(function(){
            pilihClient(this.value);
        });
        $("#selclient").change(function(){
            pilihDept(this.value);
        });
        $("#saldoklaim").keyup( function(e){
			$(this).val(addRibuan($(this).val()));
		}); 
        $("#seldept").change( function(e){
			$("#rowsumber").show();
		}); 
        
        $("#seljab,#sellok").change( function(e){
			$("#wizard_hr").show();
		}); 
        $("#departemen").change(function(){
            //alert(this.value);
            $("#divisi").show();
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
                $("#loading").show(); 
                $("#divisi").html(response.data_divisi).show();
                $("#divisi").select2();
              },
              error: function (xhr, ajaxOptions, thrownError) { 
                alert(thrownError); 
              }
            }); 
        });
        $('.input-daterange input').each(function() {
            $(this).datepicker('clearDates');
            $(this).datepicker({
                format:'yyyy-mm-dd'
            });
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
                $("#loadingnik").show();
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
        $('#start').datepicker('setDate', new Date('<?php echo $dataKaryawannya->tanggal_masuk ?>'));
        $('#end').datepicker('setDate', new Date('<?php echo $dataKaryawannya->tanggal_keluar ?>')); 
    });
    function pilihClient(idlokasi){
        if(idlokasi!=""){
            $("#rowdept").show();
            $("#rowsumber").show();
            $("#rowjabatan").show();
            $("#rowloker").show();
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
            $("#rowclient").show();
            $("#rowdept").show();
        }
    }
    function pilihDept(idclient){
        if(idclient!=""){
            $("#rowsumber").show();
            $("#rowjabatan").show();
            $("#rowloker").show();
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
            $("#rowdept").show();
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
            var total=parseInt(gapok,10);
            $('.inptunj').each(function(i, obj) {
                var thisval=$(this).val();
                var intval = thisval.split(".").join("");
                if(intval==""){intval=0;}
                //console.log("inptunj"+intval);
                total=parseInt(total)+parseInt(intval);
            });
            var totalribu=addRibuan(total);
            $("#total_gaji").val(totalribu);
            //console.log("totalnya"+total);
            if(total>0){
                if(total!=""){
                    $("#btntamtunj").show();
                    $("#rowgaji").show();
                } else {
                    $("#btntamtunj").show();
                    $("#rowgaji").show();
                }
            } else {
                $("#btntamtunj").show();
                $("#rowgaji").show();
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
                    $("#btntamtunj").show();
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
        <?php foreach ($dataJenisTunjanganKaryawan->result() as $dtjtk) { ?>
             $(".seltunjangan option[value='<?php echo $dtjtk->id_jenis_tunjangan ?>']").remove();
        <?php } ?>
       
    }
    
    
    function pelamarDtl(idnya){
        if(idnya!=""){
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
                    $("#rowcv").show();
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
            $("#rowkab").show();
            $("#rowkec").show();
            /* $("#alamat").attr("readonly",false);
            $("#nomor_telepon").attr("readonly",false); */
        }
    }
    function pilihSumber(valuenya){
        $("#idjablok").html("");
        $("#rowidjenpro").html("");
        if(valuenya==1){
            $("#seljab").removeAttr('name');
            $("#rowcv").show();
            $("#rowloker").show();
            $("#rowjabatan").hide();
            $("#inppegawai").show();
            $("#selepegawai").show();
            $("#email").inputmask('remove');
            $("#email").attr('readonly',true);
            $("#rowpass").show();
           // $("#sellok").val(null).trigger("change");
        } else {
            //$("#seljab").attr('name','id_jabatan');
            $("#seljab").attr('name','id_master_jenis_project');
            $("#rowcv").show();
            $("#rowloker").hide();
            $("#rowjabatan").show();
            $("#inppegawai").show();
            $("#selepegawai").show();
            $("#email").inputmask('email');
            $("#email").attr('readonly',false);
            $("#rowpass").show();
            //$("#seljab").val(null).trigger("change");
        }
    }
    function pilihPelamar(idloker){
        if(idloker!=""){
            $("#inppegawai").show();
            //$("#rowjabatan").show();
            $("#selepegawai").show();
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
                $("#selpegawai").html(response.data_pelamar).show();
                $("#selpegawai").select2();
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
            $("#selepegawai").show();
            /* $("#alamat").attr("readonly",false);
            $("#nomor_telepon").attr("readonly",false); */
        }
    }
    function countGaji(){
        var gapok=$("#gapok").val();
        var number_string = gapok.toString().replace(/[^,\d]/g, ''); 
        var gapok=number_string;
        //console.log("gapok "+gapok);
        var total=parseInt(gapok,10);
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
    function pilihKab(idprov,idkabsel){
        if(idprov!=""){
            $.ajax({
                  type: "POST",
              url: "<?php echo base_url(); ?>HR/ambilKab", 
              data: {id_provinsi : idprov}, 
              dataType: "json",
              beforeSend: function(e) {
                if(e && e.overrideMimeType) {
                  e.overrideMimeType("application/json;charset=UTF-8");
                }
              },
              success: function(response){ 
                $("#rowkab").show();
                $("#selkab").html(response.data_kabupaten).show();
                // if(idkabsel!=0){
                //     $('#selkab option[value='+idkabsel+']').attr('selected','selected');
                // } else {
                    $("#rowkec").hide();
                //}
               // $("#selkab").select2();
              },
              error: function (xhr, ajaxOptions, thrownError) { 
                alert(thrownError); 
              }
            }); 
        } else {
            $("#rowkab").show();
            $("#rowkec").show();
        }
    }
    function pilihKec(idkab,idkecsel){
        if(idkab!=""){
            $.ajax({
                  type: "POST",
              url: "<?php echo base_url(); ?>HR/ambilKec", 
              data: {id_kabupaten : idkab}, 
              dataType: "json",
              beforeSend: function(e) {
                if(e && e.overrideMimeType) {
                  e.overrideMimeType("application/json;charset=UTF-8");
                }
              },
              success: function(response){ 
                $("#rowkec").show();
                $("#selkec").html(response.data_kecamatan).show();
                if(idkecsel!=0){
                    $('#selkec option[value='+idkecsel+']').attr('selected','selected');
                }
               // $("#selkec").select2();
              },
              error: function (xhr, ajaxOptions, thrownError) { 
                alert(thrownError); 
              }
            }); 
        } else {
            $("#rowkec").show();
        }
    }
    
</script>
