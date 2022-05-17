<?php


namespace Classes;


class TotalView extends TotalContr
{
    public function addTotals(float $adminFee, float $agentFee, float $totalValue,bool $hasAdditional, string $mainItemId, float $totalReward): bool{

        $this->setCAdminFeeTotal($adminFee);
        $this->setCAgentFeeTotal($agentFee);
        $this->setCTotalValue($totalValue);
        $this->setCHasAdditional($hasAdditional);
        $this->setCMainItemId($mainItemId);
        $this->setCTotalReward($totalReward);

        return $this->addTotalsStatus();
    }

    public function updateTotals(float $adminFee, float $agentFee, float $totalValue,bool $hasAdditional, string $mainItemId, float $totalReward): bool {

        $this->setCAdminFeeTotal($adminFee);
        $this->setCAgentFeeTotal($agentFee);
        $this->setCTotalValue($totalValue);
        $this->setCHasAdditional($hasAdditional);
        $this->setCMainItemId($mainItemId);
        $this->setCTotalReward($totalReward);

        return $this->updateTotalsStatus();
    }

    public function getItemTotal(string $itemId): ?array {
        $this->setCMainItemId($itemId);
        return parent::getItemTotalStatus();
    }

}