<?php
class Personne {
    private $name;
    private $profession;
    private $address;
    private $phone;
    private $email;
    private $datenais;
    private $skills;
    private $company;
    private $position;
    private $start_date;
    private $end_date;
    private $description;
    private $school;
    private $degree;
    private $start_year;
    private $end_year;
    private $field_of_study;

    public function __construct(array $personne) {
        $this->hydrate($personne);
    }

    public function hydrate(array $personne) {
        foreach ($personne as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // Setters and getters

    public function setName($name) {
        $this->name = $name;
    }

    public function setProfession($profession) {
        $this->profession = $profession;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function setDateNais($datenais) {
        $this->datenais = $datenais;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSkills($skills) {
        $this->skills = $skills;
    }

    public function setCompany($company) {
        $this->company = $company;
    }

    public function setPosition($position) {
        $this->position = $position;
    }

    public function setStartDate($start_date) {
        $this->start_date = $start_date;
    }

    public function setEndDate($end_date) {
        $this->end_date = $end_date;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setSchool($school) {
        $this->school = $school;
    }

    public function setDegree($degree) {
        $this->degree = $degree;
    }

    public function setStartYear($start_year) {
        $this->start_year = $start_year;
    }

    public function setEndYear($end_year) {
        $this->end_year = $end_year;
    }

    public function setFieldOfStudy($field_of_study) {
        $this->field_of_study = $field_of_study;
    }

    // Getters
    // Implement getters similarly for all properties
}

class Personnes {
    private $conn;

    public function __construct(PDO $conn) { 
        $this->conn = $conn;
    }

    public function insererPersonne(Personne $personne) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO personne (name, profession, address, phone, email, datenais, skills, company, position, start_date, end_date, description, school, degree, start_year, end_year, field_of_study) VALUES (:name, :profession, :address, :phone, :email, :datenais, :skills, :company, :position, :start_date, :end_date, :description, :school, :degree, :start_year, :end_year, :field_of_study)");
           $stmt->bindValue(':name', $personne->getName());
            $stmt->bindValue(':profession', $personne->getProfession());
            $stmt->bindValue(':address', $personne->getAddress());
            $stmt->bindValue(':phone', $personne->getPhone());
            $stmt->bindValue(':email', $personne->getEmail());
            $stmt->bindValue(':datenais', $personne->getDateNais());
            $stmt->bindValue(':skills', $personne->getSkills());
            $stmt->bindValue(':company', $personne->getCompany());
            $stmt->bindValue(':position', $personne->getPosition());
            $stmt->bindValue(':start_date', $personne->getStartDate());
            $stmt->bindValue(':end_date', $personne->getEndDate());
            $stmt->bindValue(':description', $personne->getDescription());
            $stmt->bindValue(':school', $personne->getSchool());
            $stmt->bindValue(':degree', $personne->getDegree());
            $stmt->bindValue(':start_year', $personne->getStartYear());
            $stmt->bindValue(':end_year', $personne->getEndYear());
            $stmt->bindValue(':field_of_study', $personne->getFieldOfStudy());

            $stmt->execute();

            echo "Personne ajoutée avec succès.";
        } catch(PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}
?>
