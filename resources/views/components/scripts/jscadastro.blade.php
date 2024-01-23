<script>
    function GetDetail(str) {
        if (str.length == 0) {
            document.getElementById("emitente_cpfcnpj").value = "";
            document.getElementById("emitente_end").value = "";
            document.getElementById("rg").value = "";
            return;
        } else {
            // Creates a new XMLHttpRequest object
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {

                if (this.readyState == 4 &&
                    this.status == 200) {

                    var myObj = JSON.parse(this.responseText);

                    document.getElementById("emitente_cpfcnpj").value = myObj[0];
                    document.getElementById("emitente_end").value = myObj[1];
                    document.getElementById("rg").value = myObj[2];


                }
            };
            // xhttp.open("GET", "filename", true);
            xmlhttp.open("GET", "/retorno/" + str, true);
            // Sends the request to the server
            xmlhttp.send();
        }
    }

    function GetDetail2(str) {
        if (str.length == 0) {
            document.getElementById("cpf_recebido").value = "";
            return;
        } else {
            // Creates a new XMLHttpRequest object
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {

                if (this.readyState == 4 &&
                    this.status == 200) {

                    var myObj = JSON.parse(this.responseText);

                    document.getElementById("cpf_recebido").value = myObj[0];
                }
            };
            // xhttp.open("GET", "filename", true);
            xmlhttp.open("GET", "/retornoRecebi/" + str, true);
            // Sends the request to the server
            xmlhttp.send();
        }
    }
    document.getElementById("recebi").onkeypress = function(e) {
        var chr = String.fromCharCode(e.which);
        if ("1234567890qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM.-() ".indexOf(chr) < 0)
            return false;
    };
    document.getElementById("emitente").onkeypress = function(e) {
        var chr = String.fromCharCode(e.which);
        if ("1234567890qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM.-() ".indexOf(chr) < 0)
            return false;
    };
</script>
