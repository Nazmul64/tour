<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <link rel="icon" type="{{ asset('image/png" href="uploads/favicon.png') }}">

    <title>Admin Panel</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Vendor Styles -->
    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/font_awesome_5_free.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/fontawesome-iconpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap4-toggle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/air-datepicker.min.css') }}">
    
    <!-- Theme & Custom Styles -->
    <link rel="stylesheet" href="{{ asset('dist/css/duotone-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}">
    

    <!-- Core JS Libraries -->
    <script src="{{ asset('dist/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/popper.min.js') }}"></script>
    <script src="{{ asset('dist/js/moment.min.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.nicescroll.min.js') }}"></script>
    
    <!-- UI Framework & Utilities -->
    <script src="{{ asset('dist/js/stisla.js') }}"></script>
    <script src="{{ asset('dist/js/tooltip.js') }}"></script>
    <script src="{{ asset('dist/js/jscolor.js') }}"></script>
    <script src="{{ asset('dist/js/bootstrap4-toggle.min.js') }}"></script>
    
    <!-- Plugins -->
    <script src="{{ asset('dist/js/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dist/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dist/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('dist/js/fontawesome-iconpicker.js') }}"></script>
    <script src="{{ asset('dist/js/air-datepicker.min.js') }}"></script>
    
    <!-- Rich Text Editor -->
    <script src="{{ asset('dist/tinymce/tinymce.min.js') }}"></script>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    
    @if (Session::has('success') || Session::has('error'))
    @php
        $successMessage = Session::get('success');
        $errorMessage = Session::get('error');
    @endphp
    
    <script>
    $(document).ready(function () {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-top-right",
            timeOut: 5000
        };
    
        @if ($errorMessage)
            toastr.error("{{ $errorMessage }}");
        @endif
    
        @if ($successMessage)
            toastr.success("{{ $successMessage }}");
        @endif
    });
    </script>
    @endif
</head>

<body>
<div id="app">
    <div class="main-wrapper">
        @yield('main_content')
    </div>
</div>

<script src="{{ asset('dist/js/scripts.js') }}"></script>
<script src="{{ asset('dist/js/custom.js') }}"></script>
{{--  
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            iziToast.show({
                message: '{{ $error }}',
                color: 'red',
                position: 'topRight',
            });
        </script>
    @endforeach
@endif

@if (session('success'))
    <script>
        iziToast.show({
            message: '{{ session("success") }}',
            color: 'red',
            position: 'topRight',
        });
    </script>
@endif

@if (session('error'))
    <script>
        iziToast.show({
            message: '{{ session("error") }}',
            color: 'red',
            position: 'topRight',
        });
    </script> 
@endif --}}

</body>
</html>