<form action="step-database" method="POST">
    <fieldset>
        <legend>Podstawowe dane o systemie</legend>
        <dl>
            <dt><label for="language">Język systemu</label></dt>
            <dd>
                <select name="language" id="language">
                    <option value="pl" selected>Polski</option>
                    <option value="en">Angielski</option>
                    <option value="ru">Rosyjski</option>
                    <option value="fr">Francuski</option>
                    <option value="es">Hiszpański</option>
                    <option value="de">Niemiecki</option>
                    <option value="zh">Chiński</option>
                </select>
            </dd>
            <dt><label for="default-encoding">Kodowanie znaków</label></dt>
            <dd class="chars-encoding">
                <select name="encoding_basic" id="default-encoding">
                    <option value="utf-8">UTF-8 (zalecany)</option>
                    <option value="iso-8859-1">ISO-8859-2</option>
                    <option value="utf-16">UTF-16</option>
                    <option value="utf-32">UTF-32</option>
                </select>

                <input type="checkbox" id="other-encoding" value="encoding"> <label for="other-encoding"> Wybierz inne kodowanie</label>
                <input type="text" name="encoding_other" class="other-encoding-field" placeholder="Wprowadź typ kodowania">
            </dd>
            <dt><label for="debug_mode">Tryb debugowania</label></dt>
            <dd>
                <select name="debug_mode" id="debug_mode">
                    <option value="0">Wyłączony (zalecane)</option>
                    <option value="1">Włączony</option>
                </select>
            </dd>
            <dt><input type="submit" class="btn next-step" name="send_request" value="Przejdź do kolejnego kroku"></dt>
        </dl>
    </fieldset>
    <input type="hidden" name="request" value="1">
</form>