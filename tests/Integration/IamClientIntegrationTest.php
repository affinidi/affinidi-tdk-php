<?php

use Ramsey\Uuid\Uuid;
use PHPUnit\Framework\TestCase;
use AffinidiTdk\Clients\IamClient;

class IamClientIntegrationTest extends TestCase
{
    private static string $principalId;
    private static string $principalType = 'token';

    private static IamClient\Api\PoliciesApi $policiesApi;
    private static IamClient\Api\ProjectsApi $projectsApi;

    public static function setUpBeforeClass(): void
    {
        self::$principalId = Uuid::uuid4()->toString();

        $config = IamClient\Configuration::getDefaultConfiguration()
            ->setApiKey('authorization', '', getTokenCallback());

        self::$policiesApi = new IamClient\Api\PoliciesApi(config: $config);
        self::$projectsApi = new IamClient\Api\ProjectsApi(config: $config);
    }

    public function testPrincipalManagement(): void
    {
        // Add principal to project
        $input = [
            'principalId'   => self::$principalId,
            'principalType' => self::$principalType
        ];

        [, $statusCode] = self::$projectsApi->addPrincipalToProjectWithHttpInfo($input);
        $this->assertEquals(204, $statusCode, 'Expected status code 204 when adding principal to project.');

        // List principals
        $listPrincipalsResponse = self::$projectsApi->listPrincipalsOfProject();
        $principals = decodeJson($listPrincipalsResponse);
        $this->assertArrayHasKey('records', $principals);
        $this->assertGreaterThan(0, count($principals['records']), 'No principals found in project.');

        // Remove principal from project
        [, $statusCode] = self::$projectsApi->deletePrincipalFromProjectWithHttpInfo(self::$principalId, self::$principalType);
        $this->assertEquals(204, $statusCode, 'Expected status code 204 when deleting principal from project.');

    }

    public function testPolicies(): void
    {
        $tokenId = getConfiguration()['tokenId'];
        $policiesResponse = self::$policiesApi->getPolicies($tokenId, self::$principalType);
        $policies = decodeJson($policiesResponse);

        $this->assertArrayHasKey('statement', $policies);
        $this->assertGreaterThan(0, count($policies['statement']), 'No policies were returned in the response.');
    }
}
