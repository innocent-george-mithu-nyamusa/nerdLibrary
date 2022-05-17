<?php


namespace Classes;


use Exception;
use PDO;

class Total extends Dbh
{

    private string $mainItemId;
    private float $totalReward;
    private float $totalValue;
    private float $adminFeeTotal;
    private float $agentFeeTotal;
    private bool $hasAdditional = false;

    /**
     * @param bool $hasAdditional
     */
    public function setHasAdditional(bool $hasAdditional): void
    {
        $this->hasAdditional = $hasAdditional;
    }

    /**
     * @param float $agentFeeTotal
     */
    public function setAgentFeeTotal(float $agentFeeTotal): void
    {
        $this->agentFeeTotal = $agentFeeTotal;
    }

    /**
     * @param float $adminFeeTotal
     */
    public function setAdminFeeTotal(float $adminFeeTotal): void
    {
        $this->adminFeeTotal = $adminFeeTotal;
    }

    /**
     * @param float $totalReward
     */
    public function setTotalReward(float $totalReward): void
    {
        $this->totalReward = $totalReward;
    }

    /**
     * @param string $mainItemId
     */
    public function setMainItemId(string $mainItemId): void
    {
        $this->mainItemId = $mainItemId;
    }

    /**
     * @param float $totalValue
     */
    public function setTotalValue(float $totalValue): void
    {
        $this->totalValue = $totalValue;
    }

    protected function addTotalsStatus() :bool {
        return $this->addTotals();
    }

    private function addTotals(): bool
    {

        try {
            $totalQuery = "INSERT INTO total_values(unique_item_id_with_total, total_value, has_additional, total_reward, agent_fee_total, admin_fee_total) ";
            $totalQuery .= "VALUES(:itemId, :totalValue,:hasAdditional,:totalReward,:agentFeeTotal, :adminFeeTotal)";

            $totalStmt = $this->connect()->prepare($totalQuery);
            $totalStmt->bindParam("itemId", $this->mainItemId);
            $totalStmt->bindParam(":totalValue", $this->totalValue);
            $totalStmt->bindParam(":hasAdditional", $this->hasAdditional);
            $totalStmt->bindParam(":totalReward", $this->totalReward);
            $totalStmt->bindParam(":agentFeeTotal", $this->agentFeeTotal);
            $totalStmt->bindParam(":adminFeeTotal", $this->adminFeeTotal);

            return $totalStmt->execute();
        }catch (Exception $exception) {
            echo $exception->getMessage();

            return false;
        }

    }

    protected function updateTotalsStatus(): bool {
        return $this->updateTotals();
    }

    private function updateTotals(): bool {
        try {

            $updateTotalQuery = "UPDATE total_values SET total_value=:totalValue, has_additional=:hasAdditional, total_reward=:totalReward, agent_fee_total=:agentFeeTotal, admin_fee_total=:adminFeeTotal WHERE unique_item_id_with_total=:itemId";
            $updateTotalStmt = $this->connect()->prepare($updateTotalQuery);
            $updateTotalStmt->bindParam(":totalValue", $this->totalValue);
            $updateTotalStmt->bindParam(":hasAdditional", $this->hasAdditional);
            $updateTotalStmt->bindParam(":totalReward", $this->totalReward);
            $updateTotalStmt->bindParam(":agentFeeTotal", $this->agentFeeTotal);
            $updateTotalStmt->bindParam(":adminFeeTotal", $this->adminFeeTotal);
            $updateTotalStmt->bindParam("itemId", $this->mainItemId);

            return $updateTotalStmt->execute();

        }catch (Exception $exception) {
            echo "Failed to update ". $exception->getMessage();
            return false;
        }
    }


    protected function getItemTotalStatus(): ?array {
        return self::getItemTotal();
    }

    private function getItemTotal(): ?array{
        try {
            $getItemTotalQuery = "SELECT * FROM total_values WHERE unique_item_id_with_total=:itemId";
            $getItemTotalStmt = $this->connect()->prepare($getItemTotalQuery);
            $getItemTotalStmt->bindParam(":itemId", $this->mainItemId);
            $getItemTotalStmt->execute();
            $result = $getItemTotalStmt->fetchAll(PDO::FETCH_ASSOC);
            $getItemTotalStmt->closeCursor();
            return $result;

        }catch (Exception $exception) {

            echo "Failed to get item total ". $exception->getMessage();
            return null;
        }
    }




}