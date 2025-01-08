<?php
session_start();
include('../../config.php');

// Validasi apakah semua data yang dibutuhkan tersedia
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $cast = mysqli_real_escape_string($con, $_POST['cast']);
    $desc = mysqli_real_escape_string($con, $_POST['desc']);
    $rdate = mysqli_real_escape_string($con, $_POST['rdate']);
    $video = mysqli_real_escape_string($con, $_POST['video']);

    // Lokasi penyimpanan file
    $target_dir = "../../images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $flname = "images/" . basename($_FILES["image"]["name"]);

    // Validasi file upload
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        // Query insert ke database
        $query = "INSERT INTO tbl_movie (t_id, movie_name, cast, `desc`, release_date, image, video_url, status)
                  VALUES ('{$_SESSION['theatre']}', '$name', '$cast', '$desc', '$rdate', '$flname', '$video', '0')";
        $result = mysqli_query($con, $query);

        // Cek apakah query berhasil
        if ($result) {
            $_SESSION['success'] = "Movie Added";
            header('location:add_movie.php');
        } else {
            die("Database Error: " . mysqli_error($con));
        }
    } else {
        die("File Upload Error: Failed to upload image.");
    }
} else {
    die("Invalid Request Method");
}
?>
