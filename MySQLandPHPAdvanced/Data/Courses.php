<?php
declare(strict_types=1);

namespace Data;

class Courses
{
    private $courseName;

    /**
     * Courses constructor.
     * @param string $courseName
     */
    public function __construct(string $courseName)
    {
        $this->setCourseName($courseName);
    }

    /**
     * @param string $courseName
     */
    private function setCourseName(string $courseName)
    {
        $this->courseName = $courseName;
    }

    /**
     * @return string
     */
    public function getCourseName(): string
    {
        return $this->courseName;
    }
}