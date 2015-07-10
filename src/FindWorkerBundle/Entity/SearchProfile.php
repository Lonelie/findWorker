<?php
namespace FindWorkerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SearchProfile
 *
 * @ORM\Entity
 */
class SearchProfile
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=60, nullable=true)
     */
    private $skills;

    /**
     * Get skills
     *
     * @return string
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Set skills
     *
     * @param string $skills
     * @return SearchProfile
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;
        return $this;
    }

    /**
     * Get Project
     *
     * @return string
     */
    public function __toString()
    {
        return $this->skills;
    }
}
