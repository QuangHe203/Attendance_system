function showUser(query) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);
            if (response.table) {
                document.getElementById("account-list").innerHTML =
                    response.table;
            } else {
                document.getElementById("account-list").innerHTML =
                    "<b>" +
                    response.message +
                    "</b>";
            }
        }
    };

    if (query === "") {
        xmlhttp.open("GET", "/user/list", true);
    } else {
        xmlhttp.open("GET", "/user/search?q=" + query, true);
    }
    xmlhttp.send();
}
