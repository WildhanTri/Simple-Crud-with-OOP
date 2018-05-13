<?php 

class controller {
    
    public function __construct() {
        function loadModel($class) {
            $file = "models/" . $class . ".php";
            if(is_readable($file)){
                require $file;
            }
        }
        spl_autoload_register("loadModel");
        $this->model = new model();
    }
    
    public function tampilData() {
        $data = $this->model->get("siswa");
        return $data;
    }
    public function tampilDataSpesifik($data) {
        $data = $this->model->getWhere("siswa", "nisn = $data");
        return $data;
    }
    public function prosesTambahData($data){
        $result = $this->model->insert("siswa", "'".$data->nisn."','".$data->nama."','".$data->kelas."','".$data->alamat."'");
        if($result == true){
            header("location:".url."index.php?page=read");
        }
    }
    public function prosesUpdateData($data){
        $data = $this->model->update("siswa", "nama = '$data->nama',kelas = '$data->kelas',alamat = '$data->alamat'", "nisn = '$data->nisn'");
        if($data == true){
            header("location:".url."index.php?page=read");
        }
    }
    public function prosesDeleteData($data){
        $data = $this->model->delete("siswa", "nisn = '$data->nisn'");
        var_dump($data);
        if($data == true){
            header("location:".url."index.php?page=read");
        }
    }
    
}

?>