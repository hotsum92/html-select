<?php

# get uri
$uri = $_SERVER['REQUEST_URI'];

# remove index.php from uri
$uri = str_replace('index.php', '', $uri);

# remove first slash from uri
$uri = ltrim($uri, '/');

# if empty uri, set default data.txt
if (empty($uri)) {
  $uri = 'data.txt';
}

# load data.txt file
$data = file_get_contents($uri);

# split data by new line
$data = explode("\n", $data);

# remote last empty line
array_pop($data);

?>

<!DOCTYPE html>
<html>
<head>
  <title><?php echo $uri; ?></title>
  <style>
  * {
    box-sizing: border-box;
  }
  .box {
    display: block;
    width:80%;
    margin: 20px;
    padding: 10px;
  }
  </style>

  <script>
  function copy(event) {
    navigator.clipboard.writeText(event.target.value);
    console.log('Copied to clipboard: ' + event.target.value);
  }
  </script>
</head>
<body>
  <?php foreach ($data as $line): ?>
    <textarea class="box" onclick="copy(event)"><?php echo $line; ?></textarea>
  <?php endforeach; ?>
</body>
</html>
