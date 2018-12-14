<?php
$data = [];
$page = $_GET['page'];
$limit = $_GET['limit'];
$type = isset($_GET['type'])?$_GET['type']:1;
$id_arr = [];
if(isset($_GET['id'])){
    $id_arr = explode(',',$_GET['id']);
}

for ($i=1;$i <=1000;$i++){
    if($type==1 && !in_array($i,$id_arr)){
        $data[] = [
            'id'=>$i,
            'name'=>'user_'.$i,
            'sex'=> ($i-1)%2==0?'男':'女'
        ];
    }else if($type==2 && in_array($i,$id_arr)){
        $data[] = [
            'id'=>$i,
            'name'=>'user_'.$i,
            'sex'=> ($i-1)%2==0?'男':'女'
        ];
    }

}
if($type==2){
    rsort($data);
}
$d = !$data?[]:array_chunk($data,$limit)[$page-1];
echo json_encode(['code'=>0,'data'=>$d,'count'=>count($data)]);