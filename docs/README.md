# GitHub Sign-In

Using this module, users can directly log in or register with their GitHub credentials at this HumHub installation. 
A new button "GitHub" will appear on the login page.

## Configuration

Please follow the [GitHub instructions](https://docs.github.com/en/developers/apps/creating-an-oauth-app) to create the required `OAuth App` credentials.

Once you have the **Client ID** and **Client Secret** created there, the values must then be entered in the module configuration at: `Administration -> Modules -> GitHub Sign-In -> Configure`. 
This page also displays the `Redirect URI`, which must be entered in GitHub as the `Authorization callback URL`.
