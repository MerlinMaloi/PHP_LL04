<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <?php require_once "../src/handlers/handler.php";
    
    
    ?>
</head>


<body>

<form 
action="index.php"
novalidate
autocomplete="off"
method="POST"
id="NewRecept">

    <input type="text" name="Title" text="Как называется ваш рецепт?" required><br>
    <select name="simpleSelect">
        <option value="japan">Восточная</option>
        <option value="frans">Французская</option>
        <option value="rus">Русская</option>
        <option value="italy">Итальнская</option>
    </select><br>
    <textarea rows="10" cols="25" name="Ingredients" required></textarea><br>
    <textarea rows="10" cols="25" name="RecipeDescription" required></textarea><br>
    <select name="multipleSelect" multiple size="2">
    <option value="lunch">Обед</option>
        <option value="vegan">Vegan</option>
        <option value="glufree">GlutenFree</option>
        <option value="fries">Жаренное</option>
    </select><br>
    <input type="submit"><br>
    <input type="reset"><br>
    <button id="AddStep" style="vertical-align: middle"> Add a step</button><br>
    <script>
        
/**
 * Функция для добавления нового шага.
 * Каждый шаг включает в себя заголовок <h4> с номером шага и поле <textarea>.
 * После каждого вызова увеличивается переменная count для следующего шага.
 */

let count = 1 

function stepLimiter(event) {
document.getElementById("AddStep").addEventListener("click", function() {
    // Выводим текст
    document.getElementById("message").textContent = "Кнопка заблокирована!";
    
    // Блокируем кнопку
    this.disabled = true;
})
}


 function AddStep(event) {
    //Предотвращаем отправку формы при добавлении шага
    event.preventDefault()
    let stepDiv = document.createElement("div")
    //Делаем elseif для ограничения количества шагов чтобы пользователь не создал бесконечное количество шагов
    if (count > 50){
        let stop = document.createElement("Stop")
        stop.innerText = `Количество шагов закончилось`
        stepDiv.appendChild(stop)
        this.disabled = true;
    }
    
    else {

        let h4 = document.createElement("h4")
        h4.innerText = `Шаг ${count}`
        stepDiv.appendChild(h4)

        let textarea = document.createElement("textarea")
        textarea.setAttribute('name', `steps[${count}]`)  
        textarea.rows = 5
        textarea.cols = 30
        stepDiv.appendChild(textarea)  

        document.getElementById("NewRecept").appendChild(stepDiv)

        count += 1;}
}




        let buttonCreate = document.getElementById("AddStep")
        buttonCreate.addEventListener("click", AddStep)
    </script>


</form>


</body>
</html>

