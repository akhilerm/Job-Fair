<?php
  require("db_connect.php");
  $course_id = $_POST['crID'];
  $query = "SELECT * from stream where course_id = $course_id";
  $result = $con->query($query);
  ?>
  <option value="0" disabledselected>Select Stream</option>
  <?php
  if($result){
    while ($row=$result->fetch_assoc()) 
    {
      $temp1=$row['id'];
      $temp2=$row['stream_name'];
      ?>
      <option value ="<?php echo $temp1; ?>"><?php echo $temp2; ?></option>
      <?php
    }
  }
  else
  {
    ?>
    <option value = '0'>Not Available <?php echo $_POST['crID'] ?></option>
    <?php
  }
?>