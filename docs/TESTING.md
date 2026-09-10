# Testing Strategy

Use unit, feature/API, integration, frontend component, and targeted end-to-end tests.

Business-critical behavior needs the strongest coverage: authorization, validation, automation conditions, safety constraints, idempotency, actuator failure, sensor-ingestion validation, and AI-output schema validation.

Examples: moisture 34% with threshold 35% is eligible; moisture 40% is not; tank 10% is blocked; duplicate events produce one command; offline actuators fail and alert.

Use factories/builders for repeatable test data. Keep seeders for reference/demo data, not giant test datasets. Do not report completion while relevant tests/checks fail unless the user explicitly accepts the failure.
