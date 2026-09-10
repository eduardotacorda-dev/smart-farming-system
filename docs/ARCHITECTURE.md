# Architecture

## High-level

```text
Next.js -- HTTPS REST / WebSocket --> Laravel API
                                      |-- SQL Server
                                      |-- Redis / queues / scheduler
                                      |-- MQTT integration
                                      `-- AI provider adapter

Sensor simulator or ESP32/MQTT
  -> ingestion -> validation -> event/job -> storage
  -> automation engine -> safety validator -> actuator command

Farm, crop, sensor, and weather data -> AI service -> schema validation -> advisory
```

AI never bypasses the deterministic safety layer.

## Layering

- Presentation: Next.js UI and Laravel controllers
- Application: actions, services, and jobs
- Domain: automation rules, safety rules, and domain events
- Infrastructure: SQL Server, Redis, MQTT, and AI providers
- Observability: logs, metrics, and execution/audit records

Keep infrastructure details out of domain rules where practical.
