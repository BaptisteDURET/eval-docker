<?php
    $db = new mysqli('mysql-eval', 'root', 'root', 'database');
    $query_init = 'CREATE TABLE IF NOT EXISTS produits (`name` text);';
    $db->query($query_init);
    if($_POST)
    {
        // Create connection
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $query = 'INSERT INTO produits (`name`) VALUES ("'. $_POST["name"] .'");';
        $db->query($query);
        
          
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de courses</title>
</head>
<body>
    <h1>Liste de courses</h1>
    <form action="index.php" method="post">
        <input type="text" name="name" placeholder="nom du produit">
        <input type="submit" value="ajouter">
    </form>
    <ul>
        <?php
            $query2 = 'SELECT * FROM produits;';
            $result = $db->query($query2);
            if ($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    echo '<li>';
                    echo $row['name'];
                    echo '</li>';
                }
            }
        ?>
    </ul>
</body>
</html>
<?php
    $db->close();
?>