<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiRapat - @yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- TinyMCE API  -->
    <script src="https://cdn.tiny.cloud/1/me74ez3eo24diljzh2ctwuraec8x74gqi2xa7pk13u6v9thm/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>

    <style>
        /* Single Selection Styles */
        .select2-container--default .select2-selection--single {
            background-color: rgb(239 246 255) !important;
            border: 1px solid #e2e8f0 !important;
            border-radius: 0.375rem !important;
            height: 42px !important;
            padding: 0.5rem 0.75rem !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 24px !important;
            color: #374151 !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 40px !important;
            right: 10px !important;
        }

        /* Multiple Selection Styles */
        .select2-container--default .select2-selection--multiple {
            background-color: rgb(239 246 255) !important;
            border: 1px solid #e2e8f0 !important;
            border-radius: 0.375rem !important;
            min-height: 42px !important;
            padding: 0.25rem 0.5rem !important;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            margin: 0.25rem !important;
            padding: 0.25rem 0.5rem !important;
            background-color: #fff !important;
            border: 1px solid #e2e8f0 !important;
            border-radius: 0.25rem !important;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: #374151 !important;
            margin-right: 0.25rem !important;
        }

        /* Dropdown Styles */
        .select2-dropdown {
            border: 1px solid #e2e8f0 !important;
            border-radius: 0.375rem !important;
        }

        .select2-search--dropdown .select2-search__field {
            padding: 0.5rem !important;
            border: 1px solid #e2e8f0 !important;
            border-radius: 0.375rem !important;
        }
    </style>

    <script>
        tinymce.init({
            selector: '.tinymce-editor',
            plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code help wordcount',
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
            height: 400,
            menubar: false,
            branding: false,
            statusbar: false
        });
    </script>
</head>

<body class="bg-gray-100">
    <div class="flex">
        @include('layouts.sidebar')

        <div class="flex-1">
            @include('layouts.topbar')
            <main class="p-6">


                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>