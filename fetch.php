<?php
 $connect= new PDO("mysql:host=localhost;dbname=movie","root","");
 
 if($_POST["query"]!='')
 {
  $search_array=explode(",",$_POST["query"]);
  //print_r($search_array);
  $search_text="'".implode("','",$search_array)."'";
  //echo "alert('$search_text')";
  $query="SELECT * FROM relationship INNER JOIN movies ON relationship.m_id = movies.m_id INNER JOIN category ON relationship.c_id = category.c_id where value=".$search_text."";
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
  echo '<img class="text-center" src="img/nodata.png">';
 }

  ?>

