# Deployment

Separate local/development, staging, and production environments.

Conceptually: reverse proxy -> Next.js -> Laravel -> SQL Server, Redis, queue workers, scheduler, realtime services, and MQTT services.

Build and test in CI, deploy artifacts, apply backward-compatible migrations, reload workers, verify health endpoints and supporting services, smoke-test critical flows, and monitor errors.

Back up according to policy before risky schema changes. Supply production secrets through secure secret management. Plan application rollback separately from database rollback and prefer backward-compatible migrations.

Provide checks for the application, database, Redis, queue workers, realtime service, and MQTT integration when enabled.
