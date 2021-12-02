jQuery(function (){


    var tableGoals = $('#table-goals').DataTable({
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
            url: "goals"
        },
        "columns": [
            {data: 'name', name:'name'},
            {data: 'balance', name:'balance'},
            {data: 'amount', name:'amount'},
            {data: 'account_name', name:'accounts.name'},
            {data: 'user_name', name:'users.name'},
            {
                data: 'Actions',
                orderable: false,
                searchable: false,
                // sClass: 'text-center'
            }
        ],


    });


    $('body').on('click', '#getGoalId', function (e) {
        e.preventDefault();
        var goal_id = $(this).data("id");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        Swal.fire({
            title: 'Are you sure to delete this Goal?',
            text: "You will not be able to recover this information!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#5851d8',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Eliminate it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "DELETE",
                    url: "goals" + '/' + goal_id,
                    data: {
                        '_token': $('input[name=_token]').val()
                    },

                    success: function (data) {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: 'Goal removed',
                            showConfirmButton: false,

                            timer: 1500
                        })
                        $('#table-goals').DataTable().ajax.reload();
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


