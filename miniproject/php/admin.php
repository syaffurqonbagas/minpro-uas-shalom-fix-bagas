<?php
require_once "connection.php";

/* if($_GET){ $id=$_GET['idOlahraga']; */
$sql = "SELECT olahraga.idOlahraga as idOlahraga, olahraga.namaOlahraga as NamaOlahraga, tipe.namaTipe as TipeOlahraga, level.namaLevel as Level, olahraga.peralatan as Peralatan,
	olahraga.deskripsi as Deskripsi, video.durasi as Durasi, instruktur.namaInstruktur as Instruktur, video.linkVideo as Video, image.imagePath as Image
	FROM olahraga
	INNER JOIN tipe ON olahraga.idTipe=tipe.idtipe
	INNER JOIN image ON olahraga.idImage=image.idImage
	INNER JOIN level ON olahraga.idLevel=level.idLevel
	INNER JOIN video ON olahraga.idVideo=video.idVideo
	INNER JOIN instruktur ON olahraga.idInstruktur=instruktur.idInstruktur
	/* INNER JOIN image ON olahraga.idImage=image.idImage WHERE olahraga.idOlahraga */";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result);
	$nama = $row["NamaOlahraga"];
	$tipe = $row["TipeOlahraga"];
	$level = $row["Level"];
	$desc = $row["Deskripsi"];
	$dur = $row["Durasi"];
	$peralatan = $row["Peralatan"];
	$instruktur = $row["Instruktur"];
	$image = $row["Image"];
	$video = $row["Video"];
} else {
	echo "data tidak ada";
}
/* } */

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Admin</title>
	<link rel="stylesheet" href="../css/admin.css" />
	<link rel="icon" href="../img/logo.svg" />
</head>

<body>
	<header>
		<nav class="navbar">
			<div class="logo"><a href="index.html">HEALTH CARE</a></div>
			<ul class="nav-links">
				<input type="checkbox" id="checkbox_toggle" />
				<label for="checkbox_toggle" class="olahraga">&#9776;</label>
				<div class="menu1">
					<li><a href="/">Home</a></li>
					<li class="services">
						<a href="/">Olahraga</a>
						<ul class="dropdown">
							<li><a href="yoga.html">Yoga</a></li>
							<li><a href="aerobik.html">Aerobik</a></li>
							<li><a href="cardio.html">Cardio</a></li>
							<li><a href="hiit.html">Aerobik</a></li>
						</ul>
					</li>
					<form>
						<input class="search" type="text" placeholder="Cari..." required />
						<input class="button1" type="button" value="Cari" />
					</form>
				</div>
			</ul>
		</nav>
	</header>
	<ul class="breadcrumb">
		<li><a href="index.html">Home</a></li>
		<li>Admin</li>
	</ul>
	<main>
		<h1>Daftar Olahraga</h1>
		<a href="insert.php">Insert</a>
		<table width='80%' border=1>
			<tr>
				<th>Nama Olahraga</th>
				<th>Tipe Olahraga</th>
				<th>Level</th>
				<th>Peralatan</th>
				<th>Durasi</th>
				<th>Nama Instruktur</th>
				<th>Action</th>
			</tr>
			<?php while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $nama . "</td>";
				echo "<td>" . $tipe . "</td>";
				echo "<td>" . $level . "</td>";
				echo "<td>" . $instruktur . "</td>";
				echo "<td>" . $desc . "</td>";
				echo "<td>" . $peralatan . "</td>";
				echo "<td>" . $video . "</td>";
				echo "<td>" . $image . "</td>";
				echo "<td>";
				echo "<a href='edit.php?id=" . $row['id'] . "'>Edit</a>";
				echo "<a href='delete.php?id=" . $row['id'] . "'> Delete</a>";
				echo "</td>";
				echo "</tr>";
				echo "<br>";
			} ?>
		</table>
	</main>
	<footer>
		<p>&copy; 2022 Universitas Kristen Duta Wacana</p>
	</footer>
</body>

</html>
