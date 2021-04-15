<?php
use App\Supplies;
use App\Producer;
use App\Unit;
use App\Quality;

function Select_Function($data, $select=0){
    
    switch ($data) {
        case 'chatluong':
            $datas = Quality::get();
            foreach ($datas as  $data) {
                $id = $data['id'];
                $name = $data['qua_name'];
                if ($select != 0 && $id == $select) {
                    echo "<option value='$id' selected = 'true'>$name</option>";
                } else {
                    echo "<option value='$id'>$name</option>";                            
                }
            }
            break;
        case 'nhasanxuat':
            $datas = Producer::get();
            foreach ($datas as  $data) {
                $id = $data['id'];
                $name = $data['pro_name'];
                if ($select != 0 && $id == $select) {
                    echo "<option value='$id' selected = 'true'>$name</option>";
                } else {
                    echo "<option value='$id'>$name</option>";                            
                }
            }
            break;
        case 'donvitinh':
            $datas = Unit::get();
            foreach ($datas as  $data) {
                $id = $data['id'];
                $name = $data['unit_name'];
                if ($select != 0 && $id == $select) {
                    echo "<option value='$id' selected = 'true'>$name</option>";
                } else {
                    echo "<option value='$id'>$name</option>";                            
                }
            }
            break;    
    }
    // foreach ($data as  $val) {
    //     $id = $val['id'];
    //     $name = $val['name'];
    //     if ($select != 0 && $id == $select) {
    //         echo "<option value='$id' selected = 'true'>$name</option>";
    //     } else {
    //         echo "<option value='$id'>$name</option>";                            
    // }
}
?>