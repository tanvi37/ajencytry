
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
