<?php
declare(strict_types=1);
spl_autoload_register(function ($class) {
    $class = $class . ".php";
    require_once $class;
});

while ("" != $input = trim(fgets(STDIN))) {

    $input_arr = explode(" ", $input);
    if (count($input_arr) == 5 && $input_arr[0] == "Private") {
        $id = intval($input_arr[1]);
        $firstName = $input_arr[2];
        $lastName = $input_arr[3];
        $salary = $input_arr[4];

        $privateSoldier = new PrivateSoldier($id, $firstName, $lastName, $salary);

        echo $privateSoldier;
    } elseif ($input_arr[0] == "LeutenantGeneral" && count($input_arr) >= 5) {
        /*TODO
         * 1.loop $input_arr[5] to  the end
         * In loop:
         *      created an object of type PrivateSoldier
         *      array of object or array of integers (id's)
         */
    }

    //TODO

}