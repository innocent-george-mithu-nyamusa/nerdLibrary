<?php


namespace Classes;


class ActivityContr extends Activity
{

    protected function setCActivityId(): void
    {
        $activityId = Utilities::genUniqueId("act");
        parent::setActivityId($activityId);
    }

    protected function setCActivityOwner(string $activityOwner): void
    {
        $activityOwner = Utilities::cleanData($activityOwner);
        parent::setActivityOwner($activityOwner);
    }
    protected function setCActivityName(string $activityName): void
    {
        $activityName = Utilities::cleanData($activityName);
        parent::setActivityName($activityName);
    }

    protected function setCActivityResourceId(string $activityResourceId): void
    {
        $activityResourceId = Utilities::cleanData($activityResourceId);
        parent::setActivityResourceId($activityResourceId);
    }

    protected function setCActivityType(string $activityType): void
    {
        $activityType = Utilities::cleanData($activityType);
        parent::setActivityType($activityType);
    }


}