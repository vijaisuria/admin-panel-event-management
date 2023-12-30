<?php
session_start();
if (!isset($_SESSION['Aname'])) {
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon"
        href="https://www.google.com/url?sa=i&url=https%3A%2F%2Fen.wikipedia.org%2Fwiki%2FMadras_Institute_of_Technology&psig=AOvVaw24Hw_au4PBbWiMiHhdyvE4&ust=1666952722381000&source=images&cd=vfe&ved=0CA0QjRxqFwoTCKCDkfuYgPsCFQAAAAAdAAAAABAE"
        type="image/x-icon">

    <title>Enigma | View participants</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
        </script>

    <?php
    include_once('./templates/sidebar.php');
    function eventName($eid)
    {
        if ($eid == 10)
            return "IPL Auction";
        if ($eid == 11)
            return "Mathomania";
        if ($eid == 12)
            return "Python Pro's";
        if ($eid == 13)
            return "tressure Hunt";
        if ($eid == 14)
            return "C noobies";
    }
    ?>

    <div class="container" style="padding-top: 150px; padding-left: 50px">
        <div class="row">
            <div class="col-lg-8">
                <form method="post" action="participants.php">
                    <div class="mb-3">
                        <select class="form-select" aria-label="Select Event" name="event">
                            <option selected>Open this select menu</option>
                            <option value="10">IPL Auction</option>
                            <option value="11">Mathomania</option>
                            <option value="12">Python Pro's</option>
                            <option value="13">Tressure Hunt</option>
                            <option value="14">C noobies</option>
                            <option value="Gaming">Gaming</option>
                            <option value="Math O Mania">Math O Mania</option>
                            <option value="Fandom Quiz">Fandom Quiz</option>
                            <option value="General Quiz">General Quiz</option>
                            <option value="OLPC">OLPC</option>
                            <option value="OSPC">OSPC</option>
                            <option value="Code Marathon">Code Marathon</option>
                            <option value="Reverse Coding">Reverse Coding</option>
                            <option value="Debugging">Debugging</option>
                            <option value="Street Coding">Street Coding</option>
                            <option value="Blind Coding">Blind Coding</option>
                            <option value="Decoding">Decoding</option>
                            <option value="Database">Database</option>
                            <option value="Tech Quiz">Tech Quiz</option>
                            <option value="Coffee with Java">Coffee with Java</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>

                <?php
                $host = "localhost";
                $dbuser = "root";
                $dbpass = "vijai@123";
                $dbase = "enigma";

                $dbc = mysqli_connect($host, $dbuser, $dbpass, $dbase)
                    or die("Unable to select database");

                if (count($_POST) > 0) {
                    $event = $_POST['event'];
                    $query1 = "select * from participants p 
                            JOIN users u
                            ON u.uid = p.uid
                            WHERE p.eid = '$event'";
                    $exe1 = mysqli_query($dbc, $query1);
                    echo "Event Name :  " . eventName($event) . "<br> Event ID : " . $event;
                    echo "\n";
                }
                ?>
                <br><br>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Participant ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone No</th>
                            <th scope="col">year</th>
                            <th scope="col">department</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (count($_POST) > 0)
                            while ($row1 = mysqli_fetch_array($exe1)) {
                                $p_id = $row1['pid'];
                                $name = $row1['name'];
                                $email = $row1['email'];
                                $phone = $row1['phone'];
                                $year = $row1['year'];
                                $dept = $row1['dept'];
                                echo "
                                <tr>
                                    <td>" . $p_id . "</td>
                                    <td>" . $name . "</td>
                                    <td>" . $email . "</td>
                                    <td>" . $phone . "</td>
                                    <td>" . $year . "</td>
                                    <td>" . $dept . "</td>
                                </tr>";
                            }

                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
    </section>
    </body>

    <?php
    include_once('./templates/footer.php');
    ?>

</html>