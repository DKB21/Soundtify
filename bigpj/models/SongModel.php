<?php
    class SongModel {
        public function __construct() {

        }

        public function getAllSong() {
            $link = null;
            taoKetNoi($link);
            $result = chayTruyVanTraVeDL($link, "SELECT * from song join artist where song.artistID = artist.artistID order by uploaddate desc");
            $data = $result;
            giaiPhongBoNho($link, $result);
            return $data;
        }

        public function countAllSong() {
            $link = null;
            taoKetNoi($link);
            $result = chayTruyVanTraVeDL($link, "SELECT count(*) from song");
            $data = $result;
            giaiPhongBoNho($link, $result);
            return $data;
        }

        public function getSongbyID($id) {
            $link = null;
            taoKetNoi($link);
            $result = chayTruyVanTraVeDL($link, "SELECT * from song join artist on song.artistID = artist.artistID and songID='$id'");
            $data = $result;
            giaiPhongBoNho($link, $result);
            return $data;
        }

        public function getAllSongbyArtistID($id) {
            $link = null;
            taoKetNoi($link);
            $result = chayTruyVanTraVeDL($link, "SELECT * from song join artist on song.artistID = artist.artistID and artist.artistID='$id' order by songID desc");
            $data = $result;
            giaiPhongBoNho($link, $result);
            return $data;
        }

        public function searchSong($title) {
            $link = null;
            taoKetNoi($link);
            $result = chayTruyVanTraVeDL($link, "SELECT * from song join artist where title like '%$title%' and song.artistID = artist.artistID order by uploaddate desc");
            $data = $result;
            giaiPhongBoNho($link, $result);
            return $data;
        }

        public function addSong($artistID, $title, $songfile, $songimg, $date) {
            $link = null;
            taoKetNoi($link);
            $result = chayTruyVanKhongTraVeDL($link, "INSERT into song (artistID, title, songfile, songimg, uploaddate) values('$artistID', '$title', '$songfile', '$songimg', '$date')");
            giaiPhongBoNho($link, $result);
            return true;
        }
    }
?>