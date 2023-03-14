<?php
class ArtistModel
{
    public function __construct()
    {
    }

    public function getUser($email, $password)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * from artist WHERE email = '$email' AND password = '$password'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function getAllUser()
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * from artist order by date asc");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function addUser($email, $password, $name, $avafile, $date)
    {
        if ($this->getUserbyEmail($email) == null) {
            $link = null;
            taoKetNoi($link);
            $result = chayTruyVanKhongTraVeDL($link, "INSERT into artist (email, password, name, avafile, date) values('$email', '$password', '$name', '$avafile', '$date')");
            giaiPhongBoNho($link, $result);
            return true;
        } else return false;
    }

    public function getUserbyEmail($email)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * from artist where email = '$email'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function addFollow($AID, $BID)
    {
        if ($this->getFollow($AID, $BID) == null) {
            $link = null;
            taoKetNoi($link);
            $result = chayTruyVanKhongTraVeDL($link, "INSERT into follow (artistFollowID, artistGetFollowID) values('$AID', '$BID')");
            giaiPhongBoNho($link, $result);
            return true;
        } else return false;
    }

    public function deleteFollow($AID, $BID)
    {
        if ($this->getFollow($AID, $BID) != null) {
            $link = null;
            taoKetNoi($link);
            $result = chayTruyVanKhongTraVeDL($link, "DELETE from follow where artistFollowID = '$AID' and artistGetFollowID = '$BID'");
            giaiPhongBoNho($link, $result);
            return true;
        } else return false;
    }

    public function toggleLike($artistID, $songID) 
    {
        $link = null;
        taoKetNoi($link);
        if ($this->getLike($artistID, $songID) == null) {
            $result = chayTruyVanKhongTraVeDL($link, "INSERT into likesong (artistID, songID) values('$artistID', '$songID')");
        } 
        else {
            $result = chayTruyVanKhongTraVeDL($link, "DELETE from likesong where artistID = '$artistID' and songID = '$songID'");
        }
        giaiPhongBoNho($link, $result);
    }

    public function getFollow($AID, $BID)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * from follow where artistFollowID = '$AID' and artistGetFollowID = '$BID'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function getAllArtistsThisUserIDFollowed($ID)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * from follow join artist where follow.artistFollowID = '$ID' and follow.artistGetFollowID = artist.artistID");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function getAllSongsThisUserIDLiked($ID)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * from likesong join song, artist where likesong.artistID = '$ID' and likesong.songID = song.songID and song.artistID = artist.artistID");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function getLike($artistID, $songID)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * from likesong where artistID = '$artistID' and songID = '$songID'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function searchArtist($name)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * from artist where name like '%$name%' order by date asc");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function changeAvabyID($id, $newAva) {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "UPDATE artist set avafile = '$newAva' where artistID = '$id'");
        giaiPhongBoNho($link, $result);
        return true;
    }
}
