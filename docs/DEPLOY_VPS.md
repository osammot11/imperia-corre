# Deploy di Imperia Corre su VPS

Dominio: `imperia.produceavalue.com`  
Repository: `git@github.com:osammot11/imperia-corre.git`  
Stack: Laravel 13, PHP 8.4.1+, Nginx, SQLite, Node.js 22

Questa procedura assume una VPS Ubuntu recente e un utente con accesso `sudo`.
Sostituire `deploy` nei comandi se l'utente della VPS ha un nome diverso.

## 1. Configurare il DNS

Nel pannello DNS di `produceavalue.com` creare:

| Tipo | Nome | Valore | TTL |
|---|---|---|---|
| A | `imperia` | IP pubblico della VPS | Auto |

Se viene usato Cloudflare, durante la prima configurazione è preferibile lasciare
temporaneamente il record su **DNS only**.

Verificare la propagazione dal proprio computer:

```bash
dig +short imperia.produceavalue.com
```

Il risultato deve essere l'indirizzo IP della VPS.

## 2. Collegarsi alla VPS

```bash
ssh deploy@IP_DELLA_VPS
```

Aggiornare il sistema:

```bash
sudo apt update
sudo apt upgrade -y
```

## 3. Installare i componenti necessari

Il progetto richiede PHP 8.4.1 o superiore. Vite 8 richiede Node.js 20.19+ oppure
22.12+; per questo esempio viene usato Node.js 22 LTS.

```bash
sudo apt install -y nginx git unzip curl ca-certificates composer \
    php8.4-fpm php8.4-cli php8.4-common php8.4-curl php8.4-mbstring \
    php8.4-xml php8.4-bcmath php8.4-sqlite3 php8.4-zip php8.4-opcache
```

Se la distribuzione non trova i pacchetti `php8.4-*`, su Ubuntu è possibile
abilitare prima il repository PHP mantenuto da Ondřej Surý:

```bash
sudo apt install -y software-properties-common
sudo add-apt-repository ppa:ondrej/php
sudo apt update
```

Ripetere quindi il comando di installazione precedente.

Controllare le versioni:

```bash
php -v
nginx -v
git --version
```

Verificare in modo esplicito il requisito minimo:

```bash
php -r 'exit(version_compare(PHP_VERSION, "8.4.1", ">=") ? 0 : 1);' \
    && echo "PHP compatibile" \
    || echo "ERRORE: serve PHP 8.4.1 o superiore"
```

### Se Composer continua a rilevare una versione PHP precedente

Quando sulla VPS sono installate più versioni di PHP, il servizio FPM può usare
PHP 8.4 mentre il comando `php` eseguito da Composer può puntare ancora a PHP
8.3. Controllare entrambi:

```bash
php8.4 -v
php -v
which php
readlink -f "$(which php)"
```

Se `php8.4 -v` mostra almeno `8.4.1`, impostare PHP 8.4 come versione CLI
predefinita:

```bash
sudo update-alternatives --set php /usr/bin/php8.4
hash -r
php -v
composer check-platform-reqs --lock
```

Se `update-alternatives` non contiene ancora PHP 8.4, registrarlo prima:

```bash
sudo update-alternatives --install /usr/bin/php php /usr/bin/php8.4 84
sudo update-alternatives --set php /usr/bin/php8.4
hash -r
```

Come soluzione immediata è possibile eseguire Composer esplicitamente con PHP
8.4:

```bash
php8.4 "$(which composer)" install \
    --no-dev --prefer-dist --optimize-autoloader --no-interaction
```

Se anche `php8.4 -v` mostra una versione inferiore a `8.4.1`, aggiornare i
pacchetti PHP prima di continuare:

```bash
sudo apt update
sudo apt install --only-upgrade php8.4-cli php8.4-common php8.4-fpm
php8.4 -v
```

### Verificare Composer

```bash
composer --version
```

### Installare Node.js 22

Con il repository NodeSource:

```bash
curl -fsSL https://deb.nodesource.com/setup_22.x | sudo -E bash -
sudo apt install -y nodejs
```

Quindi verificare:

```bash
node --version
npm --version
```

La versione di Node deve essere almeno `22.12`.

## 4. Consentire alla VPS di leggere la repository

Se la repository è pubblica, si può saltare questa sezione e clonarla tramite
HTTPS. Se è privata, creare una chiave dedicata:

```bash
ssh-keygen -t ed25519 -C "imperia VPS deploy" -f ~/.ssh/imperia_github -N ""
cat ~/.ssh/imperia_github.pub
```

Copiare la chiave pubblica visualizzata e aggiungerla su GitHub in:

`osammot11/imperia-corre → Settings → Deploy keys → Add deploy key`

È sufficiente l'accesso in lettura: non selezionare “Allow write access”.

Creare la configurazione SSH:

```bash
nano ~/.ssh/config
```

Inserire:

```sshconfig
Host github-imperia
    HostName github.com
    User git
    IdentityFile ~/.ssh/imperia_github
    IdentitiesOnly yes
```

Proteggere il file e provare la connessione:

```bash
chmod 600 ~/.ssh/config
ssh -T github-imperia
```

Alla prima connessione verificare e accettare l'impronta di GitHub.

## 5. Clonare il progetto

```bash
sudo mkdir -p /var/www/imperia-corre
sudo chown deploy:www-data /var/www/imperia-corre
git clone git@github-imperia:osammot11/imperia-corre.git /var/www/imperia-corre
cd /var/www/imperia-corre
```

Se la repository è pubblica:

```bash
git clone https://github.com/osammot11/imperia-corre.git /var/www/imperia-corre
```

## 6. Installare dipendenze e compilare il frontend

```bash
cd /var/www/imperia-corre
composer install --no-dev --prefer-dist --optimize-autoloader --no-interaction
npm ci
npm run build
```

Dopo la build, `node_modules` può essere eliminata per recuperare spazio, ma
sarà necessario eseguire nuovamente `npm ci` al deploy successivo.

## 7. Preparare l'ambiente di produzione

```bash
cp .env.example .env
nano .env
```

Usare almeno questi valori:

```dotenv
APP_NAME="Imperia Corre"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://imperia.produceavalue.com

APP_LOCALE=it
APP_FALLBACK_LOCALE=it

LOG_CHANNEL=stack
LOG_LEVEL=warning

DB_CONNECTION=sqlite
DB_DATABASE=/var/www/imperia-corre/database/database.sqlite

SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database

MAIL_MAILER=log
MAIL_FROM_ADDRESS="info@imperiacorre.it"
MAIL_FROM_NAME="Imperia Corre"
```

Generare la chiave applicativa:

```bash
php artisan key:generate
```

Proteggere il file `.env`:

```bash
sudo chown deploy:www-data .env
sudo chmod 640 .env
```

## 8. Creare il database SQLite

Il database non viene incluso nella repository Git.

```bash
sudo install -m 664 -o deploy -g www-data /dev/null database/database.sqlite
sudo chown -R deploy:www-data database storage bootstrap/cache
sudo chmod -R ug+rwX database storage bootstrap/cache
php artisan migrate --force
```

Questa migrazione crea anche la tabella `newsletter_subscribers` usata dal
modulo email del sito.

Ottimizzare Laravel:

```bash
php artisan optimize
```

## 9. Configurare Nginx

Creare il virtual host:

```bash
sudo nano /etc/nginx/sites-available/imperia.produceavalue.com
```

Inserire:

```nginx
server {
    listen 80;
    listen [::]:80;
    server_name imperia.produceavalue.com;

    root /var/www/imperia-corre/public;
    index index.php;

    charset utf-8;
    client_max_body_size 10m;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php8.4-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        fastcgi_param DOCUMENT_ROOT $realpath_root;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }

    access_log /var/log/nginx/imperia.access.log;
    error_log /var/log/nginx/imperia.error.log;
}
```

Attivare il sito e verificare la configurazione:

```bash
sudo ln -s /etc/nginx/sites-available/imperia.produceavalue.com \
    /etc/nginx/sites-enabled/imperia.produceavalue.com
sudo nginx -t
sudo systemctl reload nginx
sudo systemctl enable --now nginx php8.4-fpm
```

Se la VPS ospita solo questo sito, si può disattivare il virtual host predefinito:

```bash
sudo unlink /etc/nginx/sites-enabled/default
sudo nginx -t
sudo systemctl reload nginx
```

## 10. Configurare firewall e HTTPS

Se UFW è attivo:

```bash
sudo ufw allow OpenSSH
sudo ufw allow 'Nginx Full'
sudo ufw status
```

Installare Certbot:

```bash
sudo apt install -y certbot python3-certbot-nginx
sudo certbot --nginx -d imperia.produceavalue.com
```

Scegliere il redirect automatico da HTTP a HTTPS e verificare il rinnovo:

```bash
sudo certbot renew --dry-run
```

Aprire infine:

`https://imperia.produceavalue.com`

## 11. Controlli finali

```bash
cd /var/www/imperia-corre
php artisan about --only=environment
php artisan migrate:status
curl -I https://imperia.produceavalue.com
sudo tail -n 50 /var/log/nginx/imperia.error.log
tail -n 50 storage/logs/laravel.log
```

Provare anche l'iscrizione alla newsletter e controllare che venga salvata:

```bash
php artisan tinker
```

All'interno di Tinker:

```php
DB::table('newsletter_subscribers')->latest()->get();
```

Uscire con `exit`.

## 12. Deploy degli aggiornamenti successivi

Prima creare una copia del database:

```bash
cd /var/www/imperia-corre
mkdir -p ~/backups/imperia-corre
cp database/database.sqlite \
    ~/backups/imperia-corre/database-$(date +%Y%m%d-%H%M%S).sqlite
```

Poi aggiornare il sito:

```bash
cd /var/www/imperia-corre
php artisan down --retry=60
git pull --ff-only origin main
composer install --no-dev --prefer-dist --optimize-autoloader --no-interaction
npm ci
npm run build
php artisan migrate --force
php artisan optimize
sudo chown -R deploy:www-data database storage bootstrap/cache
sudo chmod -R ug+rwX database storage bootstrap/cache
php artisan up
```

Se un comando fallisce dopo `php artisan down`, correggere il problema e
riattivare comunque il sito con:

```bash
php artisan up
```

## 13. Rollback essenziale

Visualizzare i commit recenti:

```bash
git log --oneline -10
```

Per tornare temporaneamente a un commit precedente senza riscrivere la storia:

```bash
git checkout HASH_DEL_COMMIT
composer install --no-dev --prefer-dist --optimize-autoloader --no-interaction
npm ci
npm run build
php artisan optimize
```

Per tornare alla versione corrente:

```bash
git switch main
git pull --ff-only origin main
```

Se una migrazione ha modificato il database, ripristinare anche il backup SQLite
creato prima del deploy.

## Note operative

- Nginx deve puntare sempre a `/var/www/imperia-corre/public`, mai alla root
  del progetto.
- Non copiare né pubblicare il file `.env`.
- Non eseguire Composer o NPM come `root`.
- Questo progetto non richiede al momento worker di coda o cron Laravel.
- Conservare periodicamente una copia esterna di `database/database.sqlite`:
  contiene gli indirizzi raccolti dal modulo newsletter.
- Se sulla VPS è installata una versione PHP differente, aggiornare sia i
  pacchetti sia il socket `fastcgi_pass` nella configurazione Nginx.
