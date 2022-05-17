<?php

namespace Classes;

trait Setting
{

    private string $settingId;
    private string $userId;

    /**
     * @param string $userId
     */
    protected function setUserId(string $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @param string $settingId
     */
    protected function setSettingId(string $settingId): void
    {
        $this->settingId = $settingId;
    }

}