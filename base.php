<?php
date_default_timezone_set("Asia/Taipei");
session_start();
class DB{
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=web01";
    protected $user="root";
    protected $pw="";
    protected $table;
    protected $pdo;

    public function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,$this->user,$this->pw);
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

                $sql .=" WHERE ".implode(" AND ".$arg[0])." ".$arg[1];
            break;
            case 1:
                if(is_array($arg[0])){
                    foreach($arg[0] as $key => $value){
                        $tmp[]="`$key`='$value'";
                    }
                    $sql .=" WHERE ".implode(" AND ".$arg[0]);
                }else{
                    $sql .=$arg[1];

                }
            break;
        }
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

                $sql .=" WHERE ".implode(" AND ".$arg[0])." ".$arg[1];
            break;
            case 1:
                if(is_array($arg[0])){
                    foreach($arg[0] as $key => $value){
                        $tmp[]="`$key`='$value'";
                    }
                    $sql .=" WHERE ".implode(" AND ".$arg[0]);
                }else{

                    $sql .=$arg[1];

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

$Total=new DB('total');
$Bottom=new DB('bottom');
$Title=new DB('title');
$Ad=new DB('ad');
$Mvim=new DB('mvim');
$Image=new DB('image');
$News=new DB('news');
$Admin=new DB('admin');
$Meun=new DB('menu');

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