<?php
declare(strict_types=1);

interface IInfoCitizen
{
    public function name();

    public function birthdate();
}

interface IIidentification
{
    public function name();

    public function id();
}

interface IBuyer
{
    public function buyFood(int $food);
}

class Citizen implements IIidentification, IInfoCitizen, IBuyer
{
    const TYPE = "Citizen";
    private $name;
    private $age;
    private $id;
    private $birthdate;
    private $buyFood = 0;

    public function __construct(string $name, int $age, string $id, string $birthdate)
    {
        $this->name = $name;
        $this->age = $age;
        $this->id = $id;
        $this->birthdate = $birthdate;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function birthdate(): string
    {
        return $this->birthdate;
    }

    public function buyFood(int $food = 10)
    {
        $this->buyFood += $food;
    }

    public function getBuyFood(): int
    {
        return $this->buyFood;
    }

    public function getType(): string
    {
        return self::TYPE;
    }
}

class Rebel implements IBuyer
{
    const TYPE = "Rebel";
    private $name;
    private $age;
    private $group;
    private $buyFood = 0;

    public function __construct(string $name, int $age, string $group)
    {
        $this->name = $name;
        $this->age = $age;
        $this->group = $group;
    }

    public function buyFood(int $food = 5)
    {
        $this->buyFood += $food;
    }

    public function getBuyFood(): int
    {
        return $this->buyFood;
    }

    public function getType(): string
    {
        return self::TYPE;
    }
}

$data = [];
$n = intval(fgets(STDIN));
while ($n--) {
    $tokens = explode(' ', trim(fgets(STDIN)));

    $name = $tokens[0];
    if (count($tokens) == 4) {
        $data[$name] = new Citizen($name, intval($tokens[1]), $tokens[2], $tokens[3]);
    } elseif (count($tokens) == 3) {
        $data[$name] = new Rebel($name, intval($tokens[1]), $tokens[2]);
    }
}

while ("End" != $input = trim(fgets(STDIN))) {
    if (!array_key_exists($input, $data)) {
        continue;
    }
    $data[$input]->buyFood();
}

printResult($data);

function printResult(array $data){
    $count = 0;
    foreach ($data as $datum) {
        $count += $datum->getBuyFood();

    }

    echo $count;
}