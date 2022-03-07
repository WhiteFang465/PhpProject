<?php
class User
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $gender;
    private int $age;
    private string $email;
    private string $password;
    private string $mobileNumber;
    private bool $premium;
    private bool $smokes;

    /**
     * @param int $id
     * @param string $firstName
     * @param string $lastName
     * @param string $gender
     * @param int $age
     * @param string $email
     * @param string $password
     * @param string $mobileNumber
     * @param bool $premium
     * @param bool $smokes
     * @param bool $drinks
     */
    public function __construct( string $firstName, string $lastName, string $gender, int $age, string $email, string $password, string $mobileNumber, bool $premium, bool $smokes, bool $drinks, int $id = -1)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->gender = $gender;
        $this->age = $age;
        $this->email = $email;
        $this->password = $password;
        $this->mobileNumber = $mobileNumber;
        $this->premium = $premium;
        $this->smokes = $smokes;
        $this->drinks = $drinks;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getMobileNumber(): string
    {
        return $this->mobileNumber;
    }

    /**
     * @param string $mobileNumber
     */
    public function setMobileNumber(string $mobileNumber): void
    {
        $this->mobileNumber = $mobileNumber;
    }

    /**
     * @return bool
     */
    public function isPremium(): bool
    {
        return $this->premium;
    }

    /**
     * @param bool $premium
     */
    public function setPremium(bool $premium): void
    {
        $this->premium = $premium;
    }

    /**
     * @return bool
     */
    public function isSmokes(): bool
    {
        return $this->smokes;
    }

    /**
     * @param bool $smokes
     */
    public function setSmokes(bool $smokes): void
    {
        $this->smokes = $smokes;
    }

    /**
     * @return bool
     */
    public function isDrinks(): bool
    {
        return $this->drinks;
    }

    /**
     * @param bool $drinks
     */
    public function setDrinks(bool $drinks): void
    {
        $this->drinks = $drinks;
    }
    private bool $drinks;

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



}
