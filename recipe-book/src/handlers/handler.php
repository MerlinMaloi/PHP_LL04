<?php
require_once ".../helpers.php";

/**
 * Обрабатывает POST-запрос с данными рецепта.
 * Выполняет проверку полей формы, обработку данных и сохранение в файл.
 *
 * @return void
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

// Проверка на наличие пустых полей
    /**
     * Проверяет что все поля формы заполнены
     * Если хотя бы одно поле пустое выводит ошибку и прекращает выполнение
     *
     * @param array $post Массив данных из формы (POST)
     * @param string $value Значение каждого поля формы
     */
    foreach($_POST as $post => $value){
        if (empty($value)){
            echo "Вы заполнили не все поля";
            exit;
        }
    };

 // Проверка на длину строк
    /**
     * Проверяет длину значений полей формы
     * Если значение поля меньше 3 символов или больше 100 символов выводит ошибку
     *
     * @param array $post Массив данных из формы (POST)
     * @param string $value Значение каждого поля формы
     */

    foreach($_POST as $post => $value){
        if (strlen($value) < 3){
            echo "Недостаточно символов в `{$post}`";
            exit;
        }
        elseif (strlen($value) > 100){
            echo "Слишком много символов в `{$post}`";
            exit;
        };
    };


    //Проверка на длину строк 2.0





// Обработка данных формы для защиты от XSS-атак и создание массива который в дальнейшем будет записывать данные в `recipe.txt`
    /**
     * Применяет функцию htmlspecialchars ко всем значениям полей формы для предотвращения XSS атак
     * Результат сохраняется в массиве $formData
     *
     * @param array $post Массив данных из формы (POST)
     * @param string $value Значение каждого поля формы
     * @return array Массив обработанных данных
     */
    $formData = [];
    foreach($_POST as $post => $value){
        $formData[$post]=htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    };
    


   
    print_r($formData['Ingredients']);


// Сохраняем данные рецепта в файл
    /**
     * Сохраняет данные рецепта в файл `recipes.txt` в формате JSON
     * Использует функцию file_put_contents для добавления данных в файл
     *
     * @param array $formData Данные рецепта, которые будут сохранены
     */
    file_put_contents('../storage/recipes.txt', json_encode($formData) . PHP_EOL, FILE_APPEND);
    $steps = $_POST['steps'];

  // Выводим шаги рецепта
        echo "<h3>Шаги рецепта:</h3>";
  /**
   * Цикл, который выводит каждый шаг рецепта с его номером.
   *
   * @param int $stepNumber Номер шага
   * @param string $stepDescription Описание шага
   */
    foreach ($steps as $stepNumber => $stepDescription) {
        echo "<p>Шаг $stepNumber: $stepDescription</p>";
    }
};
?>