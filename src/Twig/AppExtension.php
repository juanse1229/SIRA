<?php 
namespace App\Twig;

use App\Repository\UsersSubjectsRepository;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface; // Importar TokenStorageInterface
use Symfony\Component\Security\Core\User\UserInterface; // Importar UserInterface
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    private $usersSubjectsRepo;
    private $tokenStorage; // Cambiamos el nombre a tokenStorage

    public function __construct(UsersSubjectsRepository $usersSubjectsRepo, TokenStorageInterface $tokenStorage) // Inyectamos TokenStorageInterface
    {
        $this->usersSubjectsRepo = $usersSubjectsRepo;
        $this->tokenStorage = $tokenStorage; // Inicializamos el TokenStorage
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('user_has_completed', [$this, 'hasUserCompletedSubject']),
        ];
    }

    public function hasUserCompletedSubject($subject): bool
    {
        $user = $this->tokenStorage->getToken()?->getUser(); // Obtener el usuario actual

        if (!$user instanceof UserInterface) { // Verificamos si es una instancia de UserInterface
            return false; // Devuelve false si no hay un usuario autenticado
        }

        if (!$subject || !$subject->getId()) {
            return false; // Devuelve false si el sujeto es inválido
        }

        return $this->usersSubjectsRepo->hasCompletedSubject($user->getId(), $subject->getId());
    }
}
