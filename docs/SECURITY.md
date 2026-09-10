# Security Standards

Never commit `.env` files, API keys, passwords, private keys, or production credentials.

Use secure authentication, least-privilege roles/policies, server-side validation, rate limiting, HTTPS in deployment, and appropriately restricted CORS. Suggested roles are Admin, Farm Manager, Operator, and Viewer.

Authenticate devices, authorize actuator commands, protect MQTT credentials, prevent replay/duplicate commands, and audit physical-control operations. Protect AI provider credentials, avoid sending unnecessary sensitive data, validate AI output, and never use prompt content as an authorization mechanism.

Never log secrets or sensitive payloads unnecessarily.
