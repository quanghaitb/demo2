<?php
require_once('controllers/base_controller.php');
require_once('models/post.php');
require_once('App.php');
class posts extends BaseController
{
  function UrlProcess(){
    if( isset($_GET["url"]) ){
        return explode("/", filter_var(trim($_GET["url"], "/")));
    }
  }
  function __construct()
  {
    $this->folder = 'client';
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
    $this->render('show', $data);
  }
}