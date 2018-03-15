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
            //foreach ($test as $testss):
                //echo ($testss['true']);
               /* $answer0 = $_POST['answer0'];
                $answer1 = $_POST['answer1'];
                $answer2 = $_POST['answer2'];
                $answer3 = $_POST['answer3'];*/

           /* if ($answer0 == $testss['true']) {
                $result += 25;
            }*/
            echo "Вы прошли тест на <strong>$result%</strong>";
            die;
            //endforeach;
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
    <p><b><?php echo $tests['question'] ?> </b><Br/>
        <input type="radio" name=<?= $tests['answer1'] ?> value=<?= $tests['answer1'] ?>> <?= $tests['answer1'] ?><Br/>
        <input type="radio" name=<?= $tests['answer2'] ?> value=<?= $tests['answer2'] ?>> <?= $tests['answer2'] ?><Br/>
        <input type="radio" name=<?= $tests['answer3'] ?> value=<?= $tests['answer3'] ?>> <?= $tests['answer3'] ?>
    </p>
<?php endforeach; ?>
    <input type="submit" name="ready" value="Готово">
</form>

