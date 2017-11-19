<?php

namespace Core\DependencyManagement;


interface ContainerInterface
{
    public function resolve($interfaceName);

    public function addDependency($interfaceName, $implementationName);

    public function cache($interfaceName, $object);

    public function exists($interfaceName): bool;
}