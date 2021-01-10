<?php

/**
 * Webakademia deklaracja zmiennych
 *
 * PHP Version 7.4
 *
 * @category Webakademia
 * @package  Webakademia
 * @author   Grzegorz Kucharski <g.kucharski@webakademia.it>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost/webakademia/part1/form.php
 */
namespace webakademia;

require "lib/function.php";

dump("REQUEST");
dump($_REQUEST);

dump("_GET");
dump($_GET);

dump("_POST");
dump($_POST);

if (isset($_POST['var1'])) {
    $var1 = $_POST['var1'];
}
else {
    $var1 = '';
}

?>
<html>
<head>

</head>
<body>
    <div>Formularz POST</div>
    <form method="POST" name="form1" action="form-action.php" enctype="multipart/form-data">
        <input type="text" name="vin1" value="<?php echo $var1; ?>">
        <input type="radio" name="reg" value="1"/>
        <input type="radio" name="reg" value="2"/>
        <input type="radio" name="reg" value="3"/>
        <input type="checkbox" name="agr1" value="3"/>
        <input type="checkbox" name="agr2" value="3"/>
        <input type="file" name="plik" >
        <input type="submit" name="submit">
    </form>
    <div>Formularz POST 2 - ajax</div>
    <form name="form2" id="form2" >
        <input type="text" name="var1" value="<?php echo $var1; ?>">
        <input type="submit" name="submit">
    </form>
    <div>Formularz GET</div>
    <form method="GET" name="form2" action="" >
        <input type="text" name="var2" >
        <input type="submit" name="submit">
    </form>
    <script>

    const myForm = document.getElementById('form2');

        myForm.addEventListener('submit', function(e){
            console.log("subimt");
            e.preventDefault();
            const formData = new FormData(this);
            fetch("http://localhost/webakademia/part1/form-action.php",
                {
                    method: 'POST',
                    mode: 'same-origin',
                    credentials: 'same-origin',
                    body: formData
                }).then(function(response) {
                    return response.text;
                }).then(function(text) {
                    console.log(text);
                });
            

        });

    </script>
</body>
</html>
<div >
