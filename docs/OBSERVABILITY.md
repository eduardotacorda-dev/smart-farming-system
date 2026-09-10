# Observability

Log meaningful operational events, not every execution detail. A useful event is `automation.execution_failed` with identifiers and a reason; logging every function entry, loop iteration, or normal sensor reading is not useful.

Useful metrics include sensor ingestion rate, invalid messages, automation executions/failures, actuator latency/failure rate, queue depth, API latency, and AI-provider latency/error rate.

Business/audit history belongs in domain tables such as automation executions and audit events, not only logs. Define retention for application logs, sensor data, audit records, and AI recommendations according to operational needs.
