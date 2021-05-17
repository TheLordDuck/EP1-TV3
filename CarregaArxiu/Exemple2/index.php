<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Exemple Drag and Drop per càrrega d'arxius al servidor</title>
    <link href="upload.css" type="text/css" rel="stylesheet">
</head>
<body>

    <div class="wrapper">

        <h1>Exemple Drag and Drop per càrrega d'arxius al servidor amb JavaScript y PHP</h1>

        <div id="uploader">
            <div>Arrossega i deixa anar els arxius aquí<br><br>Mida màxima de <?php echo ini_get("upload_max_filesize")."Bytes";?></div>
        </div>

        <div id="filesList"></div>

    </div>

</body>
</html>

<script src="upload.js"></script>
