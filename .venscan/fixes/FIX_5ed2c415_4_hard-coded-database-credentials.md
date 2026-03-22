# AI SAST Vulnerability Fix Plan

- Source: `cyberintruder/Second-Order-SQLi`
- Generated: `2026-03-22T16:56:34.795825Z`
- Report ID: `5ed2c415-9d83-442a-8485-779ccb1bcce7`
- Vulnerability Index: `4`

## Selected Vulnerability
- Title: `Hard‑coded Database Credentials`
- File: `https://github.com/cyberintruder/Second-Order-SQLi/blob/master/getdata.php`
- Severity: `Medium`
- OWASP: `A05:2021 - Security Misconfiguration`
- Line: `10`
- CVSS: `5.5`
- Confidence: `90`

## Description
Database connection details (username "root" and password "toor") are stored in source code, which can be exposed through version control, backups, or error messages, facilitating unauthorized database access.

## Suggested secure fix
```
```php
$servername = getenv('DB_HOST');
$username   = getenv('DB_USER');
$password   = getenv('DB_PASS');
$dbname     = getenv('DB_NAME');
```
```
