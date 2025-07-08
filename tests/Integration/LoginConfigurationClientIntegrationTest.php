<?php

use Hidehalo\Nanoid\Client;
use PHPUnit\Framework\TestCase;
use AffinidiTdk\Clients\LoginConfigurationClient;

class LoginConfigurationClientIntegrationTest extends TestCase
{
    private static LoginConfigurationClient\Api\ConfigurationApi $configurationApi;
    private static LoginConfigurationClient\Api\AllowListApi $allowListApi;
    private static LoginConfigurationClient\Api\DenyListApi $denyListApi;
    private static LoginConfigurationClient\Api\GroupApi $groupApi;

    private static array $loginConfiguration;
    private static string $loginConfigurationId;
    private static string $groupName;

    public static function setUpBeforeClass(): void
    {
        $config = self::getApiConfig();

        self::$configurationApi = new LoginConfigurationClient\Api\ConfigurationApi(config: $config);
        self::$allowListApi = new LoginConfigurationClient\Api\AllowListApi(config: $config);
        self::$denyListApi = new LoginConfigurationClient\Api\DenyListApi(config: $config);
        self::$groupApi = new LoginConfigurationClient\Api\GroupApi(config: $config);

        self::createLoginConfiguration();
        self::createGroup();
    }

    public static function tearDownAfterClass(): void
    {
        self::deleteGroup(self::$groupName);
        self::deleteLoginConfiguration(self::$loginConfigurationId);
    }

    private static function getApiConfig(): LoginConfigurationClient\Configuration
    {
        $originalBasePath = LoginConfigurationClient\Configuration::getDefaultConfiguration()->getHost();
        $host = replaceBaseDomain($originalBasePath);

        return LoginConfigurationClient\Configuration::getDefaultConfiguration()
            ->setApiKey('authorization', '', getTokenCallback())
            ->setHost($host);
    }

    private static function createLoginConfiguration(): void
    {
        $input = [
            'name' => 'TestConfig',
            'redirectUris' => ['http://localhost:3000/api/auth/callback/affinidi']
        ];

        $response = self::$configurationApi->createLoginConfigurations($input);
        $data = decodeJson($response);

        self::$loginConfiguration = $data;
        self::$loginConfigurationId = $data['configurationId'];
    }

    private static function createGroup(): void
    {
        $nanoid = new Client();
        self::$groupName = $nanoid->formattedId('abcdefghijklmnopqrstuvwxyz_', 12);

        $input = [
            'name' => 'TestGroup',
            'groupName' => self::$groupName
        ];

        [, $statusCode] = self::$groupApi->createGroupWithHttpInfo($input);
        assert($statusCode === 201);
    }

    private static function deleteGroup(string $groupName): void
    {
        [, $statusCode] = self::$groupApi->deleteGroupWithHttpInfo($groupName);
        assert($statusCode === 204);
    }

    private static function deleteLoginConfiguration(string $configId): void
    {
        [, $statusCode] = self::$configurationApi->deleteLoginConfigurationsByIdWithHttpInfo($configId);
        assert($statusCode === 204);
    }

    public function testLoginConfiguration(): void
    {
        $loginConfigurationsResponse = self::$configurationApi->listLoginConfigurations();
        $data = decodeJson($loginConfigurationsResponse);
        $this->assertArrayHasKey('configurations', $data);
        $this->assertGreaterThan(0, count($data['configurations']));

        $updatedName = 'UpdatedName';
        $update = ['name' => $updatedName];

        $updateConfigsResponse = self::$configurationApi->updateLoginConfigurationsById(self::$loginConfigurationId, $update);
        $updatedConfiguration = decodeJson($updateConfigsResponse);
        $this->assertEquals($updatedName, $updatedConfiguration['name']);

        $loginConfigurationResponse = self::$configurationApi->getLoginConfigurationsById(self::$loginConfigurationId);
        $loginConfiguration = decodeJson($loginConfigurationResponse);
        $this->assertEquals(self::$loginConfigurationId, $loginConfiguration['configurationId']);
    }

    public function testUserGroup(): void
    {
        $groupsResponse = self::$groupApi->listGroups();
        $groups = decodeJson($groupsResponse);

        $this->assertArrayHasKey('groups', $groups);
        $this->assertGreaterThan(0, count($groups['groups']));

        $groupResponse = self::$groupApi->getGroupById(self::$groupName);
        $group = decodeJson($groupResponse);
        $this->assertEquals(self::$groupName, $group['groupName']);
    }

    public function testAllowList(): void
    {
        $this->assertNotEmpty(self::$groupName);

        $input = ['groupNames' => [self::$groupName]];

        [, $statusCode] = self::$allowListApi->allowGroupsWithHttpInfo($input);
        $this->assertEquals(200, $statusCode);

        $listAllowedGroupsResponse = self::$allowListApi->listAllowedGroups();
        $allowedGroups = decodeJson($listAllowedGroupsResponse);

        $this->assertArrayHasKey('groupNames', $allowedGroups);
        $this->assertContains(self::$groupName, $allowedGroups['groupNames']);

        [, $statusCode] = self::$allowListApi->disallowGroupsWithHttpInfo($input);
        $this->assertEquals(200, $statusCode);
    }

    public function testDenyList(): void
    {
        $this->assertNotEmpty(self::$groupName);

        $groupInput = ['groupNames' => [self::$groupName]];
        $userId = 'test';

        [, $statusCode] = self::$denyListApi->blockGroupsWithHttpInfo($groupInput);
        $this->assertEquals(200, $statusCode);

        $listBlockedGroupsResponse = self::$denyListApi->listBlockedGroups();
        $blockedGroups = decodeJson($listBlockedGroupsResponse);
        $this->assertArrayHasKey('groupNames', $blockedGroups);
        $this->assertContains(self::$groupName, $blockedGroups['groupNames']);

        [, $statusCode] = self::$denyListApi->unblockGroupsWithHttpInfo($groupInput);
        $this->assertEquals(200, $statusCode);

        $userInput = ['userIds' => [$userId]];

        [, $statusCode] = self::$denyListApi->blockUsersWithHttpInfo($userInput);
        $this->assertEquals(200, $statusCode);

        $listBlockedUsersResponse = self::$denyListApi->listBlockedUsers();
        $blockedUsers = decodeJson($listBlockedUsersResponse);
        $this->assertArrayHasKey('userIds', $blockedUsers);
        $this->assertContains($userId, $blockedUsers['userIds']);

        [, $statusCode] = self::$denyListApi->unblockUsersWithHttpInfo($userInput);
        $this->assertEquals(200, $statusCode);
    }
}
