# AI Integration

AI is an advisory and analytical subsystem for farm summaries, anomaly explanation, crop-care suggestions, irrigation recommendations, natural-language queries, trend analysis, and reports.

```text
AI Recommendation -> schema validation -> deterministic automation -> safety validator -> physical actuator
```

Never allow `AI -> Pump`.

Treat provider output as untrusted input. Require structured output, validate schemas and ranges, record useful provider/model metadata, handle timeouts and provider failures, and provide fallback behavior.

Keep AI API keys on the server. Never use public client-side environment variables for secrets. Clearly identify AI-generated results; critical actions remain governed by deterministic rules and permissions.
