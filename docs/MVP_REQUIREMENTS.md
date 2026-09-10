# MVP Requirements

## Purpose

The MVP is a safe, testable smart-farming platform for monitoring farm conditions and supporting irrigation decisions. It starts with simulated sensors so the core application can be validated before physical hardware is introduced.

## Primary users

### Admin

Manages users, roles, permissions, and system configuration.

### Farm Manager

Manages farms, fields, zones, crops, sensors, automation rules, alerts, and irrigation operations.

### Operator

Monitors farm conditions and performs approved operational actions.

### Viewer

Views dashboards, sensor readings, alerts, and history without changing configuration or controlling equipment.

## MVP user journeys

### Journey 1: Configure a farm

1. A farm manager signs in.
2. The manager creates a farm.
3. The manager creates fields and zones.
4. The manager registers a simulated device and sensor.
5. The system shows the sensor as configured and ready.

### Journey 2: Monitor conditions

1. The simulator produces a sensor reading.
2. The ingestion boundary validates the payload.
3. The system rejects or quarantines invalid data.
4. Valid data is stored with observed and received timestamps.
5. The dashboard shows the latest reading and recent history.

### Journey 3: Receive a low-moisture alert

1. Soil moisture falls below the configured threshold.
2. The deterministic rule evaluates the condition.
3. The system creates an alert and records the evaluation.
4. The farm manager can view the alert and its supporting readings.

### Journey 4: Simulate safe irrigation

1. An eligible rule requests irrigation.
2. The safety validator checks tank level, schedule, cooldown, runtime, device status, and emergency stop state.
3. The simulated actuator receives an idempotent command.
4. The system records queued, sent, acknowledged, completed, or failed status.
5. The dashboard shows the execution history.

## Functional requirements

### Authentication and authorization

- Users can authenticate securely.
- Protected resources require authorization.
- Farm data is isolated by permitted farm scope.
- Actuator operations require an explicit permission.
- Every physical-control operation is auditable.

### Farm management

- Create, view, update, and archive farms.
- Manage fields and zones under a farm.
- Prevent access to unrelated farms.

### Crop management

- Define crop types.
- Create planting cycles for zones.
- Store planting and expected harvest dates.

### Device and sensor management

- Register devices and sensors.
- Assign sensors to zones.
- Store measurement type, unit, status, and last-seen time.
- Detect stale or offline devices.

### Sensor ingestion

- Accept normalized simulator payloads.
- Validate device identity, measurement type, value, unit, timestamp, and message ID.
- Prevent duplicate message processing.
- Quarantine malformed or impossible readings.

### Monitoring

- Show current readings by farm, field, zone, and sensor.
- Show recent reading history.
- Show device health and last-seen status.
- Handle loading, empty, error, and success states.

### Automation and irrigation

- Support deterministic threshold and schedule conditions.
- Apply safety rules before any actuator command.
- Support simulated pumps/valves only in the MVP.
- Record every evaluation and execution outcome.
- Prevent duplicate commands and unbounded retries.

### Alerts

- Create alerts for low moisture, offline devices, invalid data, safety blocks, and actuator failures.
- Show alert severity, status, time, source, and explanation.
- Allow authorized users to acknowledge or resolve alerts.

## Non-functional requirements

- AI must not directly control actuators.
- Secrets must remain server-side and out of source control.
- Business rules must be covered by automated tests.
- Database changes must use migrations.
- Sensor readings must not be written to application logs.
- API endpoints must use `/api/v1/`.
- Commands with physical consequences must be idempotent.
- The simulator must support deterministic test mode.

## Explicitly out of MVP scope

- Physical ESP32 control
- Production MQTT deployment
- Automatic AI-controlled irrigation
- Advanced crop disease diagnosis
- Billing and subscriptions
- Multi-country regulatory workflows
- Predictive yield modeling
- Fully autonomous agent workflows

## MVP acceptance criteria

The MVP is ready for the next phase when a test user can configure a farm, receive validated simulated readings, view them in the dashboard, receive a low-moisture alert, and execute a safe simulated irrigation command with a complete audit trail.
