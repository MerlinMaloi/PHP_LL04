<?php
require_once "../helpers.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    foreach($_POST as $post => $value){
        if (empty($value)){
            echo "Вы заполнили не все поля";
            exit;
        }
    };

    foreach($_POST as $post => $value){
        if (strlen($value) < 3){
            echo "Недостаточно символов";
            exit;
        }
        elseif (strlen($value) > 100){
            echo "Слишком много символов";
            exit;
        }
        else continue;
    };

    $formData = [];
    foreach($_POST as $post => $value){
        $formData[$post]=htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    };
    


   
    print_r($formData['Ingredients']);
    file_put_contents('../storage/recipes.txt', json_encode($formData) . PHP_EOL, FILE_APPEND);
    $steps = $_POST['steps'];

    // Выводим данные
    echo "<h3>Шаги рецепта:</h3>";
    foreach ($steps as $stepNumber => $stepDescription) {
        echo "<p>Шаг $stepNumber: $stepDescription</p>";
    }
}
?>