<?php
    $db = mysqli_connect("localhost", "root", "", "filmovi");

    $searchTerm = $_GET['term'];
    $query = $db->query("SELECT * FROM svi_filmovi
    WHERE naslov LIKE '%".$searchTerm."%' OR godina LIKE '%".$searchTerm."%' ORDER BY naslov ASC");

    while($row = $query->fetch_assoc()) {
        $data[] = $row['naslov']." (".$row['godina'].')';
    }

    echo json_encode($data);
?>