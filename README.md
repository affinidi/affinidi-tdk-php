# Affinidi Trust Development Kit (Affinidi TDK)
<!-- ALL-CONTRIBUTORS-BADGE:START - Do not remove or modify this section -->
[![All Contributors](https://img.shields.io/badge/all_contributors-12-orange.svg?style=flat-square)](#contributors-)
<!-- ALL-CONTRIBUTORS-BADGE:END -->

The Affinidi Trust Development Kit (Affinidi TDK) is a modern interface that allows you to easily manage and integrate [Affinidi Elements](https://www.affinidi.com/product/affinidi-elements) and [Frameworks](https://www.affinidi.com/developer#lota-framework) into your application. It minimises dependencies and enables developers seamless entry into the [Affinidi Trust Network (ATN)](https://www.affinidi.com/get-started).

## How do I use Affinidi TDK?

The Affinidi TDK for PHP is published on [packagist.org](https://packagist.org/packages/affinidi-tdk/affinidi-tdk-php) and provides the following libraries:

- [Clients](src/Clients), which offer methods to access Affinidi Elements services like Credential Issuance, Credential Verification, and Login Configurations, among others.
- [AuthProvider](src/AuthProvider/), a library that provides a method to authenticate Personal Access Tokens (PATs) and generates access token to call clients and access the Affinidi Elements services.
- [Commons](src/Common/), a list of libraries that provides common methods like generation of claim and share links for Credential Issuance and Affinidi Iota Framework.

Each module has its own README that you can check to better understand how to integrate it into your application.

## Requirements

- PHP version 7.4 or higher.
- [Composer](https://getcomposer.org/download/) package manager.

## Installation

### Setting up a New Project

If you're starting a new project, first create a new directory and initialise it.

```bash
mkdir my-affinidi-project
cd my-affinidi-project
composer init
```

Install the Affinidi TDK via Composer.

```bash
composer require affinidi-tdk/affinidi-tdk-php
```

## Quick Start

Here's a basic example of using the TDK to list wallets:

```php
<?php

require_once 'vendor/autoload.php';

use AuthProvider\AuthProvider;
use AffinidiTdk\Clients\WalletsClient;

// Configuration parameters
$params = [
    'privateKey' => "",     // Your private key
    'keyId' => '',         // Your key ID
    'passphrase' => '',    // Your passphrase
    'projectId' => '',     // Your project ID
    'tokenId' => ''       // Your token ID
    // Optional parameters:
    // 'apiGatewayUrl' => 'https://apse1.api.affinidi.io',
    // 'tokenEndpoint' => 'https://apse1.auth.developer.affinidi.io/auth/oauth2/token',
];

$authProvider = new AuthProvider($params);

try {
  $tokenCallback = [$authProvider, 'fetchProjectScopedToken'];

  $configCwe = WalletsClient\Configuration::getDefaultConfiguration()->setApiKey('authorization', '', $tokenCallback);

  $apiInstanceCwe = new WalletsClient\Api\WalletApi(
    new GuzzleHttp\Client(),
    $configCwe
  );

  $apiInstanceCwe->listWallets();

  $resultCwe = $apiInstanceCwe->listWallets();

  $resultCweJson = json_decode($resultCwe, true);

  print_r(count($resultCweJson['wallets']));

} catch (Exception $e) {
  print_r($e->getMessage());
}
```

## Testing

To run the test suite, use one of the following commands:

```bash
# Run all tests
composer run-script test

# Run tests with debug information
composer run-script test:debug
```

The debug mode provides additional information that can be helpful when troubleshooting failing tests.

## Documentation

Head over to our [Documentation site](https://docs.affinidi.com/dev-tools/affinidi-tdk) to know how to get started with Affinidi TDK.

Use [this document](https://docs.affinidi.com/dev-tools/affinidi-tdk/#working-with-the-affinidi-tdk) to learn more about how to work with Affinidi TDK, including generating the Authorisation Token and calling the methods.

To learn how to integrate Affinidi TDK and use the different modules into your application, you can explore the following:

- [Affinidi TDK Clients](https://docs.affinidi.com/dev-tools/affinidi-tdk/clients/)
- [Affinidi TDK Libraries](https://docs.affinidi.com/dev-tools/affinidi-tdk/libraries/)
- [Affinidi TDK Packages](https://docs.affinidi.com/dev-tools/affinidi-tdk/packages/)

## Support & feedback

If you face any issues or have suggestions, please don't hesitate to contact us using [this link](https://share.hsforms.com/1i-4HKZRXSsmENzXtPdIG4g8oa2v).

### Reporting technical issues

If you have a technical issue with the Affinidi TDK's codebase, you can also create an issue directly in GitHub.

1. Ensure the bug was not already reported by searching on GitHub under
   [Issues](https://github.com/affinidi/affinidi-tdk-php/issues).

2. If you're unable to find an open issue addressing the problem,
   [open a new one](https://github.com/affinidi/affinidi-tdk-php/issues/new).
   Be sure to include a **title and clear description**, as much relevant information as possible,
   and a **code sample** or an **executable test case** demonstrating the expected behavior that is not occurring.

## Contributing

Want to contribute?

Head over to our [CONTRIBUTING](CONTRIBUTING.md) guidelines.

## FAQ

### What can I develop?

You are only limited by your imagination! Affinidi TDK is a toolbox with which you can build software applications for personal or commercial use.

### Is there anything I should not develop?

We only provide the tools - how you use them is largely up to you. We have no control over what you develop with our tools - but please use our tools responsibly!

We hope that you will not develop anything that contravenes any applicable laws or regulations. Your projects should also not infringe on Affinidi's or any third party's intellectual property (for instance, misusing other parties' data, code, logos, etc).

### What responsibilities do I have to my end-users?

Please ensure that you have in place your terms and conditions, privacy policies, and other safeguards to ensure that the projects you build are secure for your end users.

If you are processing personal data, please protect the privacy and other legal rights of your end-users and store their personal or sensitive information securely.

Some of our components would also require you to incorporate our end-user notices into your terms and conditions.

### Is Affinidi TDK free for use?

Affinidi TDK itself is free, so come onboard and experiment with our tools and see what you can build! We may bill for certain components in the future, but we will inform you beforehand.

### Is there any limit or cap to my usage of the Affinidi TDK?

We may from time to time impose limits on your use of the Affinidi TDK, such as limiting the number of API requests that you may make in a given duration. This is to ensure the smooth operation of the Affinidi TDK so that you and all our other users can have a pleasant experience as we continue to scale and improve the Affinidi TDK.

### Do I need to provide you with anything?

From time to time, we may request certain information from you to ensure that you are complying with the [Terms and Conditions](https://www.affinidi.com/terms-conditions).

### Can I share my developer's account with others?

When you create a developer's account with us, we will issue you your private login credentials. Please do not share this with anyone else, as you would be responsible for activities that happen under your account. If you have interested friends, ask them to sign up – let's build together!

### Telemetry

Affinidi collects usage data to improve our products and services. For information on what data we collect and how we use your data, please refer to our [Privacy Notice](https://www.affinidi.com/privacy-notice).

_Disclaimer:
Please note that this FAQ is provided for informational purposes only and is not to be considered a legal document. For the legal terms and conditions governing your use of the Affinidi Services, please refer to our [Terms and Conditions](https://www.affinidi.com/terms-conditions)._

## Contributors ✨

Thanks goes to these wonderful people ([emoji key](https://allcontributors.org/docs/en/emoji-key)):

<!-- ALL-CONTRIBUTORS-LIST:START - Do not remove or modify this section -->
<!-- prettier-ignore-start -->
<!-- markdownlint-disable -->
<table>
  <tbody>
    <tr>
      <td align="center" valign="top" width="14.28%"><a href="https://github.com/rbrazhnyk"><img src="https://avatars.githubusercontent.com/u/4462680?v=4?s=100" width="100px;" alt="Roman Brazhnyk"/><br /><sub><b>Roman Brazhnyk</b></sub></a><br /><a href="https://github.com/affinidi/affinidi-tdk-php/commits?author=rbrazhnyk" title="Code">💻</a> <a href="https://github.com/affinidi/affinidi-tdk-php/commits?author=rbrazhnyk" title="Documentation">📖</a> <a href="#ideas-rbrazhnyk" title="Ideas, Planning, & Feedback">🤔</a> <a href="#research-rbrazhnyk" title="Research">🔬</a></td>
      <td align="center" valign="top" width="14.28%"><a href="https://github.com/carlos-affinidi"><img src="https://avatars.githubusercontent.com/u/86779651?v=4?s=100" width="100px;" alt="Carlos Rincon"/><br /><sub><b>Carlos Rincon</b></sub></a><br /><a href="https://github.com/affinidi/affinidi-tdk-php/commits?author=carlos-affinidi" title="Code">💻</a> <a href="https://github.com/affinidi/affinidi-tdk-php/commits?author=carlos-affinidi" title="Documentation">📖</a> <a href="#ideas-carlos-affinidi" title="Ideas, Planning, & Feedback">🤔</a> <a href="#maintenance-carlos-affinidi" title="Maintenance">🚧</a></td>
      <td align="center" valign="top" width="14.28%"><a href="https://github.com/maratsh"><img src="https://avatars.githubusercontent.com/u/533533?v=4?s=100" width="100px;" alt="maratsh"/><br /><sub><b>maratsh</b></sub></a><br /><a href="https://github.com/affinidi/affinidi-tdk-php/commits?author=maratsh" title="Code">💻</a> <a href="https://github.com/affinidi/affinidi-tdk-php/commits?author=maratsh" title="Documentation">📖</a> <a href="#example-maratsh" title="Examples">💡</a> <a href="#ideas-maratsh" title="Ideas, Planning, & Feedback">🤔</a> <a href="#infra-maratsh" title="Infrastructure (Hosting, Build-Tools, etc)">🚇</a> <a href="#platform-maratsh" title="Packaging/porting to new platform">📦</a> <a href="#security-maratsh" title="Security">🛡️</a></td>
      <td align="center" valign="top" width="14.28%"><a href="https://github.com/pulkitb2"><img src="https://avatars.githubusercontent.com/u/146182581?v=4?s=100" width="100px;" alt="Pulkit Batra"/><br /><sub><b>Pulkit Batra</b></sub></a><br /><a href="https://github.com/affinidi/affinidi-tdk-php/commits?author=pulkitb2" title="Code">💻</a> <a href="https://github.com/affinidi/affinidi-tdk-php/commits?author=pulkitb2" title="Documentation">📖</a> <a href="#example-pulkitb2" title="Examples">💡</a> <a href="#ideas-pulkitb2" title="Ideas, Planning, & Feedback">🤔</a> <a href="#infra-pulkitb2" title="Infrastructure (Hosting, Build-Tools, etc)">🚇</a> <a href="#maintenance-pulkitb2" title="Maintenance">🚧</a> <a href="#platform-pulkitb2" title="Packaging/porting to new platform">📦</a> <a href="#plugin-pulkitb2" title="Plugin/utility libraries">🔌</a></td>
      <td align="center" valign="top" width="14.28%"><a href="https://github.com/Bergmam"><img src="https://avatars.githubusercontent.com/u/4987930?v=4?s=100" width="100px;" alt="Anton Bergman"/><br /><sub><b>Anton Bergman</b></sub></a><br /><a href="https://github.com/affinidi/affinidi-tdk-php/commits?author=Bergmam" title="Code">💻</a> <a href="https://github.com/affinidi/affinidi-tdk-php/commits?author=Bergmam" title="Documentation">📖</a></td>
      <td align="center" valign="top" width="14.28%"><a href="https://github.com/sureshaff"><img src="https://avatars.githubusercontent.com/u/170073177?v=4?s=100" width="100px;" alt="sureshaff"/><br /><sub><b>sureshaff</b></sub></a><br /><a href="#security-sureshaff" title="Security">🛡️</a></td>
      <td align="center" valign="top" width="14.28%"><a href="https://github.com/maindotdev"><img src="https://avatars.githubusercontent.com/u/56207234?v=4?s=100" width="100px;" alt="Sebastian Müller"/><br /><sub><b>Sebastian Müller</b></sub></a><br /><a href="https://github.com/affinidi/affinidi-tdk-php/commits?author=maindotdev" title="Code">💻</a> <a href="https://github.com/affinidi/affinidi-tdk-php/commits?author=maindotdev" title="Documentation">📖</a> <a href="#research-maindotdev" title="Research">🔬</a></td>
    </tr>
    <tr>
      <td align="center" valign="top" width="14.28%"><a href="https://github.com/andrew-affinidi"><img src="https://avatars.githubusercontent.com/u/181356348?v=4?s=100" width="100px;" alt="andrew-affinidi"/><br /><sub><b>andrew-affinidi</b></sub></a><br /><a href="https://github.com/affinidi/affinidi-tdk-php/commits?author=andrew-affinidi" title="Code">💻</a> <a href="https://github.com/affinidi/affinidi-tdk-php/commits?author=andrew-affinidi" title="Documentation">📖</a> <a href="#research-andrew-affinidi" title="Research">🔬</a></td>
      <td align="center" valign="top" width="14.28%"><a href="https://github.com/rohitjjw"><img src="https://avatars.githubusercontent.com/u/80765488?v=4?s=100" width="100px;" alt="rohitjjw"/><br /><sub><b>rohitjjw</b></sub></a><br /><a href="https://github.com/affinidi/affinidi-tdk-php/commits?author=rohitjjw" title="Code">💻</a> <a href="https://github.com/affinidi/affinidi-tdk-php/commits?author=rohitjjw" title="Documentation">📖</a> <a href="#research-rohitjjw" title="Research">🔬</a></td>
      <td align="center" valign="top" width="14.28%"><a href="https://github.com/kamarthiparamesh"><img src="https://avatars.githubusercontent.com/u/46393683?v=4?s=100" width="100px;" alt="Paramesh Kamarthi"/><br /><sub><b>Paramesh Kamarthi</b></sub></a><br /><a href="#ideas-kamarthiparamesh" title="Ideas, Planning, & Feedback">🤔</a> <a href="#example-kamarthiparamesh" title="Examples">💡</a> <a href="https://github.com/affinidi/affinidi-tdk-php/commits?author=kamarthiparamesh" title="Code">💻</a> <a href="https://github.com/affinidi/affinidi-tdk-php/commits?author=kamarthiparamesh" title="Documentation">📖</a> <a href="#research-kamarthiparamesh" title="Research">🔬</a></td>
      <td align="center" valign="top" width="14.28%"><a href="https://github.com/obradovicaffinidi"><img src="https://avatars.githubusercontent.com/u/187629637?v=4?s=100" width="100px;" alt="obradovicaffinidi"/><br /><sub><b>obradovicaffinidi</b></sub></a><br /><a href="#business-obradovicaffinidi" title="Business development">💼</a></td>
      <td align="center" valign="top" width="14.28%"><a href="https://github.com/yilmazlarmurat"><img src="https://avatars.githubusercontent.com/u/185046039?v=4?s=100" width="100px;" alt="yilmazlarmurat"/><br /><sub><b>yilmazlarmurat</b></sub></a><br /><a href="#security-yilmazlarmurat" title="Security">🛡️</a></td>
    </tr>
  </tbody>
  <tfoot>
    <tr>
      <td align="center" size="13px" colspan="7">
        <img src="https://raw.githubusercontent.com/all-contributors/all-contributors-cli/1b8533af435da9854653492b1327a23a4dbd0a10/assets/logo-small.svg">
          <a href="https://all-contributors.js.org/docs/en/bot/usage">Add your contributions</a>
        </img>
      </td>
    </tr>
  </tfoot>
</table>

<!-- markdownlint-restore -->
<!-- prettier-ignore-end -->

<!-- ALL-CONTRIBUTORS-LIST:END -->

This project follows the [all-contributors](https://github.com/all-contributors/all-contributors) specification. Contributions of any kind welcome!
