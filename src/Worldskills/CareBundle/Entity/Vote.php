<?php

namespace Worldskills\CareBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vote
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
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
     * @var VoteThread
     *
     * @ORM\ManyToOne(targetEntity="VoteThread")
     */
    private $voteThread;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="Worldskills\UserBundle\Entity\User")
     */
    private $user;

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

    /**
     * Set voteThread
     *
     * @param \Worldskills\CareBundle\Entity\VoteThread $voteThread
     * @return Vote
     */
    public function setVoteThread(\Worldskills\CareBundle\Entity\VoteThread $voteThread = null)
    {
        $this->voteThread = $voteThread;

        return $this;
    }

    /**
     * Get voteThread
     *
     * @return \Worldskills\CareBundle\Entity\VoteThread 
     */
    public function getVoteThread()
    {
        return $this->voteThread;
    }

    /**
     * Set user
     *
     * @param \Worldskills\UserBundle\Entity\User $user
     * @return Vote
     */
    public function setUser(\Worldskills\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Worldskills\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Get value
     *
     * @return int
     */
    public function getValue() {
        return $this->isUp() ? 1 : -1;
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostRemove()
     * @ORM\PostUpdate()
     */
    public function threadControl() {
        $this->voteThread->addValue($this->getValue());
    }
}
