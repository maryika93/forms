
if (!empty($_POST)) {
$result  = 0;
for ($i=0;$i<count($test);$i++) {
foreach ($test as $testss):
echo '<pre>';
            print_r($_POST);
                print_r($testss);
            if (isset($_POST[0])) {
                $result += 1;
            }
            if (count($testss)-$result = 0)
                $mark = 5;
                if (count($testss)-$result = 1)
                    $mark = 4;
                if (count($testss)-$result = 2)
                    $mark = 3;
                if (count($testss)-$result > 2)
                    $mark = 2;
            endforeach;
            echo "Вы ответили на <strong>$result</strong> из <strong>". count($testss). "</strong> вопросов, оценка <strong>$mark</strong>";
            die;
        }
    }
    else {
        echo "<p style='color:red'> Неверный формат тестового файла</p>";
        die;
    }









<form method="post" action="test_2.php?name=<?=$_GET['name']?>">
    <?php foreach ($test as $tests):?>
        <p><b><?php
        echo $tests['question'];
        foreach ($tests['answers'] as $val): ?> </b><Br/>
            <input type="radio" name=<?= $val ?> value=<?= $val ?>> <?= $val ?><Br/>
            </p>
        <?php endforeach?><?php  endforeach;?>
    <input type="submit" name="ready" value="Готово">
</form>
