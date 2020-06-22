<?php

declare(strict_types=1);

namespace Gtto\Tests\Backoffice\Auth\Application\Authenticate;

use Gtto\Backoffice\Auth\Application\Authenticate\AuthenticateUserCommandHandler;
use Gtto\Backoffice\Auth\Application\Authenticate\UserAuthenticator;
use Gtto\Backoffice\Auth\Domain\InvalidAuthCredentials;
use Gtto\Backoffice\Auth\Domain\InvalidAuthUsername;
use Gtto\Tests\Backoffice\Auth\AuthModuleUnitTestCase;
use Gtto\Tests\Backoffice\Auth\Domain\AuthUserMother;
use Gtto\Tests\Backoffice\Auth\Domain\AuthUsernameMother;

final class AuthenticateUserCommandHandlerTest extends AuthModuleUnitTestCase
{
    private $handler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = new AuthenticateUserCommandHandler(new UserAuthenticator($this->repository()));
    }

    /** @test */
    public function it_should_authenticate_a_valid_user(): void
    {
        $command  = AuthenticateUserCommandMother::random();
        $authUser = AuthUserMother::fromCommand($command);

        $this->shouldSearch($authUser->username(), $authUser);

        $this->dispatch($command, $this->handler);
    }

    /** @test */
    public function it_should_throw_an_exception_when_the_user_does_not_exist(): void
    {
        $this->expectException(InvalidAuthUsername::class);

        $command  = AuthenticateUserCommandMother::random();
        $username = AuthUsernameMother::create($command->username());

        $this->shouldSearch($username);

        $this->dispatch($command, $this->handler);
    }

    /** @test */
    public function it_should_throw_an_exception_when_the_password_does_not_math(): void
    {
        $this->expectException(InvalidAuthCredentials::class);

        $command  = AuthenticateUserCommandMother::random();
        $authUser = AuthUserMother::withUsername(AuthUsernameMother::create($command->username()));

        $this->shouldSearch($authUser->username(), $authUser);

        $this->dispatch($command, $this->handler);
    }
}
