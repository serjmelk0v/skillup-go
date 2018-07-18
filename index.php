<?php
    error_reporting(E_ALL);
    ini_set('display_errors', true);
    $result = null;
    $operand1 = null;
    $operand2 = null;
    $operator = '+';

    if(isset($_REQUEST['operator'])){
        $operand1 = $_REQUEST['operand1'];
        $operator = $_REQUEST['operator'];
        $operand2 = $_REQUEST['operand2'];

        switch ($operator) {
            case '+': $result = $operand1 + $operand2; break;
            case '-': $result = $operand1 - $operand2; break;
            case '*': $result = $operand1 * $operand2; break;
            case '/':
                if ($operand2 == 0){
                    $result = 'Делить на 0 нельзя';
                } else {
                    $result = $operand1 / $operand2;
                }

                break;


        }

    }


    function printOptions($options, $value) {
       foreach ($options as $option) {
           if ($option == $value){
               $selected = 'selected';
           } else {
               $selected = '';
           }

           echo '<option' . $selected . '>' . $option . '</option>';
       }

    }




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Калькулятор</title>
</head>
<body>

<form>
    <input type="number" name="operand1" value="<?php echo $operand1 ?>">
    <select name="operator">
        <?php printOptions(['+','-','*','/'], $operator)?>
    </select>
    <input type="number" name="operand2" value="<?= $operand2?>">
    <button type="submit">=</button>
    <b><?php echo $result?></b>


</form>

</body>
</html>
