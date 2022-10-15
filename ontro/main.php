<html>
<head>
  <title>SEARCH DIRECTORY</title>
</head>
<body>
<form action="<?=($_SERVER['PHP_SELF'])?>" name="test" method="post">
  <label for="name">ENTER THE SEARCH WORD:</label>
  <input type="text" id="name" name="searchname" value="" required>
  <button type="submit" name="search" value="SEARCH">SEARCH</button>
</form>
<?php
include 'db.php';
//https://www.php.net/manual/en/ref.dir.php
class SearchDirectory
{
  //Methods
  function searchdir ( $path , $maxdepth = -1 , $mode = "FULL" , $d = 0 )
  {
     if ( substr ( $path , strlen ( $path ) - 1 ) != '/' ) { $path .= '/' ; }
     $dirlist = array () ;
     if ( $mode != "FILES" ) { $dirlist[] = $path ; }
     if ( $handle = opendir ( $path ) )
     {
         while ( false !== ( $file = readdir ( $handle ) ) )
         {
             if ( $file != '.' && $file != '..' )
             {
                 $file = $path . $file ;
                 if ( ! is_dir ( $file ) ) { if ( $mode != "DIRS" ) { $dirlist[] = $file ; } }
                 elseif ( $d >=0 && ($d < $maxdepth || $maxdepth < 0) )
                 {
                     $dirlist = array_merge ( $dirlist , $this->searchdir ( $file . '/' , $maxdepth , $mode , $d + 1 )  ) ;
                 }
         }
         }
         closedir ( $handle ) ;
     }
     if ( $d == 0 ) { natcasesort ( $dirlist ) ; }
     return ( $dirlist ) ;
  }
}
/*Create the class object*/
$Obj = new SearchDirectory() ;
$woring_dir = $Obj->searchdir( 'c:/Documents' ) ;
/*CREATE DATABASE TABLES*/
$sql = "SELECT 1 FROM `ontro`.`folder` LIMIT 1;";
$result = mysqli_query ( $con, $sql );
    if( $result == false ){
        $folder_sql = "CREATE TABLE folder ( folder_id  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                                    folder_name varchar(255),
                                    parent_folder_id varchar(255)
                        );";
      $fileName_sql = "CREATE TABLE filename ( filename_id  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                                    folder_id INT NOT NULL,
                                    file_name varchar(255),
                                    FOREIGN KEY (folder_id) REFERENCES folder(folder_id)
                        );";
      mysqli_query ( $con, $folder_sql );
      mysqli_query ( $con, $fileName_sql );
    }
$fid = 1;
$fileid = 1;
foreach ( $woring_dir as $key => $val ) {
    $explode_url = ( explode ( '/', $val ) );
    $count = count ( $explode_url );
    for ( $i = 0; $i <= $count; $i++ ){
      if ( !empty( $explode_url[$i] ) ) {
        $folder_id = $fid++;
        /*INSERT FOLDER TABLE QUERY*/
        $insert_folder_sql = "INSERT INTO folder VALUES('$folder_id',";
        $parent_folder_id = $explode_url[$i];
        $chk   = ':';
        $pos = strpos ( $parent_folder_id, $chk );
        if ( $pos !== true ) {
          $foldername = $explode_url[$i];
          $insert_folder_sql .= "'$foldername',";
        }
        if ( $i == 0 ){
          $i = null;
          $insert_folder_sql .= "'$i');";
        }else{
          $insert_folder_sql .= "'$i');";
        }
        /*INSERT FILE NAME TABLE QUERY*/
        $chkone   = '.';
        $posone = strpos ( $parent_folder_id, $chkone );
        if ( !empty ( $posone ) ) {
          $filename_id = $fileid++;
          $filename = $explode_url[$i];
          $insert_filename_sql = "INSERT INTO filename VALUES ('$filename_id', '$folder_id','$filename' );";
        }
      }#mysqli_query ( $con, $insert_filename_sql );
    }
}#mysqli_query ( $con, $insert_folder_sql );
/*SEARCH KEY RESULT*/
$SEARCH_NAME = filter_input ( INPUT_POST, 'searchname' );
$SERCHK = filter_input ( INPUT_POST, 'search' );
$out_url = array();
if ( $SERCHK == 'SEARCH' ) {
  $query = "select * from folder where folder_id=1";
  $result = mysqli_query ( $con, $query );
  $value = mysqli_fetch_object ( $result );
  $fildir = $value->folder_name;
  $out_url[] = array_push($out_url, $fildir);
  $ltrimtext = ltrim ( $SEARCH_NAME );
  $search_text = rtrim ( $ltrimtext );
  $foldequery = "select * from folder where folder_name='$search_text'";
  $folder_result = mysqli_query ( $con, $foldequery );
  if ( $folder_result->num_rows == 0 ) {
    throw new Exception( " This name not in the database " ) ;
    exit;
  }
  $foldervalue = mysqli_fetch_object ( $folder_result );
  if ( !empty ( $foldervalue ) && !empty ( $folder_result ) ) {
    $folderId = $foldervalue->parent_folder_id;
    $foldername = $foldervalue->folder_name;
    $out_url[] = array_push($out_url, $foldername);
  }
  if ( !empty ( $folderId ) ) {
     $filequery = "select * from filename where folder_id='$folderId'";
     $file_result = mysqli_query ( $con, $filequery );
     if ( !empty ( $file_result && !empty ( $filequery ) ) ) {
      $file_value = mysqli_fetch_object($file_result);
      $filename = $file_value->file_name;
      $out_url[] = array_push($out_url, $filename);
     }
  }
  #$url = [ '"'.$fildir.'",' .'"'.$foldername .'",'.'"'. $filename.'"' ];
  #print_r($out_url);exit;
  $output = implode ( "/", $out_url ) ;
  #$output = implode ( "/", array ( $fildir, $foldername, $filename ) ) ;
  print($output);
}
$con->close();
header("Refresh:10");
?>
</body>
</html>
