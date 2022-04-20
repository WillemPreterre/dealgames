<?php

namespace App\Security\Voter;

use App\Entity\User;
use App\Entity\Annonce;
use PhpParser\Node\Stmt\Return_;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class AnnoncesVoter extends Voter
{
    public const ANNONCE_EDIT = 'annonce_edit';
    public const ANNONCE_DELETE = 'annonce_delete';

    private $security;

    public function __construct(Security $security) 
    {
        $this->security = $security;
    }
    private function canEdit(Annonce $annonce, User $user) {
        // Le propriétair de l'annonce peut la modifier
        return $user === $annonce->getUser();
    }
    private function canDelete(Annonce $annonce, User $user) {
        return $user === $annonce->getUser();

    }

    protected function supports(string $attribute, $annonce): bool
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        return in_array($attribute, [self::ANNONCE_EDIT, self::ANNONCE_DELETE ])
            && $annonce instanceof \App\Entity\Annonce;
    }

    protected function voteOnAttribute(string $attribute, $annonce, TokenInterface $token): bool
    {
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

        // on vérifie si l'user est admin

        if ($this->security->isGranted("ROLE_ADMIN")) return true;

        // On vérifie si l'annonce à un propriétaire

        if (null == $annonce->getUser()) return false;

        // ... (check conditions and return true to grant permission) ...
        switch ($attribute) {
            case self::ANNONCE_EDIT:
                // On vérifie si on peut éditer
                return $this->canEdit($annonce, $user);
                break;
            case self::ANNONCE_DELETE:
                // On vérifie si on peut Supprimer
                return $this->canDelete($annonce, $user);
                break;
        }

        return false;
    }

 
}
