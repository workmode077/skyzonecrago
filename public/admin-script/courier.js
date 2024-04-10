$(function() {

    if ($('.dataList').length > 0) {
     
        $('.dataList').DataTable({
            language: { search: '', searchPlaceholder: "Search..." },
            processing: true,
            serverSide: true,
            pageLength: 50,
            "dom": "lifrtp",
            initComplete: function() {},
            'ajax': {
                'url': base_url + '/admin/courier/list',
               'data': function(data) {
                    var type = $('input[name="type"]:checked').val();
                    data.type = type;
                }
            },
            "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                if (aData['deleted_at']) {
                    $('td', nRow).css('background-color', 'rgb(243, 204, 204)');
                }
            },
            columns: [{
                    orderable: true,
                    data: "null",
                    width: '100',
                    autoWidth: false,
                    render: function(data, type, row, meta) {
                     if(row.recordId){
                         return row.recordId;
                     }else{
                         return  1;
                     }
                    }
                },
                {
                    orderable: false,
                    data: "null",
                    width: '300',
                    autoWidth: false,
                    render: function(data, type, full) {
                        if (full.id) {
                            // return " CO-ID-" + full.id ; 
                            return  full.id ; 
                        } else {
                            return "No Data";
                        }
                    }
                },
                
                {
                    orderable: false,
                    data: "null",
                    width: '300',
                    autoWidth: false,
                    render: function(data, type, full) {
                     if(full.customer_name){
                         return full.customer_name;
                     }else{
                         return "No Data"
                     }
                        
                    }
                },
                {
                    orderable: false,
                    data: "null",
                    width: '300',
                    autoWidth: false,
                    render: function(data, type, full) {
                     if(full.product_detail){
                         return full.product_detail;
                     }else{
                         return "No Data"
                     }
                        
                    }
                },
                {
                    orderable: false,
                    data: "null",
                    width: '300',
                    autoWidth: false,
                    render: function(data, type, full) {
                     if(full.product_weight){
                         return full.product_weight;
                     }else{
                         return "No Data"
                     }
                        
                    }
                },
                {
                    orderable: false,
                    data: "null",
                    width: '300',
                    autoWidth: false,
                    render: function(data, type, full) {
                     if(full.from_address){
                         return full.from_address;
                     }else{
                         return "No Data"
                     }
                        
                    }
                },
                {
                    orderable: false,
                    data: "null",
                    width: '300',
                    autoWidth: false,
                    render: function(data, type, full) {
                     if(full.delivery_address){
                         return full.delivery_address;
                     }else{
                         return "No Data"
                     }
                        
                    }
                },
               
                {
                    orderable: false,
                    data: "shipping_method",
                    width: '300',
                    autoWidth: false,
                    render: function(data, type, full) {
                        if (full.shipping_method === "1") {
                            return "Air";
                        } else if (full.shipping_method === "2") {
                            return "Sea";
                        } else if (full.shipping_method === "3") {
                            return "Land";
                        } else {
                            return "No Data";
                        }
                    }
                },
                {
                    orderable: false,
                    data: "shipping_method",
                    width: '300',
                    autoWidth: false,
                    render: function(data, type, full) {
                        if (full.cancel_note != null) {
                            return '<span class="btn btn-sm btn-danger">Order Is Canceled</span>';
                        } else if (full.delivered_note != null) {
                            return '<span class="btn btn-sm btn-primary">Delivered</span>';
                        } else if (full.out_of_delivery_note != null) {
                            return '<span class="btn btn-sm btn-warning">Out of Delivery</span>';
                        } else if (full.at_destination_note != null) {
                            return '<span class="btn btn-sm btn-info">At Destination</span>';
                        } else if (full.on_his_way_note != null) {
                            return '<span class="btn btn-sm btn-secondary">On His Way</span>';
                        } else if (full.booked_note != null) {
                            return '<span class="btn btn-sm btn-success">Booked</span>';
                        } else if (full.pickup_note != null) {
                            return '<span class="btn btn-sm btn-dark">PICKUP</span>';
                        } else {
                            return ''; // Handle other cases if needed
                        }
                    }
                }
                
                
                
           ],
            "columnDefs": [{
                width: '200',
                "targets": 9,
                "visible": true,
                "render": function(data, type, full) {
                
                 return '<td><a class="text-success  btn bg-gray-100" href="' + base_url + '/admin/courier/edit/' + full.encrypt_id + '""><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>'+
                 '<td><a class="btn btn-success" href="' + base_url + '/admin/courier/delivery-status/' + full.encrypt_id + '"">STATUS UPDAATE</a>'+
                    //  '<button type="button" class="text-danger  btn bg-gray-100" onclick="deleteConfirm('+full.id+')"><i class="nav-icon i-Close-Window font-weight-bold"></i></button>'+
                     '</td>';
                 }
            }],
            createdRow: function(row, data, dataIndex) {
                setTimeout(function() {
                    $('.dataList tbody').addClass("m-datatable__body");
                    $('.dataList tbody tr:odd').addClass("m-datatable__row m-datatable__row--odd");
                    $('.dataList tbody tr:even').addClass("m-datatable__row m-datatable__row--even");
                    $('.dataList td').addClass("m-datatable__cell");
                    $('.dataList input').addClass("form-control m-input");
                    $('.dataList tr').css('table-layout', 'fixed');
                });
            }
        });
    }
 });
 
 
 
function toggle_button(id){
 
    if (document.getElementById('status'+id).checked)
        status_val = '1';
    else
        status_val = '0';
    var data = {
        id: id,
        status: status_val
    };
   
    $.ajax({
        type: "post",
        data: data,
        url: base_url + '/admin/courier/status',
        async: true,
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
         if (data.status == 'success') {
             swal(  'Status Updated');
             $('.dataList').DataTable().ajax.reload();
         } else {
             swal('Cancelled', 'Scheme Available');
         }
        }
    });
 }



 function deleteConfirm(id) {
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0CC27E',
        cancelButtonColor: '#FF586B',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        confirmButtonClass: 'btn btn-success mr-5',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false
    }).then(function() {
        $.ajax({
            type: "get",
            url: base_url + '/admin/courier/delete/' + id,
            success: function(data) {
                if (data.status == 'success') {
                    swal('Deleted');
                    $('.dataList').DataTable().ajax.reload();
                } else {
                    swal('Cancelled', 'Scheme Available');
                }
              
            }
        });
    }, function(dismiss) {
        if (dismiss === 'cancel') {
            swal('Cancelled', 'Your file is safe :)', 'error');
        }
    });
}