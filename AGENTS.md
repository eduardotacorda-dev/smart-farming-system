# Smart Farming — Agent Instructions

## Mission

Build and maintain a production-quality Smart Farming & Agricultural Automation System.

The planned stack is Laravel/PHP REST API, Next.js/TypeScript, Microsoft SQL Server, Redis, queues, realtime events, a sensor simulator, MQTT/ESP32 integration, and AI advisory services.

## Instruction priority

Follow this file and the most specific applicable `AGENTS.md`, then the relevant documents in `docs/`. Higher-priority system/developer instructions and explicit user instructions take precedence.

## Before changing code

1. Read the applicable `AGENTS.md` files.
2. Read only the relevant documentation.
3. Inspect the existing implementation.
4. Search for existing models, services, components, endpoints, migrations, and tests.
5. Identify the smallest vertical slice that satisfies the requirement.
6. Check the affected database schema and API contracts.

Do not guess existing behavior.

## Minimal-change rule

Make the smallest safe, correct change. Do not refactor unrelated code, redesign unrelated UI, rename unrelated symbols, upgrade dependencies without a reason, or introduce speculative features.

## Coding and logging

Follow `docs/CODING_STANDARDS.md`. Keep controllers thin, validation explicit, authorization enforced, business rules testable, and frontend types strict.

Do not log every function call, variable, successful query, sensor reading, or high-frequency normal event. Log unexpected exceptions, security events, automation/actuator failures, important state transitions, and infrastructure failures. Never log credentials, tokens, secrets, or unnecessary personal data. Sensor readings belong in storage; business-significant automation executions belong in persistent audit/execution records.

## Database, automation, and AI

Every schema change requires a migration. Never use destructive reset commands against production.

Physical commands must pass through `Automation Engine -> Safety Validator -> Actuator Command`. AI is advisory and must never directly control physical actuators. Validate AI output against a strict schema and treat it as untrusted external input. Never expose provider secrets to the browser.

Read `docs/AUTOMATION.md`, `docs/IOT.md`, and `docs/AI.md` for the detailed boundaries.

## Testing and commands

Do not claim a test passed unless it was actually run. Test business-critical rules, authorization, validation, automation safety, idempotency, and failure paths.

Never automatically push, force-push, reset hard, clean untracked files, delete branches, run `migrate:fresh`, run `db:wipe`, or execute destructive production SQL unless explicitly authorized.

## Documentation and completion report

Update documentation only for durable project rules, architecture decisions, API contracts, operational procedures, or important domain rules.

At the end of a task report: summary, files changed, database/API/frontend changes, tests/checks actually run, commands actually run, Git status, and risks/follow-up. Be concise and do not dump private reasoning.
