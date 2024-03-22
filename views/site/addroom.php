<h2>Добавить помещение</h2>
<form method="post" style="display: flex; 
            flex-direction: column;
            width: 250px;
            margin-bottom: 30px;">
    <label style="margin-bottom: 10px">Название помещения <input type="password" name="password"></label>
    <label style="margin-bottom: 10px">Вид помещения <select type="text" name="name">
        <option value="Первое">Первое</option>
        <option value="Второе">Второе</option>
        <option value="Третье">Третье</option>
    </select></label>
    <label style="margin-bottom: 10px">Вид подразделения <select type="text" name="name">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select></label>
    <button>Добавить</button>
</form>

<form method="post" style="display: flex; 
            flex-direction: column;
            width: 250px;">
    <label style="margin-bottom: 10px">Название помещения <input type="password" name="password"></label>
    <label style="margin-bottom: 10px">Вид помещения <select type="text" name="name">
        <option value="Первое">Первое</option>
        <option value="Второе">Второе</option>
        <option value="Третье">Третье</option>
    </select></label>
    <label style="margin-bottom: 10px">Вид подразделения <select type="text" name="name">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select></label>

    <ol>
        <label>Абоненты:</label>
    <?php
            foreach ($posts as $post) {
                echo '<li>' . $post->title . '</li>';
            }
    ?>
    </ol>
    <button>Подсчитать</button>
</form>