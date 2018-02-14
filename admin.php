<?php

if (isset($_FILES['userfile']['name']) && !empty($_FILES['userfile']['name'])) {
    if ($_FILES['userfile']['error'] == UPLOAD_ERR_OK && move_uploaded_file($_FILES["userfile"]["tmp_name"], '../forms/tests/' . $_FILES["userfile"]["name"])) {
        $tess = file_get_contents( '../forms/tests/' . $_FILES["userfile"]["name"]);
        $test = json_decode($tess, true);
        if ($test[0]['crc'] == "tipikinatestsonlycanberead") {
            echo "<p style='color:blue'> Файл загружен</p>";
        } else {
            echo "<p style='color:red'> Файл не загружен. Неверный формат тестового файла</p>";
        }
    }
}

?>

<form method="post" action="" enctype="multipart/form-data">
    Файл <input type="file" name="userfile"><br/>
    <input type="submit" value="Отправить">
</form>
