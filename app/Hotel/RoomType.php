<?php

namespace Hotel;

class RoomType extends BaseService{

    public function getTypes(){
        // SQL statement
        $statement = 'SELECT * FROM room_type';

        $rows =$this->fetchAll($statement);
        return $rows;
    }
}