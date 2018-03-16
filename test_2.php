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
            $result  = 0;
            foreach ($test as $testss):
            if (isset($_POST[$testss['true']])) {
                $result += 25;
            }
            endforeach;
            echo "Вы прошли тест на <strong>$result%</strong>";
            die;
        }
    }
    else {
        echo "<p style='color:red'> Неверный формат тестового файла</p>";
        die;
    }
}
?>
<?php foreach ($test as $tests):?>

<form method="post" action="http://university.netology.ru/u/mtipikina/forms/test_2.php?name=<?=$_GET['name']?>">
    <p><b><?php
            echo $tests['question'];
            foreach ($tests['answers'] as $val): ?> </b><Br/>
        <input type="radio" name=<?= $val ?> value=<?= $val ?>> <?= $val ?><Br/>
    </p>
<?php endforeach?><?php  endforeach;?>
    <input type="submit" name="ready" value="Готово">
</form>

