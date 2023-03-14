<?php
class Home extends Controller
{
    public function __construct()
    {
        $this->SongModel = $this->model('SongModel');
        $this->ArtistModel = $this->model('ArtistModel');
    }

    public function index()
    {
        //gọi và show dữ liệu ra view
        $songs = $this->SongModel->getAllSong();
        $artists = $this->ArtistModel->getAllUser();
        $this->view('index', ['songs' => $songs, 'artists' => $artists]);
    }

    public function library_artists()
    {
        //gọi và show dữ liệu ra view
        $this->view('library_artists', []);
    }

    public function library_mysongs()
    {
        //gọi và show dữ liệu ra view
        $this->view('library_mysongs', []);
    }

    public function library()
    {
        //gọi và show dữ liệu ra view
        $this->view('library', []);
    }

    public function search()
    {
        //gọi và show dữ liệu ra view
        $this->view('search', []);
    }

    public function upload()
    {
        //gọi và show dữ liệu ra view
        $this->view('upload', []);
    }

    public function account()
    {
        //gọi và show dữ liệu ra view
        $this->view('account', []);
    }

    public function login() {
        if (!empty($_SESSION['user_id'])) {
            header('location:' . URLROOT . '/Home/index');
        }
        $this->view('login', []);
    }

    public function signup() {
        if (!empty($_SESSION['user_id'])) {
            header('location:' . URLROOT . '/Home/index');
        }
        $this->view('signup', []);
    }

    public function changeava() {
        $this->view('changeava', []);
    }
}
?>