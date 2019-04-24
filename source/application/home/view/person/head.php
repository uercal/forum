<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A complete example of Cropper.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, jQuery plugin, image cropping, image crop, image move, image zoom, image rotate, image scale, front-end, frontend, web development">
    <meta name="author" content="Fengyuan Chen">
    <title>Cropper</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/head/cropper.min.css">
    <link rel="stylesheet" href="assets/head/head.css">
</head>

<body>
    <div id="crop-avatar" class="container">
        <!-- Current avatar-->
        <!-- Cropping modal-->
        <div id="avatar-modal">
            <div class="modal-dialog modal-lg">
                <form action="/changeHead" enctype="multipart/form-data" method="post" class="avatar-form">
                    <div class="modal-body">
                        <div class="avatar-body">
                            <div class="avatar-upload">
                                <input type="hidden" name="avatar_src" class="avatar-src">
                                <input type="hidden" name="avatar_data" class="avatar-data">
                                <label for="avatarInput">Local upload</label>
                                <input id="avatarInput" type="file" name="avatar_file" class="avatar-input">
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="avatar-wrapper"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div aria-label="Loading" role="img" tabindex="-1" class="loading"></div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="assets/head/cropper.min.js"></script>
<script src="assets/head/head.js"></script>
<style>
    body {
        overflow-y: hidden;
        width: 440px;

    }

    .modal-body {
        margin: 0 auto;
        width: 500px;
        height: 500px;
    }
</style>