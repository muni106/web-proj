window.onload = function() {
    var element = document.getElementById('goBack');

    element.onclick = function() {
    history.back();
    return false;
    }
};