# API Standards

## Versioning and resources

Use `/api/v1/...` and plural resource names such as `/farms`, `/fields`, `/zones`, `/sensors`, `/sensor-readings`, `/automation-rules`, and `/irrigation-events`.

## Responses

Use consistent resource structures and status codes: `200` success, `201` created, `204` no content, `400` malformed request, `401` unauthenticated, `403` unauthorized, `404` not found, `409` conflict, `422` validation failure, `429` rate limited, and `500` unexpected error.

Validate all external input server-side. Authorize every protected resource and physical-control operation. Use idempotency for commands where duplicate execution could cause harm.

Normalize external provider/device payloads at the integration boundary instead of leaking provider-specific structures throughout the application.
