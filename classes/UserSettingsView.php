<?php

namespace Classes;

class UserSettingsView extends UserSettingsContr
{

    public function enable2FactorAuth(string $userId): bool
    {
        $this->setCUserId($userId);
        return parent::enable2FactorAuthStatus();
    }


    public function getUserSettings(string $userId): ?array {
        $this->setCUserId($userId);

        return $this->getUserSettingsResult();
    }

    public function updatePublicPostsSetting(string $userId, int $settingStatus): bool {

        $settingStatus = boolval($settingStatus) ? 0:1;
        $this->setCUserId($userId);
        $this->setCSettingPublicPosts($settingStatus);
        return $this->updatePublicPostsSettingStatus();
    }

    public function updatePublicProfileSetting(string $userId, int $settingStatus): bool {
        $this->setCUserId($userId);
        $settingStatus = boolval($settingStatus) ? 0:1;
        $this->setCSettingPublicProfile($settingStatus);

        return $this->updatePublicProfileSettingStatus();
    }

    public function updateTagVerificationSetting(string $userId, int $settingStatus): bool {
        $settingStatus = boolval($settingStatus) ? 0:1;
        $this->setCUserId($userId);
        $this->setCSettingTagVerification($settingStatus);

        return $this->updateTagVerificationSettingStatus();
    }

    public function updatePublicFriendList(string $userId, int $settingStatus): bool {
        $settingStatus = boolval($settingStatus) ? 0:1;
        $this->setCUserId($userId);
        $this->setCSettingPublicFriendList($settingStatus);

        return $this->updatePublicFriendListStatus();
    }

    public function updateProfileIndexSearchEngine(string $userId, int $settingStatus ): bool {
        $settingStatus = boolval($settingStatus) ? 0:1;
        $this->setCUserId($userId);
        $this->setCSettingProfileIndexedBySearchEngine($settingStatus);
        return $this->updateProfileIndexSearchEngineStatus();
    }

    public function updateVideoAutoplay(string $userId, int $settingStatus): bool {
        $settingStatus = boolval($settingStatus) ? 0:1;
        $this->setCUserId($userId);
        $this->setCSettingVideoAutoplay($settingStatus);

        return $this->updateUserAutoplayStatus();
    }

    public function initiateSettings(string $userId): bool
    {
        $this->setCSettingId();
        $this->setCUserId($userId);
        return parent::initiateSettingsStatus();
    }


}