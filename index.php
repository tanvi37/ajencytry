<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
</head>
<body>
<?php

include "db_connect.php"; 

?>
<div class="jumbotron">
  <div class="text-center">
    <h1>All About Movies</h1>
    <p>Find Your Favourite Movie In One Go..!!</p> 
  </div>
  <div class="container">   
    <div class="col-md-4">                                  
      <div class="form-horizontal">
        <div class="form-group">
          <label for="" class="col-md-3 control-label"><em>Genre:</em> </label>
            <div class="col-md-9">
              <select id='genre' name='genre'>
              <?php
                $connect= new PDO("mysql:host=localhost;dbname=movie","root","");
 $query="select distinct value from category where type='Genre' order by value asc";
 $statement=$connect->prepare($query);
 $statement->execute();
 $result=$statement->fetchAll();
 echo '<option selected value>Genre</option>';
                foreach($result as $row)
                {
                    echo '<option value="'.$row["value"].'"><a>'.$row["value"].'</a></option>';
                }
               
              ?>
            </select>
              <input type="hidden" id="hidden_genre" name="hidden_genre">
            </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">                                  
      <div class="form-horizontal">
        <div class="form-group">
          <label for="" class="col-md-3 control-label"><em>Language:</em> </label>
            <div class="col-md-9">
              <select id='lang' name='lang'>
              <?php
                $connect= new PDO("mysql:host=localhost;dbname=movie","root","");
 $query="select distinct value from category where type='Language' order by value asc";
 $statement=$connect->prepare($query);
 $statement->execute();
 $result=$statement->fetchAll();
 echo '<option selected value>Language</option>';
                foreach($result as $row)
                {
                    echo '<option value="'.$row["value"].'"><a>'.$row["value"].'</a></option>';
                }
               
              ?>
            </select>
              <input type="hidden" id="hidden_lang" name="hidden_lang">
             
            </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">                                  
      <div class="form-horizontal">
        <div class="form-group">
          <label for="" class="col-md-3 control-label"><em>Sort By:</em> </label>
            <div class="col-md-9">
              <select id='sort' name='sort'>
              <option selected value>Sort By:</option>
              <option value="movie_length">Movie Length</option>
              <option value="release_date">Release Date</option>
            </select>
              <input type="hidden" id="hidden_sort" name="hidden_sort">
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

  
<!--<div class="container">
  <div class="row">
   
      <?php
      $connect=mysqli_connect("localhost","root","","movie");
      $record_per_page=8;
$page='';
if(isset($_GET["page"]))
{
  $page=$_GET["page"];
}
else
{
  $page=1;
}
$start_from=($page-1)*$record_per_page;
$query = "select * from movies order by m_id DESC LIMIT $start_from,$record_per_page";
$result=mysqli_query($connect,$query);
       
        while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
          echo " <div class='col-sm-3  image-blocks spacing'>";
        echo '<img class="image" src='.$row['featured_image'].'>';
        echo '<div class="middle">
    <div class="text text_'.$row["m_id"].'">'.$row["description"]. '</div>
  </div>';
        echo "</div>";
        }
      ?>

  
  </div>
  <div class="text-center">
    <?php
    $page_query="select * from movies order by m_id DESC";
    $page_result=mysqli_query($connect,$page_query);
    $total_records=mysqli_num_rows($page_result);
    $total_pages=ceil($total_records/$record_per_page);
    for($i=1;$i<=$total_pages;$i++)
    {
    echo "<a href='index.php?page=".$i."'>".$i."</a>";
  }
  ?>
  </div>
</div>-->

<div class="container">
  <div class="row">
    <div class="col-sm-12 img-blocks"></div>
  </div>
</div>
</body>
<script>
$(document).ready(function(){
  load_data();
  function load_data(query='')
  {
    $.ajax({
      url:"fetch.php",
      method:"POST",
      data:{query,query},
      success:function(data)
      {
        $('.img-blocks').html(data);

      }
    })
  }
$('#genre').change(function(){
  $('#hidden_genre').val($('#genre').val());
  var query= $('#hidden_genre').val();
  console.log(query);
  load_data(query);
})
  
$('#lang').change(function(){
  $('#hidden_lang').val($('#lang').val());
  var query= $('#hidden_lang').val();
  console.log(query);
  load_data(query);
})

function load_sort(querysort='')
  {
    $.ajax({
      url:"sort.php",
      method:"POST",
      data:{querysort,querysort},
      success:function(data)
      {
        $('.img-blocks').html(data);

      }
    })
  }
$('#sort').change(function(){
  $('#hidden_sort').val($('#sort').val());
  var querysort= $('#hidden_sort').val();
  console.log(querysort);
  load_sort(querysort);
})
});
</script>
</html>