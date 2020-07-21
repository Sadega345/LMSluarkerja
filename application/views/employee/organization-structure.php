
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                         <h6 class="tittle-menu">Informasi Organisasi / Struktur</h6>
                    </div>
                </div>
            </div>
         	
         	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 view" >
                     <div class="card ">
                         <div class="body ">
                          <div class="row mb-3">
                             <div class="col-md-6 col-12">
                                 <h5 class="fz-aktivitasabsensi">Struktur Organisasi</h5>
                             </div>                         
                          </div>
                          <div class=" table-responsive text-center">
                              <div id="tree" class="table-responsive">
                              </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $(document).ready(function(){
                    // <img src="'
                    //   +data.office+'" height="50px">
                    var nodeTemplate = function(data) {
                      return '<span class="office"></span>'+
                        '<div class="title">'+data.name+'</div>'+
                        '<div class="content">'+data.title+'</div>';
                    };

                    var oc = $('#tree').orgchart({
                      'data' : "<?php echo base_url()?>Employee/jsonOrg",
                      'nodeTemplate': nodeTemplate
                      //'direction':'l2r'
                    });



                  // });
                });
            </script>