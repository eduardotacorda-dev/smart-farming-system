# Implementation Plan

## Delivery approach

Build vertical slices. Each slice should include the required database changes, backend behavior, frontend behavior, validation, authorization, tests, and documentation.

Do not build the AI agent first. The agent depends on trustworthy data, clear permissions, deterministic rules, and safety controls.

## Phases

| Phase | Outcome | Completion gate |
|---|---|---|
| 0. Product definition | Approved MVP scope and user journeys | Requirements reviewed |
| 1. Foundation | Laravel, Next.js, SQL Server, Redis, local configuration, CI | Services start and documentation checks pass |
| 2. Identity | Authentication, roles, permissions | Unauthorized access is rejected by tests |
| 3. Farm model | Farms, fields, zones, ownership | Authorized CRUD works end-to-end |
| 4. Crop model | Crops and planting cycles | Crop data is associated with zones |
| 5. Device model | Devices, sensors, status | Sensors can be registered and assigned |
| 6. Simulator | Deterministic and realistic readings | Reproducible readings reach ingestion |
| 7. Monitoring | Validated storage and dashboard | Latest/history views work with error states |
| 8. Alerts | Low moisture and health alerts | Alerts are created and auditable |
| 9. Automation | Deterministic rule evaluation | Rules pass condition and safety tests |
| 10. Simulated irrigation | Safe actuator lifecycle | Duplicate/failure/timeout tests pass |
| 11. Realtime | Live status and execution updates | Dashboard updates without unsafe shortcuts |
| 12. Weather | Weather adapter and forecast data | Provider failures degrade safely |
| 13. AI advisory | Read-only recommendations | Output schema and permission boundaries pass |
| 14. Agent workflows | Tool-limited, approval-based agent | Agent cannot bypass deterministic safety |
| 15. MQTT/ESP32 | Physical-device integration | Device authentication and acknowledgements work |
| 16. Production hardening | Deployment, monitoring, backup, recovery | Operational readiness review passes |

## First development slice

The first coding slice is the foundation, but it must remain intentionally small:

1. Confirm the local prerequisites.
2. Create the backend and frontend project manifests.
3. Configure environment examples without real secrets.
4. Establish the SQL Server and Redis configuration boundaries.
5. Add a health endpoint and a minimal frontend status page.
6. Add the first automated checks.
7. Document the commands that actually work in this repository.

Do not add domain tables, authentication, or AI until the foundation can start and be checked reliably.

## Working rule

At the end of each phase, verify the completion gate, inspect the changed files, and record unresolved risks before starting the next phase.
