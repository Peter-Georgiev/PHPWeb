<?php
declare(strict_types=1);

class EmployeeController extends Controller
{
    // TODO: Implement main() method.
    public function main()
    {


    }

    public function view()
    {
        $m = new EmployeesModel($this->db);
        $res = $m->readAll();
    }
}