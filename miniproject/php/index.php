<?php
require_once "connection.php";
$sql = "SELECT * FROM olahraga2";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Health Care</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../img/logo.svg" />
</head>

<body>
    <!-- Azriel Setyo Nugroho Hasudungan - 71200576 -->
    <!-- Felix Nathanael Tjahjono - 71200578 -->
    <!-- Shalommita Pranatantri - 71200640 -->
    <header>
        <div class="logo">
            <a href="index.php">
                <img src=" ../img/logo.svg" alt="logo" />
            </a>
        </div>

        <nav>
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
                        $result2 = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result2)) {
                            echo '<li><a href="content.php?id=' . $row['idOlahraga'] . '">' . $row['namaOlahraga'] . '</a></li>';
                        }
                        ?>
                        <!-- <li>
                            <a href="yoga.php">Yoga</a>
                        </li>
                        <li>
                            <a href="aerobik.php">Aerobik</a>
                        </li>
                        <li>
                            <a href="cardio.php">Cardio</a>
                        </li>
                        <li>
                            <a href="pilates.php">Pilates</a>
                        </li> -->
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
        <li>
            <a href="index.php">Home</a>
        </li>
    </ul>
    <main>
        <table>
            <?php
            $count = 1;
            while ($rows = mysqli_fetch_assoc($result)) {
                if ($count % 2 == 1) {
                    echo '<tr>
                    <td class="kolom1">
                        <a href="content.php?id=' . $rows["idOlahraga"] . '" class="judul">
                            <h1>' . $rows['namaOlahraga'] . '</h1>
                        </a>
                        <img src="' . $rows['pathCoverOlahraga'] . '" alt="' . $rows['namaOlahraga'] . '" />
                    </td>';
                } else {
                    echo '<td class="kolom2">
                        <a href="content.php?id=' . $rows["idOlahraga"] . '" class="judul">
                            <h1>' . $rows['namaOlahraga'] . '</h1>
                        </a>
                        <img src="' . $rows['pathCoverOlahraga'] . '" alt="' . $rows['namaOlahraga'] . '" />
                    </td></tr>';
                }
                $count++;
            }
            ?>
        </table>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </main>
    <footer>
        <p>Copyrigth &copy; 2022 Universitas Kristen Duta Wacana</p>
    </footer>
</body>

</html>