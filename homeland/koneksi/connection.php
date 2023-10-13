<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_homeland";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed : " . mysqli_connect_error());
} else {
    // echo "Connection successfull";
}

// function query($query)
// {
//     global $conn;
//     $result = mysqli_query($conn, $query);
//     $rows = [];
//     while ($row = mysqli_fetch_assoc($result)) {
//         $rows[] = $row;
//     }
//     return $rows;
// }

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_user WHERE id = $id");
    return mysqli_affected_rows($conn);
}
