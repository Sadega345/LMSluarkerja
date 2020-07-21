<style type="text/css">
    /* #chart-container { background-color: #eee; height: 500px; }
    .orgchart { background: #fff; }
    .orgchart.edit-state .edge { display: none; }
    .orgchart .node { width: 150px; }
    .orgchart .node .title { height: 30px; line-height: 30px; }
    .orgchart .node .title .symbol { margin-top: 1px; } */
    #edit-panel {
      position: relative;
      left: 10px;
      width: calc(100% - 40px);
      border-radius: 4px;
      float: left;
      margin-top: 10px;
      padding: 10px;
      color: #fff;
      background-color: #449d44;
    }
    #edit-panel .btn-inputs { font-size: 24px; }
    #edit-panel.edit-state>:not(#chart-state-panel) { display: none; }
    #edit-panel label { font-weight: bold; }
    #edit-panel.edit-parent-node .selected-node-group { display: none; }
    #chart-state-panel, #selected-node, #btn-remove-input { margin-right: 20px; }
    #edit-panel button {
      color: #333;
      background-color: #fff;
      display: inline-block;
      padding: 6px 12px;
      margin-bottom: 0;
      line-height: 1.42857143;
      text-align: center;
      white-space: nowrap;
      vertical-align: middle;
      -ms-touch-action: manipulation;
      touch-action: manipulation;
      cursor: pointer;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      background-image: none;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    #edit-panel.edit-parent-node button:not(#btn-add-nodes) { display: none; }
    #edit-panel button:hover,.edit-panel button:focus,.edit-panel button:active {
      border-color: #eea236;
      box-shadow:  0 0 10px #eea236;
    }
    #new-nodelist {
      display: inline-block;
      list-style:none;
      margin-top: -2px;
      padding: 0;
      vertical-align: text-top;
    }
    #new-nodelist>* { padding-bottom: 4px; }
    .btn-inputs { vertical-align: sub; }
    #edit-panel.edit-parent-node .btn-inputs { display: none; }
    .btn-inputs:hover { text-shadow: 0 0 4px #fff; }
    .radio-panel input[type='radio'] { display: inline-block;height: 24px;width: 24px;vertical-align: top; }
    #edit-panel.view-state .radio-panel input[type='radio']+label { vertical-align: -webkit-baseline-middle; }
    #btn-add-nodes { margin-left: 20px; }
  </style>
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                         <p class="fz-36 barlow-bold"> Informasi Organisasi / Struktur</p>
                    </div>
                </div>
            </div>
        	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 view" >
                     <div class="card ">
                         <div class="body table-responsive text-center">
                            <h6 class="tittle-box">Struktur Organisasi</h6>
                            <div id="tree" class="table-responsive">
                            </div>
                            <div id="edit-panel">
                                <span id="chart-state-panel" class="radio-panel">
                                  <input type="radio" name="chart-state" id="rd-view" value="view"><label for="rd-view">View</label>
                                  <input type="radio" name="chart-state" id="rd-edit" value="edit" checked="true"><label for="rd-edit">Edit</label>
                                </span>
                                <label class="selected-node-group">selected node:</label>
                                <input type="text" id="selected-node" class="selected-node-group">
                                <label>new node:</label>
                                <ul id="new-nodelist">
                                  <li><input type="text" class="new-node"></li>
                                </ul>
                                <i class="fa fa-plus-circle btn-inputs" id="btn-add-input"></i>
                                <i class="fa fa-minus-circle btn-inputs" id="btn-remove-input"></i>
                                <span id="node-type-panel" class="radio-panel">
                                  <input type="radio" name="node-type" id="rd-parent" value="parent"><label for="rd-parent">Parent(root)</label>
                                  <input type="radio" name="node-type" id="rd-child" value="children"><label for="rd-child">Child</label>
                                  <input type="radio" name="node-type" id="rd-sibling" value="siblings"><label for="rd-sibling">Sibling</label>
                                </span>
                                <button type="button" id="btn-add-nodes">Add</button>
                                <button type="button" id="btn-delete-nodes">Delete</button>
                                <button type="button" id="btn-reset">Reset</button>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
                                      
                                      
<div class="row clearfix">
<div class="col-lg-12 col-md-12 view" >
    <div class="card ">
        <div class="body table-responsive ">
        <h5 class="fz-aktivitasabsensi">Tabel Struktur Organisasi</h5>
              <div class="row m-t-10">
              <div class="col-md-6">
              </div>
              <?php if ($dataAkses == '1'){ ?>
                <div class="col-md-6 " align="right">
                  <a href="javascript:;" class="btn Rectangle-diterima col-md-6" onclick="formtambah()" ><img src="<?php  echo base_url()?>assets/img/Plus.svg" class="padd-right-5">Tambah Jabatan</a>
                </div>
              <?php } ?>
              
              </div>
              <div class="table-responsive m-t-10">
                  <table  class="table table-hover master dataTable table-custom table-striped table-bordered nowrap dataTable dtr-inline " style="width: 100%">
                  
                  <thead class="thead-dark">
                      <tr>
                          <th>No</th>
                          <th>Atasan</th>
                          <th>Jabatan</th>
                          <th>Karyawan</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                        $idx =1;
                        foreach ($dataorganisasi->result() as $dt) { ?>
                          <tr>
                            <td><?php echo $idx;?></td>
                            <td><?php echo $dt->nama; ?></td>
                            <td><?php echo $dt->jabatan; ?></td>
                            <td><?php echo $dt->nama_karyawan; ?></td>
                            <td>
                              <?php if ($dataAkses == '1'){ ?>
                                <a href="javascript:;" onclick="formedit('<?php echo $dt->id_struktur_organisasi ?>')">
                                <button class="btn btn-aksi"><img src="<?php  echo base_url()?>assets/img/Update.svg" class="padd-right-5">Edit</button>
                                </a>
                                <a href="javascript:;"  class="btn btn-aksi hapus" title="Hapus" data-type="organisasi" data-id="<?php echo $dt->id_struktur_organisasi; ?>" onclick="hapus(<?php echo $dt->id_struktur_organisasi; ?>)"><img src="<?php  echo base_url()?>assets/img/Delete.svg" class="padd-right-5">Hapus
                                </a>
                                
                                
                              <?php } ?>
                              
                            </td>
                          </tr>
                            <?php $idx++;} ?>
                    </tbody>
                </table>
        </div>
        </div>
    </div>
</div>
</div>

 <!-- edit modal -->
            <div class="modal fade bd-example-modal-lg" id="edit">
                <div class="modal-dialog modal-lg" >
                    <div class="modal-content" >
                        <div class="modal-body" >
                            <form action="<?php echo base_url()?>HR/ProsesEditOrganisasi" method="post">
                                <div class="col-lg-12">
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <label class="fz-18">Edit Struktur Organisasi</label>
                                                
                                            </div>
                                            <div class="col-lg-6 col-md-6" align="right">
                                                <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="formedit">
                                                </div>
                                            </div>
                                        </div>
                                         <div class="row m-t-10">
                                          <div class="col-md-5">
                                          </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn Rectangle-cari">Simpan</button>
                                                <button type="button" class="btn Rectangle-batal" data-dismiss="modal" >Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- tambah modal -->
            <div class="modal fade bd-example-modal-lg" id="tambah">
                <div class="modal-dialog modal-lg" >
                    <div class="modal-content" >
                        <div class="modal-body" >
                            <form action="<?php echo base_url()?>HR/ProsesTambahOrganisasi" method="post">
                                <div class="col-lg-12">
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <label class="fz-18">Tambah Struktur Organisasi</label>
                                                
                                            </div>
                                            <div class="col-lg-6 col-md-6" align="right">
                                                <button type="button" class="btn Rectangle-tutup" data-dismiss="modal" >Tutup</button>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="formtambah">
                                                </div>
                                            </div>
                                        </div>
                                         <div class="row m-t-10">
                                            <div class="col-md-5">
                                            </div>
                                            <div class="col-md-6">
                                                <button type="submit" class="btn Rectangle-cari">Simpan</button>
                                                <button type="button" class="btn Rectangle-batal" data-dismiss="modal" >Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>




<script type="text/javascript">
  $(document).ready(function(){
     $('#edit').modal({backdrop: 'static', keyboard: false});
     $('#tambah').modal({backdrop: 'static', keyboard: false});
     // hapus();
      $('.master').DataTable({
          responsive: true,
          
          fnDrawCallback:function(oSettings){
            // hapus();
          }
      });
  });

  function formedit(a){
              $.ajax({
                url: "<?php echo base_url();?>HR/EditOrganisasi/"+a,
                // data: {nik:a},
                type: "post",
                // dataType:'json',
                success: function (response) {
                   // alert('masuk');
                    $('#edit').modal('show');
                    $('#formedit').html(response);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                   console.log(textStatus, errorThrown);
                }
            });
    }
     function formtambah(){
              $.ajax({
                url: "<?php echo base_url();?>HR/TambahHROrganisasi",
                // data: {nik:a},
                type: "post",
                // dataType:'json',
                success: function (response) {
                   // alert('masuk');
                    $('#tambah').modal('show');
                    $('#formtambah').html(response);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                   console.log(textStatus, errorThrown);
                }
            });
    }

  function hapus(id){
     // $(".hapus").click(function(){
          const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-blue1',
              cancelButton: 'btn btn-red1'
            },
            buttonsStyling: false,
          });
                // var type=$(this).data('type');
                // var id=$(this).data('id');
               // var perusahaan=$(this).data('perusahaan');

                  swalWithBootstrapButtons.fire({
                      title: "Apakah Anda yakin?",
                      text: "Ingin menghapus data ini? ",
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonColor: "#dc3545",
                      confirmButtonText: "Ya",
                      cancelButtonText: "Tidak",
                      //closeOnConfirm: false,
                      //closeOnCancel: false,
                      reverseButtons: true,
                      allowOutsideClick: false
                  }).then((result) => {
                      if (result.value) {
                        var url='';
                       // var no="";
                        if(type=='organisasi'){
                            url='<?php echo base_url()?>HR/HapusOrganisasi/'+id;
                          }
                         $.ajax({
                              type: 'POST',
                              url:url,
                             success: function(data) {
                                  swalWithBootstrapButtons.fire("Sukses", "Hapus", "success");
                                  setTimeout(function(){
                                          window.location.href="<?php echo base_url()?>HR/HRStrukturOrganisasi";
                                       
                                  },2000);
                              }
                          });
                      } else if (result.dismiss === Swal.DismissReason.cancel) {
                          swalWithBootstrapButtons.fire("Cancelled", "Transaksi dibatalkan", "error");
                      }
                  });
          
        //});

};
</script>

<script>
    $(document).ready(function(){
        $('#edit-panel').hide();
        <?php if(isset($_GET['edit']) && $_GET['edit']=="yes"){ ?>
        $('#edit-panel').show();
        <?php } ?>
        var getId = function() {
          return (new Date().getTime()) * 1000 + Math.floor(Math.random() * 1001);
        };
        var nodeTemplate = function(data) {
          return '<span class="office"></span>'+
            '<div class="title">'+data.name+'</div>'+
            '<div class="content">'+data.title+'</div>';
        };

        var oc = $('#tree').orgchart({
          'data' : "<?php echo base_url()?>Employee/jsonOrg",
          'nodeTemplate': nodeTemplate,
          //'direction':'l2r'
          'chartClass': 'edit-state',
          //'exportButton': true,
          'exportFilename': 'SportsChart',
          'parentNodeSymbol': 'fa-th-large',
          'createNode': function($node, data) {
            $node[0].id = getId();
          },
          //'draggable': true
        });
        
        oc.$chart.on('nodedrop.orgchart', function(event, extraParams) {
          console.log('draggedNode:' + extraParams.draggedNode.children('.title').text()
            + ', dragZone:' + extraParams.dragZone.children('.title').text()
            + ', dropZone:' + extraParams.dropZone.children('.title').text()
          );
        });
        
        oc.$chartContainer.on('click', '.node', function() {
          var $this = $(this);
          $('#selected-node').val($this.find('.title').text()).data('node', $this);
        });
        oc.$chartContainer.on('click', '.orgchart', function(event) {
          if (!$(event.target).closest('.node').length) {
            $('#selected-node').val('');
          }
        });
        $('input[name="chart-state"]').on('click', function() {
          $('.orgchart').toggleClass('edit-state', this.value !== 'view');
          $('#edit-panel').toggleClass('edit-state', this.value === 'view');
          if ($(this).val() === 'edit') {
            $('.orgchart').find('tr').removeClass('hidden')
              .find('td').removeClass('hidden')
              .find('.node').removeClass('slide-up slide-down slide-right slide-left');
          } else {
            $('#btn-reset').trigger('click');
          }
        });
        
        $('input[name="node-type"]').on('click', function() {
          var $this = $(this);
          if ($this.val() === 'parent') {
            $('#edit-panel').addClass('edit-parent-node');
            $('#new-nodelist').children(':gt(0)').remove();
          } else {
            $('#edit-panel').removeClass('edit-parent-node');
          }
        });
        $('#btn-add-input').on('click', function() {
          $('#new-nodelist').append('<li><input type="text" class="new-node"></li>');
        });
        $('#btn-remove-input').on('click', function() {
          var inputs = $('#new-nodelist').children('li');
          if (inputs.length > 1) {
            inputs.last().remove();
          }
        });
        $('#btn-add-nodes').on('click', function() {
          var $chartContainer = $('#chart-container');
          var nodeVals = [];
          $('#new-nodelist').find('.new-node').each(function(index, item) {
            var validVal = item.value.trim();
            if (validVal.length) {
              nodeVals.push(validVal);
            }
          });
          var $node = $('#selected-node').data('node');
          if (!nodeVals.length) {
            alert('Please input value for new node');
            return;
          }
          var nodeType = $('input[name="node-type"]:checked');
          if (!nodeType.length) {
            alert('Please select a node type');
            return;
          }
          if (nodeType.val() !== 'parent' && !$('.orgchart').length) {
            alert('Please creat the root node firstly when you want to build up the orgchart from the scratch');
            return;
          }
          if (nodeType.val() !== 'parent' && !$node) {
            alert('Please select one node in orgchart');
            return;
          }
          if (nodeType.val() === 'parent') {
            if (!$chartContainer.children('.orgchart').length) {// if the original chart has been deleted
              oc = $chartContainer.orgchart({
                'data' : { 'name': nodeVals[0] },
                'exportButton': true,
                'exportFilename': 'SportsChart',
                'parentNodeSymbol': 'fa-th-large',
                'createNode': function($node, data) {
                  $node[0].id = getId();
                }
              });
              oc.$chart.addClass('view-state');
            } else {
              oc.addParent($chartContainer.find('.node:first'), { 'name': nodeVals[0], 'id': getId() });
            }
          } else if (nodeType.val() === 'siblings') {
            if ($node[0].id === oc.$chart.find('.node:first')[0].id) {
              alert('You are not allowed to directly add sibling nodes to root node');
              return;
            }
            oc.addSiblings($node, nodeVals.map(function (item) {
                return { 'name': item, 'relationship': '110', 'id': getId() };
              }));
          } else {
            var hasChild = $node.parent().attr('colspan') > 0 ? true : false;
            if (!hasChild) {
              var rel = nodeVals.length > 1 ? '110' : '100';
              oc.addChildren($node, nodeVals.map(function (item) {
                  return { 'name': item, 'relationship': rel, 'id': getId() };
                }));
            } else {
              oc.addSiblings($node.closest('tr').siblings('.nodes').find('.node:first'), nodeVals.map(function (item) {
                  return { 'name': item, 'relationship': '110', 'id': getId() };
                }));
            }
          }
        });
        $('#btn-delete-nodes').on('click', function() {
          var $node = $('#selected-node').data('node');
          if (!$node) {
            alert('Please select one node in orgchart');
            return;
          } else if ($node[0] === $('.orgchart').find('.node:first')[0]) {
            if (!window.confirm('Are you sure you want to delete the whole chart?')) {
              return;
            }
          }
          oc.removeNodes($node);
          $('#selected-node').val('').data('node', null);
        });
        $('#btn-reset').on('click', function() {
          $('.orgchart').find('.focused').removeClass('focused');
          $('#selected-node').val('');
          $('#new-nodelist').find('input:first').val('').parent().siblings().remove();
          $('#node-type-panel').find('input').prop('checked', false);
        });
        
        
    });
</script>
         
