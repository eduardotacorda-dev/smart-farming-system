# Database Standards

SQL Server is the transactional system of record. Every schema change is a migration. Use primary keys, foreign keys, unique constraints, consistent timestamps, and explicit domain state.

## Sensor readings

`SensorReading` should be append-oriented and store sensor/device identifier, measurement type, value, unit, observed timestamp, received timestamp, quality/status where useful, and a source/message identifier when available.

Plan indexes for time-plus-sensor queries, retention, dashboard aggregation/downsampling, and archival. Do not put sensor history into application logs.

## Transactions and integrity

Use transactions for starting/stopping irrigation plus execution records, multi-write state transitions, and critical configuration changes. The database must prevent impossible relationships and duplicate business identifiers where appropriate.
