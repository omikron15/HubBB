<!DOCTYPE html>
<html lang="en">
<!--coment-->
<head>
    <meta charset="UTF-8">
    <title>Customer Info</title>
    <link type="text/css" rel="stylesheet" href="assets/css/style.css"/>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display' rel='stylesheet' type='text/css'>
</head>

<header>

    <nav>

        <ul>
            <li><a href="Home.html">Home page</a></li>
            <li><a href="Bookings.php">Bookings</a></li>
            <li><a href="OwnerRegistration.html">Owner Registration</a></li>
            <li><a href="B&Bregistration.html">B&B Registration</a></li>
        </ul>

    </nav>

</header>
<body>
<main>
    <form>

        <table>

            <tr><td> <p>Please complete the form before booking:</p></td></tr>

            <tr><td>
                    <label for="title">Title:</label></td>
                <td><select name="title">
                        <option value="">Select Title</option>
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Miss">Miss</option>
                        <option value="Ms">Ms</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="firstname">First Name:</label></td>
                <td><input type="text" name="firstname" value="Enter your First Name" required /></td>
            </tr>
            <tr>
                <td><label for="surname">Surname:</label></td>
                <td><input type="text" name="surname" value="Enter your Surname" required /></td>
            </tr>
            <tr>
                <td>
                    <label for="email">Email:</label></td>
                <td><input type="text" name="email" placeholder="email" size="30" maxlength="50" required /></td>
            </tr>




            <tr><td>
                    <label for="address">Address:</label></td>
                <td><input type="text" name="address" placeholder=" Enter first line of your address" size="30" maxlength="50" required /></td>
            </tr>

            <tr><td>
                    <label for="address2">Address Line 2:</label></td>
                <td><input type="text" name="address2" placeholder=" Enter second line of your address" size="30" maxlength="50" required /></td>
            </tr>


            <tr><td>
                    <label for="telephone">Telephone:</label></td>
                <td><input type="text" name="telephone" placeholder=" Enter your telephone number" size="20" maxlength="20" required /></td>
            </tr>

            <tr>
                <td><input type="submit" value="Submit" /></td>
            </tr>
        </table></form>

    <h4>take this out later...</h4>
    <div class="main">
        <h3 class="pagetitle" >Here are your search results...</h3>

    <?php
    $city = $_POST['location'];
    $conn = new PDO ( "sqlsrv:server = tcp:bbsqldb.database.windows.net,1433; Database = SQL_BB", "teamdsqldb", "Sql20022016*");
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    try{
        $st = $conn-> query("SELECT * FROM [B&B] WHERE [city] = '$city'");


        foreach($st->fetchAll() as $row) {
            $newhtml =
                <<<NEWHTML
                    <div class="resultblock">
    <p>According to our database, your search of: <strong>{$row[city]}</strong> has returned the following results: </p>
    <p><strong>{$row[city]}</strong></p>
    <p><strong>{$row[bbname]}</strong></p>
    <p><strong>{$row[address]}</strong></p>
    <p><strong>{$row[email]}</strong></p>




    <p><input type="submit" value="BOOK" /></p>



</div>
NEWHTML;
            print($newhtml);
        }
    }
    catch(PDOException $e)
    {print"$e";}
    ?>
</div>

</main>
<footer>

    <p>Copyright. Team D Solutions.</p>
</footer>
</body>
</html>