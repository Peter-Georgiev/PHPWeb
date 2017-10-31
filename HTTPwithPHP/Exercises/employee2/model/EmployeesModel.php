<?php
declare(strict_types=1);

class EmployeesModel extends Model
{
    // Todo
    /**
     * EmployeesModel constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        parent::__construct($db);
        $this->table = "employee";
    }

    public function readAll()
    {
        //TODO
        $stmt = $this->db->prepare("
        SELECT *
        FROM `" . $this->table . "`");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


}