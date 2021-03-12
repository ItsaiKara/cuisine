<?php

namespace App\DataFixtures;

use App\Entity\Recette;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RecetteFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $user = new User();
        $user->setEmail("mail@us1");
        $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$/nq/08HpqYYNNWE1eJ80mw$enn2e3YHyMOYZuzlwoKC/HlZ+cCKdzPB5pBnOEb7zgU');
        $user->setRoles(['ROLE_USER']);
        $user->setAlias('Jhon Stolfo');

        $manager->persist($user);
        for($i = 0; $i < 20; $i++){
            $rec = new Recette();
            $rec->setAutheur($user);
            $rec->setNom("Recette".$i);
            $rec->setDescription("Description".$i);
            $rec->setEtapes("Acheter tomates; Laver tomates/moza; Couper tomates/moza; Dresser");
            if ($i<10){
                $rec->setImage($i.".png");
            } else {
                $rec->setImage("default.png");
            }
            $rec->setTemps($i*10);
            $manager->persist($rec);
        }

        $manager->flush();
    }
}
