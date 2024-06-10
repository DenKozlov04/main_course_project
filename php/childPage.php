<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/childPage.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='../JS/OpenInfoPopUp.js'></script>
    <script src="../JS/sweetalert.min.js"></script>
    <title>profile</title>
</head>
<script>
    const urlParams = new URLSearchParams(window.location.search);
    const alertMessage = urlParams.get('alert');

    if (alertMessage) {
        swal({
            title: 'Error!',
            text: decodeURIComponent(alertMessage),
            icon: 'error',
            button: 'OK'
        });
    }
</script>
<body>

    <div class='rectangleHeader'>
        <div class='logorectangle'>
            <a>AVIA</a>
        </div>
        <div class='greyRect1'></div>
        <div class='rectangleHeader2'></div>
        <div class='greyRect1'></div>
        <div class='ButtonRect2'>

        </div>
    </div>
</body>
</html>