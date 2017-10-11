<?php
declare(strict_types=1);

interface IIidentification
{
    public function name();

    public function id();
}

interface IInfoCitizen
{
    public function name();

    public function birthdate();
}
class Citizen implements IIidentification, IInfoCitizen
{
    private $name;
    private $age;
    private $id;
    private $birthdate;

    public function __construct(string $name, int $age, string $id, string $birthdate)
    {
        $this->name = $name;
        $this->age = $age;
        $this->id = $id;
        $this->birthdate = $birthdate;
    }

    public function name()
    {
        return $this->name;
    }

    public function id()
    {
        return $this->id;
    }

    public function birthdate()
    {
        return $this->birthdate;
    }
}
class Pet implements IIidentification, IInfoCitizen
{
    private $name;
    private $birthdate;

    public function __construct(string $name, string $birthdate)
    {
        $this->name = $name;
        $this->birthdate = $birthdate;
    }

    public function name()
    {
        return $this->name;
    }

    public function id()
    {
        return "";
    }

    public function birthdate()
    {
        return $this->birthdate;
    }
}
class Robot implements IIidentification
{
    private $name;
    private $id;

    public function __construct(string $name, string $id)
    {
        $this->name = $name;
        $this->id = $id;
    }

    public function name()
    {
        return $this->name;
    }

    public function id()
    {
        return $this->id;
    }

}

$data = [];
while ("End" != $input = trim(fgets(STDIN))) {
    $tokens = explode(" ", $input);
    $type = $tokens[0];

    if ($type == "Citizen"){
        $data[] = new Citizen($tokens[1], intval($tokens[2]), $tokens[3], $tokens[4]);
    } elseif ($type == "Robot") {
        //$data[] = new Robot($tokens[1], $tokens[2]);
    } elseif ($type == "Pet") {
        $data[] = new Pet($tokens[1], $tokens[2]);
    }
}

$input = trim(fgets(STDIN));
searchPrintResult($data, $input);

function searchPrintResult(array $data, string $input) {
    $isEmpty = true;
    foreach ($data as $item) {
        $year = explode( '/', trim($item->birthdate()));
        if ($input == trim($year[2])) {
            $isEmpty = false;
            echo $item->birthdate() . PHP_EOL;
        }
    }

    if ($isEmpty) {
        echo "<no output>";
    }
}