<!DOCTYPE html>
<html>
    <head>
        <title>FORM BUKU TAMU</title>
        <style type="text/css">
            #tabel {
                background-color: grey;
                border-color: white;
            }
            #header {
                color: white;
                text-align: center;
                font-size: 50pt;
            }
            #tr {
                height: 30pt;
                margin: 500pt;
                color: white;
                font-family: Comic Sans MS;
                text-align: center;
            }
            body {
                background-color: black;
            }
            input[type=text]{margin: 15px auto 15px; /*padding: 10px*/; width: 400px;  } 
            
        </style>
    </head>
    <body>

        <div id="header"> FORM BUKU TAMU</div>
        <form method="post" action="include.php">
            <table id="tabel" border="1px" cellpadding="5" cellspacing="10" width="750" height="500" align="center">
                <tr id="tr">
                    <td>ID</td>
                    <td align="center" >
                        <input type="text" name="ID_BT">
                    </td>
                </tr>

                <tr id="tr">
                    <td>NAMA</td>
                    <td align="center">
                        <input type="text" name="NAMA"></td>
                </tr>

                <tr id="tr">
                    <td>EMAIL</td>
                    <td align="center"><input type="text" name="EMAIL"></td>
                </tr>

                <tr id="tr">
                    <td>Isi</td>
                    <td align="center"><input type="text" name="ISI"></td>
                </tr>
                <tr id="tr">
                    <td colspan="2" align="center"><button type="submit" value="simpan">SIMPAN</button></td>
                </tr>
            </table>
        </form>
    </body>
</html>