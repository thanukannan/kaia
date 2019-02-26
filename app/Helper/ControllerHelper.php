<?php

namespace App\Helpers;
use App\Role;
use Auth;
class Helper
{


    public static function getRolename($ids){
        if(is_array($ids)){
            foreach ($ids as $id) {
                $rolenames[] = role::where('id',$id)->first()->categoryname;
            }
            $rolename = rtrim(implode(',', $rolenames), ',');
        }else{
            $rolename = role::where('id',$ids)->first()->categoryname;
        }
        return $rolename;
    }



}