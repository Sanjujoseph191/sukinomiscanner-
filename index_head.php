<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Phoenix</title>
    <link rel="apple-touch-icon" sizes="180x180" href="dist/assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="dist/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="dist/assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="dist/assets/img/favicons/favicon.ico">
    <link rel="manifest" href="dist/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="dist/assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="dist/vendors/simplebar/simplebar.min.js"></script>
    <script src="dist/assets/js/config.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="dist/vendors/simplebar/simplebar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="dist/unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="dist/assets/css/theme-rtl.min.css" type="text/css" rel="stylesheet" id="style-rtl">
    <link href="dist/assets/css/theme.min.css" type="text/css" rel="stylesheet" id="style-default">
    <link href="dist/assets/css/user-rtl.min.css" type="text/css" rel="stylesheet" id="user-style-rtl">
    <link href="dist/assets/css/user.min.css" type="text/css" rel="stylesheet" id="user-style-default">
    <link href="dist/plugins/sweetalert2.min.css" rel="stylesheet" />
    <script src="dist/plugins/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/styles/choices.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/scripts/choices.min.js"></script>
    <script>
        var phoenixIsRTL = window.config.config.phoenixIsRTL;
        if (phoenixIsRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
    <link href="dist/vendors/leaflet/leaflet.css" rel="stylesheet">
    <link href="dist/vendors/leaflet.markercluster/MarkerCluster.css" rel="stylesheet">
    <link href="dist/vendors/leaflet.markercluster/MarkerCluster.Default.css" rel="stylesheet">
</head>