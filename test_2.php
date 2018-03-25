<?php


if(!isset($_GET['name']) || !file_exists('./tests/' . $_GET['name'])){
    header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
    die('Invalid test name');
}
/*загрузка json с тестом*/
else {
    $tess = file_get_contents('./tests/' . $_GET['name']);
    $test = json_decode($tess, true);

    if (isset($test[0]['crc']) && $test[0]['crc'] == "tipikinatestsonlycanberead") {

        if (!empty($_POST)) {
            $result = 0;
            for ($i = 0; $i < count($test); $i++) {
                //echo '<pre>';
                //print_r($test[$i]);
               // print_r($_POST[$i]);
                if ($_POST[$i] == $test[$i]['true']) {
                    $result += 1;
                }
            }
            $a = count($test)-$result;
            if ($a == 0){
                $mark = 5;
            }
            if ($a == 1){
                $mark = 4;
            }
            if ($a == 2){
                $mark = 3;
            }
            if ($a > 2){
                $mark = 2;
            }

            echo "Вы ответили на <strong>$result</strong> из <strong>". count($test). "</strong> вопросов, оценка <strong>$mark</strong>";
            die;
        }
    }
    else {
        echo "<p style='color:red'> Неверный формат тестового файла</p>";
        die;
    }
}
?>

<form method="post" action="test_2.php?name=<?=$_GET['name']?>">
<?php for ($i=0;$i<count($test);$i++) {
    $ctest = $test[$i];
    ?>
    <p><b><?php
            echo $ctest['question'];
            foreach ($ctest['answers'] as $val): ?> </b><Br/>
                <input type="radio" name=<?= $i ?> value=<?= $val ?>> <?= $val ?><Br/>
                </p>
            <?php endforeach;
}?>
    <input type="submit" name="ready" value="Готово">
</form>

