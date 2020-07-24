<?php 
  $previous = "javascript:history.go(-1)";
  if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}
?>
<!DOCTYPE html>
<html>
  <head>
  <style>
  table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    width:auto;
  }
  #image_element, img{
    height: 50px;
    width:50px;
  }
  </style>
  </head>
<body>
  <h2>List Post</h2>
  <?php
  ?>
  <button style="float: right;"><a href="<?= $previous ?>" style="text-decoration: none;">Back</a></button>
    <table style="width:100%; margin-top:50px; ">
      <thead>
        <tr>
          <th style="width:5%;">ID</th>
          <th style="width:20%;">Thumb</th>
          <th style="width:40%;">Title</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $post->id; ?></td>
          <td id="image_element"><img src="<?php echo $post->image;?>" /></td>
          <td><?php echo $post->title; ?></td>
        </tr>
      </tbody>

    </table>
  <?php
  ?>
  

  </body>
</html>
