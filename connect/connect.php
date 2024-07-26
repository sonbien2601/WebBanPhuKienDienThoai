<?php
 include "../admin/config.php";
?>

<?php
Class Database{
   public $host   = DB_HOST;
   public $user   = DB_USER;
   public $pass   = DB_PASS;
   public $dbname = DB_NAME;
  
 
   public $link;
   public $error;
 
 public function __construct(){
  $this->connectDB();
 }
 
private function connectDB(){

   $this->link = new mysqli($this->host, $this->user, $this->pass, 
    $this->dbname);
    
   if(!$this->link){
     $this->error ="Connection fail".$this->link->connect_error;
    return false;
   }
 }
 
// Select or Read data
public function select($query){
  mysqli_set_charset($this->link,'UTF8');
  $result = $this->link->query($query) or 
   die($this->link->error.__LINE__);
  if($result->num_rows > 0){
    return $result;
  } else {
    return false;
  }
 }
 public function selectdc($query){
  mysqli_set_charset($this->link,'UTF8');
  $result = $this->link->query($query) or 
   die($this->link->error.__LINE__);
  if($result->num_rows > 0){
    return $result;
  } else {
    return false;
  }
 }
 
// Insert data
public function insert($query){
  mysqli_set_charset($this->link,'UTF8');
   $insert_row = $this->link->query($query) or 
     die($this->link->error.__LINE__);
   if($insert_row){
     return $insert_row;
   } else {
     return false;
    }
 }
  
// Update data
 public function update($query){
  mysqli_set_charset($this->link,'UTF8');
   $update_row = $this->link->query($query) or 
     die($this->link->error.__LINE__);
   if($update_row){
    return $update_row;
   } else {
    return false;
    }
 }
  
// Delete data
 public function delete($query){
   $delete_row = $this->link->query($query) or 
     die($this->link->error.__LINE__);
   if($delete_row){
     return $delete_row;
   } else {
     return false;
    }
   }
   public function get_data($query){
    mysqli_set_charset($this->link, 'UTF8');
    $result = $this->link->query($query) or die($this->link->error.__LINE__);

    if($result->num_rows > 0){
        $data = array(); // Khởi tạo mảng để chứa dữ liệu
        while($row = $result->fetch_assoc()){
            $data[] = $row; // Thêm mỗi dòng dữ liệu vào mảng
        }
        return $data; // Trả về mảng chứa dữ liệu
    } else {
        return false; // Trả về false nếu không có dữ liệu phù hợp
    }
}
}
class Session{
  public static function init(){
   if (version_compare(phpversion(), '5.4.0', '<')) {
         if (session_id() == '') {
             session_start();
         }
     } else {
         if (session_status() == PHP_SESSION_NONE) {
             session_start();
         }
     }
  }
 
  public static function set($key, $val){
     $_SESSION[$key] = $val;
  }
 
  public static function get($key){
     if (isset($_SESSION[$key])) {
      return $_SESSION[$key];
     } else {
      return false;
     }
  }
 
  public static function checkSession(){
     self::init();
     if (self::get("user_login")== false) {
      self::destroy();
      header("Location:login.php");
     }
  }
 
  public static function checkLogin(){
     self::init();
     if (self::get("user_login")== true) {
    //   header("Location:productlist.php");
     }
  }
  public static function destroy(){
     session_destroy();
     header("Location:index.php");
    }
    public static function destroyAdmin(){
      session_destroy();
      header("Location:login.php");
     }
   }
   ?>

