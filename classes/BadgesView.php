<?php

namespace Classes;

class BadgesView extends BadgesContr
{

    public function getAllMyBadges(string $badgeOwner): array
    {

        $this->setBadgeOwner($badgeOwner);
        return $this->getAllMyBadgesResult();
    }
}