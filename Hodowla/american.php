<?php 
$conn = mysqli_connect("localhost", "root", "", "hodowla"); 
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hodowla świnek morskich</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Hodowla świnek morskich - zamów świnkowe maluszki</h1>
    </header>
    <nav>
        <a href="peruwianka.php">Rasa Peruwianka</a>
        <a href="american.php">Rasa American</a>
        <a href="crested.php">Rasa Crested</a>
    </nav>
    <div id="sidebar">
        <h3>Poznaj wszystkie rasy świnek morskich</h3>
        <ol>
            <?php
                $result = mysqli_query($conn, query: "SELECT rasa FROM rasy;");
                while($row = mysqli_fetch_array($result)){
                    echo "<li>$row[0]</li>";
                }
            ?>
        </ol>
    </div>
    <main>
        <img src="american.jpg" alt="Świnka morska rasy american">
        <?php
            $result = mysqli_query($conn, query: "SELECT DISTINCT s.data_ur, s.miot, r.rasa FROM swinki s INNER JOIN rasy r ON s.rasy_id = r.id WHERE r.id = 6;");
            
            while($row = mysqli_fetch_array($result)){
                echo "<h2>Rasa:$row[2]</h2>";
                echo "<p>Data urodzenia: $row[0]</p>";
                echo "<p>Oznaczenie miotu: $row[1]</p>";
            };
        ?>
        <hr>
        <h2>Świnki w tym miocie</h2>
        <?php
            $result = mysqli_query($conn, query: "SELECT imie, cena, opis FROM swinki WHERE rasy_id = 6;");

            while($row = mysqli_fetch_array($result)){
            echo "<h3>$row[0] $row[1]zł</h3>";
            echo "<p>$row[2]</p>";
            };
        ?>
    </main>
    <footer>
        <p>Stronę wykonał: Kamil Pałucha</p>
    </footer>
</body>
</html>

<?php
    $conn -> close();
?>