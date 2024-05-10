<!-- BEGIN: Theme CSS-->
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

@vite([
  'resources/assets/vendor/fonts/boxicons.scss',
  'resources/assets/vendor/fonts/fontawesome.scss',
  'resources/assets/vendor/fonts/flag-icons.scss'
])
<!-- Core CSS -->
@vite([
  'resources/assets/vendor/scss' . $configData['rtlSupport'] . '/core' . ($configData['style'] !== 'light' ? '-' . $configData['style'] : '') . '.scss',
  'resources/assets/vendor/scss' . $configData['rtlSupport'] . '/' . $configData['theme'] . ($configData['style'] !== 'light' ? '-' . $configData['style'] : '') . '.scss',
  'resources/assets/css/demo.css',
])

@vite([
  'resources/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.scss',
  'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss',
  'resources/assets/vendor/libs/typeahead-js/typeahead.scss'
])

<!-- Vendor Styles -->
@yield('vendor-style')


<!-- Page Styles -->
@yield('page-style')
