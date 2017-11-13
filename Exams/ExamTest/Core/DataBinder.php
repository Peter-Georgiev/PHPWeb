<?php
/**
 * Created by IntelliJ IDEA.
 * User: RoYaL
 * Date: 11/3/2017
 * Time: 9:51 PM
 */

namespace Core;


class DataBinder implements DataBinderInterface
{

    public function bind(array $from, $className)
    {
        $object = new $className();
        foreach ($from as $key => $value) {
            $tokens = explode("_", $key);
            $methodName = 'set'.$tokens[0];
            for ($i = 1; $i < count($tokens); $i++) {
                $methodName .= ucfirst($tokens[1]);
            }

            if (method_exists($object, $methodName)) {
                $object->$methodName($value);
            }
        }

        return $object;
    }
}