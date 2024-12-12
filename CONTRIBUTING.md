# Contributing to Affinidi TDK

When contributing to this repository, please first discuss the change you wish to make by creating a new [GitHub issue](https://github.com/affinidi/affinidi-tdk-php/issues/new).

Clients are generated intenally by Affinidi based on our API's. So, please don't update the client code and instead create an issue.

## Contributing to libraries and packages

### Requirements

TBD

### Creating a new library or package

TBD

Remember to update the [root README.md](/README.md) with the newly added module.

### Building locally

TBD

### Code quality expectations

1. Ensure the pipeline checks are finished successfully.
2. Ensure the pull request doesn't contain redundant comments, logs, etc.
3. Ensure your code is covered with unit and integration tests (NOTE: no mocks/stubs in integration tests).
4. Avoid adding comments to explain what code does, code should be self-explanatory and clean.
5. Avoid using variable names like `i` or abbreviations - names should be simple and unambiguous.

## Auto update of versions and changelogs

After merging PR, the GitHub actions publish all libs that have increased versions.
The flow is:

- if libs without internal dependencies were updated - process them first
- if libs with internal dependencies were updated - update libs they depend on and update them
- if TDK should be updated - update all libs TDK depends on and then update TDK

More details in the code.

## Code of Conduct

### Our Pledge

In the interest of fostering an open and welcoming environment, we as
contributors and maintainers pledge to make participation in our project and
our community a harassment-free experience for everyone, regardless of age, body
size, disability, ethnicity, gender identity and expression, level of experience,
nationality, personal appearance, race, religion, or sexual identity and
orientation.

### Our Standards

Examples of behavior that contributes to creating a positive environment
include:

- Using welcoming and inclusive language
- Being respectful of differing viewpoints and experiences
- Gracefully accepting constructive criticism
- Focusing on what is best for the community
- Showing empathy towards other community members
- Avoiding obvious comments about things like code styling and indentation.
  ** If you see yourself wanting to do that more than once - open an issue with a repo to update the ESLint/Prettier rules to address this concern once and for all. **Code reviews should be about logic, not indenting or adding more newlines**

Examples of unacceptable behavior by participants include:

- The use of sexualized language or imagery and unwelcome sexual attention or
  advances
- Trolling, insulting/derogatory comments, and personal or political attacks
- Public or private harassment
- Publishing others' private information, such as a physical or electronic
  address, without explicit permission
- Other conduct which could reasonably be considered inappropriate in a
  professional setting