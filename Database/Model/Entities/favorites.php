<?php

class Favorites{
    private int $id;
    private int $userId;
    private int $favoritePersonsUserId;
    private bool $added;
    private bool $removed;
    private bool $isRead;

    /**
     * @param int $id
     * @param int $userId
     * @param int $favoritePersonsUserId
     * @param bool $added
     * @param bool $removed
     * @param bool $isRead
     */
    public function __construct(int $userId, int $favoritePersonsUserId, bool $added, bool $removed, bool $isRead, int $id=-1)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->favoritePersonsUserId = $favoritePersonsUserId;
        $this->added = $added;
        $this->removed = $removed;
        $this->isRead = $isRead;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getFavoritePersonsUserId(): int
    {
        return $this->favoritePersonsUserId;
    }

    /**
     * @param int $favoritePersonsUserId
     */
    public function setFavoritePersonsUserId(int $favoritePersonsUserId): void
    {
        $this->favoritePersonsUserId = $favoritePersonsUserId;
    }

    /**
     * @return bool
     */
    public function isAdded(): bool
    {
        return $this->added;
    }

    /**
     * @param bool $added
     */
    public function setAdded(bool $added): void
    {
        $this->added = $added;
    }

    /**
     * @return bool
     */
    public function isRemoved(): bool
    {
        return $this->removed;
    }

    /**
     * @param bool $removed
     */
    public function setRemoved(bool $removed): void
    {
        $this->removed = $removed;
    }

    /**
     * @return bool
     */
    public function isIsRead(): bool
    {
        return $this->isRead;
    }

    /**
     * @param bool $isRead
     */
    public function setIsRead(bool $isRead): void
    {
        $this->isRead = $isRead;
    }


}
?>