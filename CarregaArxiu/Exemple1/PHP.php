<?php
// En versions de PHP anteriors a 4.1.0, cal usar $HTTP_POST_FILES 
// en lloc de $_FILES.

$uploaddir = 'uploads/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "Arxiu carregat correctament en carpeta uploads.\n";
} else {
    echo "S'ha produit un error en la càrrega \n";
}

echo utf8_encode('Més informació : ');
print_r($_FILES);

print "</pre>";

?> 