# Architecture Decisions

Use this file for durable architecture decisions.

## ADR template

### ADR-XXX: Title

Date: YYYY-MM-DD
Status: Proposed | Accepted | Superseded

#### Context

What problem are we solving?

#### Decision

What are we choosing?

#### Alternatives

What alternatives were considered?

#### Consequences

What becomes easier or harder?

## Initial decisions

### ADR-001: Simulator before physical IoT

Status: Accepted

Use a software sensor simulator before physical hardware so the domain model can be developed and tested without hardware.

### ADR-002: AI is advisory

Status: Accepted

AI cannot directly control physical actuators. Deterministic automation and safety validation remain authoritative.

### ADR-003: SQL Server for transactional system of record

Status: Accepted

Use SQL Server for transactional farm, crop, device, automation, and audit data. High-volume sensor storage can evolve independently if scale later requires it.
