<?php

class Preferences{
    private int $userId;
    private int $ageUpperLimit;
    private int $ageLowerLimit;
    private bool $interestedInMale;
    private bool $interestedInFemale;
    private bool $smoker;
    private bool $drinker;

    /**
     * @param int $userId
     * @param int $ageUpperLimit
     * @param int $ageLowerLimit
     * @param bool $interestedInMale
     * @param bool $interestedInFemale
     * @param bool $smoker
     * @param bool $drinker
     */
    public function __construct(int $userId, int $ageUpperLimit, int $ageLowerLimit, bool $interestedInMale, bool $interestedInFemale, bool $smoker, bool $drinker)
    {
        $this->userId = $userId;
        $this->ageUpperLimit = $ageUpperLimit;
        $this->ageLowerLimit = $ageLowerLimit;
        $this->interestedInMale = $interestedInMale;
        $this->interestedInFemale = $interestedInFemale;
        $this->smoker = $smoker;
        $this->drinker = $drinker;
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
    public function getAgeUpperLimit(): int
    {
        return $this->ageUpperLimit;
    }

    /**
     * @param int $ageUpperLimit
     */
    public function setAgeUpperLimit(int $ageUpperLimit): void
    {
        $this->ageUpperLimit = $ageUpperLimit;
    }

    /**
     * @return int
     */
    public function getAgeLowerLimit(): int
    {
        return $this->ageLowerLimit;
    }

    /**
     * @param int $ageLowerLimit
     */
    public function setAgeLowerLimit(int $ageLowerLimit): void
    {
        $this->ageLowerLimit = $ageLowerLimit;
    }

    /**
     * @return bool
     */
    public function isInterestedInMale(): bool
    {
        return $this->interestedInMale;
    }

    /**
     * @param bool $interestedInMale
     */
    public function setInterestedInMale(bool $interestedInMale): void
    {
        $this->interestedInMale = $interestedInMale;
    }

    /**
     * @return bool
     */
    public function isInterestedInFemale(): bool
    {
        return $this->interestedInFemale;
    }

    /**
     * @param bool $interestedInFemale
     */
    public function setInterestedInFemale(bool $interestedInFemale): void
    {
        $this->interestedInFemale = $interestedInFemale;
    }

    /**
     * @return bool
     */
    public function isSmoker(): bool
    {
        return $this->smoker;
    }

    /**
     * @param bool $smoker
     */
    public function setSmoker(bool $smoker): void
    {
        $this->smoker = $smoker;
    }

    /**
     * @return bool
     */
    public function isDrinker(): bool
    {
        return $this->drinker;
    }

    /**
     * @param bool $drinker
     */
    public function setDrinker(bool $drinker): void
    {
        $this->drinker = $drinker;
    }


}
?>