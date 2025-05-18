# Vulnweb - Vulnerable Web Application

**Vulnweb** is a deliberately vulnerable web application created for educational purposes and practicing web application security testing (ethical hacking).

---

## Features

- Login form vulnerable to SQL Injection
- Insecure file upload functionality
- Cross-Site Scripting (XSS) vulnerability examples
- Various other vulnerabilities based on the OWASP Top 10

---

## Getting Started

### Clone the repository

```bash
git clone https://github.com/rnldsyh1611/Vulnweb.git
cd Vulnweb
```

### Pull Image Docker
```bash
docker pull renaldockerhub/vulnweb:latest
```

#### Run Docker
```bash
docker run -d -p 8000:80 --name vulnweb renaldockerhub/vulnweb:latest
```
