<html>
<head>
  <meta charset="UTF-8">
  <title>Akido Bobigny</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
<?php

include_once('mod_article/controller.article.php');

Connexion::initConnexion();

echo '<ul><li><a href="index.php?module=article">Articles</a></li>';

$module = isset($_GET['module'])?$_GET['module'] : "article";

switch($module){
    case "article":
        require_once('mod_article/mod_article.php');
        $m = new ModArticle();  
        break;
}

?>

</body>
</html>