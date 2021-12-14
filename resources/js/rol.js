jQuery(function (){

    var tableAccounts = $('#table-roles').DataTable({
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
            url: "roles"
        },
        "columns": [
            {data: 'name', name:'name'},
            {
                data: 'Actions',
                orderable: false,
                searchable: false,
                // sClass: 'text-center'
            }
        ]

    });

     //// Apply the search
     tableAccounts.columns().every(function (index) {
        $('#table-roles thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
            table.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
        });
    });

    $('body').on('click', '#getRolId', function (e) {
        e.preventDefault();
        var rol_id = $(this).data("id");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        Swal.fire({
            title: 'Estas seguro de eliminar este Rol?',
            text: "No vas a poder recuperar esta informacion!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminalo!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "DELETE",
                    url: "accounts" + '/' + account_id,
                    data: {
                        '_token': $('input[name=_token]').val()
                    },

                    success: function (data) {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: 'Cuenta eliminada',
                            showConfirmButton: false,

                            timer: 1500
                        })
                        $('#table-roles').DataTable().ajax.reload();
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


