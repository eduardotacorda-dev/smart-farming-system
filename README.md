# Smart Farming Agentic AI Documentation

This repository contains engineering standards and agent instructions for the Smart Farming & Agricultural Automation System.

## Start here

1. `AGENTS.md` — primary coding-agent instructions
2. `docs/PROJECT_OVERVIEW.md` — product scope and roadmap
3. `docs/ARCHITECTURE.md` — system architecture
4. `docs/CODING_STANDARDS.md` — coding practices
5. `docs/DATABASE.md` — data model rules
6. `docs/API_STANDARDS.md` — API conventions
7. `docs/AUTOMATION.md` — deterministic automation and safety
8. `docs/IOT.md` — simulator, MQTT, and device architecture
9. `docs/AI.md` — AI boundaries and integration
10. `docs/SECURITY.md` — security requirements
11. `docs/TESTING.md` — testing strategy
12. `docs/GIT_WORKFLOW.md` — Git process
13. `docs/MIGRATIONS_AND_SEEDS.md` — database change process
14. `docs/DEPLOYMENT.md` — deployment and operations
15. `docs/AGILE.md` — Scrum/Agile process
16. `docs/OBSERVABILITY.md` — logging, metrics, and tracing
17. `docs/DECISIONS.md` — architecture decision records
18. `docs/MVP_REQUIREMENTS.md` — MVP scope and acceptance criteria
19. `docs/IMPLEMENTATION_PLAN.md` — phased delivery plan
20. `docs/GITHUB_ACCOUNT_WORKFLOW.md` — personal/company GitHub account setup and switching

## Repository-specific instructions

More-specific instructions live in `backend/AGENTS.md`, `frontend/AGENTS.md`, and `simulator/AGENTS.md`.

## Development philosophy

Build vertical slices. A feature is complete only when its required database, backend, frontend, validation, authorization, tests, and documentation are complete.

The first IoT phase uses a simulator. Physical hardware is added only after the application and safety model are stable. AI provides recommendations and analysis; deterministic automation and safety controls remain responsible for actuator execution.
