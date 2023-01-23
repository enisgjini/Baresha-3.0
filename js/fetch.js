$(document).ready(function () {

    fetch_data();

    function fetch_data() {
        var dataTables = $('#employeeList').DataTable({
            responsive: true,
            search: {
                return: true,
            },
            dom: 'Bfrtip',
            buttons: [{
                extend: 'pdfHtml5',
                text: '<i class="fi fi-rr-file-pdf fa-lg"></i>&nbsp;&nbsp; PDF',
                titleAttr: 'Eksporto tabelen ne formatin PDF',
                className: 'btn btn-light border shadow-2 me-2'
            }, {
                extend: 'copyHtml5',
                text: '<i class="fi fi-rr-copy fa-lg"></i>&nbsp;&nbsp; Kopjo',
                titleAttr: 'Kopjo tabelen ne formatin Clipboard',
                className: 'btn btn-light border shadow-2 me-2'
            }, {
                extend: 'excelHtml5',
                text: '<i class="fi fi-rr-file-excel fa-lg"></i>&nbsp;&nbsp; Excel',
                titleAttr: 'Eksporto tabelen ne formatin CSV',
                className: 'btn btn-light border shadow-2 me-2'
            }, {
                extend: 'print',
                text: '<i class="fi fi-rr-print fa-lg"></i>&nbsp;&nbsp; Printo',
                titleAttr: 'Printo tabelën',
                className: 'btn btn-light border shadow-2 me-2'
            }, {
                text: '<i class="fi fi-rr-badge-dollar fa-lg"></i>&nbsp;&nbsp; Pagesë',
                className: 'btn btn-light border shadow-2 me-2',
                action: function (e, node, config) {
                    $('#pagesmodal').modal('show')
                }
            },
            {
                text: '<i class="fi fi-rr-add-document fa-lg"></i>&nbsp;&nbsp; Faturë e re',
                className: 'btn btn-light border shadow-2 me-2',
                action: function (e, node, config) {
                    $('#exampleModal').modal('show')
                }
            }],
            initComplete: function () {
                var btns = $('.dt-buttons');
                btns.addClass('');
                btns.removeClass('dt-buttons btn-group');

            },
            fixedHeader: true,
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.1/i18n/sq.json",
            },





            "processing": false,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "api/fetch.php",
                type: "POST"
            }
        });
        setInterval(function () {
            dataTables.ajax.reload(null, false); // user paging is not reset on reload
        }, 5000);
    }

    $(document).on('click', '.delete', function () {
        var id = $(this).attr("id");
        if (confirm("A jeni i sigurt që doni ta hiqni këtë?")) {
            $.ajax({
                url: "/api/deletefat.php",
                method: "POST",
                data: { id: id },
                success: function (data) {
                    $('#alert_message').html('<div class="alert alert-success">' + data + '</div>');
                    $('#user_data').DataTable().destroy();
                    fetch_data();
                }
            });
            setInterval(function () {
                $('#alert_message').html('');
            }, 5000);
        }
    });
});