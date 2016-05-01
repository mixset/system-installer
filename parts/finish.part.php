<?php
$params = $installer -> getPathData();

if (isset($_POST['send_request']) && $params[0] == 'step' && $params[1] == 'database') {
    $result = $installer -> database($_POST);

    if (is_string($result)) {
        echo '<p style="text-align: center">'.$result.'</p>';
        echo '<p><a href="step-basic">Powrót do formularza</a></p>';
    }
    else if(is_bool($result)) {
        finish($installer);
    }

    unset($_SESSION['init_app']);
}

function finish()
{
    echo '<p>Instalacja została zakończona sukcesem.</p>
    <p>Dane pochodzące z instalacji zostały zapisane w pliku <em>config.<abbr title="Rozszerzenie plików konfiguracyjnych">ini</abbr></em> w folderze <em>config/</em></p>';
}
