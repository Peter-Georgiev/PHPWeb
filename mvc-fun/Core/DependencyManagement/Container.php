<?php

namespace Core\DependencyManagement;


class Container implements ContainerInterface
{

    private $dependencies;
    private $cache;

    public function resolve($interfaceName)
    {
        if (array_key_exists($interfaceName, $this->cache)) {
            return $this->cache[$interfaceName];
        }

        if (interface_exists($interfaceName)) {
            $className = $this->dependencies[$interfaceName];
        } elseif (class_exists($interfaceName)) {
            $className = $interfaceName;
        } else {
            throw new \Exception('Kakav e tozi tip!!!!!!!!');
        }

        $classInfo = new \ReflectionClass($className);
        $ctorInfo = $classInfo->getConstructor();

        if (null === $ctorInfo) {
            $obj = new $className();
            $this->cache($className, $obj);
            return $obj;
        }

        $resolvedParameters = [];
        foreach ($ctorInfo->getParameters() as $parameter) {
            // recursion
            $resolvedParameters[]= $this->resolve($parameter->getClass()->getName());
        }

        $obj = $classInfo->newInstanceArgs($resolvedParameters);
        $this->cache($interfaceName, $obj);
        return $obj;
    }

    public function addDependency($interfaceName, $implementationName)
    {
        $this->dependencies[$interfaceName] = $implementationName;
    }

    public function cache($interfaceName, $object)
    {
        $this->cache[$interfaceName] = $object;
    }

    public function exists($interfaceName): bool
    {
        return array_key_exists($interfaceName, $this->dependencies);
    }
}