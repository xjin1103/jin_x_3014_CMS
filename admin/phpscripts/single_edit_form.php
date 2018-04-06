<?php
  function single_edit($tbl, $col, $id){
    $result = getSingle($tbl, $col, $id);
    $getResult = mysqli_fetch_array($result);

    echo "<form class='movie_form' action=\"phpscripts/edit.php\" method=\"post\">";
    echo "<h2>Edit Movie</h2><hr>";
    echo "<input hidden name=\"tbl\" value=\"{$tbl}\">";
    echo "<input hidden name=\"col\" value=\"{$col}\">";
    echo "<input hidden name=\"id\" value=\"{$id}\">";
    // echo mysqli_num_fields($result);
    for($i=0;$i<mysqli_num_fields($result);$i++){
      $dataType = mysqli_fetch_field_direct($result, $i);
      $fieldName = $dataType->name;
      $fieldType = $dataType->type;
      // echo $fieldName."<br>";
      // echo $fieldType."<br><br>";

      if($fieldName != $col){
        echo "<label>{$fieldName}</label><br>";
        if($fieldType != "252"){
          echo "<input type=\"text\" name=\"{$fieldName}\" value=\"{$getResult[$i]}\"<br><br>";
        }else{
          echo "<textarea name=\"{$fieldName}\">{$getResult[$i]}</textarea><br><br>";
        }
      }
    }
    echo "<input type=\"submit\" name=\"submit\" value=\"Save Content\">";
    echo "<a href=\"admin_index.php\">Home</a>";
    echo "</form>";
  }

?>
