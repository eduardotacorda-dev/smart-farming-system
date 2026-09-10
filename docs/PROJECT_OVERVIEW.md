# Project Overview

## Product vision

Build a smart farming platform that helps farmers monitor conditions, manage crops, automate irrigation safely, receive alerts, and use historical/environmental data for decision support.

## MVP

- Authentication and RBAC
- Farm, field, and zone management
- Crop and planting-cycle management
- Sensor registration and simulation
- Monitoring dashboard
- Deterministic automation rules
- Simulated irrigation
- Alerts and execution history

## Roadmap

1. Foundation
2. Authentication/RBAC
3. Farm management
4. Crop management
5. Sensor simulator
6. Monitoring
7. Automation engine
8. Irrigation
9. Safety/alerts
10. Realtime
11. Weather
12. AI advisory
13. ESP32/MQTT
14. Hardening
15. Deployment

## Primary domain objects

User, Farm, Field, Zone, Crop, PlantingCycle, Device, Sensor, SensorReading, Actuator, AutomationRule, AutomationExecution, IrrigationEvent, Alert, WeatherObservation, AIRecommendation, and AuditEvent.

## Core principle

The simulator and physical devices are interchangeable data sources behind the same ingestion boundary. Domain logic must not depend on a particular hardware vendor.
