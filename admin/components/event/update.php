<?php
$dbc = mysqli_connect("localhost", "root", "vijai@123", "enigma")
    or die("Unable to select database");

session_start();

if (!(isset($_SESSION['Aname']))) {
    echo "Unauthorized Access";
    return;
}

$id = $_GET['id'];

$SelSql = "SELECT * FROM `events` WHERE eid=$id";
$res = mysqli_query($dbc, $SelSql);
$r = mysqli_fetch_assoc($res);


if (isset($_POST) & !empty($_POST)) {
    $name = ($_POST['name']);
    $description = ($_POST['desc']);
    $category = ($_POST['type']);
    $date = ($_POST['date']);
    $time = ($_POST['time']);
    $img = ($_POST['img']);


    $query = "UPDATE `events` SET name='$name', description='$description', type='$category', date='$date', time='$time', image='$img' WHERE eid='$id'";

    $res = mysqli_query($dbc, $query);
    if ($res) {
        header('location: ../../events.php');
    } else {
        $fmsg = "Failed to Insert data.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Enigma | Add Events</title>
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

            <h2 style="padding-top: 120px; margin-left: 20px">Update Event</h2>
            <form method="post" style="margin-left: 20px" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $r['name']; ?>" required />
                </div>
                <div class="form-group">
                    <label>New description</label>
                    <input type="text" class="form-control" name="desc" value="<?php echo $r['description']; ?>"
                        required />
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-select" aria-label="Select Event" name="type">
                        <option value="technical">Technical</option>
                        <option value="non technical">Non Technical</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date" value="<?php echo $r['date']; ?>" />
                </div>
                <div class="form-group">
                    <label>Time</label>
                    <input type="time" class="form-control" name="time" value="<?php echo $r['time']; ?>" />
                </div>
                <div class="form-group">
                    <label>Image Url : </label>
                    <input type="url" class="form-control" name="img" value="<?php echo $r['image']; ?>" />
                </div>

                <input type="submit" class="btn btn-primary" value="Update" />
            </form>
        </div>

        <?php require_once('../../templates/footer.php') ?>
</body>

</html>