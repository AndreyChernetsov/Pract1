<h2><?= $message ?? ''; ?></h2>

<h3>Текущие абоненты:</h3>
<h3>Текущие номера:</h3>
<h3>Текущие помещения:</h3>
<h3>Текущие подразделения:</h3>
<h3>Прикреплённые абоненты к телефону:</h3>

<div style="display: flex; 
            flex-direction: column; 
            width: 250px;
            margin: 50px;">
    <h3>Просмотреть все номера абонента:</h3>
    <label>Имя абонента: <input type="text" name="name"></label>
    <button style="margin-bottom: 25px;">Просмотреть</button>

    <div style="none">
        <label>Абонент: </label>
        <input type="checkbox" name="name">
        <label>Номер: ... </label>
        <input type="checkbox" name="name">
        <label>Номер: ...</label>
    </div>

    <button>Выбрать все номера абонента</button>
</div>


<div style="display: flex; 
            flex-direction: column; 
            width: 250px;
            margin: 50px;">
    <h3>Выбрать номера абонента по подразделениям:</h3>
    <label>Подразделение: <select type="text" name="name">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select></label>
    <button>Просмотреть</button>

    <p>Абонент ... Номер...</p>
</div>