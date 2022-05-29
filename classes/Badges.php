<?php

namespace Classes;

use Exception;
use PDO;

class Badges extends Dbh
{


    private string $badgeId;
    private string $badgeOwner;
    private string $badgeMilestoneName;

    /**
     * @param string $badgeId
     */
    protected function setBadgeId(string $badgeId): void
    {
        $this->badgeId = $badgeId;
    }

    /**
     * @param string $badgeOwner
     */
    protected function setBadgeOwner(string $badgeOwner): void
    {
        $this->badgeOwner = $badgeOwner;
    }

    /**
     * @param string $badgeMilestoneName
     */
    protected function setBadgeMilestoneName(string $badgeMilestoneName): void
    {
        $this->badgeMilestoneName = $badgeMilestoneName;
    }

    protected function getAllMyBadgesResult(): array {
        return $this->getAllMyBadges();
    }

    private function getAllMyBadges(): array {
        try {
            $getBadgesQuery = "SELECT * FROM badges WHERE badge_owner=:badgeOwner ORDER BY badge_datetime DESC LIMIT 5";
            $getBadgesStmt = $this->connect()->prepare($getBadgesQuery);
            $getBadgesStmt->bindParam(":badgeOwner", $this->badgeOwner);
            $getBadgesStmt->execute();
            $result = $getBadgesStmt->fetchAll(PDO::FETCH_ASSOC);
            $getBadgesStmt->closeCursor();
            return $result??[];
        }catch (Exception $exception) {
            echo "Failed to get exception ". $exception->getMessage();
            return [];
        }
    }

}