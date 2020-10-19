## 🚀 Environment setup

### 🐳 Needed tools

1. [Install Docker](https://www.docker.com/get-started)

### 🛠️ Environment configuration

1. Create a local environment file if needed: `cp .env .env.local`
2. Add `api.gtto.localhost` domain to your local hosts: `echo "127.0.0.1 api.gtto.localhost"| sudo tee -a /etc/hosts > /dev/null`

### 🌍 Application execution

1. Install PHP dependencies and bring up the project Docker containers with Docker Compose: `make build`
2. Go to [the API health check page](http://api.gtto.localhost:8030/health-check)

### 🚦 Database architecture

1. Create the mooc table: `docker exec -i gtto-ff-mooc-mysql sh -c 'exec mysql' < /Users/santo/Sites/php/ff/etc/databases/mooc.sql`

### ✅ Tests execution

1. Install PHP dependencies if you haven't done so: `make deps`
2. Execute Behat and PHP Unit tests: `make test`