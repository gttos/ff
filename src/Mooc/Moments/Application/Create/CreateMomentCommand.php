<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Moments\Application\Create;

use Gtto\Shared\Domain\Bus\Command\Command;

final class CreateMomentCommand implements Command
{
    private $id;
    private $place_id;
    private $story;
    private $rate;
    private $date;
    private $crush_id;
    private $user_id;
    private $created_at;

    public function __construct(string $id, string $placeId, string $story, int $rate, string $date, string $crushId, string $userId, string $createdAt)
    {
        $this->id               = $id;
        $this->place_id               = $placeId;
        $this->story               = $story;
        $this->rate          = $rate;
        $this->date            = $date;
        $this->crush_id              = $crushId;
        $this->user_id               = $userId;
        $this->created_at       = $createdAt;
    }

    /**
     * @return string
     */
    public function id(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function placeId(): string
    {
        return $this->place_id;
    }

    /**
     * @return string
     */
    public function story(): string
    {
        return $this->story;
    }

    /**
     * @return int
     */
    public function rate(): int
    {
        return $this->rate;
    }

    /**
     * @return string
     */
    public function date(): string
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function crushId(): string
    {
        return $this->crush_id;
    }

    /**
     * @return string
     */
    public function userId(): string
    {
        return $this->user_id;
    }

    /**
     * @return string
     */
    public function createdAt(): string
    {
        return $this->created_at;
    }

}
