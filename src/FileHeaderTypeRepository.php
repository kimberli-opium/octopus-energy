<?php

declare(strict_types=1);

namespace OctopusEnergy\TechChallenge;

class FileHeaderTypeRepository extends ElectricityFlowRepository
{
    public function insert(): void
    {
        $statement = $this->getPdo()->prepare(
            'INSERT INTO file_header_type (
                              file_id, data_flow_and_version_number, 
                              from_market_participant_role_code, from_market_participant_id, 
                              to_market_participant_role_code, to_market_participant_id, 
                              creation_timestamp, sending_application_id, 
                              receiving_application_id, broadcast, test_data_flag
                              ) VALUES (:fileId, :dataFlowAndVersionNumber, 
                                        :fromMarketParticipantRoleCode, :fromMarketParticipantId,
                                        :toMarketParticipantRoleCode, :toMarketParticipantId,
                                        :creationTimestamp, :sendingApplicationId,
                                        :receivingApplicationId, :broadcast, :testDataFlag)'
        );

        $fileHeaderType = $this->getData();

        $statement->execute([
            'fileId' => $fileHeaderType[1],
            'dataFlowAndVersionNumber' => $fileHeaderType[2],
            'fromMarketParticipantRoleCode' => $fileHeaderType[3],
            'fromMarketParticipantId' => $fileHeaderType[4],
            'toMarketParticipantRoleCode' => $fileHeaderType[5],
            'toMarketParticipantId' => $fileHeaderType[6],
            'creationTimestamp' => $fileHeaderType[7],
            'sendingApplicationId' => $fileHeaderType[8],
            'receivingApplicationId' => $fileHeaderType[9],
            'broadcast' => $fileHeaderType[10],
            'testDataFlag' => $fileHeaderType[11],
        ]);
    }
}
