<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Styles -->
        <link href="{{ URL::asset('css/app.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::asset('css/control_panel/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="{{ URL::asset('css/control_panel/plugins/datatables/dataTables.bootstrap.css')}}">
        
        <link rel="stylesheet" href="{{ URL::asset('css/control_panel/dist/css/AdminLTE.min.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('css/control_panel/dist/css/skins/skin-blue.min.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('css/control_panel/plugins/iCheck/all.css')}}">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="{{ URL::asset('resources/assets/css/developer.css')}}">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="{{ URL::asset('css/control_panel/plugins/select2/select2.min.css')}}">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>



        <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script> 
        <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" rel="stylesheet">
        <script src="http://demo.expertphp.in/js/jquery.validate.min.js"></script>
        <script>
            $( function() {
                $( "#pubdate" ).datepicker({ dateFormat: 'yy-mm-dd', changeYear: true , yearRange: '1970:2050', changeMonth: true});
                $( "#expiredate" ).datepicker({ dateFormat: 'yy-mm-dd', changeYear: true , yearRange: '1970:2050', changeMonth: true });
                $( "#date_of_birth" ).datepicker({ dateFormat: 'yy-mm-dd',maxDate: '0',changeYear: true , yearRange: '1970:2050', changeMonth: true });
                $( "#buyer_dob" ).datepicker({ dateFormat: 'yy-mm-dd',maxDate: '0',changeYear: true , yearRange: '1970:2050' , changeMonth: true });
                $( "#dl_expire" ).datepicker({ dateFormat: 'yy-mm-dd', changeYear: true, yearRange: '1970:2050', changeMonth: true });
                $( "#pdate" ).datepicker({ dateFormat: 'yy-mm-dd', changeYear: true , yearRange: '1970:2050', changeMonth: true});
                $( "#dmv_date" ).datepicker({ dateFormat: 'yy-mm-dd', changeYear: true , yearRange: '1970:2050', changeMonth: true });
            });
            
        </script>
        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
                ]); ?>
        </script>
        <style type="text/css">
            .modal-body
            {
                height: auto;
            }
            .ui-datepicker-title {
                color: #000;
            }
            .ui-resizable{
        width: 50% !important;
        left: 0 !important;
        right: 0;
        margin: auto;
    }
    .ui-widget-overlay {
    background: #000 !important;
    opacity: .7 !important;
    filter: Alpha(Opacity=50);
}
        </style>
    </head>
    <?php if(Request::PATH()=='control_panel'){ ?>
    <body class="login-page">
    <?php }else{ ?>
    <body class="hold-transition skin-blue sidebar-mini">
    <?php } ?>
        <div class="wrapper">
            @include('control_panel.includes.denied')
            @if (Auth::guard('control_panels')->user())  
            @include('control_panel.includes.header')
            @include('control_panel.includes.sidebar')
            @endif 
            @yield('content')
            @if (Auth::guard('control_panels')->user())
            @include('control_panel.includes.footer')  
            @endif 
        </div>
        <!--<script src="{{ URL::asset('css/control_panel/plugins/jQuery/jquery-2.2.3.min.js')}}"></script> -->
        <script src="{{ URL::asset('css/control_panel/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{ URL::asset('css/control_panel/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{ URL::asset('css/control_panel/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{ URL::asset('css/control_panel/dist/js/app.min.js')}}"></script>
        <script src="{{ URL::asset('css/control_panel/plugins/select2/select2.full.min.js')}}"></script>

        <script src="{{ URL::asset('css/control_panel/plugins/iCheck/icheck.min.js')}}"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('.main').click(function() {
                    var checked = $(this).prop('checked');
                    var val = $(this).val();
                    $('.module'+val).prop('checked', checked);
                });
            })
                            
        </script>
        <script> 
            $(function () {
                $("#example1").DataTable();
                $("#example3").DataTable({
                    "ordering": false,
                    "pageLength": 25
                });

                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": false,
                    "info": true,
                    "autoWidth": true,
                    "pageLength": 25
                });
            
                //Initialize Select2 Elements
                $(".select2").select2();
                $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                  checkboxClass: 'icheckbox_flat-green',
                  radioClass   : 'iradio_flat-green'
                })
            });
        </script>
        @stack('scripts')
    </body>
</html>