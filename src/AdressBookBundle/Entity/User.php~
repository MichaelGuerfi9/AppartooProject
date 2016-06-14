<?php
// src/AppBundle/Entity/User.php

namespace AdressBookBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */

class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public $contacts;

    public $contact;

    public function __construct()
    {
        parent::__construct();
    }
    public function getId()
    {
        return $this->id;
    }


    /**
     * Add contact
     *
     * @param \AdressBookBundle\Entity\Contacts $contact
     *
     * @return User
     */
    public function addContact(\AdressBookBundle\Entity\Contacts $contact)
    {
        $this->contacts[] = $contact;

        return $this;
    }

    /**
     * Remove contact
     *
     * @param \AdressBookBundle\Entity\Contacts $contact
     */
    public function removeContact(\AdressBookBundle\Entity\Contacts $contact)
    {
        $this->contacts->removeElement($contact);
    }

    /**
     * Get contacts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * Set contact
     *
     * @param \AdressBookBundle\Entity\Contacts $contact
     *
     * @return User
     */
    public function setContact(\AdressBookBundle\Entity\Contacts $contact = null)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return \AdressBookBundle\Entity\Contacts
     */
    public function getContact()
    {
        return $this->contact;
    }
}
