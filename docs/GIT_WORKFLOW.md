# Git Workflow

## Branches

For a solo project use `main`, `feature/<name>`, `fix/<name>`, and `refactor/<name>`.

Before work, inspect status and synchronize safely. Before committing, run `git status`, `git diff --check`, `git diff`, and relevant tests/lint/type checks. Use Conventional Commits such as `feat: add sensor simulator`, `fix: prevent duplicate irrigation commands`, and `docs: document mqtt ingestion`.

Never push automatically or force-push shared history without explicit authorization. Before committing, verify that `.env`, credentials, keys, and generated secrets are not staged.
