<?php

class SemainierDAO extends AbstractDAO {
    public function __construct(){
        parent::__construct("semainier");
    }

    public function aidepeda ($aidepeda_id){
        return $this->belongsTo(new AidePedaDAO(), $aidepeda_id);
    }

    public function create ($result) {
        return new Semainier (
            $result['pk'],
            $result['lundi'],
            $result['mardi'],
            $result['mercredi'],
            $result['jeudi'],
            $result['vendredi'],
            $result['planningupdated']
        );
    }

    public function createToEdit ($result) {
        return new Semainier (
            $result['pk'],
            $result['lundi'],
            $result['mardi'],
            $result['mercredi'],
            $result['jeudi'],
            $result['vendredi'],
            $result['planningupdated']
        );
    }

    public function createNew ($result) {
        return new Semainier (
            !empty($result['pk']) ? $result['pk'] : 0,
            $result['lundi'],
            $result['mardi'],
            $result['mercredi'],
            $result['jeudi'],
            $result['vendredi'],
            $result['planningupdated']
        );
    }

    //instancie un objet et ses relations
    function deepCreate ($result) {
        return new Semainier (
            $result['pk'],
            $result['lundi'],
            $result['mardi'],
            $result['mercredi'],
            $result['jeudi'],
            $result['vendredi'],
            $result['planningupdated']
        );
    }

    function store($data){

        if (empty($data['lundi'])) {
            return false;
        }
//        echo "<pre>",var_dump($data),"<pre>";

        $semainier = $this->create(
            ['pk' => 0,
                'lundi' => $data['lundi'],
                'mardi' => $data['mardi'],
                'mercredi' => $data['mercredi'],
                'jeudi' => $data['jeudi'],
                'vendredi' => $data['vendredi'],
                'planningupdated' => 0
            ]);

        if ($semainier) {
            try {
                $statement = $this->connection->prepare(
                    "INSERT INTO {$this->table} (lundi, mardi, mercredi, jeudi, vendredi) VALUES (?, ?, ?, ?, ?)"
                );
                $statement->execute([
                    htmlspecialchars($semainier->__get('lundi')),
                    htmlspecialchars($semainier->__get('mardi')),
                    htmlspecialchars($semainier->__get('mercredi')),
                    htmlspecialchars($semainier->__get('jeudi')),
                    htmlspecialchars($semainier->__get('vendredi'))
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

    public function updateForFlag($id){
        try {
            $statement = $this->connection->prepare(
                "UPDATE {$this->table} SET planningUpdated = ? WHERE pk = {$id}"
            );
            $statement->execute([
                true,
            ]);
            return true;
        } catch (PDOException $e) {
            print $e->getMessage();
            return false;
        }
    }
}