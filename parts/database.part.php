<?php
$params = $installer -> getPathData();

if (isset($_POST['send_request']) && $params[0] == 'step' && $params[1] == 'basic') {
    $result = $installer -> basic($_POST);

    // If everything went well, show next form
    if ($result) {
        showForm($installer);
    }
}

function showForm($installer)
{
    echo '<form action="step-finish" method="POST">
     <fieldset>
      <legend>Połączenie się z bazą danych</legend>
      <dl>
       <dt>Nazwa bazy danych</dt>
        <dd><input type="text" name="database_name" placeholder="Nazwa bazy danych"></dd>
       <dt>Nazwa użytkownika</dt>
        <dd><input type="text" name="user_name" placeholder="Nazwa użytkownika"></dd>
       <dt>Hasło</dt>
        <dd><input type="text" name="password" placeholder="hasło"></dd>
       <dt>Nazwa hosta</dt>
        <dd><input type="text" name="host_name" placeholder="Wpisz adres serwera bazy danych"></dd>
       <dt>Prefix</dt>
        <dd><input type="text" name="prefix" value="'.($installer -> randomCode(4)).'_" placeholder="Wpisz prefix tabel"></dd>
       <dt><input type="submit" class="btn next-step" name="send_request" value="Przejdź do kolejnego kroku"></dt>
      </dl>
     </fieldset>
    </form>';
}