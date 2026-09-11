# API Standards

## Versioning and resources

Use `/api/v1/...` and plural resource names such as `/farms`, `/fields`, `/zones`, `/sensors`, `/sensor-readings`, `/automation-rules`, and `/irrigation-events`.

## Responses

Use consistent resource structures and status codes: `200` success, `201` created, `204` no content, `400` malformed request, `401` unauthenticated, `403` unauthorized, `404` not found, `409` conflict, `422` validation failure, `429` rate limited, and `500` unexpected error.

Validate all external input server-side. Authorize every protected resource and physical-control operation. Use idempotency for commands where duplicate execution could cause harm.

## Authentication endpoints

The first-party Next.js application uses Laravel Sanctum's cookie-based SPA authentication:

- `POST /api/v1/auth/register` creates a Viewer account and starts a session.
- `POST /api/v1/auth/login` authenticates a user and starts a session.
- `GET /api/v1/auth/me` returns the authenticated user and role.
- `POST /api/v1/auth/logout` invalidates the current session.

Protected routes use `auth:sanctum`. Authentication and authorization are separate concerns; a valid session does not automatically grant farm or actuator permissions.

Normalize external provider/device payloads at the integration boundary instead of leaking provider-specific structures throughout the application.
