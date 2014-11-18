<?php

namespace Worldskills\CareBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * SubjectRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SubjectRepository extends EntityRepository
{
    public function getHottest($limit = 10) {
        return $this
            ->getEntityManager()
            ->getRepository('WorldskillsCareBundle:Subject')
            ->createQueryBuilder('s')
            ->orderBy('id', 'desc')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }
}