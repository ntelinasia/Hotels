<?php

namespace Hotel;
use PDO;
use DateTime;
use Hotel\BaseService;

class Room extends BaseService{

    private static $currentUseId;

    public function getCities(){
        $cities = [];
        // SQL statement
        $statement = 'SELECT DISTINCT city FROM room';

        $rows =$this->fetchAll($statement);

        foreach ($rows as $row){
            $cities[] = $row['city']; 
        }
        return $cities;
    }

    // Get room type
    public function getTypes(){
        $types = [];
        // SQL statement
        $statement = 'SELECT DISTINCT type_id FROM room';

        $rows =$this->fetchAll($statement);

        foreach ($rows as $row){
            $types[] = $row['type_id']; 
        }
        return $types;
    }

    public function getTwo(){

        $parameters=[
            ':city'=>'Athens',
            ':area'=>'Kentro',
        ];
        $statement = 'SELECT * FROM room WHERE city = :city AND area = :area';

        $rows= $this->fetchAll($statement, $parameters);
        var_dump($rows);

    }

    public function searchRooms($checkinDate, $checkoutDate, $city='', $typeId=''){ // City and typeId may be optional

        // Set up parameters
        $parameters = [
            ':check_in_date' => $checkinDate,
            ':check_out_date' => $checkoutDate
        ];
        // If city is given
        if(!empty($city)){
            $parameters[':city']=$city;
        }
        // If typeId is given
        if(!empty($typeId)){
            $parameters[':type_id']=$typeId;
        }
       
        // Set up Queries
        $statement="SELECT * FROM room WHERE ";

        // If city is given
        if(!empty($city)){
            $statement.="city=:city AND ";
        }
        // If room type is given
        if(!empty($typeId)){
            $statement.="type_id=:type_id AND ";
        }

        $statement.="room_id NOT IN (SELECT room_id FROM booking WHERE check_in_date <= :check_out_date AND check_out_date >= :check_in_date)";
        
        $rows = $this->fetchAll($statement, $parameters);
        return $rows;
        
    }

    public function getCountOfGuests(){
        // SQL statement
        $statement = 'SELECT DISTINCT count_of_guests FROM room';

        $rows =$this->fetchAll($statement);

        return $rows;
    }

    



}