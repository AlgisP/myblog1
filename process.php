<?php   
   
if(isset($_POST['submit_data'])) {   

  // Create news post

// include the file to connection

require_once('config/db_connect.php');



$title = mysqli_real_escape_string($con, $_POST['Article_title']);
$content = mysqli_real_escape_string($con, $_POST['Article_content']);
$visible = mysqli_real_escape_string($con, $_POST['Article_visible']);
$type = mysqli_real_escape_string($con, $_POST['Article_news_type']);
// $created = mysqli_real_escape_string($con, $_POST['Created_at']);
// $updated = mysqli_real_escape_string($con, $_POST['Updated_at']);
 $visible_at = mysqli_real_escape_string($con, $_POST['Visible_at']);

// check if the fields are not empty

if ((!empty($title) || !empty($content)) || (!empty($visible) || !empty($type))) {

  function now() {
    return date('Y-m-d H:i:s');
}
//  $created = now();

$sql = "INSERT INTO blog (Article_title,Article_content,Article_visible,Article_news_type,Created_at,Updated_at,Visible_at) VALUES ('$title', '$content', '$visible', '$type', NOW(), NOW(), '$visible_at' );";

$execute = mysqli_query($con, $sql);

// if this execute fails

if (!$execute) {
    echo "Failed to submit the data";
    exit();

} else {

    echo "Article published successfully";
    exit(); // do not run code below
} 


/*else {
    header('Location: dashboard.php?emptyFields');
    exit();
      }*/



}
      }
else {

   // header('Location: dashboard.php?invalidRequest');
   // exit();


   // Show news posts

if(isset($_POST['submit_data_show'])){

    require_once('config/db_connect.php');
    $f_date = $_POST['from_datetime'];
    $t_date = $_POST['to_datetime'];
    
    $query = "SELECT * FROM blog where Created_at BETWEEN '$f_date' AND 
    '$t_date'  ORDER BY id asc;";  
    $result = mysqli_query($con, $query); 
    if($result) {
       // die('Could not get data: ' . mysql_error());
       echo "SUCCESS! <br>";
       
     }

     // $type = 1;
     //  $limit = 5;

     while($row = mysqli_fetch_assoc($result)) {
        echo "NEWS ID :{$row['id']}  <br> ".
           "NEWS TITLE : {$row['Article_title']} <br> ".
           "NEWS CONTENT : {$row['Article_content']} <br> ".
           "NEWS VISIBILITY : {$row['Article_visible']} <br> ".
           "NEWS TYPE : {$row['Article_news_type']} <br> ".
           "NEWS CREATED AT : {$row['Created_at']} <br> ".
           "NEWS UPDATED AT : {$row['Updated_at']} <br> ".
           "NEWS VISIBLE AT : {$row['Visible_at']} <br> ".
           "--------------------------------<br>";

        //   $limit--;
     }
    // echo $result;

    if($result === FALSE) { 
    mysql_error(); // TODO: better error handling
    }

       
    
      } else {   

        // Change news type
        if(isset($_POST['submit_change_data_type'])) {  

        require_once('config/db_connect.php');
       // $id_news1 = mysqli_real_escape_string($con, $_POST['id_news']);

       if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
      } else {  echo "SUCCESS 5";}

       $id_news1 = $_POST['id_news'];

        $type = mysqli_real_escape_string($con, $_POST['Article_news_type']);

        
        $sql2 = "UPDATE blog SET Article_news_type='$type' WHERE id='$id_news1';";

        $resultType = mysqli_query($con, $sql2);      

        // if ($con->query($resultType) === TRUE)

if ((!$resultType) === FALSE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: ";
  exit();  // . $con->error;
}

// $con->close();
         

}  else {

 // from here errors!!! ================================================================

  // Show limited number of object posts
  
  if (isset($_POST['submit_data_show_type_limited'])) {

  require_once('config/db_connect.php');

  if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  } else { 
     echo "SUCCESS OF CONNECTION TO SHOW LIMITED NUMBER OF POSTS";
      
  }

    }   

  

  $typeOfNews = $_POST['news_type'];
  $limit = $_POST['limit_of_posts'];


  $sqlType = "SELECT * FROM blog WHERE Article_news_type='$typeOfNews';";
  $resultTypeLimited = mysqli_query($con, $sqlType);

  if ($resultTypeLimited) {
    // die('Could not get data: ' . mysql_error());
    echo "<br> LIMITED SUCCESS! <br>";
    // exit();
    
  } 
     


  $limit1 = $limit;

  while($row = mysqli_fetch_assoc($resultTypeLimited)) {
    echo "NEWS ID :{$row['id']}  <br> ".
       "NEWS TITLE : {$row['Article_title']} <br> ".
       "NEWS CONTENT : {$row['Article_content']} <br> ".
       "NEWS VISIBILITY : {$row['Article_visible']} <br> ".
       "NEWS TYPE : {$row['Article_news_type']} <br> ".
       "NEWS CREATED AT : {$row['Created_at']} <br> ".
       "NEWS UPDATED AT : {$row['Updated_at']} <br> ".
       "NEWS VISIBLE AT : {$row['Visible_at']} <br> ".
       "--------------------------------<br>";

       $limit1--;

       if ($limit1 === 0)  {
          exit();
       }

    //   $limit--;
 }
    } 

      }

       } /*
     else {  

      // Show news post by ID

    if(isset($_POST['submit_news_by_ID'])) {  

      require_once('config/db_connect.php');
     // $id_news1 = mysqli_real_escape_string($con, $_POST['id_news']);

     if ($con->connect_error) {
      die("Connection failed: " . $con->connect_error);
    } else {  echo "SUCCESS TO CONNECT TO DATABASE NEWS BY ID";}


    $newsID = $_POST['news_by_ID'];

    $sqlNewsID = "SELECT * FROM blog WHERE id='$newsID';";
    $resultNewsByID = mysqli_query($con, $sqlNewsID);


    if ($resultNewsByID) {
      // die('Could not get data: ' . mysql_error());
      echo "<br> NEWS RESULT BY ID IN SQL SUCCESS! <br>";
      // exit();
      
    } 


    while($row = mysqli_fetch_assoc($resultNewsByID)) {
      echo "NEWS ID :{$row['id']}  <br> ".
         "NEWS TITLE : {$row['Article_title']} <br> ".
         "NEWS CONTENT : {$row['Article_content']} <br> ".
         "NEWS VISIBILITY : {$row['Article_visible']} <br> ".
         "NEWS TYPE : {$row['Article_news_type']} <br> ".
         "NEWS CREATED AT : {$row['Created_at']} <br> ".
         "NEWS UPDATED AT : {$row['Updated_at']} <br> ".
         "NEWS VISIBLE AT : {$row['Visible_at']} <br> ".
         "--------------------------------<br>";



      } exit();
        }    

        }*/

    
   

?>