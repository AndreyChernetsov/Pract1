<h2>Вход</h2>
<h3><?= $message ?? ''; ?></h3>

<h3><?= app()->auth->user()->name ?? ''; ?></h3>
<?php
if (!app()->auth::check()):
   ?>
   <div>
        <form method="post">
            <label>Логин <input type="text" name="login"></label>
            <label>Пароль <input type="password" name="password"></label>
            <label>Роль <input type="text" name="role"></label>
            <button>Войти</button>
        </form>
   </div>
<?php endif;
