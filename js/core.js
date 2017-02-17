/**
 * Setting encoding by using input[type=text]
 * Make sure, it is correct subpage
 * Created by Dominik Ryńko
 * Last modification: 01-05-2016
*/
if (document.getElementById("other-encoding") != null && document.getElementsByClassName("other-encoding-field") != null) {
    var checkbox = document.getElementById("other-encoding")
        ,input = document.getElementsByClassName("other-encoding-field")
        ,default_encoding = document.getElementById('default-encoding');

    checkbox.checked = false;
    input[0].value = '';

    if (checkbox.checked == false) {
        input[0].style.display = 'none';
    }

    checkbox.addEventListener('click', function() {
        if (checkbox.checked == true) {
            default_encoding.style.display = 'none';
            input[0].style.display = 'block';
        } else {
            default_encoding.style.display = 'block';
            input[0].style.display = 'none';
        }
        return false;
    });
}
