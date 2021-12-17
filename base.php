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


    //計算資料(各種方式) 
    public function math($method,$col,...$arg){

        return $this->pdo->query($sql)->fetchColumn(); //僅針對回傳一個資料的狀況
        
    }
    //計算資料(各種方式) end


    //新增跟更新資料
    public function save($array){
        //要有id判斷是否產生陣列
        
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




?>