<?php

class AidePedaDAO extends AbstractDAO {
    public function __construct(){
        parent::__construct("aidepeda");
    }


    public function create ($result) {
        return new AidePeda (
            $result['pk'],
            $result['username'],
            $result['email'],
            $result['password'],
            $result['nom'],
            $result['prenom'],
            $result['session_token'],
            $result['lastlog'],
            $result['semainier_id']
        );
    }
    public function createToEdit ($result) {
        return new AidePeda (
            $result['pk'],
            $result['username'],
            $result['email'],
            $result['password'],
            $result['nom'],
            $result['prenom'],
            $result['session_token'],
            $result['lastlog'],
            $result['semainier_id']
        );
    }

    public function createNew ($result) {
        return new AidePeda (
            !empty($result['pk']) ? $result['pk'] : 0,
            $result['username'],
            $result['email'],
            $result['password'],
            $result['nom'],
            $result['prenom'],
            $result['session_token'],
            $result['lastlog'],
            $result['semainier_id']
        );
    }

    //instancie un objet et ses relations
    function deepCreate ($result) {
        return new AidePeda (
            $result['pk'],
            $result['username'],
            $result['email'],
            $result['password'],
            $result['nom'],
            $result['prenom'],
            $result['session_token'],
            $result['lastlog'],
            $result['semainier_id']
        );
    }

    function store($data){

        if (empty($data['nom'])) {
            return false;
        }

        if($data['perAppId']==''){
            $personne = $this->create(['pk' => 0,
                'perNom' => $data['perNom'],
                'perPrenom' => $data['perPrenom'],
                'perMail' => $data['perMail'],
                'perMdp' => $data['perMdp'],
                'perAppId' => null]);

        } else {
            $personne = $this->create(['pk' => 0,
                'perNom' => $data['perNom'],
                'perPrenom' => $data['perPrenom'],
                'perMail' => $data['perMail'],
                'perMdp' => $data['perMdp'],
                'perAppId' => $data['perAppId']]);
        }


        if ($personne) {
            try {
                $statement = $this->connection->prepare(
                    "INSERT INTO {$this->table} (perNom, perPrenom, perMail, perMdp, perAppId) VALUES (?, ?, ?, ?, ?)"
                );
                $statement->execute([
                    htmlspecialchars($personne->__get('name')),
                    htmlspecialchars($personne->__get('forename')),
                    htmlspecialchars($personne->__get('mail')),
                    htmlspecialchars($personne->__get('password')),
                    $personne->__get('flat')
                ]);
                return true;
            } catch (PDOException $e) {
                print $e->getMessage();
                return false;
            }
        }
    }

    public function updateSemainier($aidepeda_id, $semainier_id){

        try {
            $statement = $this->connection->prepare(
                "UPDATE {$this->table} SET semainier_id = ? WHERE pk = {$aidepeda_id}"
            );
            $statement->execute([
                htmlspecialchars($semainier_id)
            ]);
            return true;
        } catch (PDOException $e) {
            print $e->getMessage();
            return false;
        }


    }

    public function update ($id, $data){

        if (empty($data['perNom'])) {
            return false;
        }

        if($data['perAppId']==''){
            $personne = $this->createToEdit(['pk' => 0,
                'perNom' => $data['perNom'],
                'perPrenom' => $data['perPrenom'],
                'perMail' => $data['perMail'],
                'perAppId' => null]);

        } else {
            $personne = $this->createToEdit(['pk' => 0,
                'perNom' => $data['perNom'],
                'perPrenom' => $data['perPrenom'],
                'perMail' => $data['perMail'],
                'perAppId' => $data['perAppId']]);
        }

        if ($personne) {
            try {
                $statement = $this->connection->prepare(
                    "UPDATE {$this->table} SET perNom = ?, perPrenom = ?, perMail = ?, perAppId = ? WHERE pk = {$id}"
                );
                $statement->execute([
                    htmlspecialchars($personne->__get('name')),
                    htmlspecialchars($personne->__get('forename')),
                    htmlspecialchars($personne->__get('mail')),
                    $personne->__get('flat')
                ]);
                return true;
            } catch (PDOException $e) {
                print $e->getMessage();
                return false;
            }
        }
    }


    public function verify ($data) {
        if (empty($data['email']) || empty($data['password'])) {
            return false;
        }

        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table} WHERE email = ?");
            $statement->execute([
                $data['email']
            ]);
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $aidepeda = $this->createNew($result);
            if($aidepeda) {
                if(password_verify($data['password'], $aidepeda->password)) {
                    $aidepeda = $this->setToken($aidepeda);

                    if($aidepeda) {
                        $this->setLastLog($aidepeda);
                    }
                    return $aidepeda;
                }
            }
            return false;
        } catch (PDOException $e) {
            print $e->getMessage();
            return false;
        }
    }

    public function setToken($aidepeda) {
        //générer un token

        $token = bin2hex(random_bytes(8)) . "." . time();
        $aidepeda->session_token = $token;

        //créer un cookie avec le token
        setcookie('session_token', $token, time()+60*60*24, "/");

        //update l'utilisateur en DB avec son nouveau token
        $this->updateToken($aidepeda);

        return $aidepeda;
    }
    public function setLastLog($aidepeda) {
        date_default_timezone_set('Europe/Brussels');
        $aidepeda->lastLog = date("Y-m-d H:i:s");

        //update le log de l'user
        $this->updateLastLog($aidepeda);

        return $aidepeda;
    }

    public function updateLastLog ($aidepeda) {
        try {
            $statement = $this->connection->prepare("UPDATE {$this->table} SET lastlog = ? WHERE pk = ?");
            $statement->execute([
                $aidepeda->lastLog,
                $aidepeda->pk
            ]);

            return true;
        } catch (PDOException $e) {
            print $e->getMessage();
            return false;
        }
    }

    public function updateToken ($aidepeda) {

        try {
            $statement = $this->connection->prepare("UPDATE {$this->table} SET session_token = ? WHERE pk = ?");
            $statement->execute([
                $aidepeda->session_token,
                $aidepeda->pk
            ]);

            return true;
        } catch (PDOException $e) {
            print $e->getMessage();
            return false;
        }
    }

    public function fetchBySession($token) {
        if (empty($token)) {
            return false;
        }
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table} WHERE session_token = ?");
            $statement->execute([
                htmlspecialchars($token)
            ]);
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $user = $this->deepCreate($result);
            return $user;
        } catch (PDOException $e) {
            print $e->getMessage();
            return false;
        }

    }



    public function logout(){
        unset($_COOKIE['session_token']);
        setcookie('session_token', '', time() - 4200, '/');
    }
}