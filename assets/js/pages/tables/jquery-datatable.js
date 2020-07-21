function refresh() {
    $('.js-basic-claim').DataTable({
        "responsive":true
    });
}
    
function month() {
    const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
      "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];
  var qntYears = 4;
  var selectMonth = $("#yearmonth");
  var currentYear = new Date().getFullYear();
  
  for (var y = 0; y < qntYears; y++){
    let date = new Date(currentYear);
    var yearElem = document.createElement("option");
    yearElem.value = currentYear 
    yearElem.textContent = currentYear;
    
    for (var m = 0; m < 12; m++){
      let monthNum = new Date(currentYear, m).getMonth()
      let month = monthNames[monthNum];
      var monthElem = document.createElement("option");
      monthElem.value = currentYear+'-'+pad((monthNum+1),2); 
      monthElem.textContent = month+'-'+currentYear;
      selectMonth.append(monthElem);
    }
    currentYear--;
  } 
 
}

function year(){
    var currentYear = new Date().getFullYear();
    var qntYears = 4;
    var selectMonth = $("#year");
    for (var y = 0; y < qntYears; y++){
        let date = new Date(currentYear);
        var yearElem = document.createElement("option");
        yearElem.value = currentYear 
        yearElem.textContent = currentYear;
        selectMonth.append(yearElem);
        currentYear--;
    }

}  

// function changeyear(){
//     $.get("<?php echo base_url('Employee/Claim'); ?>", function(data) {
//         $('.js-basic-claim').dataTable().fnDestroy();
//         $('#data-campaign').html(data);
//         refresh();
//     });
// } 


$(function () {
    var table = $('.js-basic-example').DataTable({
        responsive: true
    });
    
    $('.js-basic-claim').DataTable({
        responsive: true,
        retrieve: true,
        columnDefs: [],
        "iDisplayLength": 100,
        "aaSorting": [],

        fnDrawCallback:function(oSettings){
            $(".dataTables_filter").each(function(){
                $(this).append('&nbsp;&nbsp;<a href="'+base_url+'Employee/tambahClaim" class="btn-blue" style="padding:10px"> Ajukan Claim</a>');    
            });

            $(".dataTables_length").prepend('<select id="year" class="form-control"></select>'); 
            year();
            
        }
    });

    $('.js-basic-example2').DataTable({
        responsive: true,
        retrieve: true,
        columnDefs: [],
        "iDisplayLength": 100,
        "aaSorting": [],

        fnDrawCallback:function(oSettings){
            $(".dataTables_filter").each(function(){
                $(this).append('&nbsp;&nbsp;<a href="'+base_url+'Employee/ajukanCuti" class="btn-blue" style="padding:10px"> Ajukan Cuti</a>');    
            });

            $(".dataTables_length").prepend('<select id="yearmonth" class="form-control"></select>'); 
            month();
            var monthNum = new Date().getMonth();
            var currentYear = new Date().getFullYear();
            document.getElementById('yearmonth').value=currentYear+"-"+monthNum;
        }
    });
    

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]

    });
    // new $.fn.dataTable.FixedHeader( table );
});

function absensi(val){
    var tmp = $('#yearmonth').children('option:selected').val();
    if (val > 0) {
        $('#list-data-absensi').DataTable().destroy();
        // $('#list-data-absensi').empty();
    }

    
    // alert(val);
     $('#list-data-absensi').DataTable( {
            "processing": true,
            "serverSide": true,
            "responsive":true,
            "bDestroy":true,
            "ajax":{
                url : base_url+'Employee/attendanceActivityAjax', // json datasource
                type: "post",  // method  , by default get
                data: {
                    yearmonth:tmp
                },
                error: function(){  // error handling
                    $(".list-data-absensi-error").html("");
                    $("#list-data-absensi").append('<tbody class="list-data-absensi-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#list-data-user_processing").css("display","none");
                    
                }
            },
            fnDrawCallback:function(oSettings){

                
                
            }
        } );
        
        $(".dataTables_length").prepend('<select onchange="absensi(this.value)" id="yearmonth" class="form-control w-25"></select>'); 
        month();
        if (val == 0) {
            var monthNum = new Date().getMonth();
            var currentYear = new Date().getFullYear();
            document.getElementById('yearmonth').value=currentYear+"-"+pad((monthNum+1),2);
        }else{
            document.getElementById('yearmonth').value=String(val);
        }
        
    }

    function cutix(val){
    var tmp = $('#yearmonth').children('option:selected').val();
    if (val > 0) {
        $('#list-data-cuti').DataTable().destroy();
        // $('#list-data-cuti').empty();
    }

    function approvalcutix(val){
    var tmp = $('#yearmonth').children('option:selected').val();
    if (val > 0) {
        $('#list-data-cuti').DataTable().destroy();
        // $('#list-data-cuti').empty();
    }

    
    // alert(val);
     $('#list-data-cuti').DataTable( {
            "processing": true,
            "serverSide": true,
            "responsive":true,
            "bDestroy":true,
            "ajax":{
                url : base_url+'Employee/leaverequestAjax', // json datasource
                type: "post",  // method  , by default get
                data: {
                    yearmonth:tmp
                },
                error: function(){  // error handling
                    $(".list-data-cuti-error").html("");
                    $("#list-data-cuti").append('<tbody class="list-data-cuti-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#list-data-user_processing").css("display","none");
                    
                }
            },
            fnDrawCallback:function(oSettings){

                
                
            }
        } );
        
        $(".dataTables_length").prepend('<select onchange="cuti(this.value)" id="yearmonth" class="form-control w-25"></select>'); 
        month();
        if (val == 0) {
            var monthNum = new Date().getMonth();
            var currentYear = new Date().getFullYear();
            document.getElementById('yearmonth').value=currentYear+"-"+pad((monthNum+1),2);
        }else{
            document.getElementById('yearmonth').value=String(val);
        }
        
    }

    $('#approval-cuti').DataTable( {
            "processing": true,
            "serverSide": true,
            "responsive":true,
            "bDestroy":true,
            "ajax":{
                url : base_url+'Employee/leaverequestAjax', // json datasource
                type: "post",  // method  , by default get
                data: {
                    yearmonth:tmp
                },
                error: function(){  // error handling
                    $(".approval-cuti-error").html("");
                    $("#approval-cuti").append('<tbody class="approval-cuti-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#list-data-user_processing").css("display","none");
                    
                }
            },
            fnDrawCallback:function(oSettings){

                
                
            }
        } );
        
        $(".dataTables_length").prepend('<select onchange="cuti(this.value)" id="yearmonth" class="form-control w-25"></select>'); 
        month();
        if (val == 0) {
            var monthNum = new Date().getMonth();
            var currentYear = new Date().getFullYear();
            document.getElementById('yearmonth').value=currentYear+"-"+pad((monthNum+1),2);
        }else{
            document.getElementById('yearmonth').value=String(val);
        }
        
    }

    function klaim(val){
    var tmp = $('#yearmonth').children('option:selected').val();
    if (val > 0) {
        $('#list-data-klaim').DataTable().destroy();
        // $('#list-data-cuti').empty();
    }

    
    // alert(val);
     $('#list-data-klaim').DataTable( {
            "processing": true,
            "serverSide": true,
            "responsive":true,
            "bDestroy":true,
            "ajax":{
                url : base_url+'Employee/claimAjax', // json datasource
                type: "post",  // method  , by default get
                data: {
                    yearmonth:tmp
                },
                error: function(){  // error handling
                    $(".list-data-klaim-error").html("");
                    $("#list-data-klaim").append('<tbody class="list-data-klaim-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#list-data-user_processing").css("display","none");
                    
                }
            },
            fnDrawCallback:function(oSettings){

            }
        } );
        
        $(".dataTables_length").prepend('<select onchange="klaim(this.value)" id="yearmonth" class="form-control w-25"></select>'); 
        month();
        if (val == 0) {
            var monthNum = new Date().getMonth();
            var currentYear = new Date().getFullYear();
            document.getElementById('yearmonth').value=currentYear+"-"+pad((monthNum+1),2);
        }else{
            document.getElementById('yearmonth').value=String(val);
        }
        
    }

    function pelatihan(val){
    var tmp = $('#yearmonth').children('option:selected').val();
    if (val > 0) {
        $('#list-data-pelatihan').DataTable().destroy();
        // $('#list-data-cuti').empty();
    }

    
    // alert(val);
     $('#list-data-pelatihan').DataTable( {
            "processing": true,
            "serverSide": true,
            "responsive":true,
            "bDestroy":true,
            "ajax":{
                url : base_url+'Employee/jenjangPelatihanAjax', // json datasource
                type: "post",  // method  , by default get
                data: {
                    yearmonth:tmp
                },
                error: function(){  // error handling
                    $(".list-data-pelatihan-error").html("");
                    $("#list-data-pelatihan").append('<tbody class="list-data-pelatihan-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#list-data-user_processing").css("display","none");
                    
                }
            },
            fnDrawCallback:function(oSettings){

            }
        } );
        
        $(".dataTables_length").prepend('<select onchange="pelatihan(this.value)" id="yearmonth" class="form-control w-25"></select>'); 
        month();
        if (val == 0) {
            var monthNum = new Date().getMonth();
            var currentYear = new Date().getFullYear();
            document.getElementById('yearmonth').value=currentYear+"-"+pad((monthNum+1),2);
        }else{
            document.getElementById('yearmonth').value=String(val);
        }
        
    }

    function jadwalpelatihan(val){
    var tmp = $('#yearmonth').children('option:selected').val();
    if (val > 0) {
        $('#list-data-jadwal-pelatihan').DataTable().destroy();
        // $('#list-data-cuti').empty();
    }

    
    // alert(val);
     $('#list-data-jadwal-pelatihan').DataTable( {
            "processing": true,
            "serverSide": true,
            "responsive":true,
            "bDestroy":true,
            "ajax":{
                url : base_url+'Employee/jadwalPelatihanAjax', // json datasource
                type: "post",  // method  , by default get
                data: {
                    yearmonth:tmp
                },
                error: function(){  // error handling
                    $(".list-data-jadwal-pelatihan-error").html("");
                    $("#list-data-jadwal-pelatihan").append('<tbody class="list-data-jadwal-pelatihan-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#list-data-user_processing").css("display","none");
                    
                }
            },
            fnDrawCallback:function(oSettings){

            }
        } );
        
        $(".dataTables_length").prepend('<select onchange="jadwalpelatihan(this.value)" id="yearmonth" class="form-control w-25"></select>'); 
        month();
        if (val == 0) {
            var monthNum = new Date().getMonth();
            var currentYear = new Date().getFullYear();
            document.getElementById('yearmonth').value=currentYear+"-"+pad((monthNum+1),2);
        }else{
            document.getElementById('yearmonth').value=String(val);
        }
        
    }

    function search_bymonth(val){
        absensi(val);
        //cuti(val);
        //approvalcuti(val)
        klaim(val);
        pelatihan(val);
        jadwalpelatihan(val);
    }

    function pad(num, size) {
        var s = num+"";
        while (s.length < size) s = "0" + s;
        return s;
    }

/* Formatting function for row details - modify as you need */
function format ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>Full name:</td>'+
            '<td>'+d.name+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Extension number:</td>'+
            '<td>'+d.extn+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Extra info:</td>'+
            '<td>And any further details here (images etc)...</td>'+
        '</tr>'+
    '</table>';
}
 
$(document).ready(function() {
    var table = $('#example').DataTable( {
        "ajax": "assets/data/objects.txt",
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            { "data": "name" },
            { "data": "position" },
            { "data": "office" },
            { "data": "salary" }
        ],
        "order": [[1, 'asc']]
    } );
     
    // Add event listener for opening and closing details
    $('#example tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
} );

// Add row into table
var addRowTable = {
    options: {
        addButton: "#addToTable",
        table: "#addrowExample",
        dialog: {}
    },
    initialize: function() {
        this.setVars().build().events()
    },
    setVars: function() {
        return this.$table = $(this.options.table), this.$addButton = $(this.options.addButton), this.dialog = {}, this.dialog.$wrapper = $(this.options.dialog.wrapper), this.dialog.$cancel = $(this.options.dialog.cancelButton), this.dialog.$confirm = $(this.options.dialog.confirmButton), this
    },
    build: function() {
        return this.datatable = this.$table.DataTable({
            aoColumns: [null, null, null, {
                bSortable: !1
            }],
        }), window.dt = this.datatable, this
    },
    events: function() {
        var object = this;
        return this.$table.on("click", "button.button-save", function(e) {
            e.preventDefault(), object.rowSave($(this).closest("tr"))
        }).on("click", "button.button-discard", function(e) {
            e.preventDefault(), object.rowCancel($(this).closest("tr"))
        }).on("click", "button.button-edit", function(e) {
            e.preventDefault(), object.rowEdit($(this).closest("tr"))
        }).on("click", "button.button-remove", function(e) {
            e.preventDefault();
            var $row = $(this).closest("tr");
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#dc3545",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                object.rowRemove($row)
                swal("Deleted!", "Your imaginary file has been deleted.", "success");
            });
        }), this.$addButton.on("click", function(e) {
            e.preventDefault(), object.rowAdd()
        }), this.dialog.$cancel.on("click", function(e) {
            e.preventDefault(), $.magnificPopup.close()
        }), this
    },
    rowAdd: function() {
        this.$addButton.attr({
            disabled: "disabled"
        });
        var actions, data, $row;
        actions = ['<button class="btn btn-sm btn-icon btn-pure btn-default on-editing button-save" data-toggle="tooltip" data-original-title="Save" hidden><i class="icon-drawer" aria-hidden="true"></i></button>', '<button class="btn btn-sm btn-icon btn-pure btn-default on-editing button-discard" data-toggle="tooltip" data-original-title="Discard" hidden><i class="icon-close" aria-hidden="true"></i></button>', '<button class="btn btn-sm btn-icon btn-pure btn-default on-default button-edit" data-toggle="tooltip" data-original-title="Edit"><i class="icon-pencil" aria-hidden="true"></i></button>', '<button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove" data-toggle="tooltip" data-original-title="Remove"><i class="icon-trash" aria-hidden="true"></i></button>'].join(" "), data = this.datatable.row.add(["", "", "", actions]), ($row = this.datatable.row(data[0]).nodes().to$()).addClass("adding").find("td:last").addClass("actions"), this.rowEdit($row), this.datatable.order([0, "asc"]).draw()
    },
    rowCancel: function($row) {
        var $actions, data;
        $row.hasClass("adding") ? this.rowRemove($row) : (($actions = $row.find("td.actions")).find(".button-discard").tooltip("hide"), $actions.get(0) && this.rowSetActionsDefault($row), data = this.datatable.row($row.get(0)).data(), this.datatable.row($row.get(0)).data(data), this.handleTooltip($row), this.datatable.draw())
    },
    rowEdit: function($row) {
        var data, object = this;
        data = this.datatable.row($row.get(0)).data(), $row.children("td").each(function(i) {
            var $this = $(this);
            $this.hasClass("actions") ? object.rowSetActionsEditing($row) : $this.html('<input type="text" class="form-control input-block" value="' + data[i] + '"/>')
        })
    },
    rowSave: function($row) {
        var $actions, object = this,
            values = [];
        $row.hasClass("adding") && (this.$addButton.removeAttr("disabled"), $row.removeClass("adding")), values = $row.find("td").map(function() {
            var $this = $(this);
            return $this.hasClass("actions") ? (object.rowSetActionsDefault($row), object.datatable.cell(this).data()) : $.trim($this.find("input").val())
        }), ($actions = $row.find("td.actions")).find(".button-save").tooltip("hide"), $actions.get(0) && this.rowSetActionsDefault($row), this.datatable.row($row.get(0)).data(values), this.handleTooltip($row), this.datatable.draw()
    },
    rowRemove: function($row) {
        $row.hasClass("adding") && this.$addButton.removeAttr("disabled"), this.datatable.row($row.get(0)).remove().draw()
    },
    rowSetActionsEditing: function($row) {
        $row.find(".on-editing").removeAttr("hidden"), $row.find(".on-default").attr("hidden", !0)
    },
    rowSetActionsDefault: function($row) {
        $row.find(".on-editing").attr("hidden", !0), $row.find(".on-default").removeAttr("hidden")
    },
    handleTooltip: function($row) {
        $row.find('[data-toggle="tooltip"]').tooltip()
    }
};
$(function() {
    addRowTable.initialize()
})
