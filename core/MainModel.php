<?php
class MainModel
{
    const DATA_TYPE_BOOL = PDO::PARAM_BOOL;
    const DATA_TYPE_STR = PDO::PARAM_STR;
    const DATA_TYPE_INT = PDO::PARAM_INT;
    const DATA_TYPE_DECIMAL = 4;
    public $inputs = [];
    public static $uid = "";
    public function getFormData($data)
    {
        if (isset($data['id'])) {
            static::$uid = $data['id'];
        }

        foreach ($data as $key => $value) {
            if (array_key_exists($key, static::$tableSchema)) {
                $this->inputs[$key] = $value;
            }
        }
        $this->save();
    }
    private function prepareValues(PDOStatement &$stmt)
    {

        foreach ($this->inputs as $columnName => $value) {
            $stmt->bindValue(":{$columnName}", $value);
        }

    }

    private static function buildNameParametersSQL()
    {
        $namedParams = '';
        foreach (static::$tableSchema as $columnName => $type) {
            $namedParams .= $columnName . '=:' . $columnName . ',';
        }
        return trim($namedParams, ',');

    }
<<<<<<< HEAD
    private static function stmt($sql)
    {

        $stmt = App::$app->db->pdo->prepare($sql);
        $stmt -> execute();
        $results = $stmt->fetchAll();
        return (is_array($results) && !empty($results)) ? $results : false;

    }
=======

>>>>>>> 6fb3dc4 (first taawon)
    public function save()
    {
        if (self::$uid == "") {
            $sql = 'INSERT INTO ' . static::$tableName . ' SET ' . self::buildNameParametersSQL();
        } else {
<<<<<<< HEAD
            $sql = 'UPDATE ' . static::$tableName . ' SET ' . $this->buildNameParametersSQL() . ' WHERE ' . static::$primaryKey . '=' . self::$uid ;
=======
            $sql = 'UPDATE ' . static::$tableName . ' SET ' . $this->buildNameParametersSQL() . ' WHERE ' . static::$primaryKey . '="' . self::$uid . '"';
>>>>>>> 6fb3dc4 (first taawon)
        }
        $stmt = App::$app->db->pdo->prepare($sql);
        $this->prepareValues($stmt);
        return $stmt->execute();
        App::$app->db->pdo = null;
    }

    public static function delete($id)
    {
        $sql = 'DELETE FROM ' . static::$tableName . ' WHERE ' . static::$primaryKey . ' = ' . $id;
        $stmt = App::$app->db->pdo->prepare($sql);
        return $stmt->execute();
<<<<<<< HEAD
=======
        App::$app->db->pdo = null;
>>>>>>> 6fb3dc4 (first taawon)
    }
        public static function count_items()
    {
        $sql = 'SELECT * FROM '.static::$tableName.'';
        $stmt = App::$app->db->pdo->prepare($sql);
        $stmt -> execute();
        return $count = $stmt->rowCount();    
    }
    public static function pagination($start,$end){
        $pages = "";
        $pages_num = ceil(static::count_items()/$end);
        for($page=$start;$page<=$pages_num;$page++){
            $start=($page*$end)-$end;
<<<<<<< HEAD
=======
        // echo "<li><a class='pager' page_start=$page_start page_items=$page_items>$page</a><li>";
>>>>>>> 6fb3dc4 (first taawon)
        $pages .= "<li><a href='?page=$page' class='pager'>$page</a><li>";
        }
        return $pages;
    }
<<<<<<< HEAD
    private static function pagination_set($start,$end){
        if($end=="unlimited"){
            $limit ="";
=======
    public static function getAll($start=0,$end="unlimited")
    {  
        if($end=="unlimited"){
            echo $limit ="";
>>>>>>> 6fb3dc4 (first taawon)
            }else{
                if (isset($_GET['page'])){
                    $page=$_GET['page'];
                    if ($page =="" || $page =="1"){
                    $start =0;
                    }else{
                    $start=($page*$end)-$end;
                    }
                    }else{
                    $start =0;
                    }
                    $limit = 'LIMIT '. $start . ',' . $end;
            }
<<<<<<< HEAD
            return $limit;
    }
    
    public static function getAll($start=0,$end="unlimited")
    {  
        
        $sql = 'SELECT * FROM ' . static::$tableName . ' ORDER BY ' . static::$primaryKey . ' DESC '.static::pagination_set($start,$end);
        return static::stmt($sql);
    }



    public static function select_join_items($start=0,$end="unlimited",$cat_id="")
    {
    if($cat_id==""){
        $condition= "";
    }else{
        $condition= 'WHERE category_id ='.$cat_id;
    }
    $sql = 'SELECT '.static::$tableName.'.*,'.static::$tableJoinName.'.name_ar AS category_ar,
    '.static::$tableJoinName.'.name_en AS category_en FROM '.static::$tableName.'
    INNER JOIN '.static::$tableJoinName.'
    ON '.static::$tableName.'.'.static::$join_id.' = '.static::$tableJoinName.'.id ' . $condition . ' ORDER BY ' . static::$primaryKey . ' DESC '.static::pagination_set($start,$end);

    return static::stmt($sql);
=======

                $sql = 'SELECT * FROM ' . static::$tableName . ' ORDER BY ' . static::$primaryKey . ' DESC '.$limit;
    
       
        $stmt = App::$app->db->pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return (is_array($results) && !empty($results)) ? $results : false;
        static::$pagination(0,4,10);
        App::$app->db->pdo = null;
    }
    // private static function stmt(){
    //     $stmt = App::$app->db->pdo->prepare($sql);
    //     $stmt->execute();
    //     $results = $stmt->fetchAll();
    //     return (is_array($results) && !empty($results)) ? $results : false;
    // }
    public static function getByCategory($start=0,$end="unlimited",$cat_id)
    {  
        if($end=="unlimited"){
            echo $limit ="";
            }else{
                if (isset($_GET['page'])){
                    $page=$_GET['page'];
                    if ($page =="" || $page =="1"){
                    $start =0;
                    }else{
                    $start=($page*$end)-$end;
                    }
                    }else{
                    $start =0;
                    }
                    $limit = 'LIMIT '. $start . ',' . $end;
            }

                // $sql = 'SELECT * FROM ' . static::$tableName . ' WHERE category_id = ' . $cat_id . ' ORDER BY ' . static::$primaryKey . ' DESC '.$limit;
    
                $sql = 'SELECT '.static::$tableName.'.*,'.static::$tableJoinName.'.name_ar AS category_ar,
                '.static::$tableJoinName.'.name_en AS category_en FROM '.static::$tableName.'
                INNER JOIN '.static::$tableJoinName.'
                ON '.static::$tableName.'.'.static::$join_id.' = '.static::$tableJoinName.'.id WHERE category_id = ' . $cat_id . ' ORDER BY ' . static::$primaryKey . ' DESC '.$limit;

        $stmt = App::$app->db->pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return (is_array($results) && !empty($results)) ? $results : false;
        static::$pagination(0,4,10);
        App::$app->db->pdo = null;
    }
    public static function select_join_items($start=0,$end="unlimited")
    {

            if($end=="unlimited"){
                echo $limit ="";
                }else{
                    if (isset($_GET['page'])){
                        $page=$_GET['page'];
                        if ($page =="" || $page =="1"){
                        $start =0;
                        }else{
                        $start=($page*$end)-$end;
                        }
                        }else{
                        $start =0;
                        }
                        $limit = 'LIMIT '. $start . ',' . $end;
                }
                $sql = 'SELECT '.static::$tableName.'.*,'.static::$tableJoinName.'.name_ar AS category_ar,
                '.static::$tableJoinName.'.name_en AS category_en FROM '.static::$tableName.'
                INNER JOIN '.static::$tableJoinName.'
                ON '.static::$tableName.'.'.static::$join_id.' = '.static::$tableJoinName.'.id ORDER BY ' . static::$primaryKey . ' DESC '.$limit;
        
        $stmt = App::$app->db->pdo->prepare($sql);
        $stmt -> execute();
        $results = $stmt->fetchAll();
        return (is_array($results) && !empty($results)) ? $results : false;
        static::$pagination(0,4,10);
>>>>>>> 6fb3dc4 (first taawon)
    }
    public static function search($search)
    {  
        $sql = 'SELECT * FROM ' . static::$tableName . ' WHERE CONCAT(title_ar,title_en,content_ar,content_en) LIKE :search ORDER BY ' . static::$primaryKey . ' DESC';
        $stmt = App::$app->db->pdo->prepare($sql);
        $stmt->bindValue(':search','%'.$search.'%');
        $stmt->execute();
        $results = $stmt->fetchAll();
        return (is_array($results) && !empty($results)) ? $results : false;
<<<<<<< HEAD
        // App::$app->db->pdo = null;
=======
        App::$app->db->pdo = null;
>>>>>>> 6fb3dc4 (first taawon)
    }
    public static function getByPK($pk)
    {
        $sql = 'SELECT * FROM ' . static::$tableName . ' WHERE ' . static::$primaryKey . '="' . $pk . '"';
        $stmt = App::$app->db->pdo->prepare($sql);
        if ($stmt->execute() === true) {
            $obj = $stmt->fetchAll();
            return array_shift($obj);
        }
        return false;
<<<<<<< HEAD
=======
        App::$app->db->pdo = null;
>>>>>>> 6fb3dc4 (first taawon)
    }

    public function Login($login_user,$login_pass)
    {
        $sql = 'SELECT * FROM ' . static::$tableName . '  WHERE username = "' . $login_user . '" AND password = "' . $login_pass . '"';
        $stmt = App::$app->db->pdo->prepare($sql);
        $stmt -> execute();
        $count = $stmt->rowCount();
        $results = $stmt->fetchAll();
        if ($count == 1){
            return true;
            }else{
                return false;
            }
    }
    public static function counter($item,$table){
        $sql="SELECT COUNT($item) From $table";
        $stmt = App::$app->db->pdo->prepare($sql);
        $stmt->execute();
        return $results = $stmt->fetchcolumn();
      }
<<<<<<< HEAD

=======
>>>>>>> 6fb3dc4 (first taawon)
} 