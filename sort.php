<?php
 $connect= new PDO("mysql:host=localhost;dbname=movie","root","");
 
if($_POST["querysort"]!='')
 {
  $search_array=explode(",",$_POST["querysort"]);
  $search_text_temp="'".implode("','",$search_array)."'";
  $str=$search_text_temp;
  $search=trim($str,"'");
  //echo "alert('$search')";
  $query="select * FROM movies order by ".$search." asc";
 }
 else
 {
 $query="select * from movies order by m_id desc";
}
 $statement=$connect->prepare($query);
 $statement->execute();
 $result=$statement->fetchAll();
 $total_row=$statement->rowCount();
 if($total_row>0)
 {
  foreach ($result as $row) 
  {
    echo '
    <div class="col-sm-3  image-blocks spacing">
    <img class="image" src='.$row['featured_image'].'>
    <div class="middle">
    <div class="text">'.$row["description"].'</div>
    <div class="custom_text">Released On:'.$row["release_date"].'</div>
    <div class="custom_text">'.$row["movie_length"].'mins</div>
  </div>
    </div>
    ';
  }
 }
 else
 {
  echo '<img src="img/nodata.png">';
 }

  ?>

