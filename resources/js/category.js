jQuery(function (){


    var tableCategories = $('#table-categories').DataTable({
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
            url: "categories"
        },
        "columns": [
            {data: 'name', name:'name'},
            {
                data: 'Actions',
                orderable: false,
                searchable: false,
                // sClass: 'text-center'
            }
        ],
    });







    $('body').on('click', '#getCategoryId', function (e) {
        e.preventDefault();
        var category_id = $(this).data("id");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        Swal.fire({
            title: 'Are you sure to delete this Category?',
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
                    url: "categories" + '/' + category_id,
                    data: {
                        '_token': $('input[name=_token]').val()
                    },

                    success: function (data) {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: 'Category removed',
                            showConfirmButton: false,

                            timer: 1500
                        })
                        $('#table-categories').DataTable().ajax.reload();
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


