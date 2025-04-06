<?php
//require_once "../helpers.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    $formData = [
        'Title'             => $_POST['Title']    ?? '',
        'Ingredients'       => $_POST['Ingredients']   ?? '',
        'RecipeDescription' => $_POST['RecipeDescription'] ?? '',
        'Steps'             => $_POST['steps'] ?? '',
        'SimpleSelect'      => $_POST['simpleSelect'] ?? '',
        'MultipleSelect'    => $_POST['multipleSelect'] ?? ''

    ];
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