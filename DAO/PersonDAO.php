<?php
    namespace DAO;

    use Models\Person as Person;

    class PersonDAO implements IPersonDAO{
        private $people = array();
        private $connection;
        private $tableName = "people";

        public function __construct(){
        }

        public function Add(Person $person){
            $this->GetData();
            $person->setId($this->GetNextId());
            array_push($this->people, $person);
            $this->SaveJson();
        }

        public function create($_person){
            $sql = "INSERT INTO people (Id, firstName, lastName, birthDate, dni, gender, phone, email, username, password, userType) VALUES (:Id, :firstName, :lastName, :birthDate, :dni, :gender, :phone, :email, :username, :password, :userType)";
    
            $parameters['Id'] = null;
            $parameters['firstName'] = $_person->getFirstName();
            $parameters['lastName'] = $_person->getLastName();
            $parameters['birthDate'] = $_person->getBirthDate();
            $parameters['dni'] = $_person->getDni();
            $parameters['gender'] = $_person->getGender();
            $parameters['phone'] = $_person->getPhone();
            $parameters['email'] = $_person->getEmail();
            $parameters['username'] = $_person->getUsername();
            $parameters['password'] = $_person->getPassword();
            $parameters['userType'] = $_person->getUserType();
    
            try{
                $this->connection = Connection::getInstance();
                return $this->connection->Execute($sql, $parameters);
            }catch(\PDOException $exc){
                throw $exc;
            }
    
        }

        public function GetByDni($dni){
 
            $sql = "SELECT * FROM people where dni = :dni";
            $parameters['dni'] = $dni;
            $this->GetData();

            $array = array_filter($this->people, function($person) use($dni){
                return $person->getDni() == $dni;
            });

            $array = array_values($array);
            return (count($array) > 0) ? $array[0] : null;
        }

        private function GetData(){

            try{
                $query = "SELECT * FROM $this->tableName";
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                
                foreach($resultSet as $value){
                    $person = new Person();
                    $person->setId($value["Id"]);
                    $person->setFirstName($value["firstName"]);
                    $person->setLastName($value["lastName"]);
                    $person->setDni($value["dni"]);
                    $person->setBirthDate($value["birthDate"]);
                    $person->setGender($value["gender"]);
                    $person->setPhone($value["phone"]);
                    $person->setEmail($value["email"]);
                    $person->setUsername($value["username"]);
                    $person->setPassword($value["password"]);
                    $person->setUserType($value["userType"]);

                    array_push($this->people, $person);
                }
            }catch(Exception $exc){
                throw $exc;
            }
/*/
            $this->people = array();

            if(file_exists($this->filename)){
                $jsonContent = file_get_contents($this->filename);
                $arrayDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayDecode as $value){
                    $person = new Person();
                    $person->setId($value["id"]);
                    $person->setFirstName($value["firstName"]);
                    $person->setLastName($value["lastName"]);
                    $person->setDni($value["dni"]);
                    $person->setBirthDate($value["birthDate"]);
                    $person->setGender($value["gender"]);
                    $person->setPhone($value["phone"]);
                    $person->setEmail($value["email"]);
                    $person->setUsername($value["username"]);
                    $person->setPassword($value["password"]);
                    $person->setuserType($value["getuserType"]);

                    array_push($this->people, $person);

                }
            }/*/
        }

        private function SaveJson(){
            sort($this->people);
            $arrayEncode = array();

            foreach($this->people as $person){
                $value["id"] = $person->getId();
                $value["firstName"] = $person->getFirstName();
                $value["lastName"] = $person->getLastName();
                $value["dni"] = $person->getDni();
                $value["birthDate"] = $person->getBirthDate();
                $value["gender"] = $person->getGender();
                $value["phone"] = $person->getPhone();
                $value["email"] = $person->getEmail();
                $value["username"] = $person->getUsername();
                $value["password"] = $person->getPassword();
                $value["userType"] = $person->getUserType();

                array_push($arrayEncode, $value);
            }
            $jsonContent = json_encode($arrayEncode, JSON_PRETTY_PRINT);
            file_put_contents($this->filename , $jsonContent);
        }

        private function GetNextId(){
            $id = 0;

            foreach($this->people as $person){
                $id = ($person->getId() > $id) ? $person->getId() : $id;
            }
            return $id + 1;
        }

        protected function map($value){

            $value = is_array($value) ? $value : [];

            $resp = array_map(function($p){
                $person = new Person();
                $person->setID($p['Id']);
                $person->setFirstName($p['firstName']);
                $person->setLastName($p['lastName']);
                $person->setBirthDate($p['birthDate']);
                $person->setDni($p['dni']);
                $person->setGender($p['gender']);
                $person->setPhone($p['phone']);
                $person->setEmail($p['email']);
                $person->setUsername($p['username']);
                $person->setPassword($p['password']);
                $person->setUserType($p['userType']);
                return $user;
            }, $value);

            return count($resp) > 1 ? $resp : $resp['0'];
        }
    }
?>