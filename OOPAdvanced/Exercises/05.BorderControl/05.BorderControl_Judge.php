<?php
declare(strict_types=1);

interface IIidentification
{
    public function name();

    public function id();
}

class Citizen implements IIidentification
{
    private $name;
    private $age;
    private $id;

    public function __construct(string $name, int $age, string $id)
    {
        $this->name = $name;
        $this->age = $age;
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

    if (count($tokens) == 3){
        $data[$tokens[0]] = new Citizen($tokens[0], intval($tokens[1]), $tokens[2]);
    } elseif (count($tokens) == 2) {
        $data[$tokens[0]] = new Robot($tokens[0], $tokens[1]);
    }
}

$input = intval(fgets(STDIN));
foreach ($data as $key => $value) {
    if (preg_match( '/' . $input . '$/', $value->id(), $regex)) {
        echo $value->id() . PHP_EOL;
    }
}