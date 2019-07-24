 $(document).ready(function () {

 	 document.getElementById('scanqr').onclick = function() {

            if (document.getElementById('scanqr').innerHTML == "SCAN"){
             document.getElementById('qrcode').readOnly =false;
             document.getElementById('qrcode').value="";
             document.getElementById('qrcode').focus();
             document.getElementById('scanqr').innerHTML = "CANCEL";
         }else{
            document.getElementById('qrcode').value="";
            document.getElementById('qrcode').readOnly =true;
            document.getElementById('scanqr').innerHTML = "SCAN";
        }
    };


 }