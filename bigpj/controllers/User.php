<?php
class User extends Controller
{
    public function __construct()
    {
        $this->ArtistModel = $this->model('ArtistModel');
        $this->SongModel = $this->model('SongModel');
    }

    public function login()
    {
        if (!empty($_SESSION['user_id'])) {
            header('location:' . URLROOT . '/Home/index');
        } else {
            $user = $this->ArtistModel->getUser($_POST['email'], md5($_POST['password']));
            //var_dump($user);
            if (!empty($user)) {
                $_SESSION['user_id'] = $user[0]['artistID'];
                $_SESSION['user_name'] = $user[0]['name'];
                $_SESSION['user_ava'] = $user[0]['avafile'];
                $_SESSION['user_date'] = $user[0]['date'];

                header('location:' . URLROOT . '/Home/index');
            } else{
                $message = "Email or password is incorrect!";
                echo "<script>alert('$message');</script>";
                $this->view('login', []);
            }
        }
    }

    public function signup()
    {
        if(isset($_POST['submit'])) {
            if(md5($_POST['password']) != md5($_POST['password2'])) {
                $message = "Confirm password is not match!";
                echo "<script>alert('$message');</script>";
                $this->view('signup', []);
            }
            else {
                $signup = $this->ArtistModel->addUser($_POST['email'], md5($_POST['password']), $_POST['username'], 'defaultava.png', date('Y-m-d H:i:s'));
                if ($signup == true) {
                    $message = "Your account have been created successfully!";
                    echo "<script>alert('$message');</script>";
                    $this->view('login', []);
                } else {
                    $message = "This email is already registed!";
                    echo "<script>alert('$message');</script>";
                    $this->view('signup', []);
                }
            }
        }
        else header('location:' . URLROOT . '/Home/signup');
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_ava']);
        unset($_SESSION['user_date']);
        header('location:' . URLROOT . '/Home/login');
    }

    public function library_artists()
    {
        //gọi và show dữ liệu ra view
        $followedArtists = $this->ArtistModel->getAllArtistsThisUserIDFollowed($_SESSION['user_id']);
        $this->view('library_artists', ['artists' => $followedArtists]);
    }

    public function library()
    {
        $likedSongs = $this->ArtistModel->getAllSongsThisUserIDLiked($_SESSION['user_id']);
        $this->view('library', ['songs' => $likedSongs]);
    }

    public function follow($id) {
        $follow = $this->ArtistModel->addFollow($_SESSION['user_id'], $id);
        header('location:' . URLROOT . '/Song/profile/' . $id);
    }

    public function unfollow($id) {
        $unfollow = $this->ArtistModel->deleteFollow($_SESSION['user_id'], $id);
        header('location:' . URLROOT . '/Song/profile/' . $id);
    }

    public function like($songID) {
        if (!empty($_SESSION['user_id'])) {
            $like = $this->ArtistModel->toggleLike($_SESSION['user_id'], $songID);
            header('location:' . URLROOT . '/Song/musicplayer/' . $songID);
        }
    }

    public function changeava() {
        $tnameimg = $_FILES['img']['tmp_name'];

        move_uploaded_file($tnameimg, APPROOT . "/public/img/" . $_FILES['img']['name']);

        $changeava = $this->ArtistModel->changeAvabyID($_SESSION['user_id'], $_FILES['img']['name']);

        $_SESSION['user_ava'] = $_FILES['img']['name'];

        $message = "Your avatar have been changed successfully!";
        echo "<script>alert('$message');</script>";
        $this->view('changeava', []);
    }
}
