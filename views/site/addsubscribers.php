<form method="post" class="flex flex-col bg-gray-400 items-center p-12 w-96 rounded-xl gap-5">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <input name="model" type="hidden" value="<?= \Src\Protect::encode_string("subscriber") ?>" />
            <h2>Абонент</h2>
            <p class="text-red-800">
                <span><?=$subscriberErrors ?? ""?></span>
            </p>
            <p>
                <label>Имя <br><input type="text" name="firstname" class="border-4 rounded-xl w-80 h-8 px-2 border-gray-200" /><label>
            </p>
            <p>
                <label>Фамилия <br><input type="text" name="lastname" class="border-4 rounded-xl w-80 h-8 px-2 border-gray-200" /><label>
            </p>
            <p>
                <label>Отчество <br><input type="text" name="patronymic" class="border-4 rounded-xl w-80 h-8 px-2 border-gray-200" /><label>
            </p>
            <p>
                <label>Дата рождения <br><input type="date" name="birth_date" class="border-4 rounded-xl w-36 h-8 px-2 border-gray-200" /><label>
            </p>
            <p>
                <input type="submit" value="Создать" class="px-12 py-3 rounded-xl bg-gray-200 mt-5" />
            </p>
</form>