<?php

namespace Worldskills\CareBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vote
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Vote
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
     * @var boolean
     *
     * @ORM\Column(name="isUp", type="boolean")
     */
    private $isUp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datetime", type="datetime")
     */
    private $datetime;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="VoteThread")
     */
    private $voteThread;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set isUp
     *
     * @param boolean $isUp
     * @return Vote
     */
    public function setIsUp($isUp)
    {
        $this->isUp = $isUp;

        return $this;
    }

    /**
     * Get isUp
     *
     * @return boolean 
     */
    public function getIsUp()
    {
        return $this->isUp;
    }

    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     * @return Vote
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime
     *
     * @return \DateTime 
     */
    public function getDatetime()
    {
        return $this->datetime;
    }
}
