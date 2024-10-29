function showUser(query) {
    if (query == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var response = JSON.parse(this.responseText);
                if (response.table) {
                    document.getElementById("txtHint").innerHTML = response.table;
                } else {
                    document.getElementById("txtHint").innerHTML = "<b>" + response.message + "</b>";
                }
            }
        };
        xmlhttp.open("GET", "/user/search?q=" + query, true);
        xmlhttp.send();
    }
}