jQuery(function (){

    flatpickr("#transaction_date", {});
    var tableTransactions = $('#table-transactions').DataTable({
        dom: 'lBfrtip',
        buttons: [{
            extend: 'collection',
            className: "btn-primary",
            text: '<i class="fas fa-file-export"></i> Exportar',
            buttons:
            [
                {extend: 'excelHtml5', text: '<i class="far fa-file-excel"></i> Excel',  titleAttr: 'Excel'},
                {extend: 'pdfHtml5', text:'<i class="far fa-file-pdf"></i> PDF', titleAttr: 'PDF'},
                ,
                'colvis'

            ],

          }],
        responsive: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        orderCellsTop: true,
        fixedHeader: true,

        "columnDefs": [{
            "targets": -1,
            "data": null,
        }],
        ajax: {
            url: "transactions"
        },
        "columns": [
            {data: 'name', name:'name'},
            {data: 'amount', name:'amount'},
            {data: 'reference', name:'reference'},
            {data: 'transaction_category_name', name:'transaction_category_name'},
            {data: 'category_name', name:'category_name'},
            {data: 'account_name', name:'account_name'},
            {data: 'user_name', name:'user_name'},
            {
                data: 'Actions',
                orderable: false,
                searchable: false,
                // sClass: 'text-center'
            }
        ],



    });

    $('body').on('click', '#getTransactionId', function (e) {
        e.preventDefault();
        var driver_id = $(this).data("id");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        Swal.fire({
            title: 'Estas seguro de eliminar esta transaccion?',
            text: "No vas a poder recuperar esta informacion!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#5851d8',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminalo!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "DELETE",
                    url: "drivers" + '/' + driver_id,
                    data: {
                        '_token': $('input[name=_token]').val()
                    },

                    success: function (data) {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: 'Transaction eliminado',
                            showConfirmButton: false,

                            timer: 1500
                        })
                        $('#table-transactions').DataTable().ajax.reload();
                    },
                    error: function (data) {

                        console.log('Error:', data);
                    }
                });
            } else {
                return false;
            }
        })
    });

});


