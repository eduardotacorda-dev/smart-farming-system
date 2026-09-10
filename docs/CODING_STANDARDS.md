# Coding Standards

## General

Prefer clarity over cleverness. Use meaningful names, focused functions, existing patterns, and the smallest useful abstraction.

## Laravel/PHP

Follow Laravel conventions and PSR-12. Use Form Requests for validation, Policies/Gates for authorization, API Resources for response shaping, Actions/Services for substantial operations, transactions for atomic changes, and queues for slow work. Avoid N+1 queries and do not silently swallow failures.

## Next.js/TypeScript

Use strict TypeScript and avoid `any`. Keep server/client boundaries explicit, reuse typed API/data-access functions, handle loading/empty/error/success states, keep components focused, and never expose server secrets to client code.

## SQL Server

Use constraints for integrity, indexes based on query patterns, parameterized queries/Eloquent/query builder, and an explicit retention/aggregation plan for high-volume sensor data. Avoid `SELECT *` in application code.

## Security and comments

Authentication is not authorization; enforce authorization on protected resources and actuator operations. Comments should explain why, not what obvious code does.
