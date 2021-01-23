<?php

function dump($text)
{
    echo "<pre>";
    print_r($text);
    echo "<pre>";
}

//przyklad laczenia do mysql
$dsn = "mysql:host=mysql;dbname=webakademia57;";
$user = "webakademia57";
$pass = "webakademia57";

try {
    $db = new PDO($dsn, $user, $pass);
} catch (\Throwable $th) {
    echo "Problem połączenia";
}

// create table mysql
$sql ="CREATE table if not exists Firm(
    ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
    Prename VARCHAR( 50 ) NOT NULL, 
    Name VARCHAR( 250 ) NOT NULL,
    StreetA VARCHAR( 150 ) NOT NULL, 
    StreetB VARCHAR( 150 ) NOT NULL, 
    StreetC VARCHAR( 150 ) NOT NULL, 
    County VARCHAR( 100 ) NOT NULL,
    Postcode VARCHAR( 50 ) NOT NULL,
    Country VARCHAR( 50 ) NOT NULL);" ;
$db->exec($sql);

//przyklad laczenia do postgresql
$dsn2 = "pgsql:host=postgress;dbname=postgress_db;";
$user2 = "cms";
$pass2 = "cms";

try {
    $db2 = new PDO($dsn2, $user2, $pass2);
} catch (\Throwable $th) {
    echo "Problem połączenia";
}

try {
   // create table mysql
    $sql ="CREATE table if not exists Firm(
        ID integer PRIMARY KEY,
        Prename VARCHAR( 50 ) NOT NULL, 
        Name VARCHAR( 250 ) NOT NULL,
        StreetA VARCHAR( 150 ) NOT NULL, 
        StreetB VARCHAR( 150 ) NOT NULL, 
        StreetC VARCHAR( 150 ) NOT NULL, 
        County VARCHAR( 100 ) NOT NULL,
        Postcode VARCHAR( 50 ) NOT NULL,
        Country VARCHAR( 50 ) NOT NULL);" ;
    $db2->exec($sql);
} catch (\Throwable $th) {
    echo "Błąd tworzenia tabeli";
    echo "<pre>";
    print_r($th);
    echo "</pre>";
}

//insert mysql
// for($i=1; $i <= 1000; $i++)
// {
//     dump($i);
//     $sql = "Insert into Firm 
//     (Prename, Name, StreetA, StreetB, StreetC, County, Postcode, Country)
//     VALUES
//     ('Prename".$i."', 'Name".$i."', 'StreetA".$i."', 'StreetB".$i."', 'StreetC".$i."', 'County', 'Postcode', 'Country')
//     ";
//     dump($sql);
//     $db->exec($sql);
// }

// insert to postgresql
// for($i=1001; $i <= 2000; $i++)
// {
//     dump($i);
//     $sql = "Insert into Firm 
//     (ID, Prename, Name, StreetA, StreetB, StreetC, County, Postcode, Country)
//     VALUES
//     (".$i.",'Prename".$i."', 'Name".$i."', 'StreetA".$i."', 'StreetB".$i."', 'StreetC".$i."', 'County', 'Postcode', 'Country')
//     ";
//     dump($sql);
//     $db2->exec($sql);
// }

//update example
// $sql_update = "UPDATE Firm SET 
//                     Prename = 'Prename modify',
//                     Name = 'New'
//                 WHERE
//                     ID = 2
//                 ";
// $db->exec($sql_update);
// $db2->exec($sql_update);

//delete
// $sql_delete ="DELETE FROM Firm WHERE ID > 1900";
// $db->exec($sql_delete);
// $db2->exec($sql_delete);

//pobieranie danych
// PDO::FETCH_ASSOC – zwraca tablicę z asocjacyjną kluczami według nazw kolumn,
// PDO::FETCH_NUM zwraca tablicę z kluczami liczbowymi,
// PDO::FETCH_BOTH: kombinacja dwóch powyższych,
// PDO::FETCH_CLASS – zwraca obiekt a dane są wartościami w polach nazwanych według nazw kolumn,
//$sql ="SELECT * FROM Firm Limit 2";
$sql ="SELECT id, name, streeta FROM Firm Limit 2";
$stmt = $db->query($sql);
$res = $stmt->fetchAll(PDO::FETCH_CLASS);

$stmt2 = $db2->query($sql);
$res2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
dump($res2);
dump($res);
?>
<div style="width:400px; border:1px solid red;">
<?php
    foreach($res2 as $key => $val)
    {
        echo $val['id']."-".$val['name']."-".$val['streeta'];
        echo "<br>";
    }
    foreach($res as $key => $val)
    {
        echo $val->id."-".$val->name."-".$val->streeta;
        echo "<br>";
    }
?>
</div>
<?php
//sql injection
// $userID = $_GET['id'];
// $sql = 'SELECT Name, ID FROM Firm WHERE id ='.$userID;
// dump($sql);
// $stmt = $db->query($sql);
// dump($stmt);
// dump($result = $stmt->fetchAll(PDO::FETCH_ASSOC));
//
//htmlspecialchars()
//strip_tags()

//no sql injection
$userID = intval($_GET['id']);
$sql = 'SELECT * FROM Firm WHERE id = :userID';
dump($sql);
$stmt = $db->prepare($sql);
dump($stmt);
$stmt->execute(
    array(
    "userID" => $userID
    )
);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
dump($result);
//Prename, Name, StreetA, StreetB, StreetC, County, Postcode, Country
function validate($var)
{
    $var = strip_tags($var);
    $var = htmlspecialchars($var);
    return $var;
}

/*
Array
(
    [prename] => lklk;k
    [Name] => lkk;lk
    [StreetA] => lfdudsu
    [StreetB] => mlkjl
    [StreetC] => jiojk
    [Postcode] => jioij
    [County] => klj
    [Country] => kj
    [submit] => Prześlij
)*/



function InsertRowToFirm($db,$prename, $name, $StreetA, $StreetB, $StreetC, $Postcode, $County, $Country)
{
    $sql = "Insert into Firm 
    (Prename, Name, StreetA, StreetB, StreetC, County, Postcode, Country)
    VALUES
    (:prename, :name, :StreetA, :StreetB, :StreetC, :County, :Postcode, :Country)
    ";
    $stmt = $db->prepare($sql);
    dump($stmt);
    $res = $stmt->execute(
        array(
        "prename" => $prename,
        "name" => $name,
        "StreetA" => $StreetA,
        "StreetB" => $StreetB,
        "StreetC" => $StreetC, 
        "County" => $County,
        "Postcode" => $Postcode,
        "Country" => $Country,
        )
    );
    return $res;
}


dump($_POST);
$prename = validate($_POST['prename']);
$name = validate($_POST['Name']);
$StreetA = validate($_POST['StreetA']);
$StreetB = validate($_POST['StreetB']);
$StreetC = validate($_POST['StreetC']);
$Postcode = validate($_POST['Postcode']);
$County = validate($_POST['Country']);
$Country = validate($_POST['submit']);
$agr1 = intval($_POST['agr1']);

if($agr1 == 3) 
{
    $res = InsertRowToFirm($db,$prename, $name, $StreetA, $StreetB, $StreetC, $Postcode, $County, $Country);
    dump("Dodyczylo ".$res." wierszy");
}


?>
  <form method="POST" name="form1" action="" >
  prename <input type="text" name="prename" value="<?php echo $prename; ?>">
  Name  <input type="text" name="Name" value="<?php echo $name; ?>">
  StreetA      <input type="text" name="StreetA" value="<?php echo $StreetA; ?>">
  StreetB      <input type="text" name="StreetB" value="<?php echo $StreetB; ?>">
  StreetC      <input type="text" name="StreetC" value="<?php echo $StreetC; ?>">
  Postcode      <input type="text" name="Postcode" value="<?php echo $Postcode; ?>">
  County      <input type="text" name="County" value="<?php echo $County; ?>">
  Country      <input type="text" name="Country" value="<?php echo $Country; ?>">
  Zgoda 1      <input type="checkbox" name="agr1" value="3" <?php if($agr1 == 3) echo 'checked="checked"'?> />
        <input type="submit" name="submit">
    </form>
<?php


phpinfo();
//disconnect
$db=null;
$db2=null;