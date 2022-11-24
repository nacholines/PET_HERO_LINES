<?php
    namespace DAO;

    use Models\Pet as Pet;
    use Models\PetType as PetType;
    use Models\PetSize as PetSize;

    class PetDAO implements IPetDAO{
        private $connection;
        private $tableName = "pets";
        private $petTypesTableName = "pet_types";
        private $petBreedsTableName = "pet_breeds";
        private $petSizesTableName = "pet_sizes";


        public function create($pet){
            $query = "INSERT INTO pets (IdPerson, IdPetType, IdPetSize, Breed, petName, comments, active) VALUES (:IdPerson, :IdPetType, :IdPetSize, :Breed, :petName, :comments, b'1')";
    
            $parameters['IdPerson'] = $pet->getIdPerson();
            $parameters['IdPetType'] = $pet->getPetType();
            $parameters['IdPetSize'] = $pet->getSize();
            $parameters['Breed'] = $pet->getBreed();
            $parameters['petName'] = $pet->getName();
            $parameters['comments'] = $pet->getComment();
    
            try{
                $this->connection = Connection::getInstance();
                return $this->connection->Execute($query, $parameters);
            }catch(\PDOException $exc){
                throw $exc;
            }
        }

        public function GetTypesData(){
            $petTypes = array();
            try{
                $query = "SELECT * FROM $this->petTypesTableName";
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                
                foreach($resultSet as $value){
                    $petType = new PetType();
                    $petType->setIdType($value["IdType"]);
                    $petType->setName($value["name"]);
                    array_push($petTypes, $petType);
                }
            }catch(Exception $exc){
                throw $exc;
            }
            return $petTypes;
        }

        public function GetSizesData(){
            $petSizes = array();
            try{
                $query = "SELECT * FROM $this->petSizesTableName";
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                
                foreach($resultSet as $value){
                    $petSize = new PetSize();
                    $petSize->setIdPetSize($value["IdPetSize"]);
                    $petSize->setSize($value["size"]);
                    array_push($petSizes, $petSize);
                }
            }catch(Exception $exc){
                throw $exc;
            }
            return $petSizes;
        }

        public function GetPetsByPersonId($idPerson){
            $petsByPerson = array();
            try{
                $query = "SELECT * FROM $this->tableName WHERE IdPerson = :IdPerson AND active = b'1'";
                $parameters['IdPerson'] = $idPerson;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                foreach($resultSet as $value){
                    $pet = new Pet();
                    $pet = $pet->setIdPet($value["IdPet"]);
                    $pet = $pet->setIdPerson($value["IdPerson"]);
                    $pet = $pet->setPetType($value["IdPetType"]);
                    $pet = $pet->setSize($value["IdPetSize"]);
                    $pet = $pet->setBreed($value["breed"]);
                    $pet = $pet->setName($value["petName"]);
                    $pet = $pet->setPhoto($value["image"]);
                    $pet = $pet->setVaccines($value["vaccines"]);
                    $pet = $pet->setComment($value["comments"]);
                    $pet = $pet->setVideo($value["video"]);

                    array_push($petsByPerson, $pet);
                }

            }catch(Exception $exc){
                throw $exc;
            }
            return $petsByPerson;
        }

        public function GetPetById($idPet){
            $pet = new Pet();
            try{
                $query = "SELECT * FROM pets p WHERE p.IdPet = :IdPet AND p.active = b'1';";
                $parameters['IdPet'] = $idPet;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                $value = $resultSet[0];
                $pet = $pet->setIdPet($value["IdPet"]);
                $pet = $pet->setIdPerson($value["IdPerson"]);
                $pet = $pet->setPetType($value["IdPetType"]);
                $petSize = $this->GetSizeById($value["IdPetSize"]);
                $pet = $pet->setSize($petSize);
                $pet = $pet->setBreed($value["breed"]);
                $pet = $pet->setName($value["petName"]);
                $pet = $pet->setPhoto($value["image"]);
                $pet = $pet->setVaccines($value["vaccines"]);
                $pet = $pet->setComment($value["comments"]);
                $pet = $pet->setVideo($value["video"]);
            }catch(Exception $exc){
                throw $exc;
            }
            return $pet;
        }

        public function getSizeIdByPetId($idPet){
            try{
                $query = "SELECT IdPetSize FROM $this->tableName WHERE IdPet = :idPet";
                $parameters ['idPet'] = $idPet;
                $this->conncetion = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);

            } catch(Exception $exc){
                throw $exc;
            }
            return $resultSet[0][0];
        }

        public function getTypeIdByPetId($idPet){
            try{
                $query = "SELECT IdPetType FROM $this->tableName WHERE IdPet = :idPet";
                $parameters ['idPet'] = $idPet;
                $this->conncetion = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);

            } catch(Exception $exc){
                throw $exc;
            }
            return $resultSet[0]["IdPetType"];
        }

        public function GetSizeById($idPetSize){
            try{
                $query = "SELECT * FROM pet_sizes WHERE IdPetSize = :idPetSize";
                $parameters ['idPetSize'] = $idPetSize;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                $petSize = new PetSize();
                $value = $resultSet[0];
                $petSize = $petSize->setIdPetSize($value["IdPetSize"]);
                $petSize = $petSize->setSize($value["size"]);

            } catch(Exception $exc){
                throw $exc;
            }
            return $petSize;
        }

        public function GetTypeById($idType){
            try{
                $query = "SELECT * FROM pet_types WHERE IdType = :idType";
                $parameters ['idType'] = $idType;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                $petType = new PetType();
                $value = $resultSet[0];
                $petType = $petType->setIdType($value["IdType"]);
                $petType = $petType->setName($value["name"]);
            } catch(Exception $exc){
                throw $exc;
            }
            return $petType;
        }

        public function DeletePet($idPet){
            try{
                $query = "UPDATE pets SET active = b'0' WHERE IdPet = :IdPet";
                $parameters ['IdPet'] = $idPet;
                $this->connection = Connection::GetInstance();
                $this->connection->Execute($query, $parameters);
            }catch(Exception $exc){
                throw $exc;
            }
        }

        
        public function FillPetData($pet){
            $sizeId = $this->getSizeIdByPetId($pet-> getIdPet());
            $size = $this->GetSizeById($sizeId);
            $pet->setSize($size);
            $typeId = $this->getTypeIdByPetId($pet->getIdPet());
            $type = $this->GetTypeById($typeId);
            $pet->setPetType($type);
        }
    }
?>