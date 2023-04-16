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
  // 显示所选图像
  $filename = $_GET['filename'];
  echo '<img src="/images/' . $filename . '" class="img-fluid">';
  // 获取所选图像的相关元数据并显示它们
  $data = file('data.txt');
  foreach ($data as $line) {
   $info = explode('|', $line);
   $title = $info[0];
   $descript = $info[1];
   $file = $info[2];
   if ($file == $filename) {
    echo '<h3>' . $title . '</h3>';
    echo '<p>' . $description . '</p>';
    break;
   }
  }
  ?>
 </div>

</body>
</html>