<?php
    $conn = mysqli_connect("localhost", "root", "", "psy");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <header>
        <h1>Forum wielbicieli psów</h1>
    </header>
    <div class="prawy">
        <h2>Zapisz się</h2>
        <form action="post">
            <label for="login">login:</label> <input type="text" name="login" id="login"><br>
            <label for="haslo">hasło:</label> <input type="password" name="haslo" id="haslo"><br>
            <label for="haslo2">powtórz hasło:</label> <input type="password" name="haslo2" id="haslo2"><br>
            <button type="submit">Zapisz</button>
        </form>

        <?php
        if(isset($_POST["login"]) && isset($_POST["haslo"]) && isset($_POST["haslo2"]))
        {
            if(!empty($_POST["login"]) && !empty($_POST["haslo"]) && !empty($_POST["haslo2"]))
            {
                $login = $_POST["login"];
                $haslo = $_POST["haslo"];
                $haslo2 = $_POST["haslo2"];
                $loginExists = false;

                $result = mysqli_query($conn, "SELECT login FROM uzytkownicy;");

                while($row = mysqli_fetch_array($result))
                {
                    if($login == $row[0])
                    {
                        echo "<p>Login występuje w bazie danych, konto nie zostało dodane</p>";
                        $loginExists = true;
                    }
                }

                if($loginExists == false)
                {
                    if($haslo == $haslo2)
                    {
                        $hash = sha1($haslo);

                        $result = mysqli_query($conn, "INSERT INTO uzytkownicy VALUES ('$login', '$hash');");
                        echo "<p>Konto zostało dodane</p>";
                    }
                    else 
                    {
                        echo "<p>hasła nie są takie same, konto nie zostało dodane</p>";
                    }
                }
            }
            else
            {
                echo "<p>Wypełnij wszystkie pola</p>";
            }
        }
        ?>
    </div>
    <div class="prawy">
        <h2>Zapraszamy wszystkich</h2>
        <ol>
            <li>właścicieli psów</li>
            <li>weterynarzy</li>
            <li>tych co chcą kupić psa</li>
            <li>tych co lubią psy</li>
        </ol>
        <a href="regulamin.html">Przeczytaj regulamin forum</a>
    </div>
    <div id="lewy">
        <img src="obraz.jpg" alt="foksterier">
    </div>
    <footer>
        Stronę wykonał: Kamil Pałucha 4TP 05.12.2024
    </footer>
</body>
</html>

<?php
mysqli_close($conn);
?>