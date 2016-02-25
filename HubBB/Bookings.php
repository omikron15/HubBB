<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bookings Page</title>
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

    <form action="CustomerInfo.php" method="post">

        <table>
            <tr><td> <p>Please complete the form:</p></td></tr>

            <tr>
                <td>
                    <label for="location">Pick a location:</label></td>
                <td><select name="location">

                        <?php
                        $conn = new PDO ( "sqlsrv:server = tcp:bbsqldb.database.windows.net,1433; Database = SQL_BB", "teamdsqldb", "Sql20022016*");
                        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                        try{
                            $st = $conn-> query("SELECT DISTINCT [city] FROM [B&B]");
                            foreach($st->fetchAll() as $row) {
                                $newhtml =
                                    <<<NEWHTML
                                                                <option value="{$row[city]}">{$row[city]}</option>
NEWHTML;
                                print($newhtml);
                            }
                        }
                        catch(PDOException $e)
                        {print"$e";}
                        ?>




                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="date">Pick a date:</label></td>
                <td><select name="date">
                    <option value="">Select a date:</option>
                    <option value="01/04/2016">01/04/2016</option>
                    <option value="02/04/2016">02/04/2016</option>
                    <option value="03/04/2016">03/04/2016</option>
                    <option value="04/04/2016">04/04/2016</option>
                </select>
                </td>
            </tr>
            <tr><td>
                <label for="duration">Number of Days:</label></td>
                <td><select name="numberofdays">
                    <option value="">Select Number of Days:</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                </td>
            </tr>

            <tr><td>
                <label for="duration">Number of Adults:</label></td>
                <td><select name="numberofadults">
                    <option value="">Select Number of Adults:</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                </td>
            </tr>

            <tr><td>
                <label for="duration">Number of Children:</label></td>
                <td><select name="numberofchildren">
                    <option value="">Select Number of Children:</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                </td>
            </tr>
            <tr>



                <td><a href="CustomerInfo.php">
                    <input type="submit" value="Submit" />
                </a></td>
            </tr>
        </table></form>

</main>




<footer>

    <p>Copyright. Team D Solutions.</p>
</footer>
</body>
</html>