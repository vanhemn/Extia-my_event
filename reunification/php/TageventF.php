<?php 
include('config.php');

try {
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8",$dbuser,$dbpass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed (check config.php):   " . $e->getMessage();
    }

$tag = $_POST['tag'];
  $i = "lol";
    $result = $conn->prepare("SELECT * FROM Event WHERE Darte >= NOW() AND Region = :tag AND PoF = 'Festif' ORDER BY Darte LIMIT 0,4 ");
    $result->bindParam('tag', $tag);
		$result->execute();
		while ($donnees = $result->fetch()){
      $date = strtotime($donnees['Darte']);
      $y = date('Y', $date);
      $m = date('m', $date);
      $d = date('d', $date);
      $h = date('H', $date);
      $i = date('i', $date);

      if ($i == "lol"){
      echo "
      <a style ='text-decoration : none;' href='article.php?id=" . $donnees['ID'] . "'><div class='case_pouet'>
          <div class='image2'>
            <img class='i10' src='../upload/" . $donnees['image'] . "'>
          </div>
          <div class='txt2'>
              <p id='title1'>" . $donnees['Libelle'] . "</p>
              <i id='lieu_date1'>" . $y . '/' . $m . '/' . $d . ' ' . $h . ':' . $i . "</i>
              <p id='desc1'>" . $donnees['Description'] . "</p>
          </div>
        </div></a>
      ";
      }
      else{
      echo "
      <a style ='text-decoration : none;' href='article.php?id=" . $donnees['ID'] . "'><div class='case_one'>
          <div class='image2'>
            <img class='i10' src='../upload/" . $donnees['image'] . "'>
          </div>
          <div class='txt2'>
              <p id='title1'>" . $donnees['Libelle'] . "</p>
              <i id='lieu_date1'>" . $y . '/' . $m . '/' . $d . ' ' . $h . ':' . $i . "</i>
              <p id='desc1'>" . $donnees['Description'] . "</p>
          </div>
        </div></a>
      ";
      }

      $i = '549845464';

}
$result->closeCursor();
?>