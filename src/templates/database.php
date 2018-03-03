<form action="step-finish" method="POST">
    <fieldset>
        <legend>Połączenie się z bazą danych</legend>
        <dl>
            <dt>Nazwa hosta</dt>
                <dd><input type="text" name="hostname" placeholder="Wpisz adres serwera bazy danych" required></dd>
            <dt>Nazwa bazy danych</dt>
                <dd><input type="text" name="db_name" placeholder="Nazwa bazy danych" required></dd>
            <dt>Nazwa użytkownika</dt>
                <dd><input type="text" name="user" placeholder="Nazwa użytkownika" required></dd>
            <dt>Hasło</dt>
                <dd><input type="text" name="password" placeholder="Hasło" required></dd>
            <dt>Prefix</dt>
                <dd><input type="text" name="prefix" value="<?= Helpers::randomCode(); ?>_" placeholder="Wpisz prefix tabel" required></dd>
            <dt><input type="submit" class="btn next-step" value="Przejdź do kolejnego kroku"></dt>
        </dl>
    </fieldset>
    <input type="hidden" name="request" value="1">
</form>