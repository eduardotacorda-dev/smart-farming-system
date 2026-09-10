# Automation Engine

Evaluate deterministic rules against farm state and execute safe actions.

```text
Trigger -> ConditionEvaluator -> SafetyValidator -> ActionExecutor -> ExecutionLogger
```

An irrigation rule might require soil moisture below 35%, tank level above 20%, rain probability below 70%, and an allowed schedule before starting irrigation.

## Safety controls

Support emergency stop, minimum tank level, maximum runtime, maximum daily irrigation, actuator cooldown, duplicate-command protection, device heartbeat/online status, valid sensor data, operating schedules, and manual-override policy.

Repeated delivery of the same event must not produce duplicate physical commands. Use a stable event/message ID or equivalent idempotency key.

If acknowledgement is missing, record failure, alert appropriately, and apply only a bounded safe retry policy. Never retry indefinitely.

AI may recommend an action or threshold, but cannot execute a physical actuator command.

Required tests include true/false conditions, safety blocks, duplicate events, actuator failure, timeout, success, and concurrent evaluation.
