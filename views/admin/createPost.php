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
form {
    width: 60%;
    margin-left:20%;
}
ul{
    width: 80%;
    list-style:none;
}
ul, li{
    height: 100px;
    width: 80%;
}
#area{
    width:100%;
    height:auto;
}
#label {
    width: 40;
    margin-right:100px;
}
#input {
    width:60%;
    float:right;
}
#output {
    width:130px;
    height:130px;
    margin-left:500px;
}
.header {
    width: 70%;
}
</style>
</head>
<body>
    <div class="header">
        <h2>Create Post</h2>
        <button style="float: right; width: 5%;"><a href="<?= $previous ?>" style="text-decoration: none;">Back</a></button>
    </div>
    <form action="managers/createPost" method="POST" style="margin-top:100px;"  enctype="multipart/form-data">
        <ul>
            <li>
                <div id="area">
                    <label id="label">Title</label>
                    <input id="input" type="text" name="title"><br><br>
                </div>
            </li>
            <li>
                <div id="area">
                    <label id="label">Description</label>
                    <textarea id="input" name="description" rows="4" cols="50"></textarea>
                </div>
            </li>
            <li>
                <div id="area">
                    <label id="label">Image</label>
                    <input name = "imagePost" type="file" accept="image/*" onchange="loadFile(event)" id="input" >
                    <img id="output" />
                    <script>
                        var loadFile = function(event) {
                            var output = document.getElementById('output');
                            output.src = URL.createObjectURL(event.target.files[0]);
                            output.onload = function() {
                            URL.revokeObjectURL(output.src) // free memory
                            }
                    };
                    </script>
                </div>
            </li>
            <li>
                <div id="area">
                    <label id="label">Status</label>
                    <select id="status" name="status" style="margin-left:140px;">
                        <option value="1">Enable</option>
                        <option value="0">Disable</option>
                    </select>
                </div>
            </li>
            <li>
            <input type="submit" name="submit" id="input"></input>
            </li>
            
        </ul>
    </form>


</body>
</html>
