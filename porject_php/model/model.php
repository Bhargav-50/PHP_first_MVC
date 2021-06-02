<?php

mysqli_report(MYSQLI_REPORT_STRICT);

class model{
    public $Connect = "";
    public function __construct()
    {
        $this-> Connect = new mysqli("localhost","root","","php_pro");
        // echo "<pre>";
        // print_r($this->Connect);
    }
    public function insert($tbl,$data)
    {
        // echo  $SQL = "INSERT INTO $tbl";
        // echo "<pre>";
        // print_r($data);
        $clms = implode("," , array_keys($data)) ;
        $values = implode("','" , $data) ;
        $SQL = "INSERT INTO $tbl($clms) VALUES('$values')";
        // echo "$SQL";
        $SQLEx =$this->Connect->query($SQL);
        if ($SQLEx == 1) {
            $ResponseData['Data'] = 1;
            $ResponseData['Msg'] = 'success';
            $ResponseData['Code'] = 1;
        }else {
            $ResponseData['Data'] = 0;
            $ResponseData['Msg'] = 'Try again';
            $ResponseData['Code'] = 0;
        }
        return $ResponseData;
    }
    public function login($uname,$pass)
        {
            
            $SQL = "SELECT * FROM main WHERE password = '$pass' AND (user_name = '$uname' OR email = '$uname' 
            OR mobile = '$uname')";
            // echo "<pre>";
            // print_r($SQL);
            $SQLEx =$this->Connect->query($SQL);
            

            if ($SQLEx->num_rows > 0) {
                $FetchData = $SQLEx->fetch_object();//will responding in object
                // echo "<pre>";
                // print_r($FetchData);
                // exit;
                // $FetchData = $SQLEx->fetch_array();//will responding in array
                // $FetchData = $SQLEx->fetch_assoc();//will responding in associative array
                // $FetchData = $SQLEx->fetch_assoc();//will responding in numeric array
                // echo $FetchData[1];
                $ResponseData['Data'] = $FetchData;
                $ResponseData['Msg'] = 'success';
                $ResponseData['Code'] = 1;  
            }else {
                $ResponseData['Data'] = 0;
                $ResponseData['Msg'] = 'Try again';
                $ResponseData['Code'] = 0;
            }
            return $ResponseData;
        }

        public function select($tbl)
        {
            $SQL = "SELECT * FROM $tbl";
            $SQLEx =$this->Connect->query($SQL);

            if ($SQLEx->num_rows > 0) {
                while ($FD = $SQLEx->fetch_object()) {
                    $FetchData[] =  $FD;
                }
                $ResponseData['Data'] = $FetchData;
                $ResponseData['Msg'] = 'success';
                $ResponseData['Code'] = 1;  
            }else {
                $ResponseData['Data'] = 0;
                $ResponseData['Msg'] = 'Try again';
                $ResponseData['Code'] = 0;
            }
            return $ResponseData;
        }
    
    public function update($tbl,$data)
    {
        
        $SQL = "UPDATE $tbl SET $data";
        // echo "<pre>";
        // print_r($SQL);
        $SQLEx =$this->Connect->query($SQL);

        if ($SQLEx == 1) {
            $ResponseData['Data'] = 1;
            $ResponseData['Msg'] = 'success';
            $ResponseData['Code'] = 1;  
        }else {
            $ResponseData['Data'] = 0;
            $ResponseData['Msg'] = 'Try again';
            $ResponseData['Code'] = 0;
        }
        return $ResponseData;
    }
}

?>