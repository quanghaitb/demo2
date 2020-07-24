<?php
class Post
{
  public $id;
  public $title;
  public $description;
  public $image;
  public $status;
  public $create_at;
  public $update_at;


  function __construct($id, $title, $description, $image, $status, $create_at, $update_at)
  {
    $this->id = $id;
    $this->title = $title;
    $this->description = $description;
    $this->image = $image;
    $this->status = $status;
    $this->create_at = $create_at;
    $this->update_at = $update_at;
  }

  static function all()
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query('SELECT * FROM posts');

    foreach ($req->fetchAll() as $item) {
      $list[] = new Post($item['id'], $item['title'], $item['description'], $item['image'], $item['status'], $item['create_at'], $item['update_at']);
    }

    return $list;
  }
  static function find($id)
  {
    $db = DB::getInstance();
    $req = $db->prepare('SELECT * FROM posts WHERE id = :id');
    $req->execute(array('id' => $id));

    $item = $req->fetch();
    if (isset($item['id'])) {
      return new Post($item['id'], $item['title'], $item['description'], $item['image'], $item['status'], $item['create_at'], $item['update_at']);
    }
    return null;
  }
  static function insert($title, $description, $image, $status, $create_at, $update_at)
  {
    $db = DB::getInstance();
    $sql = "INSERT INTO posts(title,description,image,status,create_at,update_at) VALUES (:title, :description, :image, :status, :create_at, :update_at)";
    $req = $db->prepare($sql);
    $req->execute(['title' => $title,'description' => $description,'image' => $image,'status' => $status,'create_at' => $create_at,'update_at' => $update_at]);
    if($req) {
      echo '<script language="javascript">';
      echo 'alert("Insert successfully")';
      echo '</script>';
      echo "<script> location.href='http://localhost/demo2/managers'; </script>";

    }
    else {
      echo '<script language="javascript">';
      echo 'alert("Failed")';
      echo '</script>';
    }
  }
  static function edit($id, $title, $description, $image, $status, $update_at)
  {
    $db = DB::getInstance();
    $sql = "UPDATE posts SET title = :title, description = :description,image = :image,status = :status, update_at = :update_at WHERE id = :id";
    $req = $db->prepare($sql);
    $t = $req->execute(['id' => $id, 'title' => $title,'description' => $description,'image' => $image,'status' => $status,'update_at' => $update_at]);
    if($t) {
      echo '<script language="javascript">';
      echo 'alert("Update successfully")';
      echo '</script>';
    }
    else {
      echo '<script language="javascript">';
      echo 'alert("Update Faied")';
      echo '</script>';
    }
  }
  static function delete($id)
  {
    $db = DB::getInstance();
    $sql = "DELETE FROM posts WHERE id= :id";
    $req = $db->prepare($sql);
    $req->execute(['id' => $id]);
  }
}
?>