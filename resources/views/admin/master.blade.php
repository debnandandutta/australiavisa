<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Admin Panel</title>
    <meta name="description" content="Desh Insurance Admin">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{asset('/admin')}}/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/admin')}}/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('/admin')}}/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{asset('/admin')}}/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{asset('/admin')}}/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="{{asset('/admin')}}/vendors/jqvmap/dist/jqvmap.min.css">
    <script src="{{asset('/admin')}}/assets/tinymce/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="{{asset('/admin')}}/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('/admin')}}/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">




    <link rel="stylesheet" href="{{asset('/admin')}}/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


<!-- Left Panel -->

<!-- /#left-panel -->
@include('admin.includes.leftpanel')
<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
        @include('admin.includes.header')
        @yield('breadcrumb')
        @yield('content')
</div><!-- /#right-panel -->

<!-- Right Panel -->

<script src="{{asset('/admin')}}/vendors/jquery/dist/jquery.min.js"></script>
<script src="{{asset('/admin')}}/vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="{{asset('/admin')}}/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="{{asset('/admin')}}/assets/js/main.js"></script>

<script src="{{asset('/admin')}}/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('/admin')}}/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('/admin')}}/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('/admin')}}/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('/admin')}}/vendors/jszip/dist/jszip.min.js"></script>
<script src="{{asset('/admin')}}/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="{{asset('/admin')}}/vendors/pdfmake/build/vfs_fonts.js"></script>
<script src="{{asset('/admin')}}/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('/admin')}}/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('/admin')}}/vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="{{asset('/admin')}}/assets/js/init-scripts/data-table/datatables-init.js"></script>


<script src="{{asset('/admin')}}/vendors/chart.js/dist/Chart.bundle.min.js"></script>
<script src="{{asset('/admin')}}/assets/js/dashboard.js"></script>
<script src="{{asset('/admin')}}/assets/js/widgets.js"></script>
<script src="{{asset('/admin')}}/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="{{asset('/admin')}}/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<script src="{{asset('/admin')}}/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script>

    jQuery(document).ready(function ($) {

        $('#edit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var getEditTitle = button.data('title');
            var getEditShortTitle = button.data('short');
            var getParent = button.data('parent');
            var getTop = button.data('top');
            var getLeft = button.data('left');
            var getFooter = button.data('footer');
            var getEditId = button.data('editid');

            var getCode = button.data('code');
            var getSymbol = button.data('symbol');
            var getGeneral = button.data('general');
            var getStandard = button.data('standard');
            var getExpress = button.data('express');
            var getInstant = button.data('instant');
            var getStatus= button.data('status');


            var modal= $(this)
            modal.find('.modal-body #modal-name').val(getEditTitle);
            modal.find('.modal-body #modal-short').val(getEditShortTitle);
            modal.find('.modal-body #modal-parent').val(getParent);
            modal.find('.modal-body #modal-top').val(getTop);
            modal.find('.modal-body #modal-left').val(getLeft);
            modal.find('.modal-body #modal-footer').val(getFooter);
            modal.find('.modal-body #editid').val(getEditId);

            modal.find('.modal-body #modal-code').val(getCode);
            modal.find('.modal-body #modal-symbol').val(getSymbol);
            modal.find('.modal-body #modal-general').val(getGeneral);
            modal.find('.modal-body #modal-standard').val(getStandard);
            modal.find('.modal-body #modal-express').val(getExpress);
            modal.find('.modal-body #modal-instant').val(getInstant);





        })

    });
    jQuery(document).ready(function ($) {

        $('#deleterule').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var getEditTitle = button.data('title');
            var getEditId = button.data('empid');
            var getRef = button.data('ref');


            var modal= $(this)
            modal.find('.modal-body #modal-name').val(getEditTitle);
            modal.find('.modal-body #empId').val(getEditId);
            modal.find('.modal-body #ref').val(getRef);
            modal.find('.modal-body #name').val(getEditTitle);
            $('#modal-name').val(getEditTitle);

        })

        // on modal hide

    });
    jQuery(document).ready(function ($) {
        $("#display_type").change(function(){
            $.ajax({
                url: "{{ route('admin.insurance.get_by_category_display') }}?display_type=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('#city').html(data.html);
                }
            });
        });


    });


    tinymce.init({
        selector: 'textarea',
        height:400,
        plugins: [
            'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'save table directionality emoticons template paste'
        ],

        file_picker_types:'file image media',
        images_upload_url: '{{url('/')}}/uploader.php',

        automatic_uploads : false,
        toolbar: [
            'undo redo | styleselect | bold italic | link image',
            'alignleft aligncenter alignright numlist bullist'
        ],
        relative_urls:false,
        remove_script_host:false,
        document_base_url:'{{url('/')}}',
        images_upload_handler : function(blobInfo, success, failure) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '{{url('/')}}/uploader.php');

            xhr.onload = function() {
                var json;

                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.file_path != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                success(json.file_path);
            };

            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        },
    });


</script>

</body>

</html>
