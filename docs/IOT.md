# IoT Architecture

## Phase 1 — simulator

Use a software simulator before buying hardware. It should generate realistic readings, support multiple farms/zones/sensors, configurable intervals/ranges, deterministic test mode, stable message IDs, stale/offline devices, and invalid/out-of-range readings.

## Phase 2 — MQTT/ESP32

```text
ESP32 -> MQTT broker -> Laravel MQTT consumer -> ingestion
```

The domain must not depend on ESP32-specific code.

## Device and sensor safety

Every device needs a unique identity and deployment-appropriate credentials/keys. Never accept unauthenticated actuator commands.

Reject or quarantine malformed payloads, unknown devices, impossible values, invalid timestamps, and replayed messages where replay protection applies.

Actuator commands should have a lifecycle such as `queued -> sent -> acknowledged -> completed`, or an explicit failure state.
