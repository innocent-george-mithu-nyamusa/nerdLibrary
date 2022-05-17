<?php

namespace Classes;

class BadgesContr extends Badges
{

    protected function setCBadgeId(string $badgeId): void
    {
        $badgeId = Utilities::genUniqueId('bdg');
        parent::setBadgeId($badgeId);
    }

    protected function addBadgeId(string $badgeId): void
    {
        $badgeId = Utilities::cleanData($badgeId);
        parent::setBadgeId($badgeId);
    }

    protected function setBadgeMilestoneName(string $badgeMilestoneName): void
    {
        $badgeMilestoneName =  Utilities::cleanData($badgeMilestoneName);
        parent::setBadgeMilestoneName($badgeMilestoneName);
    }

    protected function setBadgeOwner(string $badgeOwner): void
    {
        $badgeOwner = Utilities::cleanData($badgeOwner);
        parent::setBadgeOwner($badgeOwner);
    }
}