<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Enum\RolesEnum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $userReference = "USER";
    private $userPasswordHasherInterface;
    public function __construct(UserPasswordHasherInterface $userPasswordHasherInterface)
    {
        $this->userPasswordHasherInterface = $userPasswordHasherInterface;
    }
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setUsername("squidgame");
        $user->setPassword($this->userPasswordHasherInterface->hashPassword($user,"coucoulescongolais"));
        $user->setRoles([RolesEnum::admin]);

        $this->addReference($this->userReference  . "-01",$user);
        $manager->persist($user);
        
        $user = new User();
        $user->setUsername("TheFartMachinGun");
        $user->setPassword($this->userPasswordHasherInterface->hashPassword($user,"groscaca"));
        $user->setRoles([RolesEnum::user]);

        $this->addReference($this->userReference  . "-02",$user);
        $manager->persist($user);

        $user = new User();
        $user->setUsername("welle");
        $user->setPassword($this->userPasswordHasherInterface->hashPassword($user,"hugo"));
        $user->setRoles([RolesEnum::user]);

        $this->addReference($this->userReference  . "-03",$user);
        $manager->persist($user);

        $user = new User();
        $user->setUsername("xXmanumacs15Xx");
        $user->setPassword($this->userPasswordHasherInterface->hashPassword($user,"lovebrigitte"));
        $user->setRoles([RolesEnum::user]);

        $this->addReference($this->userReference  . "-04",$user);
        $manager->persist($user);
        
        $manager->flush();
    }
}
