# Agent Task Template

Use this when giving a development task to an AI coding agent.

## Task

Implement [USER STORY / FEATURE].

## Context

[Short business context]

## Acceptance criteria

- ...
- ...
- ...

## Instructions

1. Read `AGENTS.md` and relevant docs.
2. Inspect the existing implementation before editing.
3. Search for reusable code before creating new code.
4. Implement the smallest vertical slice.
5. Add migration/seed changes when required.
6. Add backend/frontend tests as applicable.
7. Run relevant formatting, lint, type, and test checks.
8. Review `git diff` and `git status`.
9. Do not push unless explicitly authorized.
10. Update documentation only when a durable rule, contract, or architecture changes.

## Do not

- Modify unrelated features.
- Add speculative features.
- Expose secrets.
- Bypass authorization.
- Connect AI output directly to physical actuators.
- Claim checks passed unless they were run.

## Final report

- Summary
- Files changed
- Database/API/frontend changes
- Tests/checks actually run
- Git status
- Risks/follow-up
