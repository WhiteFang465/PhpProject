<?php
class forum{
    private string $message;
    private string $username;

    /**
     * @param string $message
     */
    public function __construct(string $message ,string $email)
    {
        $this->message = $message;
        $this->$email = $email;

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
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

}
