<?php
require_once "Config.php";

function taoKetNoi(&$link)
{
    $link = mysqli_connect(HOST, USER, PASSWORD, DB);
    if (mysqli_connect_errno()) {
        echo "Lỗi kết nối tới máy chủ: " . mysqli_connect_error();
        exit();
    }
}

function chayTruyVanTraVeDL($link, $q)
{
    $result = mysqli_query($link, $q);

    $data = null;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        try {
            mysqli_free_result($result);
        } catch (\Throwable $th) {
            echo $th;
        }

        return $data;
    } 
}

function chayTruyVanKhongTraVeDL($link, $q)
{
    try {
        $result = mysqli_query($link, $q);
    } catch (\Throwable $th) {
        var_dump($th);
    }
    

    if ($result) {
        return true;
    } else {
        return false;
    }
}

function giaiPhongBoNho($link, $result)
{
    try {
        mysqli_close($link);

    } catch (TypeError $e) {
        
    }
}
?>