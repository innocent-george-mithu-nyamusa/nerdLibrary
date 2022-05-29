<?php

namespace Classes;

use Exception;
use PDO;

class UserSettings extends Dbh
{
    use Setting;
    private int $settingVideoAutoplay;
    private int $setting2FactorAuth;
    private int $settingPublicPosts;
    private int $settingPublicProfile;
    private int $settingTagVerification;
    private int $settingPublicFriendList;
    private int $settingProfileIndexedBySearchEngine;


    /**
     * @param bool $settingProfileIndexedBySearchEngine
     */
    protected function setSettingProfileIndexedBySearchEngine(int $settingProfileIndexedBySearchEngine): void
    {
        $this->settingProfileIndexedBySearchEngine = $settingProfileIndexedBySearchEngine;
    }

    /**
     * @param bool $settingPublicFriendList
     */
    protected function setSettingPublicFriendList(int $settingPublicFriendList): void
    {
        $this->settingPublicFriendList = $settingPublicFriendList;
    }

    /**
     * @param bool $settingTagVerification
     */
    protected function setSettingTagVerification(int $settingTagVerification): void
    {
        $this->settingTagVerification = $settingTagVerification;
    }

    /**
     * @param bool $settingPublicProfile
     */
    protected function setSettingPublicProfile(int $settingPublicProfile): void
    {
        $this->settingPublicProfile = $settingPublicProfile;
    }

    /**
     * @param bool $settingPublicPosts
     */
    protected function setSettingPublicPosts(int $settingPublicPosts): void
    {
        $this->settingPublicPosts = $settingPublicPosts;
    }

    /**
     * @param bool $setting2FactorAuth
     */
    protected function setSetting2FactorAuth(int $setting2FactorAuth): void
    {
        $this->setting2FactorAuth = $setting2FactorAuth;
    }

    /**
     * @param bool $settingVideoAutoplay
     */
    protected function setSettingVideoAutoplay(int $settingVideoAutoplay): void
    {
        $this->settingVideoAutoplay = $settingVideoAutoplay;
    }

    protected function getUserSettingsResult(): ?array {
        return $this->getUserSettings();
    }

    protected function initiateSettingsStatus(): bool {
        return $this->initiateSettings();
    }
    private function initiateSettings(): bool {
        try{
            $createSettingsQuery = "INSERT INTO settings(setting_id, setting_user_id) VALUES (:settingId, :settingUserId)";
            $createSettingsStmt = $this->connect()->prepare($createSettingsQuery);
            $createSettingsStmt->bindParam(":settingId", $this->settingId);
            $createSettingsStmt->bindParam(":settingUserId", $this->userId);
            $result = $createSettingsStmt->execute();
            $createSettingsStmt->closeCursor();
            return $result;
        }catch (Exception $exception){
            echo "Failed to create user settings ". $exception->getMessage();
            return false;
        }
    }

    private function getUserSettings(): ?array {
        try {
            $userSettingsQuery = "SELECT * FROM settings WHERE setting_user_id=:settingUserId";
            $userSettingsStmt = $this->connect()->prepare($userSettingsQuery);
            $userSettingsStmt->bindParam(":settingUserId", $this->userId);
            $userSettingsStmt->execute();
            $result = $userSettingsStmt->fetchAll(PDO::FETCH_ASSOC);
            $userSettingsStmt->closeCursor();

            return $result[0];

        }catch (Exception $exception){
            echo "Failed to get user seetings ". $exception->getMessage();
            return null;
        }
    }

    protected function enable2FactorAuthStatus():bool {
        return $this->enable2FactorAuth();
    }

    private function enable2FactorAuth(): bool {

        try {
            $enable2FAQuery =  "UPDATE settings SET setting_2_factor_auth='1' WHERE setting_user_id=:userId";
            $enable2FAsStmt = $this->connect()->prepare($enable2FAQuery);
            $enable2FAsStmt->bindParam(":userId", $this->userId);
            $result = $enable2FAsStmt->execute();
            $enable2FAsStmt->closeCursor();

            return $result;
        }catch (Exception $exception) {

            echo "Failed to enable 2 Factor Authentication ". $exception->getMessage();
            return false;
        }
    }


    protected function updatePublicPostsSettingStatus(): bool
    {
        return $this->updatePublicPostsSetting();

    }

    private function updatePublicPostsSetting(): bool {
        try {
            $updateSettingQuery = "UPDATE settings SET setting_public_posts=:settingStatus WHERE setting_user_id=:settingUserId";
            $updateSettingStmt = $this->connect()->prepare($updateSettingQuery);
            $updateSettingStmt->bindParam(":settingStatus", $this->settingPublicPosts);
            $updateSettingStmt->bindParam(":settingUserId", $this->userId);
            $result = $updateSettingStmt->execute();
            $updateSettingStmt->closeCursor();
            return $result;
        }catch (Exception $exception){
            echo "Failed to update public posts setting ". $exception->getMessage();
            return false;
        }
    }

    protected function updatePublicProfileSettingStatus(): bool
    {
        return $this->updatePublicProfileSetting();

    }

    private function updatePublicProfileSetting(): bool {
        try {
            $updateSettingQuery = "UPDATE settings SET setting_public_profile=:settingStatus WHERE setting_user_id=:settingUserId";
            $updateSettingStmt = $this->connect()->prepare($updateSettingQuery);
            $updateSettingStmt->bindParam(":settingStatus", $this->settingPublicProfile);
            $updateSettingStmt->bindParam(":settingUserId", $this->userId);
            $result = $updateSettingStmt->execute();
            $updateSettingStmt->closeCursor();
            return $result;
        }catch (Exception $exception){
            echo "Failed to update public profile setting ". $exception->getMessage();

            return false;
        }
    }

    protected function updatePublicFriendListStatus(): bool
    {
        return $this->updatePublicFriendList();

    }

    private function updatePublicFriendList(): bool {
        try {
            $updateSettingQuery = "UPDATE settings SET setting_public_friend_list=:settingStatus WHERE setting_user_id=:settingUserId";
            $updateSettingStmt = $this->connect()->prepare($updateSettingQuery);
            $updateSettingStmt->bindParam(":settingStatus", $this->settingPublicFriendList);
            $updateSettingStmt->bindParam(":settingUserId", $this->userId);
            $result = $updateSettingStmt->execute();
            $updateSettingStmt->closeCursor();
            return $result;
        }catch (Exception $exception){
            echo "Failed to update public posts setting ". $exception->getMessage();
            return false;
        }
    }

    protected function updateTagVerificationSettingStatus(): bool
    {
        return $this->updateTagVerificationSetting();

    }

    private function updateTagVerificationSetting(): bool {
        try {
            $updateSettingQuery = "UPDATE settings SET setting_tag_verification=:settingStatus WHERE setting_user_id=:settingUserId";
            $updateSettingStmt = $this->connect()->prepare($updateSettingQuery);
            $updateSettingStmt->bindParam(":settingStatus", $this->settingTagVerification);
            $updateSettingStmt->bindParam(":settingUserId", $this->userId);
            $result = $updateSettingStmt->execute();
            $updateSettingStmt->closeCursor();
            return $result;

        }catch (Exception $exception){
            echo "Failed to update public posts setting ". $exception->getMessage();
            return false;
        }
    }

    protected function updateProfileIndexSearchEngineStatus(): bool
    {
        return $this->updateProfileIndexSearchEngine();

    }

    private function updateProfileIndexSearchEngine(): bool {
        try {
            $updateSettingQuery = "UPDATE settings SET setting_profile_indexable_by_search_engines=:settingStatus WHERE setting_user_id=:settingUserId";
            $updateSettingStmt = $this->connect()->prepare($updateSettingQuery);
            $updateSettingStmt->bindParam(":settingStatus", $this->settingProfileIndexedBySearchEngine);
            $updateSettingStmt->bindParam(":settingUserId", $this->userId);
            $result = $updateSettingStmt->execute();
            $updateSettingStmt->closeCursor();
            return $result;
        }catch (Exception $exception){
            echo "Failed to update public posts setting ". $exception->getMessage();
            return false;
        }
    }

    protected function updateUserAutoplayStatus(): bool
    {
        return $this->updateUserAutoplay();

    }

    private function updateUserAutoplay(): bool {
        try {
            $updateSettingQuery = "UPDATE settings SET setting_video_autoplay=:settingStatus WHERE setting_user_id=:settingUserId";
            $updateSettingStmt = $this->connect()->prepare($updateSettingQuery);
            $updateSettingStmt->bindParam(":settingStatus", $this->settingVideoAutoplay);
            $updateSettingStmt->bindParam(":settingUserId", $this->userId);
            $result = $updateSettingStmt->execute();
            $updateSettingStmt->closeCursor();
            return $result;

        }catch (Exception $exception){

            echo "Failed to update public posts setting ". $exception->getMessage();
            return false;
        }
    }

}