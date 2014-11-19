<?php

namespace Worldskills\CareBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VoteThread
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class VoteThread
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="total", type="integer")
     */
    private $total;

    /**
     * @var integer
     *
     * @ORM\Column(name="up", type="integer")
     */
    private $up;

    /**
     * @var integer
     *
     * @ORM\Column(name="down", type="integer")
     */
    private $down;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function __construct() {
        $this->setDown(0);
        $this->setUp(0);
        $this->setTotal(0);
    }

    /**
     * Set total
     *
     * @param integer $total
     * @return VoteThread
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return integer 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set up
     *
     * @param integer $up
     * @return VoteThread
     */
    public function setUp($up)
    {
        $this->up = $up;

        return $this;
    }

    /**
     * Get up
     *
     * @return integer 
     */
    public function getUp()
    {
        return $this->up;
    }

    /**
     * Set down
     *
     * @param integer $down
     * @return VoteThread
     */
    public function setDown($down)
    {
        $this->down = $down;

        return $this;
    }

    /**
     * Get down
     *
     * @return integer 
     */
    public function getDown()
    {
        return $this->down;
    }

    /**
     * Add a value
     *
     * @param integer $value
     * @return void
     */
    public function addValue($value) {
        if($value == 1) {
            $this->setUp($this->getUp() + 1);
            $this->setTotal($this->getTotal() + 1);
        } elseif($value == -1) {
            $this->setDown($this->getUp() + 1);
            $this->setTotal($this->getTotal() - 1);
        }
    }
}
