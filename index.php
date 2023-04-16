<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Image Gallery</title>
 <link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/bootstrap/4.1.1/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.1/demo/css/custom.css">
</head>

<body>

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
   <a class="navbar-brand" href="/">Image Gallery</a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
     <li class="nav-item active">
      <a class="nav-link" href="https://github.com/tcxone/ImageGallery">GitHub</a>
     </li>
    </ul>
   </div>
  </div>
 </nav>

 <div class="container mt-3">
  <?php
  // 读取图像信息并将其作为列表显示出来
  $data = file('data.txt');
  foreach ($data as $line) {
   $info = explode('|', $line);
   $title = $info[0];
   $description = $info[1];
   $filename = $info[2];
   echo '<div class="card mb-3">';
   echo '<div class="card-header">' . $title . '</div>';
   echo '<div class="card-body">';
   echo '<a href="/image.php?filename=' . $filename . '"><img src="/images/' . $filename . '" class="img-fluid"></a>';
   echo '<p class="card-text">' . $description . '</p>';
   echo '</div></div>';
  }
  ?>

  <?php
  // 显示上传表单（仅管理员可见）
  if (isset($_COOKIE['admin'])) {
  if ($_COOKIE['admin'] == "password") {
   echo '<div class="card">';
   echo '<div class="card-header">Upload New Image</div>';
   echo '<div class="card-body">';
   echo '<form action="upload.php" method="post" enctype="multipart/form-data">';
   echo '<div class="form-group">';
   echo '<label for="title">Title</label>';
   echo '<input type="text" class="form-control" id="title" name="title">';
   echo '</div>';
   echo '<div class="form-group">';
   echo '<label for="description">Description</label>';
   echo '<textarea class="form-control" id="description" name="description" rows="3"></textarea>';
   echo '</div>';
   echo '<div class="form-group">';
   echo '<label for="image">Image</label>';
   echo '<input type="file" class="form-control-file" id="image" name="image">';
   echo '</div>';
   echo '<button type="submit" class="btn btn-primary">Submit</button>';
   echo '</form>';
   echo '</div></div>';
  }
  }
  ?>
 </div>

</body>
</html>