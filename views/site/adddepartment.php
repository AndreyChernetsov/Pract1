<h2>Добавить подразделение</h2>
<form method="post" style="display: flex; 
            flex-direction: column;
            width: 250px;">
    <label style="margin-bottom: 10px">Название <input type="password" name="password"></label>
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