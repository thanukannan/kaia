<?php

use Illuminate\Database\Seeder;


class Role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();
        DB::table('roles')->insert(array
            (
                array('categoryname'=>'client','createdby'=>'1','updatedby'=>'1'),
                array('categoryname'=>'hotel','createdby'=>'1','updatedby'=>'1'),
                array('categoryname'=>'booking ','createdby'=>'1','updatedby'=>'1'),
                array('categoryname'=>'report','createdby'=>'1','updatedby'=>'1'),
                array('categoryname'=>'payment','createdby'=>'1','updatedby'=>'1'),
            )
        );

    }
}