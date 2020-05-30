<?php


namespace App\Controller\EasyAdmin;


use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends EasyAdminController
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $userPasswordEncoder;

    /**
     * UserController constructor.
     */
    public function __construct(UserPasswordEncoderInterface $userPasswordEncoder)
    {
        $this->userPasswordEncoder = $userPasswordEncoder;
    }

    /**
     * @param User $entity
     */
    protected function updateEntity($entity)
    {
        // update the password if necessary
        if (!empty($entity->getPlainPassword())) {
            $entity->setPassword($this->userPasswordEncoder->encodePassword($entity, $entity->getPlainPassword()));
            $entity->eraseCredentials();
        }

        parent::updateEntity($entity);
    }

    protected function persistEntity($entity)
    {
        // update the password if necessary
        if (!empty($entity->getPlainPassword())) {
            $entity->setPassword($this->userPasswordEncoder->encodePassword($entity, $entity->getPlainPassword()));
            $entity->eraseCredentials();
        }

        parent::persistEntity($entity);
    }


}