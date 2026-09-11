# GitHub Personal and Company Account Workflow

This guide explains how to use separate personal and company GitHub accounts on the same Windows computer.

## Important safety rule

Do not copy company-owned code, customer data, credentials, private documentation, or proprietary information to a personal GitHub account without written authorization.

Before every push, verify the GitHub account, remote repository, staged files, repository ownership, and branch.

## Recommended arrangement

    Personal GitHub account
      -> github-personal SSH alias
      -> personal repositories

    Company GitHub account
      -> github-company SSH alias
      -> company repositories

Use different SSH keys for the two accounts.

## One-time personal account setup

Create a personal key in PowerShell:

    New-Item -ItemType Directory -Force "$env:USERPROFILE\.ssh"
    ssh-keygen -t ed25519 -C "your-personal-email@example.com" -f "$env:USERPROFILE\.ssh\id_ed25519_personal"

Never share the private file:

    %USERPROFILE%\.ssh\id_ed25519_personal

Add the key to the Windows SSH agent:

    Get-Service ssh-agent | Set-Service -StartupType Automatic
    Start-Service ssh-agent
    ssh-add "$env:USERPROFILE\.ssh\id_ed25519_personal"

Copy the public key:

    Get-Content "$env:USERPROFILE\.ssh\id_ed25519_personal.pub" | Set-Clipboard

In personal GitHub, open Settings > SSH and GPG keys > New SSH key. Add the copied public key as an Authentication Key.

## One-time company account setup

If the company account already has an SSH key, do not replace it. Check existing keys:

    Get-ChildItem "$env:USERPROFILE\.ssh"

If needed, create a separate company key:

    ssh-keygen -t ed25519 -C "your-company-email@example.com" -f "$env:USERPROFILE\.ssh\id_ed25519_company"
    ssh-add "$env:USERPROFILE\.ssh\id_ed25519_company"

Upload the public company key to the appropriate company GitHub account or organization according to company policy.

## Configure both SSH accounts

Open the SSH configuration file:

    notepad "$env:USERPROFILE\.ssh\config"

Add:

    Host github-personal
        HostName github.com
        User git
        IdentityFile ~/.ssh/id_ed25519_personal
        IdentitiesOnly yes

    Host github-company
        HostName github.com
        User git
        IdentityFile ~/.ssh/id_ed25519_company
        IdentitiesOnly yes

Test personal access:

    ssh -T git@github-personal

Test company access:

    ssh -T git@github-company

The response should identify the expected GitHub username. The message that GitHub does not provide shell access is normal. If the wrong username appears, do not push.

## Configure a personal repository

From the project directory:

    Set-Location "C:\application\SmartFarmingSystem"
    git status
    git remote -v

If the project is not already a Git repository:

    git init -b main

Set the personal commit identity for this repository:

    git config --local user.name "Your Personal Name"
    git config --local user.email "your-personal-email@example.com"

Create a personal repository on GitHub, preferably private, without adding a README or other starter files. Then add its remote:

    git remote add origin "git@github-personal:YOUR_PERSONAL_USERNAME/YOUR_REPOSITORY.git"

Verify it:

    git remote -v

Before committing, review the files:

    git status
    git add -A
    git diff --cached --stat
    git diff --cached --name-only

Push only after checking the staged files:

    git commit -m "chore: initialize smart farming platform"
    git push -u origin main

## Configure a company repository

Set the company identity locally in the company repository:

    git config --local user.name "Your Company Name"
    git config --local user.email "your-company-email@example.com"

Use the company SSH alias in the remote:

    git remote add origin "git@github-company:COMPANY_OR_ORG/YOUR_REPOSITORY.git"

Verify before pushing:

    git remote -v
    ssh -T git@github-company
    git push -u origin main

## Switching an existing repository

Inspect first:

    git remote -v
    git config --local user.name
    git config --local user.email

Switch an existing remote to personal:

    git remote set-url origin "git@github-personal:YOUR_PERSONAL_USERNAME/YOUR_REPOSITORY.git"
    git config --local user.name "Your Personal Name"
    git config --local user.email "your-personal-email@example.com"

Switch an existing remote to company:

    git remote set-url origin "git@github-company:COMPANY_OR_ORG/YOUR_REPOSITORY.git"
    git config --local user.name "Your Company Name"
    git config --local user.email "your-company-email@example.com"

Always verify the remote and local identity after switching.

## Keeping both remotes

If one local repository legitimately needs both remotes:

    git remote rename origin company
    git remote add personal "git@github-personal:YOUR_PERSONAL_USERNAME/YOUR_REPOSITORY.git"

Push explicitly:

    git push personal main
    git push company main

Never use an ambiguous push when both remotes exist.

## Safe pre-push checklist

Run:

    git status
    git diff --cached --stat
    git remote -v
    git config --local user.name
    git config --local user.email

Confirm:

- The remote owner is correct.
- The SSH greeting shows the correct account.
- The commit email is correct.
- No .env file, API key, password, private key, or customer data is staged.
- The branch is correct.
- The repository visibility is correct.
- The push is authorized.

## Common problems

### Permission denied publickey

Check loaded keys:

    ssh-add -l

Add the needed key:

    ssh-add "$env:USERPROFILE\.ssh\id_ed25519_personal"

Then test:

    ssh -T git@github-personal

### Wrong GitHub username appears

Check:

    git remote -v

Personal remotes should contain github-personal. Company remotes should contain github-company. Check the SSH config and make sure IdentitiesOnly yes is present.

### Remote origin already exists

Inspect it first:

    git remote -v

Change it instead of adding another:

    git remote set-url origin "git@github-personal:YOUR_PERSONAL_USERNAME/YOUR_REPOSITORY.git"

### GitHub shows the wrong author

Check:

    git config --local user.email

Set a verified email for the intended account:

    git config --local user.email "correct-email@example.com"

This changes future commits, not old commits.

### HTTPS keeps using the company account

Use the SSH workflow in this document, or remove the incorrect GitHub credential from Windows Credential Manager and authenticate again. Do not put passwords or tokens in a remote URL.

## Emergency stop

If the wrong repository or account is configured:

1. Stop before pushing.
2. Run git remote -v.
3. Run git config --local user.email.
4. Review git diff --cached --name-only.
5. Correct the remote with git remote set-url.
6. Do not force-push or rewrite history without authorization.

If sensitive information was pushed, notify the appropriate security owner and rotate the exposed credential. Deleting a file in a later commit does not remove it from Git history.

## GitHub Desktop

1. Sign in to the intended GitHub account.
2. Open the repository.
3. Open Repository > Repository settings.
4. Check the Remote section.
5. Confirm the URL belongs to the intended account or organization before publishing or pushing.

For two accounts, command-line SSH aliases are usually clearer because the remote explicitly contains github-personal or github-company.

## References

- https://docs.github.com/en/authentication/connecting-to-github-with-ssh/adding-a-new-ssh-key
- https://docs.github.com/en/get-started/git-basics/managing-remote-repositories
- https://docs.github.com/en/get-started/git-basics/setting-your-username-in-git
- https://docs.github.com/en/repositories/creating-and-managing-repositories/duplicating-a-repository

