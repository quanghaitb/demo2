<?php 
foreach ($posts as $r) {
  if($r->status==0) {
      $r->status = 'Disable';
  }
  else {
      $r->status = 'Enable';
  }

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
    <table style="width:100%; ">
      <thead>
        <tr>
          <th style="width:5%;">ID</th>
          <th style="width:20%;">Thumb</th>
          <th style="width:40%;">Title</th>
          <th style="width:15%;">Actions</th>
        </tr>
      </thead>
      <tbody>
      <?php
        foreach($posts as $r) {
          echo '<tr>
            <td> <a href="posts/showPost/' . $r->id . '" style="text-decoration: none;"> ' . $r->id . '</a></td>
            <td><img src="' . $r->image . '"/></td>
            <td>' . $r->title . '</td>
            <td style="text-align: center;"><a href="posts/showPost/' . $r->id . '" style="text-decoration: none;">Show</a> </td>

          </tr>'
        ?>
        <?php
        } 
        ?>
      </tbody>

    </table>

  </body>
</html>
