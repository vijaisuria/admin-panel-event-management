<?php
$dbc = mysqli_connect("localhost", "root", "vijai@123", "enigma")
    or die("Unable to select database");

session_start();

if (!(isset($_SESSION['Aname']))) {
    echo "Unauthorized Access";
    return;
}

if (isset($_POST) & !empty($_POST)) {
    $eid = ($_POST['eid']);
    $uid = ($_POST['uid']);

    $query = "INSERT INTO `participants` (uid,eid) 
		VALUES ('$uid', '$eid')";

    $res = mysqli_query($dbc, $query);
    if ($res) {
        header('location: ../../user.php');
    } else {
        $fmsg = "Failed to Insert data.";
        print_r($res);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <title>Enigma | Add Participant</title>
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

    <link rel="stylesheet" href="home.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../home.css">
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class='bx bxl-c-plus-plus'></i>
            <span class="logo_name">Enigma</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="home.php" class="active">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="user.php">
                    <i class='bx bx-box'></i>
                    <span class="links_name">Users</span>
                </a>
            </li>
            <li>
                <a href="events.php">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Event list</span>
                </a>
            </li>
            <li>
                <a href="participants.php">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Participants</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-heart'></i>
                    <span class="links_name">Feedback</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Queries</span>
                </a>
            </li>
            <li class="log_out">
                <a href="logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>

    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="dashboard">Dashboard</span>
            </div>
            <div class="search-box">
                <input type="text" placeholder="Search...">
                <i class='bx bx-search'></i>
            </div>
            <div class="profile-details">
                <img src="https://t4.ftcdn.net/jpg/00/97/00/09/360_F_97000908_wwH2goIihwrMoeV9QF3BW6HtpsVFaNVM.jpg"
                    alt="profile">
                <span class="admin_name">
                    <?php echo $_SESSION["Aname"] ?>
                </span>
                <i class='bx bx-chevron-down'></i>
            </div>
        </nav>
        <div class="container">

            <?php if (isset($fmsg)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $fmsg; ?>
                </div>
            <?php } ?>

            <h2 style="padding-top: 120px; margin-left: 20px">Add New User</h2>
            <form method="post" style="margin-left: 20px" enctype="multipart/form-data">
                <div class="form-group">
                    <label>User ID :</label>
                    <input type="text" class="form-control" name="uid" value="" required />
                </div>
                <h4>OR</h4>
                <div class="form-group">
                    <label>User Name :</label>
                    <input type="text" class="form-control" name="uname" value="" required />
                </div>
                <div class="form-group">
                    <label>Event ID</label>
                    <input type="email" class="form-control" name="pi" value="" required />
                </div>
                <h4>OR</h4>
                <div class="form-group">
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
                </div>
                <br><br>
                <input type="submit" class="btn btn-primary" value="Add User" />
            </form>
        </div>

        <?php include_once('../../templates/footer.php') ?>

</body>

</html>