<?php
declare(strict_types=1);

$people =[
    [
      'name' => 'pesho',
      'age' => 18
    ],
    [
      'name' => 'joro',
      'age' => 28
    ],
    [
      'name' => 'mery',
      'age' => 16
    ],
    [
      'name' => 'ani',
      'age' => 16
    ]
];

//usort($)

usort($people, function ($a, $b){
    $ageCompare =  $a['age'] <=>  $b['age'];
    if ($ageCompare == 0){
        return $b['name'] < $a['name'];
    }
    return $ageCompare;
});

var_dump($people);