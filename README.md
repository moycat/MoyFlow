# MoyFlow

Self-made Alfred workflows for myself only.

## IP Geolocation

Query IP geolocation with API provided by [ip-api](http://ip-api.com/).

### Usage

 - `ip <IP/domain>`: Query IP geolocation.

## IP138

Query IP geolocation with [IP138](http://www.ip138.com/).

Since no API is provided for non-commercial users, the script uses regular expression to get results from the HTML page. Also I need to use a fake user agent.

The script may not work when the site changes its front-end framework or applies better anti-crawler strategies.

### Usage

 - `ip138 <IP/domain>`: Query IP geolocation.

## Transform

Common hashing, encoding & decoding operations.

### Usage

 - `hash <string>`: Hash a string into MD5, SHA1, SHA256, SHA512 or CRC32.
 - `encode <string>`: Encode a string with Base64 or URL Encoding (RFC 3986).
 - `decode <string>`: Decode a Base64-encoded or URL-encoded string.

## Unix

Unix-related tools.

### Usage

- `timestamp [timestamp]`: Get current timestamp, or get UTC datetime by a timestamp.
