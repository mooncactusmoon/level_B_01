<?php
date_default_timezone_set("Asia/Taipei");
session_start();
class DB{
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=web01";
    protected $user="root";
    protected $pw="";
    protected $pdo;
    public $table;
    public $title;
    public $button;
    public $header; //表單的第一個框框col
    public $append; //只有admin和menu會用到
    public $upload;

    public function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,$this->user,$this->pw);
        $this->setStr($table);

    }

    private function setStr($table){
        switch($table){
            case "title":
                $this->title="網站標題管理";
                $this->button="新增網站標題圖片";
                $this->header="網站標題";
                $this->append="替代文字";
                $this->upload="網站標題圖片";
            break;
            case "ad":
                $this->title="動態文字廣告管理";
                $this->button="新增動態文字廣告";
                $this->header="動態文字廣告";
            break;
            case "mvim":
                $this->title="動畫圖片管理";
                $this->button="新增動畫圖片";
                $this->header="動畫圖片";
                $this->upload="動畫圖片";
            break;
            case "image":
                $this->title="校園映像資料管理";
                $this->button="新增校園映像圖片";
                $this->header="校園映像資料圖片";
                $this->upload="校園映像資料圖片";
            break;
            case "total":
                $this->title="進站總人數管理";
                $this->button="";
                $this->header="進佔總人數:";
            break;
            case "bottom":
                $this->title="頁尾版權資料管理";
                $this->button="";
                $this->header="頁尾版權資料";
            break;
            case "news":
                $this->title="最新消息資料管理";
                $this->button="新增最新消息資料";
                $this->header="最新消息資料內容";
            break;
            case "admin":
                $this->title="管理者帳號管理";
                $this->button="新增管理者帳號";
                $this->header="帳號";
                $this->append="密碼";
            break;
            case "menu":
                $this->title="選單管理";
                $this->button="新增主選單";
                $this->header="主選單名稱";
                $this->append="選單連結網址";
            break;
        }
    }

    // 找一筆資料
    public function find($id){
        $sql="SELECT * FROM $this->table WHERE ";

        if(is_array($id)){
            foreach($id as $key => $value){
                $tmp[]="`$key`='$value'";
            }

            $sql .= implode(" AND ",$tmp);
        }else{
            $sql .= " `id`='$id'";
        }

        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    // 找一筆資料end

    // 找全部資料
    public function all(...$arg){
        $sql="SELECT * FROM $this->table ";
        switch(count($arg)){
            case 2:
                foreach($arg[0] as $key => $value){
                    $tmp[]="`$key`='$value'";
                }
                $sql .=" WHERE ".implode(" AND ",$tmp)." ".$arg[1];
            break;
            case 1:
                if(is_array($arg[0])){
                    foreach($arg[0] as $key => $value){
                        $tmp[]="`$key`='$value'";
                    }
                    $sql .= " WHERE ".implode(" AND ",$tmp);
                }else{
                    $sql .= $arg[0];   
                }
            break;
        }
        // echo $sql;
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    // 找全部資料 end


    //計算資料(各種方式) count max min sum...
    public function math($method,$col,...$arg){
        $sql="SELECT $method($col) FROM $this->table ";

        switch(count($arg)){
            case 2:
                foreach($arg[0] as $key => $value){
                    $tmp[]="`$key`='$value'";
                }

                $sql .=" WHERE ".implode(" AND ",$tmp)." ".$arg[1];
            break;
            case 1:
                if(is_array($arg[0])){
                    foreach($arg[0] as $key => $value){
                        $tmp[]="`$key`='$value'";
                    }
                    $sql .=" WHERE ".implode(" AND ",$tmp);
                }else{

                    $sql .=$arg[0];

                }

            break;
        }

        return $this->pdo->query($sql)->fetchColumn(); //僅針對回傳一個資料的狀況
        
    }
    //計算資料(各種方式) end

    //新增跟更新資料
    public function save($array){
        //id有無判斷是更新還是新增
        if(isset($array['id'])){
            //update
            foreach($array as $key => $value){
                $tmp[]="`$key`='$value'";
            }

            $sql="UPDATE $this->table SET ".implode(",",$tmp)." WHERE `id`='{$array['id']}'";
        
        }else{
            //insert
            $sql="INSERT INTO $this->table (`".implode("`,`",array_keys($array))."`) 
                                     VALUES('".implode("','",$array)."')";
        }

        
        return $this->pdo->exec($sql);
    }
    //新增跟更新資料 end

    //刪除資料
    public function del($id){
        $sql="DELETE FROM $this->table WHERE ";

        if(is_array($id)){
            foreach($id as $key => $value){
                $tmp[]="`$key`='$value'";
            }

            $sql .= implode(" AND ",$tmp);
        }else{
            $sql .= " `id`='$id'";
        }

        return $this->pdo->exec($sql);
    }
    //刪除資料 end


    //萬用查詢
    public function q($sql){
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    //萬用查詢 end
    

}

function to($url){
    header("location:$url");
}

function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

$Total=new DB('total');
$Bottom=new DB('bottom');
$Title=new DB('title');
$Ad=new DB('ad');
$Mvim=new DB('mvim');
$Image=new DB('image');
$News=new DB('news');
$Admin=new DB('admin');
$Menu=new DB('menu');

$tt=$_GET['do']??''; // = $tt=(isset($_GET['do']))?$_GET['do']:'';
switch($tt){

    case "ad":
        $DB=$Ad;
    break;
    case "mvim":
        $DB=$Mvim;
    break;
    case "image":
        $DB=$Image;
    break;
    case "total":
        $DB=$Total;
    break;
    case "bottom":
        $DB=$Bottom;
    break;
    case "news":
        $DB=$News;
    break;
    case "admin":
        $DB=$Admin;
    break;
    case "menu":
        $DB=$Menu;
    break;
    // default:  除了上面以外都都是預設這個 可直接取代下面的case "title":
    case "title":
        $DB=$Title;  
    break;

};
// $total=$Total->find(1);
// echo $total['total'];
// echo $Total->find(1)['total']; 同上兩行(可取代)

//判斷是否首次進站
if(!isset($_SESSION['total'])){ //若是沒有$_SESSION['total'] 就執行以下程式
    $total=$Total->find(1); //自訂一個變數$total去找 $Total( =new DB('total'); )內的索引為1的資料，並且等於其值
    $total['total']++; //將得到的值 +1
    $Total->save($total); //得到的值+1後存回去 $Total
    $_SESSION['total']=$total['total']; //讓 $_SESSION['total'] 存在
}

?>