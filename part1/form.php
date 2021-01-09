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
    <form method="POST" name="form1" action="form-action.php" >
        <input type="text" name="vin1" value="<?php echo $var1; ?>">
        <input type="submit" name="submit">
    </form>
    <div>Formularz POST 2</div>
    <form method="POST" name="form2" action="" >
        <input type="text" name="var1" value="<?php echo $var1; ?>">
        <input type="submit" name="submit">
    </form>
    <div>Formularz GET</div>
    <form method="GET" name="form2" action="" >
        <input type="text" name="var2" >
        <input type="submit" name="submit">
    </form>
    <script>
    //TODO script
    </script>
</body>
</html>
<div >
