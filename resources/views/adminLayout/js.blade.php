<script>
    $(document).ready(function() {
     //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
    theme: 'bootstrap4'
    })
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
    $('#example2').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{url('price.index')}}",
            columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'email' },
            { data: 'mobile' },
            { data: 'branch' },
            ]
        });
    });
</script>
