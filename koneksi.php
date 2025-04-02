<?php
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "ukk_kasir");
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
