function getXmlHttp() {

    var xmlhttp;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}
window.onload = function () {
    var xmlhttp = getXmlHttp();
    document.addEventListener('click', function (event) {
        event = event || window.event;
        if (event.target.getAttribute("id") == "sub") {
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var country = document.getElementById("country").value;
            var params = "name=" + name + "&email=" + email+"&country="+country;
            xmlhttp.open('POST', "/image/Test4/MyFunc.php", true);
            xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4) {
                    if (xmlhttp.status == 200) {
                        alert(xmlhttp.responseText);
                        document.getElementById("name").value = "";
                        document.getElementById("email").value = "";
                    }
                }

            }
            xmlhttp.send(params);
        }
        if (event.target.getAttribute("id") == "new") {
            document.getElementById("userForm").style.display = "block";
        }
        if (event.target.getAttribute("id") == "list") {
            var params = "show=" + "true";
            xmlhttp.open('POST', "/image/Test4/MyFunc.php", true);
            xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4) {
                    if (xmlhttp.status == 200) {
                        document.getElementById("res").innerHTML = xmlhttp.responseText;
                    }
                }

            }
            xmlhttp.send(params);
        }
        if (event.target.className == "delete") {

            var id = event.target.getAttribute("id");
            var row = document.getElementById(id).parentNode.parentNode.rowIndex;
            var email = document.getElementById("tab").rows[row].cells[2].innerHTML;
            var params = "email=" + email + "&delete=" + "true";
            xmlhttp.open('POST', "/image/Test4/MyFunc.php", true);
            xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4) {
                    if (xmlhttp.status == 200) {
                        alert(xmlhttp.responseText);
                        document.getElementById("tab").deleteRow(row);
                    }
                }

            }
            xmlhttp.send(params);
        }

    });
}