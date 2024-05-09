<?php
if ($_FILES['img']) {
    $archivo = $_FILES['img'];
    $nombre = $archivo['name'];
    $tipo = $archivo['type'];
    $ruta_temporal = $archivo['tmp_name'];

    // Verificamos si el tipo de archivo es una imagen (JPEG o PNG) o un documento de Word (DOCX)
    if ($tipo == "image/jpeg" || $tipo == "image/png" || $tipo == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {
        if (!is_dir('archivos')) {
            mkdir('archivos', 0777);
        }

        // Movemos el archivo a la carpeta de archivos
        move_uploaded_file($ruta_temporal, 'archivos/' . $nombre);
        echo "<h2>El archivo se ha cargado con éxito.</h2>";
    } else {
        echo "<h2>El archivo no corresponde al formato solicitado (JPEG, PNG, o DOCX).</h2>";
    }
}
