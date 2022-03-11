<?php

class Message{
    private int $fromUserId;
    private int $toUserId;
    private string $message;
    private DateTime $sentTime;
    private bool $isRead;

    /**
     * @param int $fromUserId
     * @param int $toUserId
     * @param string $message
//     * @param DateTime $sentTime
     * @param bool $isRead
     */
    public function __construct(int $fromUserId, int $toUserId, string $message, bool $isRead = false)
    {
        $this->fromUserId = $fromUserId;
        $this->toUserId = $toUserId;
        $this->message = $message;
        //$this->sentTime = $sentTime;
        $this->isRead = $isRead;
    }


    /**
     * @return int
     */
    public function getFromUserId(): int
    {
        return $this->fromUserId;
    }

    /**
     * @param int $fromUserId
     */
    public function setFromUserId(int $fromUserId): void
    {
        $this->fromUserId = $fromUserId;
    }

    /**
     * @return int
     */
    public function getToUserId(): int
    {
        return $this->toUserId;
    }

    /**
     * @param int $toUserId
     */
    public function setToUserId(int $toUserId): void
    {
        $this->toUserId = $toUserId;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return DateTime
     */
    public function getSentTime(): DateTime
    {
        return $this->sentTime;
    }

    /**
     * @param DateTime $sentTime
     */
    public function setSentTime(DateTime $sentTime): void
    {
        $this->sentTime = $sentTime;
    }

    /**
     * @return bool
     */
    public function isRead(): bool
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
