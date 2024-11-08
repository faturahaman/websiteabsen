<?php
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row =  mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function cari($keyword) {
	global $conn;

	$query = "SELECT * FROM tb_absen
				WHERE
				kelas LIKE %$keyword%";
	return $query;
}