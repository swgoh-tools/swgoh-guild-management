@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endpush

@push('scripts')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('table.squad-table').DataTable({
            "paging": false,
            "ordering": true,
            "info": false,
            "order": [[2, "desc"]]
        });
        $('thead').on('click', function () {
            var table = $(this).parent('table');
            if (table.hasClass('toon-table') && !table.hasClass('datatable')) {
                table.DataTable();
            }
        });
    });
</script>
@endpush