<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "hideDuration": "10000",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    @if(Session('success'))
        toastr.success('{{ session('success') }}');
    @endif

    @if(Session('info'))
        toastr.info('{{ session('info') }}');
    @endif

    @if(Session('warning'))
        toastr.warning('{{ session('warning') }}');
    @endif

    @if(Session('error'))
        toastr.error('{{ session('error') }}');
    @endif

</script>
