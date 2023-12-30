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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo $server; ?>css/style.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
        </script>

    <?php
    include_once('./templates/sidebar.php');
    ?>

    <?php
    $host = "localhost";
    $dbuser = "root";
    $dbpass = "vijai@123";
    $dbase = "enigma";

    $dbc = mysqli_connect($host, $dbuser, $dbpass, $dbase)
        or die("Unable to select database");
    ?>
    <br><br>
    <table class="table container" style="margin-top: 75px; margin-left: 20px; padding-right: 20px">
        <div class="row" style="margin-top: 75px; margin-bottom: 20px; margin-left: 20px;">
            <a href="./components/user/add.php"><button type="button" class="btn btn-primary ml-4 pl-2">Add
                    New</button></a>
        </div>
        <thead>
            <tr>
                <th scope="col">User ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone No</th>
                <th scope="col">year</th>
                <th scope="col">department</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query1 = "select * from users";
            $exe1 = mysqli_query($dbc, $query1);
            while ($row1 = mysqli_fetch_array($exe1)) {
                $p_id = $row1['uid'];
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
                                    <td>
						                <a href='./components/user/update.php?id=$p_id'>
                                            <button type='button' class='btn btn-info'>Edit</button>
                                        </a>

                                        <a href='./components/user/delete.php?id=$p_id'>
                                            <button type='button' class='btn btn-danger btn-xs'>Delete</button>
                                        </a>
                                    </td>
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
    <?php
    include_once('./templates/footer.php');
    ?>
    </body>