<?php
require_once "connection.php";
$sql = "SELECT * FROM olahraga2";
$result = mysqli_query($conn, $sql);
if ($_GET) {
    $idOlahraga = $_GET['id'];
    $sql = "SELECT * FROM olahraga2 WHERE idOlahraga = $idOlahraga";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $namaOlahraga = $row['namaOlahraga'];
        $deskripsiOlahraga = $row['deskripsiOlahraga'];
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Yoga</title>
    <link rel="stylesheet" href="style_content.css" />
    <link rel="icon" href="../img/logo.svg" />
</head>

<body>
    <header>
        <div class="logo">
            <a href="index.php">
                <img src=" ../img/logo.svg" alt="logo" />
            </a>
        </div>
        <nav class="navbar">
            <ul>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="about.php">About</a>
                </li>
                <li>
                    <a href="#">Tipe</a>
                    <ul class="ulBawah">
                        <?php
                        $sql2 = "SELECT * FROM olahraga2";
                        $result2 = mysqli_query($conn, $sql2);
                        while ($row = mysqli_fetch_assoc($result2)) {
                            echo '<li><a href="content.php?id=' . $row['idOlahraga'] . '">' . $row['namaOlahraga'] . '</a></li>';
                        }
                        ?>
                    </ul>
                </li>
            </ul>
            <form action="" class="search-form">
                <input type="text" placeholder="Search..." />
                <button>Search</button>
            </form>
            <a href="admin.php">Admin</a>
        </nav>
    </header>
    <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li><?= $namaOlahraga ?></li>
    </ul>
    <main>
        <h1 class="title"><?= $namaOlahraga ?></h1>
        <section class="deskripsi">
            <h2>Deskripsi</h2>
            <p>
                <?= $deskripsiOlahraga ?>
            </p>
        </section>
        <h2 class="video"><u>Video</u><br /></h2>
        <?php
        $sql = "SELECT * FROM video2 WHERE idOlahraga = $idOlahraga";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<span class=".$row['level'].">";
            echo "<iframe width='360' height='250' src='https://www.youtube.com/embed/".$row['link']."'
                title='YouTube video player' frameborder='0'
                allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture'
                allowfullscreen></iframe>";
            echo "<h3>".$row['judul']."</h3><br />";
            echo "<table>
                    <tr>
                        <th colspan='2'>".$row['level']."</th>
                    </tr>
                    <tr>
                        <td>Instruktur</td>
                        <td>".$row['instruktur']."</td>
                    </tr>
                    <tr>
                        <td>Durasi</td>
                        <td>".$row['durasi']."</td>
                    </tr>
                    <tr>
                        <td>Peralatan</td>
                        <td>
                            <ul>
                                <li>".$row['peralatan']."</li>
                            </ul>
                        </td>
                    </tr>
                    </table>";
            echo "</span>";
        }
        ?>
        <section class="beginner">
            <iframe width="360" height="250" src="https://www.youtube.com/embed/VaoV1PrYft4"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
            <h3>
                Easy Exercise To Lose Belly Fat At Home For Beginners - 35
                Mins Yoga Workout | EMMA Fitness
            </h3>
            <br />
            <table>
                <tr>
                    <th colspan="2">Beginner</th>
                </tr>
                <tr>
                    <td>Instruktur</td>
                    <td>Sarah Beth</td>
                </tr>
                <tr>
                    <td>Durasi</td>
                    <td>09:59</td>
                </tr>
                <tr>
                    <td>Peralatan</td>
                    <td>
                        <ul>
                            <li>Yoga Mat</li>
                        </ul>
                    </td>
                </tr>
            </table>
        </section>
        <section class="intermediate">
            <iframe width="360" height="250" src="https://www.youtube.com/embed/_LvGTQ3Aq-g"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
            <h3>30 min Full Body Yoga - Intermediate Vinyasa Yoga</h3>
            <br />
            <table>
                <tr>
                    <br />
                    <th colspan="2">Intermediate</th>
                </tr>
                <tr>
                    <td>Instruktur</td>
                    <td>Kassandra</td>
                </tr>
                <tr>
                    <td>Durasi</td>
                    <td>31:09</td>
                </tr>
                <tr>
                    <td>Peralatan</td>
                    <td>
                        <ul>
                            <li>Yoga Mat</li>
                        </ul>
                    </td>
                </tr>
            </table>
        </section>
        <section class="advanced">
            <iframe width="360" height="250" src="https://www.youtube.com/embed/t2z8ZsAP2Vw"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
            <h3>
                Advanced Yoga Workout ♥ Challenge Your Strength & Balance |
                Tofino
            </h3>
            <br />
            <table>
                <tr>
                    <th colspan="2">Advanced</th>
                </tr>
                <tr>
                    <td>Instruktur</td>
                    <td>Juliana</td>
                </tr>
                <tr>
                    <td>Durasi</td>
                    <td>17:53</td>
                </tr>
                <tr>
                    <td>Peralatan</td>
                    <td>
                        <ul>
                            <li>Yoga Mat</li>
                        </ul>
                    </td>
                </tr>
            </table>
        </section>
    </main>
    <footer>
        <p>&copy; 2022 Universitas Kristen Duta Wacana</p>
        <!-- <img src="../img/ukdw.png" alt="ukdw" /> -->
    </footer>
</body>

</html>