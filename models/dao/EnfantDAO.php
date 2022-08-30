<?php

class EnfantDAO extends AbstractDAO {
    public function __construct(){
        parent::__construct("enfant");
    }

    public function ecole ($ecole_id) {
        return $this->belongsTo(new EcoleDAO(), $ecole_id);
    }

    public function titulaire ($titulaire_id) {
        return $this->belongsTo(new TitulaireDAO(), $titulaire_id);
    }

    public function planning ($planning_id){
        return $this->belongsTo(new PlanningDAO(), $planning_id);
    }

    public function create ($result) {
        return new Enfant (
            $result['pk'],
            $result['nom'],
            $result['prenom'],
            $result['ecole_id'],
            $result['titulaire_id'],
            $result['planning_id']
        );
    }
    public function createToEdit ($result) {
        return new Enfant (
            $result['pk'],
            $result['nom'],
            $result['prenom'],
            $result['ecole_id'],
            $result['titulaire_id'],
            $result['planning_id']
        );
    }

    public function createNew ($result) {
        return new Enfant (
            !empty($result['pk']) ? $result['pk'] : 0,
            $result['nom'],
            $result['prenom'],
            $result['ecole_id'],
            $result['titulaire_id'],
            $result['planning_id']
        );
    }

    //instancie un objet et ses relations
    function deepCreate ($result) {
        return new Enfant (
            $result['pk'],
            $result['nom'],
            $result['prenom'],
            $this->ecole($result['ecole_id']),
            $this->titulaire($result['titulaire_id']),
            $this->planning($result['planning_id'])
        );
    }

    function store($data){

        if (empty($data['nom'])) {
            return false;
        }
        $enfant = $this->create(
            ['pk' => 0,
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'ecole_id' => $data['ecole_id'],
            'titulaire_id' => $data['titulaire_id']
            ]);



        if ($enfant) {
            try {
                $statement = $this->connection->prepare(
                    "INSERT INTO {$this->table} (nom, prenom, ecole_id, titulaire_id) VALUES (?, ?, ?, ?)"
                );
                $statement->execute([
                    htmlspecialchars($enfant->__get('nom')),
                    htmlspecialchars($enfant->__get('prenom')),
                    htmlspecialchars($enfant->__get('ecole_id')),
                    htmlspecialchars($enfant->__get('titulaire_id'))
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

        $enfant = $this->createToEdit(['pk' => 0,
                'nom' => $data['nom'],
                'prenom' => $data['prenom'],
                'ecole_id' => $data['ecole_id'],
                'titulaire_id' => $data['titulaire_id'],
                'planning_id' => null]);


        if ($enfant) {
            try {
                $statement = $this->connection->prepare(
                    "UPDATE {$this->table} SET nom = ?, prenom = ?, ecole_id = ?, titulaire_id = ? WHERE pk = {$id}"
                );
                $statement->execute([
                    htmlspecialchars($enfant->__get('nom')),
                    htmlspecialchars($enfant->__get('prenom')),
                    htmlspecialchars($enfant->__get('ecole_id')),
                    htmlspecialchars($enfant->__get('titulaire_id'))
                ]);
                return true;
            } catch (PDOException $e) {
                print $e->getMessage();
                return false;
            }
        }
    }

    public function updatePlanning($enfant_id, $planning_id){

        try {
            $statement = $this->connection->prepare(
                "UPDATE {$this->table} SET planning_id = ? WHERE pk = {$enfant_id}"
            );
            $statement->execute([
                htmlspecialchars($planning_id)
            ]);
            return true;
        } catch (PDOException $e) {
            print $e->getMessage();
            return false;
        }


    }

}