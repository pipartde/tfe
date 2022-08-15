<?php

class TitulaireDAO extends AbstractDAO {
    public function __construct(){
        parent::__construct("titulaire");
    }

    public function ecole ($ecole_id) {
        return $this->belongsTo(new EcoleDAO(), $ecole_id);
    }

    function create ($result) {
        return new Titulaire (
            $result['pk'],
            $result['nom'],
            $result['prenom'],
            $result['ecole_id']
        );
    }
    function createToEdit ($result) {
        return new Titulaire (
            $result['pk'],
            $result['nom'],
            $result['prenom'],
            $result['ecole_id']
        );
    }

    function createNew ($result) {
        return new Titulaire (
            !empty($result['pk']) ? $result['pk'] : 0,
            $result['nom'],
            $result['prenom'],
            $result['ecole_id']
        );
    }

    //instancie un objet et ses relations
    function deepCreate ($result) {
        return new Titulaire (
            $result['pk'],
            $result['nom'],
            $result['prenom'],
            $this->ecole($result['ecole_id'])
        );
    }

    function store($data){

        if (empty($data['nom'])) {
            return false;
        }
        $titulaire = $this->create(
            ['pk' => 0,
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'ecole_id' => $data['ecole_id']
            ]);



        if ($titulaire) {
            try {
                $statement = $this->connection->prepare(
                    "INSERT INTO {$this->table} (nom, prenom, ecole_id) VALUES (?, ?, ?)"
                );
                $statement->execute([
                    htmlspecialchars($titulaire->nom),
                    htmlspecialchars($titulaire->prenom),
                    htmlspecialchars($titulaire->ecole_id)
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

        $titulaire = $this->createToEdit(['pk' => 0,
                'nom' => $data['nom'],
                'prenom' => $data['prenom'],
                'ecole_id' => $data['ecole_id']]);


        if ($titulaire) {
            try {
                $statement = $this->connection->prepare(
                    "UPDATE {$this->table} SET nom = ?, prenom = ?, ecole_id = ? WHERE pk = {$id}"
                );
                $statement->execute([
                    htmlspecialchars($titulaire->__get('nom')),
                    htmlspecialchars($titulaire->__get('prenom')),
                    htmlspecialchars($titulaire->__get('ecole_id'))
                ]);
                return true;
            } catch (PDOException $e) {
                print $e->getMessage();
                return false;
            }
        }
    }

}