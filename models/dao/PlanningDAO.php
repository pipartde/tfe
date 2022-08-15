<?php

class PlanningDAO extends AbstractDAO {
    public function __construct(){
        parent::__construct("planning");
    }

    public function enfant ($enfant_id){
        return $this->belongsTo(new EnfantDAO(), $enfant_id);
    }

    public function create ($result) {
        return new Planning (
            $result['pk'],
            $result['lundi'],
            $result['mardi'],
            $result['mercredi'],
            $result['jeudi'],
            $result['vendredi']
        );
    }
    public function createToEdit ($result) {
        return new Planning (
            $result['pk'],
            $result['lundi'],
            $result['mardi'],
            $result['mercredi'],
            $result['jeudi'],
            $result['vendredi']
        );
    }

    public function createNew ($result) {
        return new Planning (
            !empty($result['pk']) ? $result['pk'] : 0,
            $result['lundi'],
            $result['mardi'],
            $result['mercredi'],
            $result['jeudi'],
            $result['vendredi']
        );
    }

    //instancie un objet et ses relations
    function deepCreate ($result) {
        return new Planning (
            $result['pk'],
            $result['lundi'],
            $result['mardi'],
            $result['mercredi'],
            $result['jeudi'],
            $result['vendredi']
        );
    }

    function store($data){

        if (empty($data['lundi'])) {
            return false;
        }

        $planning = $this->create(
            ['pk' => 0,
                'lundi' => $data['lundi'],
                'mardi' => $data['mardi'],
                'mercredi' => $data['mercredi'],
                'jeudi' => $data['jeudi'],
                'vendredi' => $data['vendredi']
            ]);

        if ($planning) {
            try {
                $statement = $this->connection->prepare(
                    "INSERT INTO {$this->table} (lundi, mardi, mercredi, jeudi, vendredi) VALUES (?, ?, ?, ?, ?)"
                );
                $statement->execute([
                    htmlspecialchars($planning->__get('lundi')),
                    htmlspecialchars($planning->__get('mardi')),
                    htmlspecialchars($planning->__get('mercredi')),
                    htmlspecialchars($planning->__get('jeudi')),
                    htmlspecialchars($planning->__get('vendredi'))
                ]);

                return $this->connection->lastInsertId();
            } catch (PDOException $e) {
                print $e->getMessage();
                return false;
            }
        }
    }

    public function update ($id, $data){

        if (empty($data['lundi']) || empty($data['mardi']) || empty($data['mercredi']) || empty($data['jeudi']) || empty($data['vendredi'])) {
            return false;
        }

        $planning = $this->createToEdit(['pk' => 0,
            'lundi' => $data['lundi'],
            'mardi' => $data['mardi'],
            'mercredi' => $data['mercredi'],
            'jeudi' => $data['jeudi'],
            'vendredi' => $data['vendredi']
            ]);


        if ($planning) {
            try {
                $statement = $this->connection->prepare(
                    "UPDATE {$this->table} SET lundi = ?, mardi = ?, mercredi = ?, jeudi = ?, vendredi = ? WHERE pk = {$id}"
                );
                $statement->execute([
                    htmlspecialchars($planning->__get('lundi')),
                    htmlspecialchars($planning->__get('mardi')),
                    htmlspecialchars($planning->__get('mercredi')),
                    htmlspecialchars($planning->__get('jeudi')),
                    htmlspecialchars($planning->__get('vendredi')),
                ]);
                return true;
            } catch (PDOException $e) {
                print $e->getMessage();
                return false;
            }
        }
    }

}