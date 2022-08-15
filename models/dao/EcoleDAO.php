<?php

class EcoleDAO extends AbstractDAO {
    public function __construct(){
        parent::__construct("ecole");
    }


    public function create ($result) {
        return new Ecole (
            $result['pk'],
            $result['nom'],
            $result['adresse']
        );
    }
    public function createToEdit ($result) {
        return new Ecole (
            $result['pk'],
            $result['nom'],
            $result['adresse']
        );
    }

    public function createNew ($result) {
        return new Ecole (
            !empty($result['pk']) ? $result['pk'] : 0,
            $result['nom'],
            $result['adresse']
        );
    }

    //instancie un objet et ses relations
    function deepCreate ($result) {
        return new Ecole (
            $result['pk'],
            $result['nom'],
            $result['adresse']
        );
    }

    function store($data){

        if (empty($data['nom'])) {
            return false;
        }
        $ecole = $this->create(
            ['pk' => 0,
                'nom' => $data['nom'],
                'adresse' => $data['adresse']
            ]);



        if ($ecole) {
            try {
                $statement = $this->connection->prepare(
                    "INSERT INTO {$this->table} (nom, adresse) VALUES (?, ?)"
                );
                $statement->execute([
                    htmlspecialchars($ecole->__get('nom')),
                    htmlspecialchars($ecole->__get('adresse'))
                ]);
                return true;
            } catch (PDOException $e) {
                print $e->getMessage();
                return false;
            }
        }
    }

    public function update ($id, $data){

        if (empty($data['nom'])) {
            return false;
        }

        $ecole = $this->createToEdit(['pk' => 0,
            'nom' => $data['nom'],
            'adresse' => $data['adresse']]);


        if ($ecole) {
            try {
                $statement = $this->connection->prepare(
                    "UPDATE {$this->table} SET nom = ?, adresse = ? WHERE pk = {$id}"
                );
                $statement->execute([
                    htmlspecialchars($ecole->__get('nom')),
                    htmlspecialchars($ecole->__get('adresse'))
                ]);
                return true;
            } catch (PDOException $e) {
                print $e->getMessage();
                return false;
            }
        }
    }

}