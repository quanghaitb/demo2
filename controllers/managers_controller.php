<?php
require_once('controllers/base_controller.php');
require_once('models/post.php');


class managers extends BaseController
{
  
  function __construct()
  {
    $this->folder = 'admin';
  }

  public function index()
  {
    $posts = Post::all();
    $data = array('posts' => $posts);
    $this->render('index', $data);
  }
  public function showPost()
  {
    $arr = $this->UrlProcess();
    $post = Post::find($arr[2]);
    $data = array('post' => $post);
    $this->render('showPost', $data);
  }
  public function editPost()
  {
    $arr = $this->UrlProcess();
    $this->render('editPost');
    if(isset($_POST['submit'])) {
      $title = $_POST["title"];
      $description = $_POST["description"];
      $image = "http://localhost/demo2/assets/images/" . $_FILES['imagePost']['name'];
      // $image = $_FILES['image']['name'];
      // move_uploaded_file($_FILES['image']['temp_name'], "assets/images/$image");
      $status = $_POST['status'];
      $update_at = date('Y-m-d H:i:s');
      $post = Post::edit($arr[2],$title,$description,$image,$status,$update_at);
      echo "<script> location.href='http://localhost/demo2/managers'; </script>";
    }
    
  }
  public function deletePost()
  {
    $arr = $this->UrlProcess();
    Post::delete($arr[2]);
    $posts = Post::all();
    $data = array('posts' => $posts);
    $this->render('index', $data);
    echo "<script> location.href='http://localhost/demo2/managers'; </script>";


  }
  public function createPost()
  {
    $this->render('createPost');
    if(isset($_POST['submit'])) {
      $title = $_POST['title'];
      $description = $_POST['description'];
      $image = "http://localhost/demo2/assets/images/" . $_FILES['imagePost']['name'];  
      // move_uploaded_file($_FILES['imagePost']['tmp_name'],'assets/images/' .$_FILES['imagePost']['name']);
      $status = $_POST['status']; 
      $create_at = date('Y-m-d H:i:s');
      $update_at = null;
      $kq = Post::insert($title, $description, $image, $status, $create_at, $update_at);
    }
  }
  function UrlProcess(){
    if( isset($_GET["url"]) ){
        return explode("/", filter_var(trim($_GET["url"], "/")));
    }
  }
}