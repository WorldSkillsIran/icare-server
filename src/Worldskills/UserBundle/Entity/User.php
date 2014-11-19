<?php

namespace Worldskills\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\ArrayCollection;

use HWI\Bundle\OAuthBundle\Security\Core\User\OAuthUser;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 * @UniqueEntity("username")
 * @UniqueEntity("email")
 */
class User extends OAuthUser implements EquatableInterface, \Serializable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="google_id", type="string", length=255, unique=true, nullable=true)
     */
    protected $googleId;

    /**
     * @ORM\Column(type="array")
     *
     */
    protected $roles;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     */
    protected $username;

    /**
     * @var string
     *
     * @ORM\Column(name="realname", type="string", length=255, nullable=true)
     */
    protected $realname;

    /**
     * @var string
     *
     * @ORM\Column(name="nickname", type="string", length=255, nullable=true)
     */
    protected $nickname;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=32)
     */
    protected $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    protected $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    protected $email;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    protected $isActive;

    /**
     * @var integer
     *
     * @ORM\Column(name="work_hour_start", type="time", nullable=true)
     */
    protected $workHourStart;

    /**
     * @var integer
     *
     * @ORM\Column(name="work_hour_end", type="time", nullable=true)
     */
    protected $workHourEnd;

    /**
     * @var integer
     *
     * @ORM\Column(name="vacation_days", type="integer", length=2, nullable=true)
     */
    protected $vacationDays;

    /**
     * @param mixed $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    public function __construct()
    {
        $this->roles = new ArrayCollection();

        $this->isActive = true;
        $this->salt = md5(uniqid(null, true));

        $workHourStart = new \DateTime();
        $workHourStart->setTime(8, 0, 0);
        $this->workHourStart = $workHourStart;

        $workHourEnd = new \DateTime();
        $workHourEnd->setTime(16, 0, 0);
        $this->workHourEnd = $workHourEnd;
    }

    /**
     * @param string $nickname
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }

    /**
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @param string $realname
     */
    public function setRealname($realname)
    {
        $this->realname = $realname;
    }

    /**
     * @return string
     */
    public function getRealname()
    {
        return $this->realname;
    }

    /**
     * @param string $googleId
     */
    public function setGoogleId($googleId)
    {
        $this->googleId = $googleId;
    }

    /**
     * @return string
     */
    public function getGoogleId()
    {
        return $this->googleId;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function addRole($role)
    {
        return $this->roles[] = $role;
    }

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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @inheritDoc
     */

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            ) = unserialize($serialized);
    }

    /**
     * Set workHourStart
     *
     * @param integer $workHourStart
     * @return Entry
     */
    public function setWorkHourStart($workHourStart)
    {
        $this->workHourStart = $workHourStart;

        return $this;
    }

    /**
     * Get workHourStart
     *
     * @return integer
     */
    public function getWorkHourStart()
    {
        return $this->workHourStart;
    }

    /**
     * Set workHourEnd
     *
     * @param integer $workHourEnd
     * @return Entry
     */
    public function setWorkHourEnd($workHourEnd)
    {
        $this->workHourEnd = $workHourEnd;

        return $this;
    }

    /**
     * Get workHourEnd
     *
     * @return integer
     */
    public function getWorkHourEnd()
    {
        return $this->workHourEnd;
    }

    /**
     * @param int $vacationDays
     */
    public function setVacationDays($vacationDays)
    {
        $this->vacationDays = $vacationDays;
    }

    /**
     * @return int
     */
    public function getVacationDays()
    {
        return $this->vacationDays;
    }

    public function isEqualTo(UserInterface $user)
    {
        if ((int)$this->getId() === $user->getId()) {
            return true;
        }

        return false;
    }

    /**
     * Set roles
     *
     * @param array $roles
     * @return User
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }
}
