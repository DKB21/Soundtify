<?php
class Song extends Controller
{
    public function __construct()
    {
        $this->SongModel = $this->model('SongModel');
        $this->ArtistModel = $this->model('ArtistModel');
    }

    
    public function musicplayer($id) {
        $song = $this->SongModel->getSongbyID($id);
        $songs = $this->SongModel->getAllSong();
        $countSong = $this->SongModel->countAllSong();

        if(!empty($_SESSION['user_id'])) {
            $checkLiked = $this->ArtistModel->getLike($_SESSION['user_id'], $id);
            $this->view('musicplayer', ['song' => $song, 'songs' => $songs, 'checkLiked' => $checkLiked, 'countSong' => $countSong]);
        }
        else{
            $this->view('musicplayer', ['song' => $song, 'songs' => $songs, 'countSong' => $countSong]);
        }
    }

    public function profile($id) {
        $songs = $this->SongModel->getAllSongbyArtistID($id);

        if(!empty($_SESSION['user_id']))
        {
            $checkFollow = $this->ArtistModel->getFollow($_SESSION['user_id'], $id);
            $this->view('profile', ['songs' => $songs, 'checkFollow' => $checkFollow]);
        }
        if(empty($_SESSION['user_id']))
        {
            $this->view('profile', ['songs' => $songs]);
        }
    }

    public function search()
    {
        $searchedSongs = $this->SongModel->searchSong($_POST['searchtext']);
        $searchedArtists = $this->ArtistModel->searchArtist($_POST['searchtext']);;
        //gọi và show dữ liệu ra view
        $this->view('search', ['songs' => $searchedSongs, 'artists' => $searchedArtists]);
    }
    
    public function upload()
    {
        $canUpload = true;

        $cutaudio = explode(".", $_FILES['songfile']['name']);
        $cutimg = explode(".", $_FILES['songimg']['name']);
        
        if($cutaudio[1] != "mp3" && $cutaudio[1] != "wav") $canUpload = false;
        if($cutimg[1] != "jpg" && $cutaudio[1] != "jpeg" && $cutaudio[1] != "png") $canUpload = false;

        if($canUpload == true) {
            $tnameaudio = $_FILES['songfile']['tmp_name'];
            $tnameimg = $_FILES['songimg']['tmp_name'];

            move_uploaded_file($tnameaudio, APPROOT . "/public/audio/" . $_FILES['songfile']['name']);
            move_uploaded_file($tnameimg, APPROOT . "/public/img/" . $_FILES['songimg']['name']);

            $upload = $this->SongModel->addSong($_SESSION['user_id'], $_POST['title'], $_FILES['songfile']['name'], $_FILES['songimg']['name'], date('Y-m-d H:i:s'));
            $message = "Added song successfully!";
            echo "<script>alert('$message');</script>";
            $this->view('upload', []);
        }
        else {
            $message = "Added failed: Invalid file format!";
            echo "<script>alert('$message');</script>";
            $this->view('upload', []);
        }
    }
}
?>