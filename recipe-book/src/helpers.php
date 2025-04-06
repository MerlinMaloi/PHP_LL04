<?php 

function checkForDuplicate($formData, $filePath) {
    $existingData = file_get_contents($filePath);
    $recipes = explode(PHP_EOL, $existingData);
    foreach ($recipes as $recipe) {
        $existingRecipe = json_decode($recipe, true);
        if ($existingRecipe && $existingRecipe['Title'] == $formData['Title']) {
            return true; // Дубликат существует
        }
    }
    return false;
}


//Проверка на длину строк 2.0
// c дальнейшей привязкой к полю с ошибкой
 /**
     * Попытка Функция для валидации которая будет выводить ошибку под соответсвующим HTML "обьектом"
     *
     * @param avaibleStringLength
     * @param contents 
     * @param error Массив ошибок ввода из формы 
     */
$error = [] 

// function fieldValidate($contents, $avaibleStringLength) {
    
// };

// function specialChars($input){
//     return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
// };

?>