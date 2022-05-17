<?php

namespace Classes;

class UserSettingsContr extends UserSettings
{

    protected function setCSettingId(): void
    {
        $settingId = Utilities::genUniqueId("set");
        parent::setSettingId($settingId);
    }

    protected function setCSettingProfileIndexedBySearchEngine(int $settingProfileIndexedBySearchEngine): void
    {
        $settingProfileIndexedBySearchEngine = Utilities::cleanData($settingProfileIndexedBySearchEngine);
        parent::setSettingProfileIndexedBySearchEngine($settingProfileIndexedBySearchEngine);
    }

    protected function setCSettingPublicFriendList(int $settingPublicFriendList): void
    {
        $settingPublicFriendList = Utilities::cleanData($settingPublicFriendList);
        parent::setSettingPublicFriendList($settingPublicFriendList);
    }

    protected function setCSettingPublicPosts(int $settingPublicPosts): void
    {
        $settingPublicPosts = Utilities::cleanData($settingPublicPosts);
        parent::setSettingPublicPosts($settingPublicPosts);
    }

    protected function setCSettingPublicProfile(int $settingPublicProfile): void
    {
        $settingPublicProfile = Utilities::cleanData($settingPublicProfile);
        parent::setSettingPublicProfile($settingPublicProfile);
    }

    protected function setCSettingTagVerification(int $settingTagVerification): void
    {
        $settingTagVerification = Utilities::cleanData($settingTagVerification);
        parent::setSettingTagVerification($settingTagVerification);
    }

    protected function setCSetting2FactorAuth(int $setting2FactorAuth): void
    {
        $setting2FactorAuth = Utilities::cleanData($setting2FactorAuth);
        parent::setSetting2FactorAuth($setting2FactorAuth);
    }

    protected function setCSettingVideoAutoplay(int $settingVideoAutoplay): void
    {
        parent::setSettingVideoAutoplay($settingVideoAutoplay);
    }

    protected function setCUserId(string $userId): void
    {
        $this->setUserId($userId);
    }
}